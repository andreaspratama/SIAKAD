<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensiswa extends Model
{
    protected $fillable = [
        'user_id', 'tanggal', 'time_in', 'note'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
