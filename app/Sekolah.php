<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sekolah extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nama', 'alamat', 'email', 'no_tlpn', 'akreditasi', 'kepala_sklh', 'image'
    ];

    protected $hidden = [];
}
