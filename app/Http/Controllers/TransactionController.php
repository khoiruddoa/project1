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
            'users' => User::where('role',1)->get(),
            'transactions' => Transaction::where('pay_status', 0)->orderBy('id', 'desc')->get(),
            'finish' => Transaction::where('pay_status', 1)->orderBy('id', 'desc')->get(),
            'approved' => Transaction::where('pay_status', 2)->get(),

        ]);
    }

    public function store(Request $request)
    {
        $transaction = Transaction::where('user_id', $request->input('user_id'))->whereDate('created_at', '=', now()->toDateString())->get();



        if (count($transaction) > 0) {
            Alert::warning('Gagal', 'Nasabah sudah bertransaksi di tanggal yang sama');
            return redirect('/dashboard/transaksi');
        }

            Transaction::create($request->all());
            Alert::info('Berhasil', 'Transaksi Nasabah dibuat');
            return redirect('/dashboard/transaksi');
        
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

if($transaction->pay_status > 0)
{
    Alert::warning('Gagal', 'Tidak bisa transaksi karena transaksi sudah selesai');
    return back();
}
        $payloadtransaction = ['pay_total' => $transaction['pay_total'] + $debet];
        $transaction->fill($payloadtransaction);
        $transaction->save();
        DetailTransaction::create($validatedData);
        Alert::info('Berhasil', 'Transaksi Berhasil');
        return back();
    }

    public function finish(Request $request, $id)
    {
        

        
        $transaction = Transaction::find($id);
      
        $transaction->fill($request->all());
        $transaction->save();
        
        Alert::info('Berhasil', 'Transaksi Selesai');
        return back();
    }

    public function destroy($id)
    {

        
        $detail = DetailTransaction::where('transaction_id', $id)->get();
        $transaction = Transaction::find($id);

        if (count($detail) > 0) {

            Alert::warning('Gagal', 'Hapus Data Tidak dapat dilakukan karena masih ada detail transaksi');
            return back();
        } else {

            $transaction->delete();
            Alert::info('Berhasil', 'Hapus Data Berhasil');
            return redirect('/dashboard/transaksi');
        }
    }

    public function destroydetail($id)
    {

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
