<?php

namespace App\Http\Controllers;

use App\Models\Convertion;
use App\Models\DetailConvertion;
use App\Models\Goldweight;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminConvertionController extends Controller
{
    public function index()
    {
        $convertions = Convertion::where('pay_status', 1)->get();
        $approves = Convertion::where('pay_status', 2)->get();
        $success = Convertion::where('pay_status', 3)->get();
        $goldweights = Goldweight::all();

        return view('dashboard.konversi.index', [
            'convertions' => $convertions,
            'approves' => $approves,
            'success' => $success,
            'goldweights' => $goldweights
        ]);
    }

    public function store(Request $request, $id)
    {

        $detailkonversi = DetailConvertion::where('convertion_id', $id)->get();
        if(count($detailkonversi) > 0){
        $convertions = Convertion::findOrFail($id);

        $convertions->update($request->all());
        Alert::info('Berhasil', 'Berhasil dibayarkan');
        return redirect()->back();}
        else{ 
            Alert::warning('Gagal', 'belum ada konversi emas yang dipilih');
            return redirect()->back();

        }
    }

    public function tambahemas(Request $request)
    {
        $request->merge([
            'price' => str_replace('.', '', $request->price)
        ]);
        $request->merge([
            'buy' => str_replace('.', '', $request->buy)
        ]);


        $weight = Goldweight::where('gram', $request->gram)->get();
        if (!$weight->isEmpty()) {
            Alert::warning('Gagal', 'berat emas sudah ada');
            return redirect()->back();
        }

        Goldweight::create($request->all());

        Alert::info('Berhasil', 'Berhasil tambah item emas');
        return redirect()->back();
    }

    public function updateemas(Request $request)
    {
        $Ids = $request->input('id');
        $prices = $request->input('price');
        $buys = $request->input('buy');

        // Loop melalui id dan harga baru untuk update data produk
        foreach ($Ids as $index => $id) {
            $price = str_replace('.', '', $prices[$index]);
            $buy = str_replace('.', '', $buys[$index]);

            // Update harga produk
            $gold = Goldweight::find($id);
            $gold->price = $price;
            $gold->buy = $buy;
            $gold->save();
        }

        Alert::info('Berhasil', 'Berhasil update item emas');
        return redirect()->back();
    }

    public function konversiemas(Request $request)
    {

        //harga terendah 
        $minPrice = Goldweight::min('price');
        if ($minPrice < 1) {
            Alert::warning('Gagal', 'Harga Emas belum di update');
            return redirect()->back();
        }


        $cekstatuskonversi = Convertion::where('pay_status', 1)->get();
        if(count($cekstatuskonversi) > 0)
        {
            Alert::warning('Gagal', 'Proses Konversi tidak dapat dilakukan karena masih ada transaksi yang belum disetujui');
            return redirect()->back();
        }

        //cek saldo masing masing nasabah
        $users = User::with(['transactions' => function ($query) {
            $query->where('pay_status', 2);
        }, 'adjustments' => function ($query) {
            $query->where('pay_status', 2);
        }, 'withdraws' => function ($query) {
            $query->where('pay_status', 3);
        }, 'convertions', 'manages'])->get();

        $saldo = collect();

        foreach ($users as $user) {
            $total = $user->transactions->sum('pay_total')
                + $user->manages->sum('pay_total')  + $user->adjustments->sum('pay_total')
                - $user->convertions->sum('pay_total') - $user->withdraws->sum('pay_total');

            if ($total >= $minPrice) {
                $saldo->push([
                    'user_id' => $user->id,
                    'saldo' => $total,
                ]);
            }
        }

        //buat transaksi konversinya
        foreach ($saldo as $s) {
            // Membuat record konversi baru
            $conversion = new Convertion([
                'user_id' => $s['user_id'],
                'pay_status' => 1,
                'pay_total' => $s['saldo'],
                'administrator' => Auth()->user()->name,
                'created_at' => $request->created_at
            ]);

            // Menyimpan record konversi
            $conversion->save();
        }



        Alert::info('Berhasil', 'Silahkan Menunggu');
        return back();
    }

    public function saveemas(Request $request)
    {

        $id = $request->id_emas;
        $idkonversi = $request->id;
        $saldo = $request->saldo;

        $gold = Goldweight::find($id);




        //pengecekan
        if ($gold->price > $saldo) {
            Alert::warning('Gagal', 'Saldo tidak cukup');
            return redirect()->back();
        }

        $detail = new DetailConvertion([
            'convertion_id' => $idkonversi,
            'price' => $gold->price,
            'buy' => $gold->buy,
            'profit' => $gold->price - $gold->buy,
            'gram' => $gold->gram,
            'created_at' => $request->created_at,
            'goldweight_id' => $id
        ]);

        // Menyimpan record konversi
        $detail->save();


        Alert::info('Berhasil', 'Berhasil tambah item emas');
        return redirect()->back();
    }

    public function terimaemas(Request $request)
    {

        $id = $request->id;
        $convertions = Convertion::findOrFail($id);

        $convertions->update(['information' => 1]);
        Alert::info('Berhasil', 'Berhasil diterima');
        return redirect()->back();
        
    }

}
