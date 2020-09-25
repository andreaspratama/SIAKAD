<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sekolah;
use App\Thnakademik;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $thnakademik = Thnakademik::where('status', 'Aktif')->first();
        $items = Sekolah::all();
        return view('pages.home', [
            'items' => $items,
            'thnakademik' => $thnakademik
        ]);
    }
}
