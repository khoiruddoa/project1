<?php

namespace App\Http\Controllers;


use App\Models\CollectorTransaction;
use App\Models\Convertion;
use App\Models\Expend;
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

        $pengeluaran = Expend::all();
        $user = User::where('role', 1)->get();

        $user = count($user);
        $konver = count($konversi);
        $uangPengepul = $pengepul->sum('pay_total');
        $uangkonversi = $uangkonversi->sum('pay_total');
        $konversi = $konversi->sum('pay_total');
       


        $saldoNasabah = $transaksiNasabah->sum('pay_total') -  $konversiNasabah->sum('pay_total');

        $saldoAdmin = $transaksiPengepul->sum('pay_total') - $transaksiNasabah->sum('pay_total');

    
       
        return view('dashboard.dashboard',[
            'saldoNasabah' => $saldoNasabah,
            'saldoAdmin' => $saldoAdmin,
            'uangPengepul' => $uangPengepul,
            'user' => $user,
            'jumlahTransaksi' => $jumlahTransaksi,
            'uangkonversi' => $uangkonversi,
            'konversi' => $konversi,
            'konver' => $konver
        ]);
    }
}
