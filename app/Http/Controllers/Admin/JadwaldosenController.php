<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use App\Guru;
use App\Jadwalmapel;
use App\User;
use App\Mapel;
use Illuminate\Http\Request;

class JadwaldosenController extends Controller
{
    public function index()
    {
        return view('pages.admin.guru.jadwal');
    }
}
