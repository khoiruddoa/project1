<?php

namespace App\Http\Controllers;

use App\Models\Convertion;
use App\Models\DetailTransaction;
use App\Models\Pick;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class UserTransactionController extends Controller
{
    public function index()
    {
        return view('transaction', [
            'user' => User::find(auth()->user()->id),
            'convertion' => Convertion::where('user_id', auth()->user()->id)->where('pay_status', 1)->orwhere('pay_status', 2)->get()

        ]);
    }

    

    public function detail($id)
    {
       
        return view('details', [
            'user' => User::find(auth()->user()->id),
            'details' => DetailTransaction::where('transaction_id', $id)->get(),
            'transaction' => Transaction::find($id),
            'pengangkuts' => Pick::where('transaction_id', $id)->get(),
            'convertion' => Convertion::where('pay_status', 1)->where('user_id', auth()->user()->id)->get()


        ]);
    }
}
