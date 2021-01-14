<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Jadwalmapel;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        $jadwal = Jadwalmapel::all();

        if(!$jadwal) {
            return response()->json(['message' => 'Gagal']);
        } else {
            return response()->json($jadwal);
        }
        // $id = $request->input('id');
        // $nama = $request->input('nama');

        // if($id)
        // {
        //     $siswa = Siswa::find($id);

        //     if($siswa) {
        //         return response()->json([$siswa, 'message' => 'sukses'], 200);
        //     } else {
        //         return response()->json(['message' => 'gagal']);
        //     }
        // }

        // $siswa = Siswa::where('kelas', 'like', '%' . $kelas . '%')->first();
        // if($siswa) {
        //     return response()->json($siswa);
        // } else {
        //     return response()->json(['message' => 'gagal']);
        // }
    }
}
