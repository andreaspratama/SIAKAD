<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Absensiswa;
use PDF;
use App\Exports\AbsensiswaExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class AbsensiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Absensiswa::with(['user'])->get();

        return view('pages.admin.absensiswa.index', compact('items'));
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
        return view('pages.admin.absensiswa.cetakAbsen');
    }

    public function cetakAbsenPertanggal($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $absenPertanggal = Absensiswa::all()->whereBetween('tanggal', [$tglawal, $tglakhir]);

        $pdf = PDF::loadview('export.absenpertanggalsiswapdf', compact('absenPertanggal'));
        return $pdf->download('laporan-absen.pdf');
    }

    public function cetakPDF()
    {
        $absen = Absensiswa::all();

        $pdf = PDF::loadview('export.absensiswapdf', compact('absen'));
        return $pdf->download('laporan-absen-siswa.pdf');
    }

    public function cetakEXCEL()
    {
        return Excel::download(new AbsensiswaExport, 'absen.xlsx');
    }
}
