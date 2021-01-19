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
        return $this->belongsToMany(Siswa::class)->withPivot(['ruang', 'kelas', 'hari', 'jam_mulai', 'jam_selesai']);       
    }

    // public function siswas()
    // {
    //     return $this->belongsToMany('App\Siswa');
    // }
}
