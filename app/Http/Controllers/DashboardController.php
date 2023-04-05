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
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admindashboard(){
        $currentMonth = Carbon::now()->month;

        $transaksiNasabah = Transaction::where('pay_status', 2)->get();
        $konversiNasabah = Convertion::where('pay_status', 3)->get();
        $konversi = Convertion::where('pay_status', 1)->get();
        $uangkonversi = Convertion::where('pay_status', 2)->get();
        $transaksiPengepul = CollectorTransaction::where('pay_status', 3)->get();
        $pengepul = CollectorTransaction::where('pay_status', 2)->get();
        $jumlahTransaksi = Transaction::whereMonth('created_at', $currentMonth)->where('information', null)->get();
        $jumlahTransaksi = count($jumlahTransaksi);
        $bank = BankProfit::all();
        $expend = Expend::all();
        $income = Income::all();
        $user = User::where('role', 1)->get();

        
        $keuntungan = $income->sum('pay_total');
       
       $total_konversi = $konversiNasabah->sum('profit');
        $manage = Manage::all();
        $gold = Gold::sum('pay_total');


        $user = count($user);
        $konver = count($konversi);
        $konversi = $konversi->sum('pay_total');

        $uangPengepul = $pengepul->sum('pay_total');
        $uangkonversi = $uangkonversi->sum('pay_total');
        
       


        $saldoNasabah = $transaksiNasabah->sum('pay_total') + $manage->sum('pay_total') -  $konversiNasabah->sum('pay_total');

        $saldoAdmin = $transaksiPengepul->sum('pay_total') - $transaksiNasabah->sum('pay_total') - $income->sum('pay_total');
        $saldo_konversi = $total_konversi - $gold;
        $keuntungan = $bank->sum('pay_total') - $expend->sum('pay_total');

    
       
        return view('dashboard.dashboard',[
            'saldoNasabah' => $saldoNasabah,
            'saldoAdmin' => $saldoAdmin,
            'uangPengepul' => $uangPengepul,
            'user' => $user,
            'jumlahTransaksi' => $jumlahTransaksi,
            'uangkonversi' => $uangkonversi,
            'konversi' => $konversi,
            'konver' => $konver,
            'keuntungan' => $keuntungan,
            'saldo_konversi' => $saldo_konversi
        ]);
    }
}
