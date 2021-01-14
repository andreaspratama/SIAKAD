<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thnakademik extends Model
{
    protected $fillable = [
        'tahun_akademik', 'semester', 'status'
    ];

    protected $hidden = [];

    public function tglkelas()
    {
        return $this->hasMany('App\Tinggalkelas');
    }
}
