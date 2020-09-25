<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $fillable = [
        'title', 'tanggal', 'deadline', 'kelas', 'deskripsi'
    ];

    protected $hidden = [];
}
