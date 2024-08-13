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

Route::get('/', [TournamentController::class, 'home2']);
Route::get('/matches/tournament/{tournament_id}', [TournamentController::class, 'tournament2']);
Route::get('/matches/result', [TournamentController::class, 'result']);
Route::get('/matches/result/{tournament_id}', [TournamentController::class, 'result2']);
Route::get('/matches/ban', [TournamentController::class, 'ban']);
Route::get('/matches/ban/{tournament_id}', [TournamentController::class, 'ban2']);
Route::get('/matches/entry', [TournamentController::class, 'entry']);
Route::get('/search', [TournamentController::class, 'search']);
Route::get('/matches/confirmation/{tournament}', [TournamentController::class, 'confirmation']);
Route::post('/entry/confirmation/{tournament}', [TournamentController::class, 'entryConfirmation']);
Route::get('/matches/register/{tournament}', [TournamentController::class, 'register']);
Route::put('/scores/', [TournamentController::class, 'update']);
Route::get('/matches/judge/{tournament}', [TournamentController::class, 'judge']);
Route::get('/next/{tournament}', [TournamentController::class, 'nextMatch']);
Route::get('/matches/make', [TournamentController::class, 'make']);
Route::post('/create', [TournamentController::class, 'create']);
Route::get('/matches/operation', [TournamentController::class, 'operation']);
Route::get('/matches/select/{tournament}', [TournamentController::class, 'select']);
Route::get('/matches/start/{tournament}', [TournamentController::class, 'start']);
Route::post('/members/confirmation/{tournament}', [TournamentController::class, 'membersConfirmation']);
