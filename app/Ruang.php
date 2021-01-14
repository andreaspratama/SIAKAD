<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ruang extends Model
{
    protected $fillable = [
        'kode_ruang', 'nama_ruang'
    ];

    protected $hidden = [
        
    ];
}
