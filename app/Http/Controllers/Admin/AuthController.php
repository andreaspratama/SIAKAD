<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Auth;
use Siswa;
use User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.admin.auth.login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    
    public function postlogin(Request $request)
    {
        if(Auth::attempt($request->only('username', 'password'))){
            return redirect('/home');
        }

        return redirect('/')->with('status', 'Username dan Password tidak sesuai');
    }
}
