<?php

namespace App\Http\Controllers;

use App\Models\Convertion;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminConvertionController extends Controller
{
    public function index()
    {
        $convertions = Convertion::where('user_id', auth()->user()->id)->where('pay_status', 1)->get();
        $approves = Convertion::where('user_id', auth()->user()->id)->where('pay_status', 2)->get();
        $success = Convertion::where('user_id', auth()->user()->id)->where('pay_status', 3)->get();
        return view('dashboard.konversi.index', [
            'convertions' => $convertions,
            'approves' => $approves,
            'success' => $success
        ]);
    }
    public function store(Request $request, $id)
    {
        $request->merge([
            'pay_total' => str_replace('.', '', $request->pay_total)
        ]);

        $convertions = Convertion::findOrFail($id);
        if ($request->pay_total > $convertions->pay_total) {
            Alert::warning('Gagal', 'Pembayaran Tidak Boleh Melebihi Saldo Nasabah');
            return redirect()->back();
        }
        $convertions->update($request->all());
        Alert::info('Berhasil', 'Berhasil dibayarkan');
        return redirect()->back();
    }
}
