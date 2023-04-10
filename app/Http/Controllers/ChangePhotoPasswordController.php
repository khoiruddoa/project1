<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class ChangePhotoPasswordController extends Controller
{
    public function changePhoto(Request $request)
    {
        // Validasi inputan user
        $validator = Validator::make($request->all(), [
            'photo' => 'required|image|max:2048',
        ]);

        // Cek apakah ada kesalahan validasi pada $validator
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            Alert::warning('Gagal', implode('<br>', $errors));
            return back();
        }


        

        // Simpan foto ke dalam storage dengan hash name
        $file = $request->file('photo'); // mendapatkan file dari request
        $hashedName = $file->hashName(); // mendapatkan nama file yang di-hash
        // menyimpan file dengan nama yang di-hash

        $file->move('public/photos', $hashedName);
        

        $path = 'photos/' . $hashedName;

        $id = Auth()->user()->id;

        // Ambil record foto dari database berdasarkan id
        $photo = User::find($id);

        // Update path foto di dalam database dengan path yang baru
        $photo->photo = $path;
        $photo->save();

        Alert::success('Berhasil', 'Foto berhasil diganti');
        return back();
    }


    public function changePassword(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'current_password' => 'required',
            'password' => 'required|min:5',
        ]);
        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            Alert::warning('Gagal', implode('<br>', $errors));
            return back();
        }

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            Alert::warning('Gagal', 'Password Salah');
            return back();
        }



        $id = Auth()->user()->id;

        // Ambil record foto dari database berdasarkan id
        $user = User::find($id);

        // Update path foto di dalam database dengan path yang baru

        $user->save(['password' => Hash::make($request->password)]);

        Alert::success('Berhasil', 'Password berhasil diganti');
        return back();
    }
}
