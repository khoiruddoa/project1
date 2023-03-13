<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ScheduleController;
use App\Models\Schedule;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::get('/transaction', function () {
    return view('transaction');
});

Route::get('/convertion', function () {
    return view('convertion');
});
Route::get('/dashboard', [ScheduleController::class, 'dashboard']);


Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);

    
Route::get('/dashboard/contoh', function () {
    return view('dashboard/example');
});

Route::get('/dashboard/nasabah', [RegisterController::class, 'index'])->name('nasabah');
Route::get('/dashboard/nasabah/{user_id}', [RegisterController::class, 'detail'])->name('nasabah_detail');
Route::post('/dashboard/nasabah/update/{user_id}', [RegisterController::class, 'update'])->name('nasabah_update');
Route::post('/dashboard/nasabah', [RegisterController::class, 'store'])->name('nasabahStore');
Route::get('/dashboard/nasabah/delete/{id}', [RegisterController::class, 'destroy'])->name('nasabah_delete');

Route::get('/dashboard/sampah', [CategoryController::class, 'index'])->name('sampah');
Route::post('/dashboard/sampah', [CategoryController::class, 'store'])->name('sampahStore');
Route::post('/dashboard/sampah/update/{id}', [CategoryController::class, 'update'])->name('sampah_update');
Route::get('/dashboard/sampah/delete/{id}', [CategoryController::class, 'destroy'])->name('sampah_delete');

Route::get('/dashboard/jadwal', [ScheduleController::class, 'index'])->name('jadwal');
Route::post('/dashboard/jadwal', [ScheduleController::class, 'store'])->name('jadwalStore');
Route::get('/dashboard/jadwal/delete/{id}', [ScheduleController::class, 'destroy'])->name('jadwal_delete');
  