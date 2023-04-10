<?php

namespace App\Http\Controllers;

use App\Models\BankProfit;
use App\Models\CollectorTransaction;
use App\Models\Convertion;
use App\Models\Expend;
use App\Models\Gold;
use App\Models\Income;
use App\Models\Manage;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ReportController extends Controller
{

    // public function transaksi(Request $request)
    // {
    //     $start_date = $request->input('start_date');
    //     $end_date = $request->input('end_date');

    //     // Memastikan end_date tidak lebih kecil dari start_date
    //     if ($end_date < $start_date) {
    //         Alert::warning('Gagal', 'Tanggal Akhir tidak boleh lebih dulu dari tanggal awal');
    //         return back();
    //     }

    //     $pengepul = CollectorTransaction::select('user_id', 'pay_total', 'information', 'updated_at', DB::raw("'masuk' as origin"))
    //         ->where('pay_status', 3)
    //         ->whereBetween('updated_at', [$start_date, $end_date]) // menambahkan kondisi whereBetween
    //         ->get();

    //     $nasabah = Transaction::select('user_id', 'pay_total', 'information', 'updated_at', DB::raw(" 'keluar' as origin"))
    //         ->where('pay_status', 2)
    //         ->whereBetween('updated_at', [$start_date, $end_date]) // menambahkan kondisi whereBetween
    //         ->get();

    //     $profit = Income::select('user_id', 'pay_total', 'information', 'updated_at', DB::raw(" 'profit' as origin"))
    //         ->whereBetween('updated_at', [$start_date, $end_date]) // menambahkan kondisi whereBetween
    //         ->get();

    //     $transaksi = $pengepul->concat($nasabah)->concat($profit)->sortBy('updated_at');
    //     return view('dashboard.report.transaksi', ['transactions' => $transaksi]);
    // }

    public function transaksi(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        // Mendapatkan saldo awal dari tanggal sebelumnya

        // Memastikan end_date tidak lebih kecil dari start_date
        if ($end_date < $start_date) {
            Alert::warning('Gagal', 'Tanggal Akhir tidak boleh lebih dulu dari tanggal awal');
            return back();
        }

        
        $transaksiNasabah = Transaction::where('pay_status', 2)->get();

        $transaksiPengepul = CollectorTransaction::where('pay_status', 3)->get();
        $pengepul = CollectorTransaction::where('pay_status', 2)->get();
        $income = Income::all();

        if($request->type == null){
        $pengepul = CollectorTransaction::select('user_id', 'pay_total', 'information', 'updated_at', DB::raw("'masuk' as origin"))
            ->where('pay_status', 3)
            ->whereBetween('updated_at', [$start_date, $end_date])
            ->get();

        $nasabah = Transaction::select('user_id', 'pay_total', 'information', 'updated_at', DB::raw(" 'keluar' as origin"))
            ->where('pay_status', 2)
            ->whereBetween('updated_at', [$start_date, $end_date])
            ->get();

        $profit = Income::select('user_id', 'pay_total', 'information', 'updated_at', DB::raw(" 'profit' as origin"))
            ->whereBetween('updated_at', [$start_date, $end_date])
            ->get();

        $transaksi = $pengepul->concat($nasabah)->concat($profit)->sortBy('updated_at');

        // Menghitung pendapatan dan total saldo
        $pendapatan = 0;
        foreach ($transaksi as $transaction) {
            if ($transaction->origin == 'masuk') {
                $pendapatan += $transaction->pay_total;
            } else if ($transaction->origin == 'keluar' || $transaction->origin == 'profit') {
                $pendapatan -= $transaction->pay_total;
            }
        }

        $total_saldo = $transaksiPengepul->sum('pay_total') - $transaksiNasabah->sum('pay_total') - $income->sum('pay_total');
        $saldo_awal = $total_saldo - $pendapatan;
        return view('dashboard.report.transaksi', [
            'transactions' => $transaksi,
            'saldo_awal' => $saldo_awal,
            'pendapatan' => $pendapatan,
            'total_saldo' => $total_saldo,
            'start' => $start_date,
            'end' => $end_date
        ]);
    }

    public function konversi(Request $request)
    {

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        // Mendapatkan saldo awal dari tanggal sebelumnya

        // Memastikan end_date tidak lebih kecil dari start_date
        if ($end_date < $start_date) {
            Alert::warning('Gagal', 'Tanggal Akhir tidak boleh lebih dulu dari tanggal awal');
            return back();
        }

        $konversi = Convertion::where('pay_status', 3)
            ->whereBetween('created_at', [$start_date, $end_date])
            ->get();


        return view('dashboard.report.konversi', [
            'convertions' => $konversi,
            'start' => $start_date,
            'end' => $end_date
        ]);
    }

    public function pengeluaran(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
        
        // Mendapatkan saldo awal dari tanggal sebelumnya
        
        // Memastikan end_date tidak lebih kecil dari start_date
        if ($end_date < $start_date) {
            Alert::warning('Gagal', 'Tanggal Akhir tidak boleh lebih dulu dari tanggal awal');
            return back();
        }
        $bank = BankProfit::sum('pay_total');
        $ex = Expend::sum('pay_total');
        // Mengambil data dari tabel BankProfit yang tanggal updated_at-nya antara start_date dan end_date
        $profit = BankProfit::select('pay_total', 'information', 'updated_at', DB::raw("'masuk' as origin"))
                            ->whereBetween('updated_at', [$start_date, $end_date])
                            ->get();
        
        // Mengambil data dari tabel Expend yang tanggal updated_at-nya antara start_date dan end_date
        $expend = Expend::select('pay_total', 'information', 'updated_at', DB::raw(" 'keluar' as origin"))
                            ->whereBetween('updated_at', [$start_date, $end_date])
                            ->get();
        
        $expenders = $profit->concat($expend)->sortBy('updated_at');

        $sisa_saldo = $bank - $ex;

        $saldo_sekarang = 0;
        foreach ($expenders as $expend) {
            if ($expend->origin == 'masuk') {
                $saldo_sekarang += $expend->pay_total;
            } else if ($expend->origin == 'keluar') {
                $saldo_sekarang -= $expend->pay_total;}
           
        }
        $pengeluaran = 0;
        foreach ($expenders as $expend) {
            if ($expend->origin == 'keluar') {
                $pengeluaran += $expend->pay_total;}
           
        }
        $saldo_awal = $sisa_saldo - $saldo_sekarang;
        
        return view('dashboard.report.pengeluaran', ['expends' => $expenders,
        'pengeluaran' => $pengeluaran,
        'saldo_awal' => $saldo_awal,
        'sisa_saldo' => $sisa_saldo,
            'start' => $start_date,
            'end' => $end_date]);
        
    }

    public function emas()
    {
        $users = User::whereIn('role', [1, 2])->get();
        return view('dashboard.report.emas', ['users' => $users]);
    }

    public function pengurus(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');
    
        // Memastikan end_date tidak lebih kecil dari start_date
        if ($end_date < $start_date) {
            Alert::warning('Gagal', 'Tanggal Akhir tidak boleh lebih dulu dari tanggal awal');
            return back();
        }
    
        // Mengambil data dari tabel Manage yang tanggal updated_at-nya antara start_date dan end_date
        $manages = Manage::orderBy('updated_at', 'asc')
                            ->whereBetween('updated_at', [$start_date, $end_date])
                            ->get();
    
        return view('dashboard.report.pengurus', ['manages' => $manages, 'start' => $start_date,
        'end' => $end_date,]);
    }
    

    public function keuntungan(Request $request)
    {
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        // Memastikan end_date tidak lebih kecil dari start_date
        if ($end_date < $start_date) {
            Alert::warning('Gagal', 'Tanggal Akhir tidak boleh lebih dulu dari tanggal awal');

            return back();
        }
        $income = Income::select('pay_total', 'updated_at', DB::raw("'masuk' as origin"));
        $gold = Gold::select('pay_total', 'updated_at', DB::raw("'gold' as origin"));
        $manage = Manage::select('pay_total', 'updated_at', DB::raw("'pengurus' as origin"));
        $bank = BankProfit::select('pay_total', 'updated_at', DB::raw("'bank' as origin"));
        $totalprofit = $income->sum('pay_total') + $gold->sum('pay_total') - $manage->sum('pay_total') - $bank->sum('pay_total');
        

        // Filter untuk rentang tanggal tertentu
        if ($request->has('start_date') && $request->has('end_date')) {
            $start_date = $request->input('start_date');
            $end_date = $request->input('end_date');
            $income->whereBetween('updated_at', [$start_date, $end_date]);
            $manage->whereBetween('updated_at', [$start_date, $end_date]);
            $bank->whereBetween('updated_at', [$start_date, $end_date]);
            $gold->whereBetween('updated_at', [$start_date, $end_date]);
        }



        $income = $income->get();
        $manage = $manage->get();
        $bank = $bank->get();
        $gold = $gold->get();


        $profits = $income->concat($manage)->concat($bank)->concat($gold)->sortBy('updated_at');

        $pendapatan = 0;
        foreach ($profits as $profit) {
            if ($profit->origin == 'masuk') {
                $pendapatan += $profit->pay_total;
            } else if ($profit->origin == 'gold' || $profit->origin == 'profit') {
                $pendapatan += $profit->pay_total;
            } else if ($profit->origin == 'pengurus' || $profit->origin == 'profit') {
                $pendapatan -= $profit->pay_total;
            } else if ($profit->origin == 'bank' || $profit->origin == 'profit') {
                $pendapatan -= $profit->pay_total;
            }
        }

$saldo_awal = $totalprofit - $pendapatan;
            return view('dashboard.report.keuntungan', [
                'profits' => $profits,
                'start' => $start_date,
                'end' => $end_date,
                'pendapatan' => $pendapatan,
                'saldo_awal' => $saldo_awal, 
                'total_profit' => $totalprofit
            ]);
        
    }
}
