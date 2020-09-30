<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Onlinepemb extends Model
{
    protected $fillable = [
        'nisn', 'nama', 'kelas', 'image', 'jenispem_id', 'tanggal'
    ];

    public function jenispem()
    {
        return $this->belongsTo('App\Jenispem');
    }
}
