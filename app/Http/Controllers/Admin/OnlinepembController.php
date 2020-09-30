<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OnlinepembRequest;
use App\Jenispem;
use App\Onlinepemb;
use PDF;
use App\Exports\PembayaranonlineExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class OnlinepembController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenispems = Jenispem::all();
        return view('pages.admin.onlinepemb.index', compact('jenispems'));
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
    public function store(OnlinepembRequest $request)
    {
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery', 'public'
        );

        Onlinepemb::create($data);

        return redirect()->route('upload.index')->with('success', 'Upload Pembayaran Sukses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
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

    public function indexadmin()
    {
        $items = Onlinepemb::with(['jenispem'])->get();

        return view('pages.admin.onlinepemb.indexadmin', compact('items'));
    }

    public function detail($id)
    {
        $item = Onlinepemb::findOrFail($id);

        return view('pages.admin.onlinepemb.detailadmin', compact('item'));
    }

    public function cetakPDF()
    {
        $pembayaranonline = Onlinepemb::all();

        $pdf = PDF::loadview('export.pembayaranonlinepdf', compact('pembayaranonline'));
        return $pdf->download('laporan-pembayaran-online.pdf');
    }

    public function cetakEXCEL()
    {
        return Excel::download(new PembayaranonlineExport, 'pembayaran-online.xlsx');
    }
}
