<?php

namespace App\Http\Controllers;

use App\Models\CollectorTransaction;
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
        $pengeluaran = Transaction::where('pay_status', 3)->sum('pay_total');

        $income = $pemasukan - $pengeluaran;

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
        $income = Income::all();

        $transaksiNasabah = Transaction::where('pay_status', 2)->get();
        $transaksiPengepul = CollectorTransaction::where('pay_status', 3)->get();

       $profit = $transaksiPengepul->sum('pay_total') - $transaksiNasabah->sum('pay_total') - $income->sum('pay_total');



        foreach ($validatedData['user_id'] as $key => $value) {




            $data = [
                'user_id' => $validatedData['user_id'][$key],
                'income_id' => $validatedData['income_id'][$key],
                'profit' => $validatedData['profit'][$key]
            ];



            Manage::create($data);
        }
    }
}
