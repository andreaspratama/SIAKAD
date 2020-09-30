<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Absen;
use PDF;
use App\Exports\AbsenExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Absen::with(['user'])->get();

        return view('pages.admin.absen.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
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

    public function cetakAbsen()
    {
        return view('pages.admin.absen.cetakAbsen');
    }

    public function cetakAbsenPertanggal($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $absenPertanggal = Absen::all()->whereBetween('tanggal', [$tglawal, $tglakhir]);

        $pdf = PDF::loadview('export.absenpertanggalpdf', compact('absenPertanggal'));
        return $pdf->download('laporan-absen.pdf');
    }

    public function cetakPDF()
    {
        $absen = Absen::all();

        $pdf = PDF::loadview('export.absenpdf', compact('absen'));
        return $pdf->download('laporan-absen.pdf');
    }

    public function cetakEXCEL()
    {
        return Excel::download(new AbsenExport, 'absen.xlsx');
    }
}
