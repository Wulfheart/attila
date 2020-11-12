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
        $this->authorize('join', $game);
        auth()->user()->join($game);        
    }
}
