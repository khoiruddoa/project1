<?php

namespace App\Http\Controllers;

use App\Models\Convertion;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function index()
    {
        return view('dashboard.nasabah.index', [
            'users' => User::where('role', 1)->get(),
            'collectors' =>  User::where('role', 2)->get(),
            'admins' =>  User::where('role', 3)->get(),
        ]);
    }
    public function detail($user_id)
    {
        $user = User::find($user_id);
        $transactions = Transaction::where('user_id', $user_id)->orderBy('id', 'desc')->get();
        $convertions = Convertion::where('user_id', $user_id)->orderBy('id', 'desc')->get();
        return view('dashboard.nasabah.detail', [
            'user' => $user,
            'transactions' => $transactions,
            'convertions' => $convertions
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => ['required', 'unique:users'],
            'phone_number' => ['required', 'unique:users'],
            'password' => 'required|min:5|max:255',
            'address' => 'required|max:255',
            'role' => 'required',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        User::create($validatedData);
        Alert::info('Berhasil', 'Input Nasabah Berhasil');
        return redirect('/dashboard/nasabah');
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => ['required', Rule::unique('users')->ignore($id)],
            'phone_number' => ['required', Rule::unique('users')->ignore($id)],
            'password' => 'nullable|min:5|max:255',
            'address' => 'required|max:255',
        ]);

        $user = User::findOrFail($id);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->phone_number = $validatedData['phone_number'];
        $user->address = $validatedData['address'];

        if (!empty($validatedData['password'])) {
            $user->password = Hash::make($validatedData['password']);
        }

        $user->save();

        Alert::info('Berhasil', 'Update Nasabah Berhasil');
        return back();
    }

    public function destroy($id){
        
        $user = User::findOrFail($id);
        $user->delete();
        Alert::info('Berhasil', 'Hapus Data Berhasil');
        return redirect('/dashboard/nasabah');
    }

}
