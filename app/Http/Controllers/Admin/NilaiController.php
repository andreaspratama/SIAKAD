<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use App\Mapel;
use App\Siswa;
use App\User;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        return view('pages.admin.siswa.nilai');
    }
}
