<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sekolah;
use App\Info;
use App\Thnakademik;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $thnakademik = Thnakademik::where('status', 'Aktif')->first();
        $items = Sekolah::all();
        $infos = Info::orderBy('id', 'DESC')->paginate(5);
        return view('pages.home', [
            'items' => $items,
            'thnakademik' => $thnakademik,
            'infos' => $infos
        ]);
    }

    public function infoLebih($slug)
    {
        $item = Info::where('slug', $slug)->first();

        return view('pages.admin.siswa.infolebih', compact('item'));
    }
}
