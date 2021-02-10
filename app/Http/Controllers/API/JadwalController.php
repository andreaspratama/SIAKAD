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
            return response()->json(['message' => 'Data not found']);
        } else {
            return response()->json(
                [
                    "message" => 'Success',
                    "data" => $jadwal
                ]
            );
        }
    }
}
