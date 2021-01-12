<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mapel extends Model
{
    use SoftDeletes;

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
        return $this->belongsToMany(Siswa::class)->withPivot(['nilai_uh1', 'nilai_uh2', 'uts', 'uas', 'status']);       
    }

    // public function siswas()
    // {
    //     return $this->belongsToMany('App\Siswa');
    // }
}
