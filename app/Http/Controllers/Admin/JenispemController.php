<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jenispem;
use Illuminate\Http\Request;

class JenispemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Jenispem::all();

        return view('pages.admin.jenispembayaran.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.jenispembayaran.create');
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

        Jenispem::create($data);

        return redirect()->route('jenispem.index')->with('status', 'Data berhasil Ditambah');
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
        $item = Jenispem::findOrFail($id);

        return view('pages.admin.jenispembayaran.edit', compact('item'));
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
        $item = Jenispem::findOrFail($id);

        $item->update($data);

        return redirect()->route('jenispem.index')->with('status', 'Data berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $item = Jenispem::findOrFail($id);

        // $item->delete();

        // return redirect()->route('jenispem.index')->with('status', 'Data berhasil Dihapus');
    }

    public function hapus($id)
    {
        $item = Jenispem::findOrFail($id);

        $item->delete();

        return redirect()->route('jenispem.index')->with('status', 'Data berhasil Dihapus');
    }
}
