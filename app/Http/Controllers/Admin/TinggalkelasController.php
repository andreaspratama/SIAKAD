<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tinggalkelas;
use App\Thnakademik;
use PDF;
use App\Exports\TinggalkelasExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class TinggalkelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Tinggalkelas::with([
            'thnakademik'
        ])->get();
        
        return view('pages.admin.tglkelas.index', [
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
        $thnakads = Thnakademik::all();

        return view('pages.admin.tglkelas.create', compact('thnakads'));
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

        Tinggalkelas::create($data);

        return redirect()->route('tinggalkelas.index')->with('status', 'Data Berhasil Dibuat');
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
        $thnakads = Thnakademik::all();
        $item = Tinggalkelas::findOrFail($id);

        return view('pages.admin.tglkelas.edit', [
            'thnakads' => $thnakads,
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
        $item = Tinggalkelas::findOrFail($id);

        $item->update($data);

        return redirect()->route('tinggalkelas.index')->with('status', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }

    public function hapus($id)
    {
        $item = Tinggalkelas::findOrFail($id);

        $item->delete();

        return redirect()->route('tinggalkelas.index')->with('status', 'Data Berhasil Dihapus');
    }

    public function cetakPDF()
    {
        $tgl = Tinggalkelas::all();

        $pdf = PDF::loadview('export.tglpdf', compact('tgl'));
        return $pdf->download('laporan-tglkelas.pdf');
    }

    public function cetakEXCEL()
    {
        return Excel::download(new TinggalkelasExport, 'tglkelas.xlsx');
    }
}
