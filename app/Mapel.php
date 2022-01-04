<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $fillable = [
        'kode_mapel', 'nama_mapel'
    ];

    protected $hidden = [
        
    ];

    public function guru()
    {
        return $this->belongsToMany(Guru::class);
    }

    public function siswa()
    {
        return $this->belongsToMany(Siswa::class)->withPivot(['thnakademik_id', 'nilai_uh1', 'nilai_uh2', 'uts', 'uas', 'status']);       
    }

    public function thnakademik()
    {
        return $this->belongsToMany(Thnakademik::class)->withPivot(['thnakademik_id', 'nilai_uh1', 'nilai_uh2', 'uts', 'uas', 'status']);
    }

    // public function siswas()
    // {
    //     return $this->belongsToMany('App\Siswa');
    // }
}
