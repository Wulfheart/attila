<?php

namespace App\Console\Commands;

use App\Jobs\AdjudicateGameJob;
use App\Models\Game;
use App\Models\Power;
use App\Models\User;
use Faker\Factory;
use Illuminate\Console\Command;

class SimulateGameCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:simulate {--id=} {--assign} {--no-random-moves} {--moves=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $game = Game::findOrFail($this->option('id'));
        if ($game->powers()->count() < $game->player_count && $this->option('assign')) {
            // find missing powers
            $basepowers = $game->variant->basePowers()->whereNotIn('id', $game->powers->pluck('id'))->get();
            $users = User::inRandomOrder()->limit($basepowers->count())->get();
            foreach ($users as $user) {
                $user->join($game);
            }
            // foreach ($basepowers as $bp) {

            //     // $power = new Power();
            //     // $power->game_id = $game->id;
            //     // $power->user_id = User::whereNotIn('id', $game->powers->pluck('user_id'))->inRandomOrder()->first()->id;
            //     // $power->base_power_id = $bp->id;
            //     // $power->save();
            // }
        }
        for ($i = 0; $i < $this->option('moves'); $i++) {
            $this->line(sprintf("<comment>Simulating:</comment> %s - %d", $game->name, $i + 1));
            $time = stopwatch(function() use ($game) {
                AdjudicateGameJob::dispatchSync($game);
                $game->refresh();
                
                if (!$this->option('no-random-moves')) {
                    
                    // Assign some movements
                    $locations = $game->currentPhase->locations()->with('instructions')->get();
                    foreach ($locations as $location) {
                        $location->movement()->associate($location->instructions->random());
                        $location->save();
                    }
                }
            });
            $this->line(sprintf("<info>Simulated:</info> %s - %d (%s s)", $game->name, $i + 1, number_format($time, 4)));
        }

        return 0;
    }
}
