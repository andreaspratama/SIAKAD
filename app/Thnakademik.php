<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Thnakademik extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'tahun_akademik', 'semester', 'status'
    ];

    protected $hidden = [];
}
