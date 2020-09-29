<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $fillable = [
        'judul', 'slug', 'tanggal', 'image', 'deskripsi'
    ];
}
