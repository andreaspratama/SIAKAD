<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'nisn', 'nama', 'tpt_lahir', 'tgl_lahir', 'jns_kelamin', 'agama', 'alamat', 'nama_ortu', 'kelas', 'asal_sklh', 'image', 'user_id'
    ];

    protected $hidden = [];

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['nilai_uh1', 'nilai_uh2', 'uts', 'uas', 'status', 'thn_akademik']);
    }

    // public function mapels()
    // {
    //     return $this->belongsToMany('App\Mapel');
    // }
    
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
