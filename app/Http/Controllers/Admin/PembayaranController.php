<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PembayaranRequest;
use App\Pembayaran;
use App\Siswa;
use App\Jenispembayaran;
use App\Thnakademik;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Pembayaran::with([
            'siswa', 'jenispembayaran'
        ])->get();

        return view('pages.admin.pembayaran.index', [
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
        $siswas = Siswa::all();
        $jenispembayarans = Jenispembayaran::all();
        $thnakademiks = Thnakademik::all();

        return view('pages.admin.pembayaran.create', [
            'siswa' => $siswas,
            'jenispembayaran' => $jenispembayarans,
            'thnakademik' => $thnakademiks,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PembayaranRequest $request)
    {
        $data = $request->all();

        Pembayaran::create($data);

        return redirect()->route('pembayaran.index')->with('status', 'Pmbayaran Berhasil');
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
        $siswas = Siswa::all();
        $jenispembayarans = Jenispembayaran::all();
        $thnakademiks = Thnakademik::all();

        return view('pages.admin.pembayaran.detail', [
            'item' => $item,
            'siswas' => $siswas,
            'jenispembayarans' => $jenispembayarans,
            'thnakademiks' => $thnakademiks,
        ]);
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
}
