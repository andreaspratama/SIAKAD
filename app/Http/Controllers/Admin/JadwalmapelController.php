<?php

namespace App\Http\Controllers\Admin;

use App\Exports\JadwalmapelExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\JadwalmapelRequest;
use App\Jadwalmapel;
use App\Mapel;
use App\Guru;
use App\Ruang;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JadwalmapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Jadwalmapel::with([
            'mapel'
        ])->get();
        
        return view('pages.admin.jadwalmapel.index', [
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
        $gurus = Guru::all();
        $mapels = Mapel::all();
        $ruangs = Ruang::all();
        return view('pages.admin.jadwalmapel.create', [
            'guru' => $gurus,
            'mapel' => $mapels,
            'ruangs' => $ruangs
        ]);
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
        // dd($data);
        Jadwalmapel::create($data);        

        return redirect('/jadwalmapel')->with('status', 'Data Berhasil Dimasukan');
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
        $item = Jadwalmapel::findOrFail($id);
        $gurus = Guru::all();
        $mapels = Mapel::all();
        $ruangs = Ruang::all();

        return view('pages.admin.jadwalmapel.edit', [
            'item' => $item,
            'gurus' => $gurus,
            'mapels' => $mapels,
            'ruangs' => $ruangs
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
        
        $item = Jadwalmapel::findOrFail($id);
        $item->update($data);

        return redirect('/jadwalmapel')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Jadwalmapel::findOrFail($id);
        $item->delete();

        return redirect('/jadwalmapel')->with('status', 'Data Berhasil Dihapus');
    } 

    public function jadwal()
    {
        $items = Jadwalmapel::all();
        // $items = Jadwalmapel::with([
        //     'mapel', 'guru'
        // ])->get();
        
        return view('pages.admin.guru.jadwal', [
            'items' => $items
        ]);
    }

    public function exportExcel() 
    {
        return Excel::download(new JadwalmapelExport, 'Jadwalmapel.xlsx');
    }

    public function exportPdf()
    {
        $jadwal = Jadwalmapel::all();
        $pdf = PDF::loadView('export.jadwalmapel', ['jadwal' => $jadwal]);
        return $pdf->download('Jadwalmapel.pdf');
    }
}
