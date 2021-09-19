<?php

namespace App\Http\Controllers;
use App\absensi;
use App\izin;

use Illuminate\Http\Request;

class ManajerController extends Controller
{
    //
    public function laporan(){
        $laporan_absen = absensi::all();
        // return view('laporan', compact('laporan_absen'));
        return view('laporan', ['laporan_absen' => $laporan_absen]);
    }

    public function laporanizin(){
        $laporan_izin= izin::all();
        // return view('laporan', compact('laporan_absen'));
        return view('laporanizin', ['laporan_izin' => $laporan_izin]);
    }

    public function konfirmasi($id){
        izin::where('id',$id) ->update([
            'status'=>"Disetujui"
        ]);
        return redirect()->back();
    }
    
}
