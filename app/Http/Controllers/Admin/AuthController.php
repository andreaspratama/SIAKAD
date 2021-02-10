<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AuthRequest;
use Auth;
use Siswa;
use App\User;
use Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.admin.auth.login');
    }
    
    public function postlogin(Request $request)
    {
        if(Auth::attempt($request->only('username', 'password'))){
            return redirect('/home');
        }

        return redirect('/')->with('status', 'Username / Password tidak sesuai');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function reset()
    {
        return view('pages.admin.auth.gantipas');
    }

    // public function postreset(AuthRequest $request)
    // {
    //     $username = $request->input('username');

    //     $user = User::where('username', $username)->first();
        
    //     if($user) {

    //         $user->password = Hash::make($request->input('password-baru'));

    //         if($user->save()) {
    //             return redirect('/')->with('statusreset', 'Password berhasil diubah');
    //         }
    //     }
    // }
}
