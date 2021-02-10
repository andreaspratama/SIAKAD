<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = [
        'nip', 'nama', 'tpt_lahir', 'tgl_lahir', 'jns_kelamin', 'agama', 'alamat', 'image', 'user_id'
    ];

    protected $hidden = [];

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['ruang', 'kelas', 'hari', 'jam_mulai', 'jam_selesai']);
    }

    public function jadwalmapel()
    {
        return $this->hasMany(Jadwalmapel::class);
    }

    public function pg()
    {
        return $this->hasMany('App\Penilaianguru');
    }
}
