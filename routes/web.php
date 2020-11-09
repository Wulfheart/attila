<?php

use App\Http\Controllers\Game as Game;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::name('games.')->prefix('games')->group(function () {
        Route::get('/index/{type?}', Game\IndexGamesController::class)->name('index');
        Route::get('/create', Game\CreateGameController::class)->name('create');
        Route::post('/', Game\StoreGameController::class)->name('store');
        Route::post('/{game}/join', Game\JoinGameController::class)->name('join');
        Route::post('/{game}/leave', Game\LeaveGameController::class)->name('leave');
        Route::get('/{game}', Game\ShowGameController::class)->name('show');
    });
});

