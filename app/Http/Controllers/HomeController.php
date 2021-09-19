<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\absensi;
use App\izin;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $hari =  date("Y-m-d");
        $cek_absen = absensi::where(['user_id' => $user_id, "hari" => $hari])
                            ->get()
                            ->first();
        if(is_null($cek_absen)){
            $info = array(
                "status" => "Anda belum mengisi absen",
                "btnIn" => "",
                "btnOut" => "disabled"
            );
        } 
        elseif($cek_absen->waktu_keluar==NULL){
            $info = array(
                "status" => "Silahkan isi absen keluar",
                "btnIn" => "disabled",
                "btnOut" => ""
            );
        } else {
            $info = array(
                "status" => "Absen telah berhasil diisi untuk hari ini",
                "btnIn" => "disabled",
                "btnOut" => "disabled"
            );
        }
        // return $info["status"];

        $data_absen = absensi::where('user_id', $user_id) 
                            ->orderBy('hari','desc')
                            ->paginate(5);
        return view('home', compact('data_absen','info'));
    }
    public function absen(Request $request){
        $user_id = Auth::user()->id;
        date_default_timezone_set('Asia/Jakarta');
        $hari = date("Y-m-d");
        $waktu = date("H:i:s");
        $catatan = $request->catatan;
        
        $absen = new absensi;

      
        
        //Absen Masuk
        if($request->btnIn == "Masuk"){
              //Cek Kehadiran per Hari
            $cek_keharidan = $absen->where(['hari' => $hari, 'user_id' => $user_id])
            ->count();

            if($cek_keharidan > 0){
            return redirect()->back();
            }

            $absen->create([
                'user_id' => $user_id,
                'hari' => $hari,
                'waktu_masuk' => $waktu,
                'catatan' => $catatan]);
            return redirect()->back();
        }
        
        //Absen Keluar
        elseif ($request->btnOut == "Keluar"){
            $absen->where(['hari' => $hari, 'user_id' => $user_id])
                ->update([
                    'waktu_keluar' => $waktu,
                    'catatan' => $catatan]);
            return redirect()->back();
        }

        return $request->all();
    }

    public function izin(){
        // return view("izin");
        $user_id = Auth::user()->id;
        $data_izin = izin::where('user_id', $user_id)
                            ->orderBy('hari', 'desc')
                            ->paginate(5);

        return view('izin', compact('data_izin'));
        // return $data_izin;
    }

    public function izinpost(Request $request){
        // return $request->all();
        $user_id = Auth::user()->id;
        date_default_timezone_set('Asia/Jakarta');
        $hari = $request->hari;
        $waktu_mulai = $request->waktu_mulai;
        $waktu_berakhir = $request->waktu_berakhir;
        $alasan = $request->alasan;
        $status = $request->status;

        // return $waktu_mulai;
        $izin = new izin;

      
        $izin->create([
            'user_id' => $user_id,
            'hari' => $hari,
            'waktu_mulai' =>  $waktu_mulai,
            'waktu_berakhir' => $waktu_berakhir,
            'alasan' => $alasan,
            'status' => $status
        ]);
        return redirect()->back();
    }
}
