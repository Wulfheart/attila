<?php

namespace App\Jobs;

use App\Helpers\UrlBuilder;
use App\Models\Game;
use App\Models\Instruction;
use App\Models\Location;
use App\Models\Phase;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\Middleware\WithoutOverlapping;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\UrlHelper;

class AdjudicateGameJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Game $game;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Game $game)
    {
        $this->game = $game->withoutRelations();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $previous_phase = new Phase;
        $first = $this->game->started;
        if ($first) {

            //making the orders array
            $orders = [];
            foreach ($this->game->powers()->with('basePower')->get() as $power) {
                $po = [];
                $po['power'] = $power->basePower->api_name;
                $po['instructions'] = $power->locations()->where('phase_id', $this->game->currentPhase->id)->with('movement')->get()->pluck('movement.payload')->toArray();
                $orders[] = $po;
            }
            $previous_phase = $this->game->currentPhase;
            $response = Http::post(UrlBuilder::base(config('diplomacy.adjudicator_base_url'))->add('adjudicate')->string(), [
                'previous_state' => $previous_phase->state,
                'orders' => $orders
            ]);
        } else {
            $response = Http::get(UrlBuilder::base(config('diplomacy.adjudicator_base_url'))->add('adjudicate')->add($this->game->variant->api_name)->string());
        }
        $response->throw();

        // Maybe Transaction
        $time = now();
        $phase = new Phase();
        $phase->name = $response['phase'];
        $phase->svg_adjudicated = $response['svg_adjudicated'];
        $phase->svg_with_orders = $response['svg_with_orders'];
        $phase->started_at = $time;
        if ($first) {
            $phase->previous_phase_id = $previous_phase->id;
        }
        $phase->length = $this->game->phase_length;
        $phase->game_id = $this->game->id;
        $phase->state = json_encode($response['current_state']);
        $phase->save();
        if ($first) {
            $previous_phase->ended_at = $time;
            $previous_phase->save();
        }

        // Locations and Instructions
        $po = $response['possible_orders'];
        foreach ($po as $p) {
            $power = $this->game->powers()->with('basepower')->whereHas('basepower', function (Builder $query) use ($p) {
                $query->where('api_name', $p['name']);
            })->first();
            foreach ($p['units'] as $u) {
                $location = new Location();
                $location->name = $u['location'];
                $location->phase_id = $phase->id;
                $location->power_id = $power->id;
                $location->save();
                foreach ($u['instructions'] as $inst) {
                    $instruction = new Instruction();
                    $instruction->payload = $inst;
                    $instruction->location_id = $location->id;
                    $instruction->save();
                }
            }
        }
    }

    /**
     * Get the middleware the job should pass through.
     *
     * @return array
     */
    // public function middleware()
    // {
    //     dd($this->game->id);
    //     // return [new WithoutOverlapping($this->game->id)];
    // }
}
