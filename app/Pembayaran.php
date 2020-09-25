<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = [
        'jenispem_id', 'nis', 'nama', 'kelas', 'tanggal', 'jum_pemb', 'keterangan'
    ];

    public function jenispem()
    {
        return $this->belongsTo('App\Jenispem');
    }
}
