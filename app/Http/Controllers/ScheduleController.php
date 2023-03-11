<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ScheduleController extends Controller
{

    public function index(){
        return view('dashboard.jadwal.index',[
            'schedules' => Schedule::all()
        ]);
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'date' => 'required'
        ]);
        $validatedData['user_id'] = auth()->user()->id;
       
       
        Schedule::create($validatedData);
        Alert::info('Berhasil', 'Input Jadwal Berhasil');

        return redirect('/dashboard/jadwal');
  
    }


}
