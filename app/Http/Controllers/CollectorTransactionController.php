<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryPrice;
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
            return redirect('/dashboard/pengepul');
        } 

            CollectorTransaction::create($request->all());
            Alert::info('Berhasil', 'Transaksi dibuat');
            return redirect('/dashboard/pengepul');
        
    }

    public function detail($id)
    {
        $transaction = CollectorTransaction::find($id);
       

        $categories = Category::orderBy('id', 'asc')->get();
        $detail_transactions = DetailCollectorTransaction::where('collector_transaction_id', $id)->get();

        return view('dashboard.transaksipengepul.detail', [
            'transaction' => $transaction,
            'categories' => $categories,
            'detail_transactions' => $detail_transactions

        ]);
    }

    public function storedetail(Request $request)
    {
       

        $validatedData = $request->validate([
            'collector_transaction_id' => 'required',
            'category_id' => 'required',
           
            'qty' => 'required'
        ]);

        $category_id = $validatedData['category_id'];
        $category = Category::find($validatedData['category_id']);
        $category_prices = CategoryPrice::where('category_id', $category_id)->latest()->first();
    
        $price = $category_prices->sell;


        $validatedData['price'] = $price;

       $stocknya = $category->stock;
    
        if ($request->qty > $stocknya) {
            Alert::Warning('Gagal', 'Stock Tidak Mencukupi');
            return redirect()->back();
        }
        $stock = $validatedData['qty'];
        
        $v = $validatedData['collector_transaction_id'];
        $transaction = CollectorTransaction::find($v);
        $category = Category::find($validatedData['category_id']);

        $debet = $validatedData['price'] * $validatedData['qty'];

        $payloadcategory = ['stock' => $category['stock'] - $stock];
        $category->fill($payloadcategory);
        $category->save();

        $payloadtransaction = ['pay_total' => $transaction['pay_total'] + $debet];
        $transaction->fill($payloadtransaction);
        $transaction->save();
        DetailCollectorTransaction::create($validatedData);
        Alert::info('Berhasil', 'Transaksi Berhasil');
        return back();
    }

    public function finish(Request $request, $id)
    {
        
$detail_collector_transactions = DetailCollectorTransaction::where('collector_transaction_id', $id)->get();
        
        $transaction = CollectorTransaction::find($id);
        if(count($detail_collector_transactions) == 0){
            Alert::warning('Gagal', 'Belum ada transaksi yang diisi');
            return back();
        }
           
      
        $transaction->fill($request->all());
        $transaction->save();
        
        Alert::info('Berhasil', 'Transaksi Selesai');
        return redirect('/dashboard/pengepul');
    }


    public function destroy($id)
    {

        
        $detail = DetailCollectorTransaction::where('collector_transaction_id', $id)->get();
        $transaction = CollectorTransaction::find($id);

        if (count($detail) > 0) {

            Alert::warning('Gagal', 'Hapus Data Tidak dapat dilakukan karena masih ada detail transaksi');
            return back();
        } else {

            $transaction->delete();
            Alert::info('Berhasil', 'Hapus Data Berhasil');
            return redirect('/dashboard/pengepul');
        }
    }

    public function destroydetail($id)
    {

        $detail = DetailCollectorTransaction::findOrFail($id);
        $transaction = CollectorTransaction::find($detail->collector_transaction_id);
        $debet = $detail->price * $detail->qty;
        if($transaction->pay_status > 0)
{
    Alert::warning('Gagal', 'Tidak bisa hapus karena transaksi sudah selesai');
    return back();
}

$category = Category::find($detail->category_id);
        $stock = $detail->qty;

 $payloadcategory = ['stock' => $category['stock'] + $stock];
        $category->fill($payloadcategory);
        $category->save();

        $payloadtransaction = ['pay_total' => $transaction['pay_total'] - $debet];
        $transaction->fill($payloadtransaction);
        $transaction->save();
        $detail->delete();
        Alert::info('Berhasil', 'Hapus Data Berhasil');
        return back();
    }
}
