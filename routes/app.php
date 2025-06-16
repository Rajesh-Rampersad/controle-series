<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\EpisodesController;
use App\Http\Controllers\UserController;

Route::middleware('auth')->group(function () {
    Route::redirect('/', '/series');

    // SERIES
    Route::resource('/series', SeriesController::class)->except(['show']);
    // Route::get('/series', [SeriesController::class, 'index'])->name('series.index');
    // Route::get('/series/create', [SeriesController::class, 'add'])->name('series.create');
    // Route::post('/series', [SeriesController::class, 'store'])->name('series.store');
    // Route::get('/series/{serie}/edit', [SeriesController::class, 'edit'])->name('series.edit');

    // SEASONS
    Route::get('/series/{serie}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');
    Route::get('/series/{serie}/seasons/create', [SeasonsController::class, 'create'])->name('seasons.create');
    Route::post('/series/{serie}/seasons', [SeasonsController::class, 'store'])->name('seasons.store');
    Route::get('/seasons/{season}/edit', [SeasonsController::class, 'edit'])->name('seasons.edit');
    Route::put('/seasons/{season}', [SeasonsController::class, 'update'])->name('seasons.update');

    Route::delete('/seasons/{season}', [SeasonsController::class, 'destroy'])->name('seasons.destroy');

    // EPISODES
    Route::get('/seasons/{season}/episodes', [EpisodesController::class, 'index'])->name('episodes.index');
    Route::post('/seasons/{season}/episodes/mark-watched', [EpisodesController::class, 'markWatched'])->name('episodes.markWatched');
    Route::get('/seasons/{season}/episodes/create', [EpisodesController::class, 'create'])->name('episodes.create');
    Route::post('/seasons/{season}/episodes', [EpisodesController::class, 'store'])->name('episodes.store');
    Route::get('/episodes/{episode}/edit', [EpisodesController::class, 'edit'])->name('episodes.edit');
    Route::put('/episodes/{episode}', [EpisodesController::class, 'update'])->name('episodes.update');
    Route::delete('/episodes/{episode}', [EpisodesController::class, 'destroy'])->name('episodes.destroy');

    // USERS
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});
