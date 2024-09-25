<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(TournamentController::class)->middleware(['auth'])->group(function(){
    Route::get('/', [TournamentController::class, 'home']);
    Route::get('/matches/tournament/{tournament_id}', [TournamentController::class, 'tournament']);
    Route::get('/matches/result/{tournament_id}', [TournamentController::class, 'result']);
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
    Route::get('/matches/music', [TournamentController::class, 'music']);
    Route::get('/level', [TournamentController::class, 'selectLevel']);
    Route::get('/const', [TournamentController::class, 'constRange']);
    Route::get('/music', [TournamentController::class, 'searchMusic']);
});

Route::get('/', [TournamentController::class, 'home'])->name('home')->middleware('auth');
Route::get('/matches/operation', [TournamentController::class, 'operation'])->name('operation')->middleware('auth');
Route::get('/matches/entry', [TournamentController::class, 'entry'])->name('entry')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
