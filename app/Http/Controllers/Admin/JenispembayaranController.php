<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JenispembayaranRequest;
use App\Jenispembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JenispembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Jenispembayaran::all();

        return view('pages.admin.jenispembayaran.index', [
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
        return view('pages.admin.jenispembayaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JenispembayaranRequest $request)
    {
        $data = $request->all();

        Jenispembayaran::create($data);

        return redirect()->route('jenispembayaran.index')->with('status', 'Data Berhasil Ditambahkan');
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
        $item = Jenispembayaran::findOrFail($id);

        return view('pages.admin.jenispembayaran.edit', [
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
    public function update(JenispembayaranRequest $request, $id)
    {
        $data = $request->all();

        $item = Jenispembayaran::findOrFail($id);
        $item->update($data);

        return redirect()->route('jenispembayaran.index')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Jenispembayaran::findOrFail($id);
        $item->delete();

        return redirect()->route('jenispembayaran.index')->with('status', 'Data Berhasil Dihapus');
    }
}
