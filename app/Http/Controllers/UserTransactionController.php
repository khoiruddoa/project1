<?php

namespace App\Http\Controllers;

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
}
