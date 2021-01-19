<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\InfoRequest;
use App\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Info::all();

        return view('pages.admin.info.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.info.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->judul);
        $data['image'] = $request->file('image')->store(
            'assets/gallery', 'public'
        );

        Info::create($data);

        return redirect()->route('info.index')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Info::findOrFail($id);

        return view('pages.admin.info.edit', compact('item')); 
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
        $data = Info::findOrFail($id);

        if(request('image')) {
            Storage::delete($data->image);
            $image = request()->file('image')->store('assets/gallery', 'public');
        } elseif($data->image) {
            $image = $data->image;
        } else {
            $image = null;
        }

        $data->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'image' => $image
        ]);
        // $data = $request->all();
        // $data['slug'] = Str::slug($request->judul);
        // $data['image'] = $request->file('image')->store(
        //     'assets/gallery', 'public'
        // );
        // $item = Info::findOrFail($id);

        // $item->update($data);

        return redirect()->route('info.index')->with('status', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $item = Info::findOrFail($id);

        // $item->delete();

        // return redirect()->route('info.index')->with('status', 'Data Berhasil Dihapus');
    }

    public function hapus($id)
    {
        $item = Info::findOrFail($id);

        $item->delete();

        return redirect()->route('info.index')->with('status', 'Data Berhasil Dihapus');
    }
}
