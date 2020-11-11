<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\Game;
use App\Models\Power;
use Illuminate\Http\Request;

class JoinGameController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Game $game)
    {
        $game->load(['powers.basepower', 'variant.basepowers']);
        $this->authorize('join', $game);


        $basepower = $game->variant->basepowers->diff($game->powers->pluck('basepower'))->random();
        $power = new Power();
        $power->base_power_id = $basepower->id;
        $power->game_id = $game->id;
        $power->user_id = auth()->user()->id;
        $power->save();
        
    }
}
