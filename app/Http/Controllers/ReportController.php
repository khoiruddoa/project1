<?php

namespace App\Http\Controllers;

use App\Models\BankProfit;
use App\Models\CollectorTransaction;
use App\Models\Convertion;
use App\Models\Expend;
use App\Models\Income;
use App\Models\Manage;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    public function transaksi() {
        $pengepul = CollectorTransaction::select('user_id', 'pay_total', 'information', 'updated_at', DB::raw("'masuk' as origin"))
                ->where('pay_status',3)
                ->get();
        $nasabah = Transaction::select('user_id', 'pay_total', 'information', 'updated_at', DB::raw(" 'keluar' as origin"))->where('pay_status',2)->get();
        $profit = Income::select('user_id', 'pay_total', 'information', 'updated_at', DB::raw(" 'profit' as origin"))->get();
    
        $transaksi = $pengepul->concat($nasabah)->concat($profit)->sortBy('updated_at');
        return view('dashboard.report.transaksi', ['transactions' => $transaksi]);
    }


    public function konversi() {
        $transaksi = Transaction::select('user_id', 'pay_total', 'information', 'updated_at', DB::raw("'masuk' as origin"))
                ->where('pay_status',2)
                ->get();
        $konversi = Convertion::select('user_id', 'pay_total', 'information', 'updated_at', DB::raw(" 'keluar' as origin"))->where('pay_status',3)->get();
        $profit = Manage::select('user_id', 'pay_total', 'information', 'updated_at', DB::raw(" 'profit' as origin"))->get();
    
        $konversi = $transaksi->concat($konversi)->concat($profit)->sortBy('updated_at');
        return view('dashboard.report.konversi', ['convertions' => $konversi]);
    }

    public function pengeluaran() {
        $profit = BankProfit::select('pay_total', 'information', 'updated_at', DB::raw("'masuk' as origin"))->get();
        $expend = Expend::select('pay_total', 'information', 'updated_at', DB::raw(" 'keluar' as origin"))->get();
      
        $expender = $profit->concat($expend)->sortBy('updated_at');
        return view('dashboard.report.pengeluaran', ['expends' => $expender]);
    }
    
}
