<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function create()
    {
        return view('pages.admin.password.create');
    }

    public function update(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => ['required', 'min:5', 'confirmed'],
        ]);

        $passwordLama = auth()->user()->password;
        $old_pass = $request->old_password;

        if(Hash::check($old_pass, $passwordLama)) {
            auth()->user()->update([
                'password' => bcrypt($request->password)
            ]);

            return redirect()->route('user.index')->with('status', 'Password Berhasil Diubah');
        } else {
            return back()->withErrors(['old_password' => 'Masukan password yang benar']);
        }
    }
}
