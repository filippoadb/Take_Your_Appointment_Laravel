<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\AppointmentController;

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

Route::get('/', [PublicController::class, "welcome"])->name("welcome");

// Logout
Route::post('/logout', [PublicController::class, 'logout'])->name('logout');

// Rotte per visualizzare la lista degli appuntamenti
Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');

// Rotta per visualizzare il modulo di prenotazione
Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');

// Rotta per gestire la creazione di un nuovo appuntamento
Route::post('/appointments/store', [AppointmentController::class, 'store'])->name('appointments.store');

// Rotta per visualizzare i dettagli di un appuntamento
// Route::get('/appointments/{appointment}', [AppointmentController::class, 'show'])->name('appointments.show')->middleware(['auth']);

// Rotta per cancellare un appuntamento
// Route::delete('/appointments/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.destroy')->middleware(['auth']);
