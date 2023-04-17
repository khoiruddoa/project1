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

        $transactionsPerMonth = Transaction::select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total_transactions'))
        ->whereYear('created_at', $year)
        ->groupBy('month')
        ->orderBy('month', 'asc')
        ->get();

     
    $months = [];
    $totals = [];
    
    foreach ($transactionsPerMonth as $detail) {
        $months[] = $detail->month;
        $totals[] = $detail->total_transactions; 
    }

    $bulan = array(
        1 => 'Januari',
        2 => 'Februari',
        3 => 'Maret',
        4 => 'April',
        5 => 'Mei',
        6 => 'Juni',
        7 => 'Juli',
        8 => 'Agustus',
        9 => 'September',
        10 => 'Oktober',
        11 => 'November',
        12 => 'Desember'
    );


    $namaBulan = array_map(function($month) use ($bulan) {
        return $bulan[$month];
    }, $months);
    

        return view('dashboard.graphic.jumlahtransaksi', [
            
            'months' => $namaBulan, 'totals' => $totals
        ]);
    }

}



