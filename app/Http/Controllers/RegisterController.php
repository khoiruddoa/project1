<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('dashboard.nasabah.index',[
            'users' => User::all()
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => ['required', 'unique:users'],
            'phone_number' => ['required', 'unique:users'],
            'password' => 'required|min:5|max:255',
            'address' => 'required|max:255',
        ]);
       
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role'] = 1;
        User::create($validatedData);
        return redirect('/dashboard/nasabah');
  
    }
}
