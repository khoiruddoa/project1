<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CollectorTransaction;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdjustmentController extends Controller
{

    public function index()
    {
        return view('dashboard.adjustment.index', [

            'users' => User::where('role', 1)->get(),
            'transactions' => Transaction::where('information', 1)->where('pay_status', 1)->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->merge([
            'pay_total' => str_replace('.', '', $request->pay_total)
        ]);

        $transaction = Transaction::create($request->all());

        $newTransactionId = $transaction->id;


        $transaksi_kolektor = new CollectorTransaction();

        $transaksi_kolektor->pay_total = $request->pay_total;

        $transaksi_kolektor->administrator = Auth()->user()->name;
        $transaksi_kolektor->information = 1;
        $transaksi_kolektor->pay_status = 1;
        $transaksi_kolektor->relate = $newTransactionId;
        $transaksi_kolektor->save();



        Alert::info('Berhasil', 'Adjustment dibuat');
        return redirect('/dashboard/adjustment');
    }

    public function update(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        $request->merge([
            'pay_total' => str_replace('.', '', $request->pay_total)
        ]);



        $transaction->update($request->all());

        $transaction_collector = CollectorTransaction::where('relate', $id)->first();


        $transaction_collector->pay_total = $request->pay_total;
        $transaction_collector->save();

        Alert::info('Berhasil', 'Adjustment diupdate');
        return redirect('/dashboard/adjustment');
    }

    public function delete($id)
    {



        $transaction = Transaction::find($id);
        $transaction_collector = CollectorTransaction::where('relate', $id)->first();



        $transaction->delete();
        $transaction_collector->delete();
        Alert::info('Berhasil', 'Hapus Data Berhasil');
        return back();
    }
}
