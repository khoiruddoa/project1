<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdjustmentController extends Controller
{

    public function index()
    {
        return view('dashboard.adjustment.index', [
            
            'users' => User::where('role',1)->get(),
            'transactions' => Transaction::where('information', '1')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $request->merge([
            'pay_total' => str_replace('.', '', $request->pay_total)
        ]);



            Transaction::create($request->all());
            Alert::info('Berhasil', 'Adjustment dibuat');
            return redirect('/dashboard/adjustment');
        
    }
    
    public function update(Request $request, $id)
    {
        $request->merge([
            'pay_total' => str_replace('.', '', $request->pay_total)
        ]);



            Transaction::update($request->all());
            Alert::info('Berhasil', 'Adjustment diupdate');
            return redirect('/dashboard/adjustment');
        
    }
    
}
