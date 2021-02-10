<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penilaianguru extends Model
{
    protected $guarded = [];

    public function guru()
    {
        return $this->belongsTo('App\Guru');
    }

    public function thnakademik()
    {
        return $this->belongsTo('App\Thnakademik');
    }
}
