<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Category;
use App\Models\CategoryPrice;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('category_name', 'asc')->get();
        return view('dashboard.sampah.index', [
            'categories' => $categories
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

        foreach ($validatedData['category_id'] as $key => $value) {


            $harga = new CategoryPrice([
                'category_id' => $validatedData['category_id'][$key],
                'buy' => $validatedData['buy'][$key],
                'sell' => $validatedData['sell'][$key],

            ]);
            $harga->save();
        }
        Alert::info('Berhasil', 'Hapus Data Berhasil');
        return redirect('/dashboard/sampah');
    }
}
