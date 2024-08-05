<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TournamentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [TournamentController::class, 'tournament']);
Route::get('/{tournament_id}', [TournamentController::class, 'tournament2']);
Route::get('/matches/result', [TournamentController::class, 'result']);
Route::get('/matches/result/{tournament_id}', [TournamentController::class, 'result2']);
Route::get('/matches/ban', [TournamentController::class, 'ban']);
Route::get('/matches/ban/{tournament_id}', [TournamentController::class, 'ban2']);
Route::get('/matches/entry', [TournamentController::class, 'entry']);
Route::get('/matches/home', [TournamentController::class, 'home2']);
Route::get('/matches/make', [TournamentController::class, 'make']);
Route::get('/matches/operation', [TournamentController::class, 'operation']);
