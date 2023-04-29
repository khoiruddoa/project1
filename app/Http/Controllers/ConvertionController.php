<?php

namespace App\Http\Controllers;

use App\Models\Convertion;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ConvertionController extends Controller
{

    public function index()
    {
        $user = User::find(auth()->user()->id);
        $saldo = 1;
        
        $convertion = Convertion::where('user_id', auth()->user()->id)->where('pay_status', 1)->orwhere('pay_status', 2)->get();

        $convertions = Convertion::where('user_id', auth()->user()->id)->get();

        return view(
            'convertion',
            [
                'user' => $user,
                'convertion' => $convertion,
                'convertions' => $convertions,
                'saldo' => $saldo
            ]
        );
    }

    // public function store(Request $request)
    // {

    //     if($request->pay_total > 0){
    //     Convertion::create($request->all());

    //     Alert::info('Berhasil', 'Silahkan Menunggu');
    //     return redirect('/convertion');
    //     }
    //     Alert::warning('Gagal', 'Saldo Anda 0');
    //     return back();

    // }
}
