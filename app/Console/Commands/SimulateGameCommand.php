<?php

namespace App\Console\Commands;

use App\Jobs\AdjudicateGameJob;
use App\Models\Game;
use App\Models\Power;
use App\Models\User;
use Illuminate\Console\Command;

class SimulateGameCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:simulate {--id=} {--assign}';

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
        if($game->powers()->count() < $game->player_count && $this->option('assign')){
            // find missing powers
            $basepowers = $game->variant->basePowers()->whereNotIn('id', $game->powers->pluck('id'))->get();
            foreach ($basepowers as $bp) {
                $power = new Power();
                $power->game_id = $game->id;
                $power->user_id = User::whereNotIn('id', $game->powers->pluck('user_id'))->inRandomOrder()->first()->id;
                $power->base_power_id = $bp->id;
                $power->save();
            }
        }

        AdjudicateGameJob::dispatchSync($game);
        $this->info($game->name);
        return 0;
    }
}
