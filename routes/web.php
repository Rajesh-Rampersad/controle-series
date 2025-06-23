<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Mail;
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
    return view('welcome');
});

// Dashboard protegido por login y verificación de email
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Perfil
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Ruta de mail
Route::get('/mail', function () {
    $mail = new \App\Mail\SeriesCreated(
        nomeSerie: 'Breaking Bad',
        qtdTemporadas: 5,
        qtdEpisodios: 62,
        idSerie: 1
    );
    Mail::to('ejemplo@mail.com')->send($mail);
    return 'Email enviado correctamente';
})->name('mail');

require __DIR__ . '/auth.php';
require __DIR__ . '/app.php'; // NUEVO archivo donde irán tus rutas CRUD reales