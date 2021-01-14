<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Onlinepemb;
use Carbon\Carbon;
use Auth;
use Illuminate\Http\Request;

class OnlinepemController extends Controller
{
    public function proses(Request $request)
    {
        $tanggal = Carbon::now();

        $data = Onlinepemb::create([
            'nisn' => $request->nisn,
            'nama' => $request->nama,
            'jenispem_id' => $request->jenispem_id,
            'tanggal' => $tanggal,
            'kelas' => $request->kelas,
            'image' => $request->file('image')->store(
                'assets/gallery', 'public'
            )
        ]);

        return response()->json(
            [
                "message" => "Success",
                "data" => $data
            ]
        );
    }
}
