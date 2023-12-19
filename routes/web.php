<?php

use App\Models\Appointment;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\NoveltyController;



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
    return view('auth.login');
});

Auth::routes();

/* Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); */
Route::get('/appointment/register', [AppointmentController::class, 'register'])->name('appointment.register');
Route::resource('/appointment', AppointmentController::class);

Route::get('/novelty', [NoveltyController::class, 'index'])->name('novelty.index');
Route::post('/novelty', [NoveltyController::class, 'store'])->name('novelty.store');
Route::get('/novelty/{novelty}/edit', [NoveltyController::class, 'edit'])->name('novelty.edit');
Route::delete('/novelty/{novelty}', [NoveltyController::class, 'destroy'])->name('novelty.destroy');
Route::put('/novelty/{novelty}', [NoveltyController::class, 'update'])->name('novelty.update');
Route::get('/novelty/{appointment}/create', [NoveltyController::class, 'create'])->name('novelty.create');
