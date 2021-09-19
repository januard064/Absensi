<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class absensi extends Model
{
    //
    protected $table = 'absensi';
    protected $fillable = ['user_id', 'hari', 'waktu_masuk', 'waktu_keluar', 'catatan' ];

    public function laporanabsen(){
        return $this->belongsTo('App\laporanabsen');
    }

}
