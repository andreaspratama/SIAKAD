<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jenispembayaran extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'jenis_pembayaran'
    ];

    protected $hidden = [
        
    ];
}
