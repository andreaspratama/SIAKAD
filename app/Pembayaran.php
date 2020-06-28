<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pembayaran extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'siswas_id', 'kelas', 'thnakademiks_id', 'semester', 'jenispembayarans_id', 'jumlah'
    ];

    protected $hidden = [];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswas_id', 'id');
    }

    public function jenispembayaran()
    {
        return $this->belongsTo(Jenispembayaran::class, 'jenispembayarans_id', 'id');
    }

    public function thnakademik()
    {
        return $this->belongsTo(Thnakademik::class, 'thnakademiks_id', 'id');
    }
}
