<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CollectorTransaction;
use App\Models\DetailCollectorTransaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class CollectorTransactionController extends Controller
{
    public function index()
    {
        return view('dashboard.transaksipengepul.index', [
            'categories' => Category::all(),
            'users' => User::where('role', 2)->get(),
            'collectortransactions' => CollectorTransaction::orderBy('id', 'desc')->get(),

        ]);
    }

    public function store(Request $request)
    {
        $collectortransaction = CollectorTransaction::where('user_id', $request->input('user_id'))->whereDate('created_at', '=', now()->toDateString())->get();



        if (count($collectortransaction) > 0) {
            Alert::warning('Gagal', 'Pengepul sudah bertransaksi di tanggal yang sama');
            return redirect('/dashboard/transaksipengepul');
        } else {

            CollectorTransaction::create($request->all());
            Alert::info('Berhasil', 'Transaksi dibuat');
            return redirect('/dashboard/transaksipengepul');
        }
    }

    public function detail($id)
    {
        $transaction = CollectorTransaction::find($id);
       

        $categories = Category::all();
        $detail_transactions = DetailCollectorTransaction::where('collector_transaction_id', $id)->get();

        return view('dashboard.transaksipengepul.detail', [
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
            'collector_transaction_id' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'qty' => 'required'
        ]);

        $category = Category::find($request->category_id);
        

        $stock = $category->detailTransactions->sum('qty') - $category->detailCollectorTransactions->sum('qty');
    
        if ($request->qty >  $stock) {
            Alert::Warning('Gagal', 'Stock Tidak Mencukupi');
            return redirect()->back();
        }
    
        $v = $validatedData['collector_transaction_id'];
        $transaction = CollectorTransaction::find($v);


        $debet = $validatedData['price'] * $validatedData['qty'];

        $payloadtransaction = ['pay_total' => $transaction['pay_total'] + $debet];
        $transaction->fill($payloadtransaction);
        $transaction->save();
        DetailCollectorTransaction::create($validatedData);
        Alert::info('Berhasil', 'Transaksi Berhasil');
        return back();
    }

    public function finish(Request $request, $id)
    {
        

        
        $transaction = CollectorTransaction::find($id);
      
        $transaction->fill($request->all());
        $transaction->save();
        
        Alert::info('Berhasil', 'Transaksi Selesai');
        return redirect('/dashboard/transaksipengepul');
    }


    public function destroy($id)
    {

        
        $detail = DetailCollectorTransaction::where('transaction_id', $id)->get();
        $transaction = CollectorTransaction::find($id);

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

        $detail = DetailCollectorTransaction::findOrFail($id);
        $transaction = CollectorTransaction::find($detail->collector_transaction_id);
        $debet = $detail->price * $detail->qty;


        $payloadtransaction = ['pay_total' => $transaction['pay_total'] - $debet];
        $transaction->fill($payloadtransaction);
        $transaction->save();
        $detail->delete();
        Alert::info('Berhasil', 'Hapus Data Berhasil');
        return back();
    }
}
