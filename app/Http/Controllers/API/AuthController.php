<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\User;

class AuthController extends Controller
{
    public function login(Request $request, User $user)
    {
        if(!Auth::attempt($request->only('username', 'password'))){
            return response()->json(['message' => 'Username dan Password Salah'], 404);
        }

        $user = $user->find(Auth::user()->id);

        return response()->json($user);
    }
}
