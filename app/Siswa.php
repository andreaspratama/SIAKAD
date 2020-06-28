<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nisn', 'nama', 'tpt_lahir', 'tgl_lahir', 'jns_kelamin', 'agama', 'alamat', 'nama_ortu', 'kelas', 'asal_sklh', 'image', 'user_id'
    ];

    protected $hidden = [];

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai_uh1', 'nilai_uh2', 'uts', 'uas']);
    }
    
    // public function ambilNilai()
    // {
    //     $nilai = "";
    //     foreach($this->mapel as $mapel) {
    //         $nilai = $mapel->pivot->nilai;
    //     }

    //     return $nilai;
    // }

    // public function namaMapel()
    // {
    //     $np = "0";
    //     foreach($this->mapel as $mapel) {
    //         $np = $mapel->nama_mapel;
    //     }

    //     return $np;
    // }
}
