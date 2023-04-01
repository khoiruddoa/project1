<?php

namespace App\Http\Controllers;

use App\Models\CollectorTransaction;
use App\Models\Convertion;
use App\Models\Expend;
use App\Models\Transaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OwnerReviewController extends Controller
{
    public function index()
    {
        return view('transactionreview', [
            'transactions' => Transaction::where('pay_status', 1)->where('information', null)->get(),

        ]);
    }
    public function convert()
    {
        return view('convertionreview', [
            'convertions' => Convertion::where('pay_status', 1)->get(),

        ]);
    }

    // public function collect()
    // {
    //     return view('collectorreview', [
    //         'collectors' => CollectorTransaction::where('pay_status', 1)->get(),

    //     ]);
    // }

    public function adjust()
    {
        return view('adjustmentreview', [
            'adjustments' => Transaction::where('pay_status', 1)->where('information', 1)->get(),

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
    
    // public function collector(Request $request)
    // {
    //     $validatedData = $request->validate([

    //         'id.*' => 'required|max:150'

    //     ]);

    //     if ($validatedData == null) {
    //         Alert::warning('Gagal', 'Tidak ada data yang dipilih');
    //         return back();
    //     }


    //     foreach ($validatedData['id'] as $key => $value) {


    //         $data = 2;

    //         $transaction = CollectorTransaction::findOrFail($validatedData['id'][$key]);

    //         $transaction->update(['pay_status' => $data]);

    //         Alert::info('Berhasil', 'Sukses disetujui');
    //     }

    //     return back();
    // }

    public function adjustment(Request $request)
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


    public function admindashboard(){
        $currentMonth = Carbon::now()->month;

        $transaksiNasabah = Transaction::where('pay_status', 2)->get();
        $konversiNasabah = Convertion::where('pay_status', 3)->get();
        $konversi = Convertion::where('pay_status', 1)->get();
        $uangkonversi = Convertion::where('pay_status', 2)->get();
        $transaksiPengepul = CollectorTransaction::where('pay_status', 3)->get();
        $pengepul = CollectorTransaction::where('pay_status', 2)->get();
        $jumlahTransaksi = Transaction::whereMonth('created_at', $currentMonth)->where('information', null)->get();
        $jumlahTransaksi = count($jumlahTransaksi);

        $pengeluaran = Expend::all();
        $user = User::where('role', 1)->get();

        $user = count($user);
        $konver = count($konversi);
        $uangPengepul = $pengepul->sum('pay_total');
        $uangkonversi = $uangkonversi->sum('pay_total');
        $konversi = $konversi->sum('pay_total');
       


        $saldoNasabah = $transaksiNasabah->sum('pay_total') -  $konversiNasabah->sum('pay_total');

        $saldoAdmin = $transaksiPengepul->sum('pay_total') - $pengeluaran->sum('pay_total') - $transaksiNasabah->sum('pay_total');

    
       
        return view('dashboardreview',[
            'saldoNasabah' => $saldoNasabah,
            'saldoAdmin' => $saldoAdmin,
            'uangPengepul' => $uangPengepul,
            'user' => $user,
            'jumlahTransaksi' => $jumlahTransaksi,
            'uangkonversi' => $uangkonversi,
            'konversi' => $konversi,
            'konver' => $konver
        ]);
    }
}
