<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MapelRequest;
use App\Mapel;
use App\Siswa;
use App\Jadwalmapel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Mapel::all();

        return view('pages.admin.mapel.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.mapel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MapelRequest $request)
    {
        $data = $request->all();

        Mapel::create($data);

        return redirect()->route('mapel.index')->with('status', 'Data Berhasil Ditambahkan');
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
        $item = Mapel::findOrFail($id);

        return view('pages.admin.mapel.edit', [
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

        $item = Mapel::findOrFail($id);
        $item->update($data);

        return redirect()->route('mapel.index')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $item = Mapel::findOrFail($id);
        // $item->delete();

        // Jadwalmapel::where('mapel_id', $id)->delete();

        // return redirect()->route('mapel.index')->with('status', 'Data Berhasil Dihapus');
    }

    public function hapus($id)
    {
        $item = Mapel::findOrFail($id);
        $item->delete();

        Jadwalmapel::where('mapel_id', $id)->delete();

        return redirect()->route('mapel.index')->with('status', 'Data Berhasil Dihapus');
    }

    // public function hapusnilai($id)
    // {
    //     $nilai = Mapel::findOrFail($id);
    //     $nilai->delete();

    //     return redirect('siswa/'.$id.'/show')->with('status', 'Nilai Berhasil Dihapus');
    // }
}
