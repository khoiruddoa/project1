<?php

use App\Http\Controllers\AdminConvertionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CollectorTransactionController;
use App\Http\Controllers\ConvertionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserTransactionController;
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


Route::get('/transaction', [UserTransactionController::class, 'index'])->name('transaction');
Route::get('/transaction/{id}', [UserTransactionController::class, 'detail'])->name('detail_transaction');


Route::get('/convertion', [ConvertionController::class, 'index'])->name('konversi');
Route::post('/convertion', [ConvertionController::class, 'store'])->name('store_convertion');


Route::get('/dashboard', [ScheduleController::class, 'dashboard'])->name('dashboard');


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


Route::get('/dashboard/transaksi', [TransactionController::class, 'index'])->name('transaksi');
Route::post('/dashboard/transaksi', [TransactionController::class, 'store'])->name('transaksi_store');
Route::get('/dashboard/transaksi/{id}', [TransactionController::class, 'detail'])->name('transaksi_detail');
Route::post('/dashboard/transaksi/detail', [TransactionController::class, 'storedetail'])->name('store_detail');
Route::get('/dashboard/transaksi/detail/delete/{id}', [TransactionController::class, 'destroydetail'])->name('delete_detail');
Route::get('/dashboard/transaksi/delete/{id}', [TransactionController::class, 'destroy'])->name('transaksi_delete');


Route::get('/dashboard/transaksipengepul', [CollectorTransactionController::class, 'index'])->name('transaksipengepul');
Route::post('/dashboard/transaksipengepul', [CollectorTransactionController::class, 'store'])->name('transaksipengepul_store');
Route::get('/dashboard/transaksipengepul/{id}', [CollectorTransactionController::class, 'detail'])->name('transaksipengepul_detail');
Route::post('/dashboard/transaksipengepul/detail', [CollectorTransactionController::class, 'storedetail'])->name('storepengepul_detail');
Route::get('/dashboard/transaksipengepul/detail/delete/{id}', [CollectorTransactionController::class, 'destroydetail'])->name('deletepengepul_detail');
Route::get('/dashboard/transaksipengepul/delete/{id}', [CollectorTransactionController::class, 'destroy'])->name('transaksipengepul_delete');

Route::get('/dashboard/konversi', [AdminConvertionController::class, 'index'])->name('pengajuan_konversi');
Route::post('/dashboard/konversi/update/{id}', [AdminConvertionController::class, 'store'])->name('store_konversi');
