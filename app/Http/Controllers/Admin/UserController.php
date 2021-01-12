<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = User::all();

        return view('pages.admin.user.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->remember_token = Str::random(60);
        $user->role = $request->role;
        $user->image = $request->file('image')->store(
            'assets/gallery', 'public'
        );
        $user->save();

        return redirect()->route('user.index')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_user)
    {
        $item = User::findOrFail($id_user);

        return view('pages.admin.user.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = User::findOrFail($id);

        if(request('image')) {
            Storage::delete($data->image);
            $image = request()->file('image')->store('assets/gallery', 'public');
        } elseif($data->image) {
            $image = $data->image;
        } else {
            $image = null;
        }

        $data->update([
            'name' => $request->name,
            'username' => $request->username,
            'role' => $request->role,
            'image' => $image
        ]);

        return redirect()->route('user.index')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_user)
    {
        // $item = User::findOrFail($id_user);

        // $item->delete();

        // return redirect()->route('user.index')->with('status', 'Data Berhasil Dihapus');
    }

    public function hapus($id_user)
    {
        $item = User::findOrFail($id_user);

        $item->delete();

        return redirect()->route('user.index')->with('status', 'Data Berhasil Dihapus');
    }
}
