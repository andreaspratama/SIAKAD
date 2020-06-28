<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sekolah;

class DashboardController extends Controller
{
    public function index()
    {
        $items = Sekolah::all();

        return view('pages.admin.dashboard', [
            'items' => $items
        ]);
    }
}
