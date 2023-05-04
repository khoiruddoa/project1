<?php

namespace App\Http\Controllers;

use App\Models\CancelTransaction;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Category;
use App\Models\CategoryPrice;
use App\Models\DetailTransaction;
use App\Models\Pick;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Support\ValidatedData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        return view('dashboard.transaksi.index', [
            'categories' => Category::all(),
            'users' => User::where('role', 1)->orderBy('name', 'asc')->get(),
            'transactions' => Transaction::where('pay_status', 0)->where('information', null)->orderBy('id', 'desc')->get(),
            'finish' => Transaction::where('pay_status', 1)->where('information', null)->orderBy('id', 'desc')->get(),
            'approved' => Transaction::where('pay_status', 2)->where('information', null)->orderBy('id', 'desc')->get(),

        ]);
    }

    public function store(Request $request)
    {
        $transaction = Transaction::where('user_id', $request->input('user_id'))->where('information', null)
            ->whereDate('created_at', '=', now()->toDateString())->get();



        if (count($transaction) > 0) {
            Alert::warning('Gagal', 'Nasabah sudah bertransaksi di tanggal yang sama');
            return redirect('/dashboard/transaksi');
        }

        $data = $request->all();
        $data['created_at'] = $request->input('created_at');


        Transaction::create($data);
        Alert::info('Berhasil', 'Transaksi Nasabah dibuat');
        return redirect('/dashboard/transaksi');
    }

    public function detail($id)
    {
        $users = User::where('manage', 1)->get();
        $transaction = Transaction::find($id);
        $categories = Category::orderBy('id', 'asc')->get();
        $picks = Pick::where('transaction_id', $id)->get();
        $detail_transactions = DetailTransaction::where('transaction_id', $id)->get();
        $cancel_transactions = CancelTransaction::where('transaction_id', $id)->get();

        return view('dashboard.transaksi.detail', [
            'transaction' => $transaction,
            'categories' => $categories,
            'detail_transactions' => $detail_transactions,
            'users' => $users,
            'picks' => $picks,
            'cancel_transactions' => $cancel_transactions

        ]);
    }

    public function storedetail(Request $request)
    {

        $validatedData = $request->validate([
            'transaction_id' => 'required',
            'category_id' => 'required',
            'qty' => 'required'
        ]);

        $category_id = $validatedData['category_id'];
        $date = $request->input('date');
        $parsed_date = Carbon::parse($date);
        $year = $parsed_date->format('Y');
        $month = $parsed_date->format('m');


        $v = $validatedData['transaction_id'];
        $transaction = Transaction::find($v);
        $category = Category::find($validatedData['category_id']);
        $category_prices = CategoryPrice::where('category_id', $category_id)
            ->whereYear('created_at', $year)
            ->whereMonth('created_at', $month)
            ->latest()->first();


        if (!$category_prices) {
            Alert::warning('Gagal', 'Harga Belum diupdate untuk bulan tersebut');
            return back();
        }

        $buy = $category_prices->buy;
        $sell = $category_prices->sell;

        $validatedData['price'] = $buy;
        $validatedData['sell'] = $sell;

        $validatedData['created_at'] = $request->input('date');

        $debet = $buy * $validatedData['qty'];
        $kredit = $sell * $validatedData['qty'];
        $stock = $validatedData['qty'];
        $detail_transactions = DetailTransaction::where('transaction_id', $v)->where('category_id', $category_id)->first();



        if ($transaction->pay_status > 0) {
            Alert::warning('Gagal', 'Tidak bisa transaksi karena transaksi sudah selesai');
            return back();
        }
        if ($buy == 0) {
            Alert::warning('Gagal', 'Harga masih Kosong');
            return back();
        }

        if ($detail_transactions) {
            Alert::warning('Gagal', 'Item sudah diinput sebelumnya');
            return back();
        }

        $payloadtransaction = [
            'pay_total' => $transaction['pay_total'] + $debet,
            'sell_total' => $transaction['sell_total'] + $kredit
        ];
        $transaction->fill($payloadtransaction);
        $transaction->save();

        $payloadcategory = ['stock' => $category['stock'] + $stock];
        $category->fill($payloadcategory);
        $category->save();
        DetailTransaction::create($validatedData);
        Alert::info('Berhasil', 'Transaksi Berhasil');
        return back();
    }

    public function storepick(Request $request)
    {

        $cekkurir = Pick::where('transaction_id', $request->transaction_id)->where('user_id', $request->user_id)->first();

        if ($cekkurir) {
            Alert::warning('Gagal', 'Nama sudah terdaftar');
            return back();
        }

        Pick::create($request->all());
        Alert::info('Berhasil', 'Berhasil');
        return back();
    }





    public function finish(Request $request, $id)
    {

        $detail_transactions = DetailTransaction::where('transaction_id', $id)->get();
        if (count($detail_transactions) == 0) {
            Alert::warning('Gagal', 'Belum ada transaksi yang diisi');
            return back();
        }

        $transaction = Transaction::find($id);




        $jumlahanggota = Pick::where('transaction_id', $id)->get();

        $jumlahanggotanya = count($jumlahanggota);

        if ($jumlahanggotanya > 0) {
            $paytotal = $transaction->pay_total;

            $hasil = $paytotal -  ($paytotal * 0.1);



            $hasil10persen = $paytotal - $hasil;

            $hasilangkut = $hasil10persen / $jumlahanggotanya;

            foreach ($jumlahanggota as $jumlah) {

                $transac = new Transaction([
                    'user_id' => $jumlah->user_id,
                    'administrator' => auth()->user()->name,
                    'pay_total' => $hasilangkut,
                    'pay_status' => 2,
                    'information' => 2
                ]);
                $transac->save();

                $pick = Pick::findOrFail($jumlah['id']);

                $pick->update([
                    'pay' => $hasilangkut,
                    'id_transaction' => $transac->id
                ]);
            }


            $transaction->fill(
                [
                    'pay_total' => $hasil,
                    'pay_status' => $request->pay_status
                ]
            );
            $transaction->save();
        } else {
            $transaction->fill($request->all());
            $transaction->save();
        }

        Alert::info('Berhasil', 'Transaksi Selesai');
        return redirect('/dashboard/transaksi');
    }

    public function destroy($id)
    {


        $detail = DetailTransaction::where('transaction_id', $id)->get();
        $transaction = Transaction::find($id);

        if (count($detail) > 0) {

            Alert::warning('Gagal', 'Hapus Data Tidak dapat dilakukan karena masih ada detail transaksi');
            return back();
        } else {

            $pick = Pick::where('transaction_id', $id);
            $pick->delete();

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
        $kredit = $detail->sell * $detail->qty;
        $category = Category::find($detail->category_id);
        $stock = $detail->qty;
        if ($transaction->pay_status > 0) {
            Alert::warning('Gagal', 'Tidak bisa hapus karena transaksi sudah selesai');
            return back();
        }


        $payloadtransaction = [
            'pay_total' => $transaction['pay_total'] - $debet,
            'sell_total' => $transaction['sell_total'] - $kredit
        ];
        $transaction->fill($payloadtransaction);
        $transaction->save();
        $payloadcategory = ['stock' => $category['stock'] - $stock];
        $category->fill($payloadcategory);
        $category->save();


        $detail->delete();
        Alert::info('Berhasil', 'Hapus Data Berhasil');
        return back();
    }

    public function canceldetail(Request $request, $id)
    {

        $detail = DetailTransaction::findOrFail($id);
        $transaction = Transaction::find($detail->transaction_id);


        $debet = $detail->price * $detail->qty;
        $kredit = $detail->sell * $detail->qty;
        $category = Category::find($detail->category_id);
        $stock = $detail->qty;


        $payloadtransaction = [
            'pay_total' => $transaction['pay_total'] - $debet,
            'sell_total' => $transaction['sell_total'] - $kredit
        ];
        $transaction->fill($payloadtransaction);
        $transaction->save();

        $payloadcategory = ['stock' => $category['stock'] - $stock];
        $category->fill($payloadcategory);
        $category->save();

        $validatedData = $request->validate([
            'transaction_id' => 'required',
            'category_id' => 'required',
            'qty' => 'required',
            'created_at' => 'required',
            'price' => 'required',
            'sell' => 'required',
            'information' => 'required'
        ]);

        CancelTransaction::create($validatedData);
        $detail->delete();





        // batas
        $check_transaction = Pick::where('transaction_id', $transaction->id)->first();

        if ($check_transaction) {

            $transaksi = Transaction::find($detail->transaction_id);




            $jumlahanggota = Pick::where('transaction_id', $transaksi->id)->get();

            $jumlahanggotanya = count($jumlahanggota);
//jumlahkan saldo seluruhnya


            
               

                $detailtransaksinya = DetailTransaction::where('transaction_id', $transaksi->id)->get();
                $paytotal = 0;

                foreach($detailtransaksinya as $detail){

                    $paytotal += $detail->price * $detail->qty;
                }
                $hasil = $paytotal -  ($paytotal * 0.1);



                $hasil10persen = $paytotal - $hasil;

                $hasilangkut = $hasil10persen / $jumlahanggotanya;

                foreach ($jumlahanggota as $jumlah) {



                 
                    $transac = Transaction::find($jumlah['transaction_id']);
                    $transac->update(['pay_total' => $hasilangkut]);


                    $pick = Pick::findOrFail($jumlah['id']);

                    $pick->update([
                        'pay' => $hasilangkut,
                        'id_transaction' => $transac->id
                    ]);
                }


                $transaksi->fill(
                    [
                        'pay_total' => $hasil
                    ]
                );
                $transaksi->save();
            
        }

        Alert::info('Berhasil', 'Pembatalan Berhasil');
        return back();
    }
}
