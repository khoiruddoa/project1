<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryPrice;
use App\Models\CollectorTransaction;
use App\Models\DetailCollectorTransaction;
use App\Models\DetailTransaction;
use App\Models\Payment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CollectorTransactionController extends Controller
{
    public function index()
    {


        $kolektor =  CollectorTransaction::where('pay_status', 3)->get();
        $total_tagihan = $kolektor->sum('pay_total');
        $pembayaran = Payment::all();
        $total_pembayaran = $pembayaran->sum('pay_total');

        $status = $total_tagihan - $total_pembayaran; 
        return view('dashboard.transaksipengepul.index', [
            'categories' => Category::all(),
            'users' => User::where('role', 2)->get(),
            'collectortransactions' => CollectorTransaction::orderBy('id', 'desc')->get(),
            'status' => $status

        ]);
    }

    public function store(Request $request)
    {
        $collectortransaction = CollectorTransaction::where('user_id', $request->input('user_id'))->whereDate('created_at', '=', now()->toDateString())->get();


        // if (count($collectortransaction) > 0) {
        //     Alert::warning('Gagal', 'Pengepul sudah bertransaksi di tanggal yang sama');
        //     return redirect('/dashboard/pengepul');
        // } 
        $data = $request->all();
        $data['created_at'] = $request->input('created_at');


        CollectorTransaction::create($data);
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

    //     public function storedetail(Request $request)
    //     {

    // //validasi
    //         $validatedData = $request->validate([
    //             'collector_transaction_id' => 'required',
    //             'category_id' => 'required',

    //             'qty' => 'required'
    //         ]);

    //         $category_id = $validatedData['category_id'];
    //         $date = $request->input('date');
    //         $parsed_date = Carbon::parse($date);
    //         $year = $parsed_date->format('Y');
    //         $month = $parsed_date->format('m');

    //         $category = Category::find($category_id);
    //         $category_prices = CategoryPrice::where('category_id', $category_id)
    //             ->whereYear('created_at', $year)
    //             ->whereMonth('created_at', $month)
    //             ->latest()->first();

    //         if (!$category_prices) {
    //             Alert::warning('Gagal', 'Harga Belum diupdate untuk bulan tersebut');
    //             return back();
    //         }

    //         $price = $category_prices->sell;


    //         $validatedData['price'] = $price;
    //         $validatedData['created_at'] = $request->input('date');

    //         $stocknya = $category->stock;

    //         // if ($request->qty > $stocknya) {
    //         //     Alert::Warning('Gagal', 'Stock Tidak Mencukupi');
    //         //     return redirect()->back();
    //         // }
    //         $stock = $validatedData['qty'];

    //         $v = $validatedData['collector_transaction_id'];
    //         $transaction = CollectorTransaction::find($v);
    //         $category = Category::find($category_id);

    //         $debet = $validatedData['price'] * $validatedData['qty'];

    //         $payloadcategory = ['stock' => $category['stock'] - $stock];
    //         $category->fill($payloadcategory);
    //         $category->save();

    //         $payloadtransaction = ['pay_total' => $transaction['pay_total'] + $debet];
    //         $transaction->fill($payloadtransaction);
    //         $transaction->save();
    //         DetailCollectorTransaction::create($validatedData);
    //         Alert::info('Berhasil', 'Transaksi Berhasil');
    //         return back();
    //     }
    public function storedetail(Request $request)
    {
        if (empty($request->input('category_id'))) {
            Alert::warning('Gagal', 'Belum ada transaksi yang diisi');
            return back();
            
        }
        $detail_ids = [];
        // Loop through the selected categories
        foreach ($request->input('category_id') as $index => $category_id) {
            // Validate each input
            $validatedData = Validator::make([
                'collector_transaction_id' => $request->input('collector_transaction_id'),
                'category_id' => $category_id,
                'date' => $request->input('date')[$index],
            ], [
                'collector_transaction_id' => 'required',
                'category_id' => 'required',
                'date' => 'required|date',
            ])->validate();

            $category = Category::find($category_id);
            $category_prices = CategoryPrice::where('category_id', $category_id)
                ->whereYear('created_at', Carbon::parse($validatedData['date'])->format('Y'))
                ->whereMonth('created_at', Carbon::parse($validatedData['date'])->format('m'))
                ->latest()->first();

            if (!$category_prices) {
                Alert::warning('Gagal', 'Harga Belum diupdate untuk bulan tersebut');
                return back();
            }


           

            $price = $category_prices->sell;

            $stok = $category->stock;
            $detail = DetailCollectorTransaction::create([
                'collector_transaction_id' => $validatedData['collector_transaction_id'],
                'category_id' => $category_id,
                'price' => $price,
                'qty' => $stok,
                'created_at' => $validatedData['date'],
            ]);
            $payloadcategory = ['stock' => $category->stock - $stok];
            $category->fill($payloadcategory);
            $category->save();
            $detail_ids[] = $detail->id; 
        }


        $detailtransaksi = DetailCollectorTransaction::where('collector_transaction_id', $request->collector_transaction_id)->get();
        $total = 0;

        foreach ($detail_ids as $detail_id) {
            $detail = DetailCollectorTransaction::find($detail_id);
            $total += $detail->price * $detail->qty;
        }

        $debet = $total;
        $transaction = CollectorTransaction::find($validatedData['collector_transaction_id']);
        $payloadtransaction = ['pay_total' => $transaction->pay_total + $debet];
        $transaction->fill($payloadtransaction);
        $transaction->save();

        Alert::info('Berhasil', 'Transaksi Berhasil');
        return back();
    }

    public function finish(Request $request, $id)
    {

        $detail_collector_transactions = DetailCollectorTransaction::where('collector_transaction_id', $id)->get();

        $transaction = CollectorTransaction::find($id);
        if (count($detail_collector_transactions) == 0) {
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
        if ($transaction->pay_status > 0) {
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


    public function payment(Request $request)
    {
        $request->merge([
            'pay_total' => str_replace('.', '', $request->pay_total)
        ]);

        $id = $request->collector_transaction_id;



        $transaction = CollectorTransaction::find($id);


        $payload = ['pay_status' => '3'];

        $transaction->fill($payload);
        $transaction->save();


        $data = $request->all();
        $data['created_at'] = $request->input('created_at');


        Payment::create($data);
        Alert::info('Berhasil', 'Pembayaran sukses');
        return redirect('/dashboard/pengepul');
    }


    public function pelunasan(Request $request)
    {
      




        $id = $request->collector_transaction_id;



        $transactions = CollectorTransaction::where('pay_status', 3)->get();

        foreach($transactions as $transaction){


            if($transaction->pay_total > $transaction->payments->sum('pay_total')){

                
        $data = (['collector_transaction_id' => $transaction->id,
                  'pay_total' =>  $transaction->pay_total - $transaction->payments->sum('pay_total'),
                    'information' => $request->information,
                    'bank' => $request->bank,
                    'created_at' => $request->created_at
                
                ]);
                Payment::create($data);

            }

            if($transaction->pay_total < $transaction->payments->sum('pay_total')){

                
                $data = (['collector_transaction_id' => $transaction->id,
                          'pay_total' =>  $transaction->pay_total - $transaction->payments->sum('pay_total'),
                            'information' => $request->information,
                            'bank' => $request->bank,
                            'created_at' => $request->created_at
                        
                        ]);
                        Payment::create($data);
        
                    }
        }


       
        Alert::info('Berhasil', 'Pembayaran sukses');
        return redirect('/dashboard/pengepul');
    }




    public function editpengepul(Request $request, $id)
    {
        $transaction = CollectorTransaction::find($id);

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
