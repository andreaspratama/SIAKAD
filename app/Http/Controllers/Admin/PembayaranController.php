<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PembayaranRequest;
use App\Jenispem;
use App\Pembayaran;
use PDF;
use Carbon\Carbon;
use App\Exports\PembayaranExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenispems = Jenispem::all();
        $items = Pembayaran::orderBy('id', 'DESC')->get();
        return view('pages.admin.pembayaran.index', compact('jenispems', 'items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PembayaranRequest $request)
    {
        $tanggal = Carbon::now();

        $pemb = new Pembayaran;
        $pemb->nisn = $request->nisn;
        $pemb->nama = $request->nama;
        $pemb->jenispem_id = $request->jenispem_id;
        $pemb->tanggal = $tanggal;
        $pemb->kelas = $request->kelas;
        $pemb->jum_pemb = $request->jum_pemb;
        $pemb->keterangan = $request->keterangan;

        $pemb->save();
        // $data = $request->all();
        // // dd($data);

        // Pembayaran::create($data);

        return redirect()->route('pembayaran.index')->with('status', 'Data berhasil Ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Pembayaran::findOrFail($id);

        return view('pages.admin.pembayaran.detail', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Pembayaran::findOrFail($id);
        $jenispems = Jenispem::all();

        return view('pages.admin.pembayaran.edit', compact('jenispems', 'item'));
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
        $tanggal = Carbon::now();

        $pemb = Pembayaran::find($id);

        $pemb->nisn = $request->nisn;
        $pemb->nama = $request->nama;
        $pemb->jenispem_id = $request->jenispem_id;
        $pemb->tanggal = $tanggal;
        $pemb->kelas = $request->kelas;
        $pemb->jum_pemb = $request->jum_pemb;
        $pemb->keterangan = $request->keterangan;
        
        $pemb->save();

        return redirect()->route('pembayaran.index')->with('status', 'Data berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $item = Pembayaran::findOrFail($id);

        // $item->delete();

        // return redirect()->route('pembayaran.index')->with('status', 'Data berhasil Dihapus');
    }

    public function hapus($id)
    {
        $item = Pembayaran::findOrFail($id);

        $item->delete();

        return redirect()->route('pembayaran.index')->with('status', 'Data berhasil Dihapus');
    }

    public function cetakPDF()
    {
        $pembayaran = Pembayaran::all();

        $pdf = PDF::loadview('export.pembayaranpdf', compact('pembayaran'));
        return $pdf->download('laporan-pembayaran.pdf');
    }

    public function cetakEXCEL()
    {
        return Excel::download(new PembayaranExport, 'pembayaran.xlsx');
    }

    public function cetakPembayaran()
    {
        return view('pages.admin.pembayaran.cetakPembayaran');
    }

    public function cetakPembayaranPertanggal($tglawal, $tglakhir)
    {
        // dd(["Tanggal Awal : ".$tglawal, "Tanggal Akhir : ".$tglakhir]);
        $pembayaranPertanggal = Pembayaran::all()->whereBetween('tanggal', [$tglawal, $tglakhir]);

        $pdf = PDF::loadview('export.pembayaranpertanggalpdf', compact('pembayaranPertanggal'));
        return $pdf->download('laporan-pembayaran.pdf');
    }
}
