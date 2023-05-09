<?php

namespace App\Http\Controllers;

use App\Models\Adjustment;
use App\Models\Category;
use App\Models\CollectorTransaction;
use App\Models\MinusAdjustment;
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
            'adjustments' => Adjustment::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->merge([
            'pay_total' => str_replace('.', '', $request->pay_total)
        ]);

        


        if ($request->type == 2) {
            $request->merge([
                'pay_total' => -1 * str_replace('.', '', $request->pay_total)
            ]);
            
        }
        
            Adjustment::create($request->all());
            Alert::info('Berhasil', 'Adjustment dibuat');
            return redirect('/dashboard/adjustment');
        
    }





    // public function update(Request $request, $id)
    // {
    //     $transaction = Transaction::find($id);
    //     $request->merge([
    //         'pay_total' => str_replace('.', '', $request->pay_total)
    //     ]);



    //     $transaction->update($request->all());

    //     $transaction_collector = CollectorTransaction::where('relate', $id)->first();


    //     $transaction_collector->pay_total = $request->pay_total;
    //     $transaction_collector->save();

    //     Alert::info('Berhasil', 'Adjustment diupdate');
    //     return redirect('/dashboard/adjustment');
    // }



    public function delete($id)
    {

        $adjustment = Adjustment::find($id);
        $adjustment->delete();
        Alert::info('Berhasil', 'Hapus Data Berhasil');
        return back();
    }
}
