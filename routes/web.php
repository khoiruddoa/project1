<?php

use App\Http\Controllers\AdjustmentController;
use App\Http\Controllers\AdminConvertionController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ChangePhotoPasswordController;
use App\Http\Controllers\CollectorTransactionController;
use App\Http\Controllers\ConvertionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExpendController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ManageController;
use App\Http\Controllers\OwnerReviewController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReportController;
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


//semuanya
Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});


Route::get('/login', [LoginController::class, 'index'])->middleware('guest');





Route::middleware(['both'])->group(function () {
Route::get('/dashboard/report', function () {
    return view('dashboard.report');
});
Route::get('/dashboard/report/transaksi', [ReportController::class, 'transaksi'])->name('print_transaction');
Route::get('/dashboard/report/transaksi/kategori', [ReportController::class, 'transaksi_kategori'])->name('print_transaction_category');
Route::get('/dashboard/report/konversi', [ReportController::class, 'konversi'])->name('print_convertion');
Route::get('/dashboard/report/Pengeluaran', [ReportController::class, 'pengeluaran'])->name('print_expend');
Route::get('/dashboard/report/emas', [ReportController::class, 'emas'])->name('print_gold');
Route::get('/dashboard/report/pengurus', [ReportController::class, 'pengurus'])->name('print_manage');
Route::get('/dashboard/report/keuntungan', [ReportController::class, 'keuntungan'])->name('print_profit');
});




//owner
Route::middleware(['owner'])->group(function () {
    Route::get('/menu', function () {
        return view('menu');
    });

Route::get('/report/review', function () {
    return view('reportreview');
})->name('reportreview');
Route::get('/transaction/review', [OwnerReviewController::class, 'index'])->name('transaction_review');
Route::post('/transaction/review', [OwnerReviewController::class, 'store'])->name('transaction_review_store');
Route::get('/convertion/review', [OwnerReviewController::class, 'convert'])->name('convertion_review');
Route::post('/convertion/review', [OwnerReviewController::class, 'convertion'])->name('convertion_review_store');
// Route::get('/collector/review', [OwnerReviewController::class, 'collect'])->name('collector_review');
// Route::post('/collector/review', [OwnerReviewController::class, 'collector'])->name('collector_review_store');
Route::get('/adjustment/review', [OwnerReviewController::class, 'adjust'])->name('adjust_review');
Route::post('/adjustment/review', [OwnerReviewController::class, 'adjustment'])->name('adjustment_review_store');
Route::get('/dashboard/review', [OwnerReviewController::class, 'admindashboard'])->name('dashboard_review');
});


//customer
Route::middleware(['customer'])->group(function () {
Route::get('/transaction', [UserTransactionController::class, 'index'])->name('transaction');
Route::get('/transaction/{id}', [UserTransactionController::class, 'detail'])->name('detail_transaction');
Route::get('/convertion', [ConvertionController::class, 'index'])->name('konversi');
Route::post('/convertion', [ConvertionController::class, 'store'])->name('store_convertion');
Route::get('/dashboard', [ScheduleController::class, 'dashboard'])->name('dashboard');

});

Route::post('/login', [LoginController::class, 'authenticate']);
 
