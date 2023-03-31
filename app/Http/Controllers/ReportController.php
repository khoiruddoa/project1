<?php

namespace App\Http\Controllers;

use App\Models\CollectorTransaction;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{

    public function transaksi() {
        $pengepul = CollectorTransaction::select('user_id', 'pay_total', 'information', 'updated_at', DB::raw(" 'masuk' as origin"))->get();
        $nasabah = Transaction::select('user_id', 'pay_total', 'information', 'updated_at', DB::raw(" 'keluar' as origin"))->get();
    
        $transaksi = $pengepul->concat($nasabah)->sortBy('updated_at');
        return view('dashboard.report.transaksi', ['transactions' => $transaksi]);
    }
    
}
