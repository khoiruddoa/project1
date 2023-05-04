<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Category;
use App\Models\CategoryPrice;
use App\Models\DetailTransaction;
use App\Models\Transaction;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'asc')->get();
        $date = CategoryPrice::orderBy('id', 'desc')->latest()->first();


        return view('dashboard.sampah.index', [
            'categories' => $categories,
            'date' => $date
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|max:255',
            'uom' => ['required'],
        ]);



        Category::create($validatedData);
        Alert::info('Berhasil', 'Input Berhasil');

        return redirect('/dashboard/sampah');
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'category_name' => 'required|max:255',
            'uom' => ['required'],
        ]);

        

        try {
            //cek ada data atau tidak

            $categoryprice = CategoryPrice::where('category_id', $id)->orderBy('id', 'desc')->latest()->first();
            if ($categoryprice) {

                $payload = [
                    'buy' => $request->buy,
                    'sell' => $request->sell
                ];
                $categoryprice->update($payload);
            } else {
                $harga = new CategoryPrice([
                    'category_id' => $id,
                    'buy' => $request->buy,
                    'sell' => $request->sell,
                    'created_at' => $request->created_at

                ]);
                $harga->save();
            }

            $category = Category::findOrFail($id);
            $category->update($validatedData);
            Alert::info('Berhasil', 'Update Berhasil');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::warning('Gagal', 'Update Gagal');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {

        $categoryprice = CategoryPrice::where('category_id', $id)->first();
        if ($categoryprice) {
            Alert::warning('Gagal', 'Sudah ada transaksi di Data ini!!');
            return redirect()->back();
        }


        $transaksi = DetailTransaction::where('category_id', $id)->first();
        if ($transaksi) {
            Alert::warning('Gagal', 'Sudah ada transaksi di Data ini');
            return redirect()->back();
        }

        $category = Category::findOrFail($id);
        $category->delete();
        Alert::info('Berhasil', 'Hapus Data Berhasil');
        return redirect('/dashboard/sampah');
    }

    public function prices(Request $request)
    {
        $validatedData = $request->validate([
            'category_id.*' => 'required',
            'buy.*' => 'required',
            'sell.*' => 'required'
        ]);

        $created_at = $request->created_at;
        foreach ($validatedData['category_id'] as $key => $value) {


            $harga = new CategoryPrice([
                'category_id' => $validatedData['category_id'][$key],
                'buy' => $validatedData['buy'][$key],
                'sell' => $validatedData['sell'][$key],
                'created_at' => $created_at

            ]);
            $harga->save();
        }
        Alert::info('Berhasil', 'Hapus Data Berhasil');
        return redirect('/dashboard/sampah');
    }
}
