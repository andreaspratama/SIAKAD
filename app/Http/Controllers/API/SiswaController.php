<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->input('id');
        $nama = $request->input('nama');

        if($id)
        {
            $siswa = Siswa::find($id);

            if($siswa) {
                return response()->json([$siswa, 'message' => 'sukses'], 200);
            } else {
                return response()->json(['message' => 'gagal']);
            }
        }

        $siswa = Siswa::where('nama', 'like', '%' . $nama . '%')->first();
        if($siswa) {
            return response()->json($siswa);
        } else {
            return response()->json(['message' => 'gagal']);
        }
    }

    // public function show($id)
    // {
    //     $id
    // }
}
