<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();
            Alert::success('Login', 'Login Berhasil');

            if (auth()->user()->role == 1) {
                return redirect()->intended('/dashboard');
            } else if (auth()->user()->role == 3) {
                return redirect()->intended('/dashboard/dashboard');
            }
            else if(auth()->user()->role == 2){
                return redirect()->intended('/dashboard/pengepul');
                }
            else{return redirect()->intended('/menu');
            }
        }
        Alert::warning('Login', 'Login Gagal!');
        return back();
    }
    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Alert::success('Logout', 'Logout Berhasil');
        return redirect('/');
    }
}
