<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ExkulRequest;
use App\Exkul;
use Illuminate\Http\Request;

class ExkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Exkul::all();

        return view('pages.admin.exkul.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.exkul.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExkulRequest $request)
    {
        $data = $request->all();

        Exkul::create($data);

        return redirect()->route('exkul.index')->with('status', 'Data berhasil Dibuat');
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
        $item = Exkul::findOrFail($id);

        return view('pages.admin.exkul.edit', compact('item'));
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
        $item = Exkul::findOrFail($id);

        $item->update($data);

        return redirect()->route('exkul.index')->with('status', 'Data berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $item = Exkul::findOrFail($id);

        // $item->delete();

        // return redirect()->route('exkul.index')->with('status', 'Data berhasil Dihapus');
    }

    public function hapus($id)
    {
        $item = Exkul::findOrFail($id);

        $item->delete();

        return redirect()->route('exkul.index')->with('status', 'Data berhasil Dihapus');
    }
}
