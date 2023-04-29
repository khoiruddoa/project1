<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class WithdrawController extends Controller
{
    public function index()
    {
        return view('dashboard.withdraw.index', [

            'users' => User::where('role', 1)->get(),
            'withdraws' => Withdraw::where('information', 1)->get(),
        ]);
    }

    public function store(Request $request)
{

        
        $user = User::find($request->user_id);
$totaltransaksi= $user->transactions()->where('pay_status', 2)->sum('pay_total');
$totalkonversi= $user->convertions()->where('pay_status', 3)->sum('pay_total');
$totalwithdraw= $user->withdraws()->where('pay_status', 2)->sum('pay_total');
$totalmanage= $user->manages()->sum('pay_total');
$totaladjustment= $user->adjustments()->where('pay_status', 2)->sum('pay_total');



$saldo = $totaltransaksi + $totaladjustment + $totalmanage - $totalkonversi - $totalwithdraw;


        $request->merge([
            'pay_total' => str_replace('.', '', $request->pay_total)
        ]);


        if($request->pay_total > $saldo){
            Alert::warning('Gagal', 'saldo tidak cukup');
            return back();
        }

        $withdraw = Withdraw::create($request->all());

        

        Alert::info('Berhasil', 'Pencairan dana dibuat');
        return redirect('/dashboard/withdraw');
    }

    
    public function delete($id)
    {



        $withdraw = Withdraw::find($id);
      


        $withdraw->delete();
       
        Alert::info('Berhasil', 'Hapus Data Berhasil');
        return back();
    }
}
