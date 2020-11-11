<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IndexGamesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(string $type = 'active')
    {
        $type = Str::lower($type);
        $allowedTypes = collect(['new', 'active', 'finished']);
        if (!$allowedTypes->contains($type)) {
            abort(404);
        }
        $game = Game::with('phases', 'variant', 'powers.basepower');
        switch (Str::lower($type)) {
            case 'new':
                $games = $game->new()->get();
                break;
            case 'active':
                $games = $game->active()->get();
                break;
            case 'finished':
                $games = $game->finished()->get();
                break;
        }
        return view('game.index', [
            'games' => $games,
            'type' => $type,
            'count' => [
                'new' => Game::new()->count(),
                'active' => Game::active()->count(),
                'finished' => Game::finished()->count(),
            ]
        ]);
    }
}
