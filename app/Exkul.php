<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exkul extends Model
{
    protected $fillable = [
        'nm_exkul', 'hari', 'jam'
    ];

    protected $hidden = [];
}
