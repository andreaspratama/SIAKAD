<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SekolahRequest;
use App\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Sekolah::all();

        return view('pages.admin.sekolah.index', [
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
        return view('pages.admin.sekolah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SekolahRequest $request)
    {
        $data = $request->all();
        $data['image'] = request()->file('image')->store('assets/gallery', 'public');

        Sekolah::create($data);

        return redirect()->route('sekolah.index')->with('status', 'Data Berhasil Ditambahkan');
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
    public function edit($id)
    {
        $item = Sekolah::findOrFail($id);

        return view('pages.admin.sekolah.edit', [
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
        $data = Sekolah::findOrFail($id);

        if(request('image')) {
            Storage::delete($data->image);
            $image = request()->file('image')->store('assets/gallery', 'public');
        } elseif($data->image) {
            $image = $data->image;
        } else {
            $image = null;
        }

        $data->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'no_tlpn' => $request->no_tlpn,
            'akreditasi' => $request->akreditasi,
            'kepala_sklh' => $request->kepala_sklh,
            'image' => $image
        ]);
        // $data = $request->all();
        // $data['image'] = $request->file('image')->store(
        //     'assets/gallery', 'public'
        // );

        // $item = Sekolah::findOrFail($id);
        // $item->update($data);

        return redirect()->route('sekolah.index')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
