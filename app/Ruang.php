<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ruang extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'kode_ruang', 'nama_ruang'
    ];

    protected $hidden = [
        
    ];
}
