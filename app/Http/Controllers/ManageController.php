<?php

namespace App\Http\Controllers;

use App\Models\BankProfit;
use App\Models\CollectorTransaction;
use App\Models\Convertion;
use App\Models\Gold;
use App\Models\Income;
use App\Models\Manage;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ManageController extends Controller
{
    public function index()
    {

        $pemasukan = CollectorTransaction::where('pay_status', 3)->sum('pay_total');
        $pengeluaran = Transaction::where('pay_status', 2)->sum('pay_total');
        $keuntungan = Income::sum('pay_total');
        $konversi = Convertion::where('pay_status', 3)->sum('profit');
        $gold = Gold::sum('pay_total');

        $income = ($pemasukan + $konversi) - $pengeluaran - $keuntungan - $gold;

        $profit = $income / 2;

        return view('dashboard.pengurus.index', [
            'users' => User::where('role', 1)->get(),
            'manages' => User::where('manage', 1)->get(),
            'income' => $income,
            'profit' => $profit
        ]);
    }


    public function update(Request $request)
    {


        $user = User::findOrFail($request->anggota);
        $manage = 1;

        $user->manage = $manage;

        $user->save();

        Alert::info('Berhasil', 'Update Nasabah Berhasil');
        return back();
    }


    public function delete(Request $request, $id)
    {


        $user = User::findOrFail($id);
        $manage = null;

        $user->manage = $manage;

        $user->save();

        Alert::info('Berhasil', 'Update Nasabah Berhasil');
        return back();
    }


    public function bagihasil(Request $request)
    {


        $validatedData = $request->validate([
            'user_id.*' => 'required',
            'income_id.*' => 'required',
            'profit.*' => 'required'
        ]);

        $total_pengurus = collect($request->profit)->sum();
        
        $income = Income::all();
        $gold = Gold::all();

        $transaksiNasabah = Transaction::where('pay_status', 2)->get();
        $transaksiPengepul = CollectorTransaction::where('pay_status', 3)->get();
        $konversi = Convertion::where('pay_status', 3)->get();

       $profit = $transaksiPengepul->sum('pay_total')  - $transaksiNasabah->sum('pay_total') - $income->sum('pay_total');
       $gold = $konversi->sum('profit') - $gold->sum('pay_total');



       if($profit < 1){
        Alert::warning('Gagal', 'Saldo 0');
        return back();
       }

        $keuntungan = new Income;
        $keuntungan->pay_total = $profit;
        $keuntungan->administrator = Auth()->user()->name;
        $keuntungan->save();


        $idkeuntungan = $keuntungan->id;

        $keuntungangold = new Gold;
        $keuntungangold->pay_total = $gold;
        $keuntungangold->administrator = Auth()->user()->name;
        $keuntungangold->save();
        $idkeuntungangold = $keuntungangold->id;

        $bagihasil = ($profit + $gold) / 2;


        $bankProfit = new BankProfit();
        $bankProfit->income_id = $idkeuntungan;
        $bankProfit->gold_id = $idkeuntungangold;
        $bankProfit->pay_total = $bagihasil;
        $bankProfit->save();

        foreach ($validatedData['user_id'] as $key => $value) {





            $bagibagi = $bagihasil * $validatedData['profit'][$key] / $total_pengurus;

          

            $manage = new Manage([
                'user_id' => $validatedData['user_id'][$key],
                'income_id' => $idkeuntungan,
                'gold_id' => $idkeuntungangold,
                'pay_total' => $bagibagi,
                'pay_status' => 4
            ]);
            $manage->save();

            
           
        }

      
        Alert::info('Berhasil', 'Bagi Hasil Berhasil');
        return back();
    }
}
