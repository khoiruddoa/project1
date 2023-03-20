<?php

namespace App\Http\Controllers;

use App\Models\Convertion;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OwnerReviewController extends Controller
{
    public function index()
    {
        return view('transactionreview', [
            'transactions' => Transaction::where('pay_status', 1)->get(),

        ]);
    }
    public function convert()
    {
        return view('convertionreview', [
            'convertions' => Convertion::where('pay_status', 1)->get(),

        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'id.*' => 'required|max:150'

        ]);

        if ($validatedData == null) {
            Alert::warning('Gagal', 'Tidak ada data yang dipilih');
            return back();
        }


        foreach ($validatedData['id'] as $key => $value) {


            $data = 2;

            $transaction = Transaction::findOrFail($validatedData['id'][$key]);

            $transaction->update(['pay_status' => $data]);

            Alert::info('Berhasil', 'Sukses disetujui');
        }

        return back();
    }

    public function convertion(Request $request)
    {
        $validatedData = $request->validate([

            'id.*' => 'required|max:150'

        ]);

        if ($validatedData == null) {
            Alert::warning('Gagal', 'Tidak ada data yang dipilih');
            return back();
        }

        if ($request->has('action')) {
            if ($request->action == 'approve') {

                foreach ($validatedData['id'] as $key => $value) {


                    $data = 2;

                    $transaction = Convertion::findOrFail($validatedData['id'][$key]);

                    $transaction->update(['pay_status' => $data]);

                    Alert::info('Berhasil', 'Sukses disetujui');
                }
            }
            elseif ($request->action == 'reject') {

                foreach ($validatedData['id'] as $key => $value) {


                    $data = 4;

                    $transaction = Convertion::findOrFail($validatedData['id'][$key]);

                    $transaction->update(['pay_status' => $data]);

                    Alert::info('Berhasil', 'Sukses ditolak');
                }

            }
        }

        return back();
    }
}