Route::middleware(['auth'])->group(function () {

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/profil', function () {
    return view('profil');
})->name('profil');
Route::post('/upload/photo', [ChangePhotoPasswordController::class, 'changePhoto'])->name('uploadPhoto');
Route::post('/change/password', [ChangePhotoPasswordController::class, 'changePassword'])->name('changePassword');
});

    
//admin
Route::middleware(['admin'])->group(function () {
Route::get('/dashboard/dashboard', [DashboardController::class, 'admindashboard']);
Route::get('/dashboard/nasabah', [RegisterController::class, 'index'])->name('nasabah');
Route::get('/dashboard/nasabah/{user_id}', [RegisterController::class, 'detail'])->name('nasabah_detail');
Route::post('/dashboard/nasabah/update/{user_id}', [RegisterController::class, 'update'])->name('nasabah_update');
Route::post('/dashboard/nasabah', [RegisterController::class, 'store'])->name('nasabahStore');
Route::get('/dashboard/nasabah/delete/{id}', [RegisterController::class, 'destroy'])->name('nasabah_delete');
Route::get('/dashboard/sampah', [CategoryController::class, 'index'])->name('sampah');
Route::post('/dashboard/sampah', [CategoryController::class, 'store'])->name('sampahStore');
Route::post('/dashboard/sampah/update/{id}', [CategoryController::class, 'update'])->name('sampah_update');
Route::get('/dashboard/sampah/delete/{id}', [CategoryController::class, 'destroy'])->name('sampah_delete');
Route::post('/dashboard/update/harga', [CategoryController::class, 'prices'])->name('updateharga');
Route::get('/dashboard/jadwal', [ScheduleController::class, 'index'])->name('jadwal');
Route::post('/dashboard/jadwal', [ScheduleController::class, 'store'])->name('jadwalStore');
Route::get('/dashboard/jadwal/delete/{id}', [ScheduleController::class, 'destroy'])->name('jadwal_delete');
Route::get('/dashboard/transaksi', [TransactionController::class, 'index'])->name('transaksi');
Route::post('/dashboard/transaksi', [TransactionController::class, 'store'])->name('transaksi_store');
Route::get('/dashboard/transaksi/{id}', [TransactionController::class, 'detail'])->name('transaksi_detail');
Route::post('/dashboard/transaksi/detail', [TransactionController::class, 'storedetail'])->name('store_detail');
Route::get('/dashboard/transaksi/detail/delete/{id}', [TransactionController::class, 'destroydetail'])->name('delete_detail');
Route::get('/dashboard/transaksi/delete/{id}', [TransactionController::class, 'destroy'])->name('transaksi_delete');
Route::post('/dashboard/transaksi/finish/{id}', [TransactionController::class, 'finish'])->name('finish');
Route::post('/dashboard/transaksi/pick', [TransactionController::class, 'storepick'])->name('store_pick');
Route::get('/dashboard/pengepul', [CollectorTransactionController::class, 'index'])->name('transaksipengepul');
Route::post('/dashboard/pengepul', [CollectorTransactionController::class, 'store'])->name('transaksipengepul_store');
Route::get('/dashboard/pengepul/{id}', [CollectorTransactionController::class, 'detail'])->name('transaksipengepul_detail');
Route::post('/dashboard/pengepul/detail', [CollectorTransactionController::class, 'storedetail'])->name('storepengepul_detail');
Route::get('/dashboard/pengepul/detail/delete/{id}', [CollectorTransactionController::class, 'destroydetail'])->name('deletepengepul_detail');
Route::get('/dashboard/pengepul/delete/{id}', [CollectorTransactionController::class, 'destroy'])->name('transaksipengepul_delete');
Route::post('/dashboard/pengepul/finish/{id}', [CollectorTransactionController::class, 'finish'])->name('finishpengepul');
Route::get('/dashboard/konversi', [AdminConvertionController::class, 'index'])->name('pengajuan_konversi');
Route::post('/dashboard/konversi/update/{id}', [AdminConvertionController::class, 'store'])->name('store_konversi');
Route::get('/dashboard/expend', [ExpendController::class, 'index'])->name('expend');
Route::post('/dashboard/expend', [ExpendController::class, 'store'])->name('expend_store');
Route::get('/dashboard/adjustment', [AdjustmentController::class, 'index'])->name('adjustment');
Route::post('/dashboard/adjustment', [AdjustmentController::class, 'store'])->name('adjustment_store');
Route::post('/dashboard/adjustment/edit/{id}', [AdjustmentController::class, 'update'])->name('adjustment_update');
Route::get('/dashboard/adjustment/delete/{id}', [AdjustmentController::class, 'delete'])->name('adjustment_delete');
Route::get('/dashboard/pengurus', [ManageController::class, 'index'])->name('pengurus');
Route::post('/dashboard/pengurus', [ManageController::class, 'update'])->name('pengurus_update');
Route::post('/dashboard/pengurus/bagihasil', [ManageController::class, 'bagihasil'])->name('bagihasil');
Route::get('/dashboard/pengurus/delete/{id}', [ManageController::class, 'delete'])->name('pengurus_delete');
Route::get('/dashboard/print/transaksikolektor/{id}', [ReportController::class, 'print_transaksi_pengepul'])->name('print_transaction_collector');
});



