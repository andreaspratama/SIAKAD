<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Siswa;
use App\Guru;
use App\Jadwalmapel;
use Illuminate\Http\Request;

class KepalasekolahController extends Controller
{
    public function siswa()
    {
        $items = Siswa::all();

        return view('pages.admin.kepalasekolah.siswa', compact('items'));
    }

    public function detailsiswa($id)
    {
        $item = Siswa::findOrFail($id);

        return view('pages.admin.kepalasekolah.detailsiswa', [
            'item' => $item
        ]);
    }

    public function guru()
    {
        $items = Guru::all();

        return view('pages.admin.kepalasekolah.guru', compact('items'));
    }

    public function detailguru($id)
    {
        $item = Guru::findOrFail($id);

        return view('pages.admin.kepalasekolah.detailguru', [
            'item' => $item
        ]);
    }

    public function jadwal()
    {
        $items = Jadwalmapel::all();

        return view('pages.admin.kepalasekolah.jadwal', compact('items'));
    }
}
