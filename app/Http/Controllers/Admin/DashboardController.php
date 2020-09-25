<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Guru;
use App\Siswa;
use App\Mapel;
use App\Ruang;
use App\Sekolah;

class DashboardController extends Controller
{
    public function index()
    {
        $items = Sekolah::all();
        $siswa = Siswa::count();
        $guru = Guru::count();
        $mapel = Mapel::count();
        $ruang = Ruang::count();
        $pie = [
            'laki' => Siswa::where('jns_kelamin', 'L')->count(),
            'perempuan' => Siswa::where('jns_kelamin', 'P')->count()
        ];
        return view('pages.admin.dashboard', [
            'items' => $items,
            'siswa' => $siswa,
            'guru' => $guru,
            'mapel' => $mapel,
            'ruang' => $ruang,
            'pie' => $pie
        ]);
    }
}
