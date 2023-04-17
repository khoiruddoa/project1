<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryPrice;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'asc')->get();
        $tahun_data = DB::table('category_prices')
                  ->selectRaw('distinct YEAR(created_at) as tahun')
                  ->orderBy('tahun', 'desc')
                  ->get();

        // $tahun_data = DB::table('category_prices')
        //     ->selectRaw('distinct date_part(\'year\', created_at) as tahun')
        //     ->orderBy('tahun', 'desc')
        //     ->get();

        return view('dashboard.graphic.index', [
            'categories' => $categories,
            'tahuns' => $tahun_data
        ]);
    }

    public function fluktuasi(Request $request)
    {
      
        $categoryId = $request->category_id;
        $year = $request->year;

        $categories = Category::find($categoryId);


        
      $details = CategoryPrice::where('category_id', $categoryId)
            ->whereYear('created_at', $year)->get();


    



    
    $months = [];
    $prices = [];
    
    foreach ($details as $detail) {
        $month = $detail->created_at->format('F'); // ambil data bulan saja
        $price = $detail->sell;
    
        $months[] = $month;
        $prices[] = $price;
    }


        return view('dashboard.graphic.fluktuasiharga', [
            'categories' => $categories,
            'months' => $months, 'priceList' => $prices
        ]);
    }

    
    public function jumlahtransaksi(Request $request)
    {
      
        
        $year = $request->year;

        $transactionsPerMonth = Transaction::select(DB::raw('MONTH(updated_at) as angka'), DB::raw('MONTHNAME(created_at) as month'), DB::raw('COUNT(*) as total_transactions'))
        ->whereYear('created_at', $year)
        ->groupBy('month')
        ->orderBy('angka', 'asc')
        ->get();

     
    $months = [];
    $totals = [];
    
    foreach ($transactionsPerMonth as $detail) {
        $months[] = $detail->month;
        $totals[] = $detail->total_transactions; 
    }

        return view('dashboard.graphic.jumlahtransaksi', [
            
            'months' => $months, 'totals' => $totals
        ]);
    }

}



