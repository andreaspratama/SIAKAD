<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use App\Siswa;
use App\Mapel;
use App\Ruang;
use App\Guru;
use App\User;
use App\Jadwalmapel;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('pages.admin.guru.profile');
    }
}
