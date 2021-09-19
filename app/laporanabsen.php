<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class laporanabsen extends Model
{
    //
    protected $table = 'users';
    
    public function absensi(){
        return $this->hasOne('App\absensi');
    }
}
