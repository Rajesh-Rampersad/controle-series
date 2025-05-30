<?php

use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TesteController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Autenticador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|f
*/

Route::get('/', function () {
    return redirect('/series');
})->middleware(Autenticador::class);


// Series CRUD
Route::get('/series', [SeriesController::class, 'index'])->name('series.index');
Route::get('/series/create', [SeriesController::class, 'create'])->name('series.create');
Route::post('/series', [SeriesController::class, 'store'])->name('series.store');
Route::get('/series/{serie}/edit', [SeriesController::class, 'edit'])->name('series.edit');
Route::put('/series/{serie}', [SeriesController::class, 'update'])->name('series.update');
Route::delete('/series/{serie}', [SeriesController::class, 'destroy'])->name('series.destroy');

// Seasons CRUD
Route::get('/series/{serie}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');
Route::get('/series/{serie}/seasons/create', [SeasonsController::class, 'create'])->name('seasons.create');
Route::post('/series/{serie}/seasons', [SeasonsController::class, 'store'])->name('seasons.store');
Route::get('/seasons/{season}/edit', [SeasonsController::class, 'edit'])->name('seasons.edit');
Route::put('/seasons/{season}', [SeasonsController::class, 'update'])->name('seasons.update');
Route::delete('/seasons/{season}', [SeasonsController::class, 'destroy'])->name('seasons.destroy');

// Episodios CRUD
Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');
Route::post('/seasons/{season}/episodes/mark-watched', [EpisodesController::class, 'markWatched'])->name('episodes.markWatched');
Route::get('/seasons/{season}/episodes/create', [EpisodesController::class, 'create'])->name('episodes.create');
Route::post('/seasons/{season}/episodes', [EpisodesController::class, 'store'])->name('episodes.store');
Route::get('/episodes/{episode}/edit', [EpisodesController::class, 'edit'])->name('episodes.edit');
Route::put('/episodes/{episode}', [EpisodesController::class, 'update'])->name('episodes.update');
Route::delete('/episodes/{episode}', [EpisodesController::class, 'destroy'])->name('episodes.destroy');

// Login CRUD
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('login.logout');

// USER CRUD
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/register', [UserController::class, 'create'])->name('users.create');
Route::post('/register', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
