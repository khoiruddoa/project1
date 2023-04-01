<?php

namespace App\Http\Controllers;

use App\Models\Convertion;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminConvertionController extends Controller
{
    public function index()
    {
        $convertions = Convertion::where('pay_status', 1)->get();
        $approves = Convertion::where('pay_status', 2)->get();
        $success = Convertion::where('pay_status', 3)->get();
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
        $request->merge([
            'buy' => str_replace('.', '', $request->buy)
        ]);

        $profit = $request->pay_total - $request->buy;
        $request->merge(['profit' => $profit]);

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
