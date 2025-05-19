<?php

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




Route::delete('/series/destroy/{serie}', [SeriesController::class, 'destroy'])->name('series.destroy');
Route::get('/series/{serie}/edit', [SeriesController::class, 'edit'])->name('series.edit');
Route::put('/series/{serie}', [SeriesController::class, 'update'])->name('series.update');
Route::get('/series/create', [SeriesController::class, 'create'])->name('series.create');
Route::post('/series', [SeriesController::class, 'store'])->name('series.store');
Route::get('/series', [SeriesController::class, 'index'])->name('series.index');
