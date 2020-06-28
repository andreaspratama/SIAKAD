<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sekolah;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $items = Sekolah::all();
        return view('pages.home', [
            'items' => $items
        ]);
    }
}
