<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Category;
use App\Models\DetailTransaction;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        return view('dashboard.transaksi.index', [
            'categories' => Category::all(),
            'users' => User::all(),
            'transactions' => Transaction::all(),

        ]);
    }

    public function store(Request $request)
    {
        $transaction = Transaction::where('user_id', $request->input('user_id'))->whereDate('created_at', '=', now()->toDateString())->get();



        if (count($transaction) > 0) {
            Alert::warning('Gagal', 'Nasabah sudah bertransaksi di tanggal yang sama');
            return redirect('/dashboard/transaksi');
        } else {

            Transaction::create($request->all());
            Alert::info('Berhasil', 'Transaksi Nasabah dibuat');
            return redirect('/dashboard/transaksi');
        }
    }

    public function detail($id)
    {
        $transaction = Transaction::find($id);
        $categories = Category::all();
        $detail_transactions = DetailTransaction::where('transaction_id', $id)->get();

        return view('dashboard.transaksi.detail', [
            'transaction' => $transaction,
            'categories' => $categories,
            'detail_transactions' => $detail_transactions

        ]);
    }

    public function storedetail(Request $request)
    {
        $request->merge([
            'price' => str_replace('.', '', $request->price)
        ]);

        $validatedData = $request->validate([
            'transaction_id' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'qty' => 'required'
        ]);


        $v = $validatedData['transaction_id'];
        $transaction = Transaction::find($v);
        $debet = $validatedData['price'] * $validatedData['qty'];
        

        $payloadtransaction = ['pay_total' => $transaction['pay_total'] + $debet];
        $transaction->fill($payloadtransaction);
        $transaction->save();
        DetailTransaction::create($validatedData);
        Alert::info('Berhasil', 'Transaksi Berhasil');
        return back();
    }
    public function destroydetail($id){
        
        $detail = DetailTransaction::findOrFail($id);
        $transaction = Transaction::find($detail->transaction_id);
        $debet = $detail->price * $detail->qty;
        

        $payloadtransaction = ['pay_total' => $transaction['pay_total'] - $debet];
        $transaction->fill($payloadtransaction);
        $transaction->save();
        $detail->delete();
        Alert::info('Berhasil', 'Hapus Data Berhasil');
        return back();
    }

}
