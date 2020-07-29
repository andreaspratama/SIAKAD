<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SiswaRequest;
use App\Siswa;
use App\Jadwalmapel;
use App\User;
use App\Mapel;
use App\Sekolah;
use App\Exports\SiswaExport;
use App\Exports\nilaiSiswaExport;
use App\Exports\NilaiExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Siswa::all();
        
        return view('pages.admin.siswa.index', [
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
        return view('pages.admin.siswa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SiswaRequest $request)
    {
        // insert ke table users
        $user = new User;
        $user->role = 'siswa';
        $user->name = $request->nama;
        $user->image = $request->file('image')->store(
            'assets/gallery', 'public'
        );
        $user->username = $request->nisn;
        $user->password = bcrypt($request->nisn);
        $user->remember_token = Str::random(60);
        $user->save();
        
        // insert table siswa
        $request->request->add(['user_id' => $user->id]);
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery', 'public'
        );

        Siswa::create($data);
        
        return redirect('/siswa')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Siswa::findOrFail($id);
        $matapelajarans = Mapel::all();

        return view('pages.admin.siswa.detail', [
            'item' => $item,
            'matapelajarans' => $matapelajarans
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
        $item = Siswa::findOrFail($id);

        return view('pages.admin.siswa.edit', [
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
        $messages = [
            'required' => 'Tidak boleh kosong',
            'min' => 'Minimal 3 karakter'
        ];

        $this->validate($request, [
            'nisn' => 'required',
            'nama' => 'required|min:3|string',
            'tpt_lahir' => 'required|min:3',
            'tgl_lahir' => 'required',
            'jns_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'nama_ortu' => 'required',
            'kelas' => 'required',
            'asal_sklh' => 'required'
        ], $messages);

        $data = $request->all();
        // // $data['image'] = $request->file('image')->store(
        // //     'assets/gallery', 'public'
        // );

        $item = Siswa::findOrFail($id);
        $item->update($data);

        return redirect('/siswa')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Siswa::findOrFail($id);
        $item->delete();

        return redirect('/siswa')->with('status', 'Data berhasil Dihapus');
    }

    public function profile()
    {
        return view('pages.admin.siswa.profile');
    }

    public function nilai(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->mapel()->attach($request->mapel, ['nilai_uh1' => $request->nilai_uh1, 'nilai_uh2' => $request->nilai_uh2, 'uts' => $request->uts, 'uas' => $request->uas, 'status' => $request->status]);

        return redirect('siswa/'.$id.'/show')->with('status', 'Nilai Berhasil Ditambahkan');
    }

    public function nilaitambah($id, $idmapel)
    {
        $item = Siswa::findOrFail($id);
        $nilai = $item->mapel()->findOrFail($idmapel);
        $mapel = Mapel::all();

        return view('pages.admin.siswa.editnilai', [
            'item' => $item,
            'nilai' => $nilai,
            'mapel' => $mapel
        ]);
    }

    public function nilaiupdate(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id); 
        $siswa->mapel()->updateExistingPivot($request->mapel, ['nilai_uh1' => $request->nilai_uh1, 'nilai_uh2' => $request->nilai_uh2, 'uts' => $request->uts, 'uas' => $request->uas, 'status' => $request->status]);

        // dd($siswa);

        return redirect('siswa/'.$id.'/show')->with('status', 'Nilai Berhasil Ditambahkan');
    }

    public function lihatNilai()
    {
        return view('pages.admin.siswa.nilai');
    }

    public function jadwal()
    {
        $items = Jadwalmapel::all();
        return view('pages.admin.siswa.jadwal', compact('items'));
    }

    public function exportExcel() 
    {
        return Excel::download(new SiswaExport, 'Siswa.xlsx');
    }

    public function exportPdf()
    {
        $siswa = Siswa::all();
        $pdf = PDF::loadView('export.siswapdf',['siswa' => $siswa]);
        return $pdf->download('siswa.pdf');
    }

    public function exportNilaiPdf($id)
    {
        $siswa = Siswa::find($id);
        $matapelajarans = Mapel::all();
        $pdf = PDF::loadView('export.nilaisiswapdf',
            ['siswa' => $siswa],
            ['matapelajarans' => $matapelajarans]
        );
        return $pdf->download('nilaisiswa.pdf');
    }

    public function cetakNilai() 
    {
        $siswa = Auth::user()->name;
        $matapelajarans = Mapel::all();
        $pdf = PDF::loadView('export.nilaipdf',
            ['siswa' => $siswa],
            ['matapelajarans' => $matapelajarans],
        );
        return $pdf->download('nilaisiswa.pdf');
    }
}
