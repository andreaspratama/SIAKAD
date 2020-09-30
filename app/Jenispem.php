<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenispem extends Model
{
    protected $fillable = ['jenis'];

    protected $hidden = [];

    public function pembayaran()
    {
        return $this->hasMany('App\Pembayaran');
    }

    public function onlinepem()
    {
        return $this->hasMany('App\Onlinepemb');
    }
}
