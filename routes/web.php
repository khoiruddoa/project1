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

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/dashboard', function () {
    return view('dashboard');
});
    
Route::get('/dashboard/contoh', function () {
    return view('dashboard/example');
});

Route::get('/dashboard/nasabah', [RegisterController::class, 'index'])->name('nasabah');
Route::post('/dashboard/nasabah', [RegisterController::class, 'store'])->name('nasabahStore');

Route::get('/dashboard/sampah', [CategoryController::class, 'index'])->name('sampah');
Route::post('/dashboard/sampah', [CategoryController::class, 'store'])->name('sampahStore');

Route::get('/dashboard/jadwal', [ScheduleController::class, 'index'])->name('jadwal');
Route::post('/dashboard/jadwal', [ScheduleController::class, 'store'])->name('jadwalStore');
  