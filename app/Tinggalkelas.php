<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tinggalkelas extends Model
{
    protected $fillable = [
        'thnakademik_id', 'nisn', 'nama', 'asal_kls', 'tgl_kls', 'alasan'
    ];

    public function thnakademik()
    {
        return $this->belongsTo('App\Thnakademik');
    }
}
