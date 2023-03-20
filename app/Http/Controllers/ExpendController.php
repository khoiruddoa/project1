<?php

namespace App\Http\Controllers;

use App\Models\Expend;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ExpendController extends Controller
{
    public function index()
    { $expends = Expend::orderBy('id', 'desc')->get();
        return view('dashboard.expend.index',['expends' => $expends]);
    }

    public function store(Request $request)
    {
    $request->merge([
        'pay_total' => str_replace('.', '', $request->pay_total)
    ]);


    $validatedData = $request->validate([
        'user_id' => 'required',
        'administrator' => 'required',
        'information' => 'required',
        'pay_total' => 'required'
    ]);


  
    Expend::create($validatedData);
    Alert::info('Berhasil', 'Transaksi Berhasil');
    return back();
}
}
