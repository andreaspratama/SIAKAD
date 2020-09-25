<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tugas;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    public function tugas()
    {
        $items = Tugas::orderBy('id', 'DESC')->paginate(3);
        return view('pages.admin.guru.tugas', compact('items'));
    }

    public function store(Request $request)
    {
        $tanggal = Carbon::now();

        $data = new Tugas;
        $data->title = $request->title;
        $data->tanggal = $tanggal;
        $data->deadline = $request->deadline;
        $data->kelas = $request->kelas;
        $data->deskripsi = $request->deskripsi;
        $data->save();

        return redirect('guru/tugas');
    }
}
