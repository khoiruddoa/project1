<?php

namespace App\Http\Controllers;

use App\Models\Convertion;
use App\Models\Schedule;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class ScheduleController extends Controller
{

    public function index()
    {
        return view('dashboard.jadwal.index', [
            'schedules' => Schedule::all(),
            'user' => User::all()
        ]);
    }
    public function dashboard()
    {
        $schedule = Schedule::latest()->first();
        $user = User::find(auth()->user()->id);
        $convertion = Convertion::where('user_id', auth()->user()->id)->where('pay_status', 1)->orwhere('pay_status', 2)->get();



        return view('dashboard', [
            'schedule' => $schedule,
            'user' => $user,
            'convertion' => $convertion
        ]);
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required'
        ]);
        $validatedData['user_id'] = auth()->user()->id;


        function cekBulanSama($tanggal, $tanggal_ini)
        {
            $bulan_ini = date('m', strtotime($tanggal_ini)); //ambil bulan dari tanggal_ini
          
            $tahun_ini = date('y', strtotime($tanggal_ini));
            
                    foreach ($tanggal as $tgl) {
                    
                        $bulan_tgl = date('m', strtotime($tgl->date)); //ambil bulan dari tanggal pada array
                        $tahun_tgl = date('y', strtotime($tgl->date));
                        if ($bulan_tgl == $bulan_ini && $tahun_tgl == $tahun_ini) { //jika bulannya sama
                            return true; //beri keterangan true
                        }
                       
                    }

               
            }


            $tanggal_ini = $request->input('date');
            $tanggal = Schedule::all();


            $result = cekBulanSama($tanggal, $tanggal_ini);
           
        if ($result == null) {

            Schedule::create($validatedData);
            Alert::info('Berhasil', 'Input Jadwal Berhasil');
            return redirect('/dashboard/jadwal');
        } else {
            Alert::warning('gagal', 'Jadwal Hanya 1 kali dalam sebulan');
            return redirect('/dashboard/jadwal');
        }
    }
    public function destroy($id){
        
        $schedule = Schedule::findOrFail($id);
        $schedule->delete();
        Alert::info('Berhasil', 'Hapus Data Berhasil');
        return redirect('/dashboard/jadwal');
    }
}

