<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Guru extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'nip', 'nama', 'tpt_lahir', 'tgl_lahir', 'jns_kelamin', 'agama', 'alamat', 'image', 'user_id'
    ];

    protected $hidden = [];

    public function mapel()
    {
        return $this->belongsToMany(Mapel::class)->withPivot(['ruang', 'kelas', 'hari', 'jam_mulai', 'jam_selesai']);
    }
}
