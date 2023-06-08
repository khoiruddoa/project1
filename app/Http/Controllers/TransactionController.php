<?php

namespace App\Http\Controllers;

use App\Models\CancelTransaction;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Category;
use App\Models\CategoryPrice;
use App\Models\DetailPick;
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
        $detail_pick = DetailPick::where('transaction_id', $id)->get();

        return view('dashboard.transaksi.detail', [
            'transaction' => $transaction,
            'categories' => $categories,
            'detail_transactions' => $detail_transactions,
            'users' => $users,
            'picks' => $picks,
            'cancel_transactions' => $cancel_transactions,
            'detail_pick' => $detail_pick

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

    public function detailpick(Request $request)
    {
        $validatedData = $request->validate([
            'category_id.*' => 'required'
        ]);

        if (empty($validatedData['category_id'])) {
            Alert::warning('Gagal', 'Tidak ada data yang dipilih');
            return back();
        }

        // Menambahkan item baru ke dalam $detail_pick untuk setiap category_id yang baru
        $created_at = $request->created_at;
        $transaction_id = $request->transaction_id;

        $detail_pick = new DetailPick;

        foreach ($validatedData['category_id'] as $id) {

            $detail_pick->create([
                'category_id' => $id,
                'created_at' => $created_at,
                'transaction_id' => $transaction_id
            ]);
        }


        Alert::info('Berhasil', 'Sukses menambahkan Item');
        return back();
    }


    public function deletepick($id)
    {

        $pick = Pick::find($id);
        $transaksi = Transaction::find($pick->id_transaction);
        if ($transaksi) {
            $transaksi->delete();
        }
        $pick->delete();
        Alert::info('Berhasil', 'Berhasil dihapus');
        return back();
    }

    public function deletedetailpick($id)
    {

        $pick = DetailPick::find($id);

        $pick->delete();
        Alert::info('Berhasil', 'Berhasil dihapus');
        return back();
    }




    public function finish(Request $request, $id)
    {

        $detail_transactions = DetailTransaction::where('transaction_id', $id)->get();
        if (count($detail_transactions) == 0) {
            Alert::warning('Gagal', 'Belum ada transaksi yang diisi');
            return back();
        }

        $detailsemua = $detail_transactions->sum(function ($detail) {
            return $detail->price * $detail->qty;
        });
        $transaction = Transaction::find($id);


        $jumlahanggota = Pick::where('transaction_id', $id)->get();

        $jumlahanggotanya = count($jumlahanggota);

        if ($jumlahanggotanya > 0) {

            $detailpick = DetailPick::where('transaction_id', $id)->get();
            if (count($detailpick) == 0) {
                Alert::warning('Gagal', 'Belum pilih item yang dibawa');
                return back();
            }

            // Ambil data detail transaction yang memiliki transaction_id = $id dan category_id ada di $detailpick
            $detail_transactions = DetailTransaction::where('transaction_id', $id)
                ->whereHas('category', function ($query) use ($detailpick) {
                    $query->whereIn('id', $detailpick->pluck('category_id'));
                })
                ->get();

            $detailbiasa = DetailTransaction::where('transaction_id', $id)->get();

            // Looping data detail transaction yang didapatkan
            $total_detail = 0;
            foreach ($detail_transactions as $detail) {
                $total_detail += $detail->price * $detail->qty;
            }

            $total_saldoawal = 0;
            foreach ($detailbiasa as $detail) {
                $total_saldoawal += $detail->price * $detail->qty;
            }
            $hasil10persen = $total_detail * 0.1;


            $hasil = $total_saldoawal - $hasil10persen;

            $hasilangkut = $hasil10persen / $jumlahanggotanya;

            foreach ($jumlahanggota as $jumlah) {
                $trans = Transaction::find($jumlah['id_transaction']);

                if ($trans) {
                    $trans->delete();
                }



                $transac = new Transaction([
                    'user_id' => $jumlah->user_id,
                    'administrator' => auth()->user()->name,
                    'pay_total' => $hasilangkut,
                    'pay_status' => 2,
                    'information' => 2,
                    'created_at' => $jumlah->created_at
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

            $detailpick = DetailPick::where('transaction_id', $id)->get();
            if (count($detailpick) > 0) {
                Alert::warning('Gagal', 'Belum pilih pengangkut');
                return back();
            }
            $transaction->fill(
                [
                    'pay_total' => $detailsemua,
                    'pay_status' => $request->pay_status
                ]
            );
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
        //cek detail transaksinya

        $detail = DetailTransaction::findOrFail($id);

        //cek transaksinya
        $transaction = Transaction::find($detail->transaction_id);


        //cek apakah transaksi ini ada kurirnya atau tidak 
        $check_transaction = Pick::where('transaction_id', $transaction->id)->get();
        if (count($check_transaction) == null) {
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
        } else {

            //cek kategori dulu
            $category = Category::find($detail->category_id);
            $stock = $detail->qty;

            $payloadcategory = ['stock' => $category['stock'] - $stock];
            $category->fill($payloadcategory);
            $category->save();

            $data = ([
                'transaction_id' => $detail->transaction_id,
                'category_id' => $detail->category_id,
                'qty' => $detail->qty,
                'created_at' => $detail->created_at,
                'price' => $detail->price,
                'sell' => $detail->sell,
            ]);
            CancelTransaction::create($data);
            $detail->delete();



            //menghapus detailpick yang tidak ada di transaksi
            $datatransaksi = DetailTransaction::where('transaction_id', $transaction->id)->get();
            DetailPick::where('transaction_id', $transaction->id)
                ->whereDoesntHave('category', function ($query) use ($datatransaksi) {
                    $query->whereIn('id', $datatransaksi->pluck('category_id'));
                })
                ->delete();


            $jumlahanggota = $check_transaction;


            $jumlahanggotanya = count($jumlahanggota);
            $detailpick = DetailPick::where('transaction_id', $transaction->id)->get();

            $detail_transactions = DetailTransaction::where('transaction_id', $detail->transaction_id)
                ->whereHas('category', function ($query) use ($detailpick) {
                    $query->whereIn('id', $detailpick->pluck('category_id'));
                })
                ->get();

            $detailbiasa = DetailTransaction::where('transaction_id', $transaction->id)->get();

            // Looping data detail transaction yang didapatkan
            $total_detail = 0;
            foreach ($detail_transactions as $detail) {
                $total_detail += $detail->price * $detail->qty;
            }

            $total_saldoawal = 0;
            foreach ($detailbiasa as $detail) {
                $total_saldoawal += $detail->price * $detail->qty;
            }
            $hasil10persen = $total_detail * 0.1;


            $hasil = $total_saldoawal - $hasil10persen;

            $hasilangkut = $hasil10persen / $jumlahanggotanya;
            foreach ($jumlahanggota as $jumlah) {


                $transac = Transaction::find($jumlah['id_transaction']);
                $transac->update(['pay_total' => $hasilangkut]);


                $pick = Pick::findOrFail($jumlah['id']);

                $pick->update([
                    'pay' => $hasilangkut,
                    'id_transaction' => $transac->id
                ]);
            }


            $transaction->fill(
                [
                    'pay_total' => $hasil,

                ]
            );
            $transaction->save();
        }
        Alert::info('Berhasil', 'Pembatalan Berhasil');
        return back();
    }


    public function edit(Request $request, $id)
    {
        $transaction = Transaction::find($id);

        $transaction->fill(
            [
                'pay_status' => $request->pay_status
            ]
        );
        $transaction->save();
        Alert::info('Berhasil', 'Edit Berhasil');
        return back();
    }
}
