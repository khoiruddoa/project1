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
        $convertion = Convertion::where('pay_status', 1)->where('user_id', auth()->user()->id)->get();
        $convertions = Convertion::where('pay_status', 3)->where('user_id', auth()->user()->id)->get();


        return view(
            'convertion',
            [
                'user' => $user,
                'convertion' => $convertion,
                'convertions' => $convertions,
            ]
        );
    }

    public function store(Request $request)
    {
        Convertion::create($request->all());

        Alert::info('Berhasil', 'Silahkan Menunggu');
        return redirect('/convertion');
    }
}
