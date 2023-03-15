<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaction;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class UserTransactionController extends Controller
{
    public function index()
    {
        return view('transaction', [
            'user' => User::find(auth()->user()->id),

        ]);
    }

    public function detail($id)
    {
       
        return view('details', [
            'user' => User::find(auth()->user()->id),
            'details' => DetailTransaction::where('transaction_id', $id)->get(),
            'transaction' => Transaction::find($id)

        ]);
    }
}
