<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RuangRequest;
use App\Ruang;
use App\Jadwalmapel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RuangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Ruang::all();

        return view('pages.admin.ruang.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.ruang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RuangRequest $request)
    {
        $data = $request->all();

        Ruang::create($data);

        return redirect()->route('ruang.index')->with('status', 'Data Berhasil Ditambahkan');
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
        $item = Ruang::findOrFail($id);

        return view('pages.admin.ruang.edit', [
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
        $data = $request->all();

        $item = Ruang::findOrFail($id);
        $item->update($data);

        return redirect()->route('ruang.index')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $item = Ruang::findOrFail($id);
        // $item->delete();

        // Jadwalmapel::where('ruang_id', $id)->delete();

        // return redirect()->route('ruang.index')->with('status', 'Data Berhasil Dihapus');
    }

    public function hapus($id)
    {
        $item = Ruang::findOrFail($id);
        $item->delete();

        Jadwalmapel::where('ruang_id', $id)->delete();

        return redirect()->route('ruang.index')->with('status', 'Data Berhasil Dihapus');
    }
}
