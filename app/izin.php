<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class izin extends Model
{
    //
    protected $table = 'izin';
    protected $fillable = ['user_id', 'hari', 'waktu_mulai', 'waktu_berakhir', 'alasan', 'status' ];
}
