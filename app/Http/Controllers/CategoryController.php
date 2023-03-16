<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('dashboard.sampah.index', [
            'categories' => Category::all()
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
            return redirect()->back(); }
    }
    
    public function destroy($id){
        
        $category = Category::findOrFail($id);
        $category->delete();
        Alert::info('Berhasil', 'Hapus Data Berhasil');
        return redirect('/dashboard/sampah');
    }
}
