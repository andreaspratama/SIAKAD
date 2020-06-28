<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GuruRequest;
use App\Guru;
use App\User;
use App\Mapel;
use App\Exports\GuruExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $items = Guru::all();

        return view('pages.admin.guru.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.guru.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GuruRequest $request)
    {
        // insert ke table users
        $user = new User;
        $user->role = 'guru';
        $user->name = $request->nama;
        $user->image = $request->file('image')->store(
            'assets/gallery', 'public'
        );
        $user->username = $request->nip;
        $user->password = bcrypt($request->nip);
        $user->remember_token = Str::random(60);
        $user->save();

        // insert table
        $request->request->add(['user_id' => $user->id]);
        $data = $request->all();
        $data['image'] = $request->file('image')->store(
            'assets/gallery', 'public'
        );
        
        Guru::create($data);

        return redirect('/guru')->with('status', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Guru::findOrFail($id);

        return view('pages.admin.guru.detail', [
            'item' => $item
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
        $item = Guru::findOrFail($id);

        return view('pages.admin.guru.edit', [
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
        $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'tpt_lahir' => 'required',
            'tgl_lahir' => 'required',
            'jns_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required'
        ]);

        $data = $request->all();

        $item = Guru::findOrFail($id);
        $item->update($data);

        return redirect('/guru')->with('status', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Guru::findOrFail($id);
        $item->delete();

        return redirect('/guru')->with('status', 'Data Berhasil Dihapus');
    }

    public function profile()
    {
        return view('pages.admin.guru.profile');
    }

    public function exportExcel() 
    {
        return Excel::download(new GuruExport, 'Guru.xlsx');
    }

    public function exportPdf()
    {
        $guru = Guru::all();
        $pdf = PDF::loadView('export.gurupdf',['guru' => $guru]);
        return $pdf->download('guru.pdf');
    }   
}
