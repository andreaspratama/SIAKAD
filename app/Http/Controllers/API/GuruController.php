<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index(Request $request)
    {
        $guru = Guru::all();

        if($guru) {
            return response()->json(
                [
                    "message" => 'Success',
                    "data" => $guru
                ]
            );
        } else {
            return response()->json(['message' => 'Data not found']);
        }
    }  

    public function show($id)
    {
        $guru = Guru::find($id);

        if($guru) {
            return response()->json(
                [
                    "message" => 'Success',
                    "data" => $guru
                ]
            );
        } else {
            return response()->json(["message" => 'Data not found']);
        }
    }
}
