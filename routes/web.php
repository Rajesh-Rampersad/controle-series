<?php

use App\Http\Controllers\SeasonsController;
use App\Http\Controllers\SeriesController;
use App\Http\Controllers\TesteController;
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
});


// Series CRUD
Route::get('/series', [SeriesController::class, 'index'])->name('series.index');
Route::get('/series/create', [SeriesController::class, 'create'])->name('series.create');
Route::post('/series', [SeriesController::class, 'store'])->name('series.store');
Route::get('/series/{serie}/edit', [SeriesController::class, 'edit'])->name('series.edit');
Route::put('/series/{serie}', [SeriesController::class, 'update'])->name('series.update');
Route::delete('/series/{serie}', [SeriesController::class, 'destroy'])->name('series.destroy');

// Seasons CRUD
Route::get('/series/{serie}/seasons', [SeasonsController::class, 'index'])->name('seasons.index');
// Route::get('/series/{serie}/seasons/create', [SeasonsController::class, 'create'])->name('seasons.create');
// Route::post('/series/{serie}/seasons', [SeasonsController::class, 'store'])->name('seasons.store');
// Route::get('/series/{serie}/seasons/{season}', [SeasonsController::class, 'show'])->name('seasons.show');
// Route::get('/series/{serie}/seasons/{season}/edit', [SeasonsController::class, 'edit'])->name('seasons.edit');
// Route::put('/series/{serie}/seasons/{season}', [SeasonsController::class, 'update'])->name('seasons.update');
// Route::delete('/series/{serie}/seasons/{season}', [SeasonsController::class, 'destroy'])->name('seasons.destroy');
