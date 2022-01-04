<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;
use App\Mapel;
use App\Siswa;
use App\Jadwalmapel;
use App\Thnakademik;
use App\User;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        // $items = Jadwalmapel::all();
        return view('pages.admin.siswa.masuknilai');
    }

    public function proses($kelas)
    {
        $pnilai = Siswa::all()->whereBetween('kelas', [$kelas]);

        return view('pages.admin.siswa.prosnilai', compact('pnilai'));
    }

    public function detail($id)
    {
        $item = Siswa::findOrFail($id);
        $matapelajarans = Mapel::all();
        $thnakademiks = Thnakademik::all();

        return view('pages.admin.siswa.tambahnilai', compact('item', 'matapelajarans', 'thnakademiks'));
    }

    public function nilai(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->mapel()->attach($request->mapel, ['thnakademik_id' => $request->thnakademik_id, 'nilai_uh1' => $request->nilai_uh1, 'nilai_uh2' => $request->nilai_uh2, 'uts' => $request->uts, 'uas' => $request->uas, 'status' => $request->status]);

        return redirect('siswa/'.$id.'/nilai')->with('status', 'Nilai Berhasil Ditambahkan');
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

        return redirect('siswa/'.$id.'/nilai')->with('status', 'Nilai Berhasil Ditambahkan');
    }

    public function nilaihapus($id, $idmapel)
    {
        $siswa = Siswa::findOrFail($id);
        $siswa->mapel()->detach($idmapel);

        return redirect('siswa/'.$id.'/nilai')->with('status', 'Nilai Berhasil Dihapus');
    }
}
