<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\GuruRequest;
use App\Guru;
use App\User;
use App\Mapel;
use App\Absen;
use App\Jadwalmapel;
use App\Exports\GuruExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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

        return redirect('guru')->with('status', 'Data Berhasil Ditambahkan');
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
        $data = Guru::findOrFail($id);
        $update_guru = $data->user_id;

        if(request('image')) {
            Storage::delete($data->image);
            $image = request()->file('image')->store('assets/gallery', 'public');
        } elseif($data->image) {
            $image = $data->image;
        } else {
            $image = null;
        }

        $data->update([
            'nip' => $request->nip,
            'nama' => $request->nama,
            'tpt_lahir' => $request->tpt_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'jns_kelamin' => $request->jns_kelamin,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'image' => $image
        ]);

        $baru = User::find($update_guru);
        $baru->name = $request->nama;
        $baru->image = $image;
        $baru->username = $request->nip;
        $baru->password = bcrypt($request->nip);
        $baru->remember_token = Str::random(60);
        $baru->save();
        // $request->validate([
        //     'nip' => 'required',
        //     'nama' => 'required',
        //     'tpt_lahir' => 'required',
        //     'tgl_lahir' => 'required',
        //     'jns_kelamin' => 'required',
        //     'agama' => 'required',
        //     'alamat' => 'required'
        // ]);

        // $data = $request->all();

        // $item = Guru::findOrFail($id);
        // $item->update($data);

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

        Jadwalmapel::where('guru_id', $id)->delete();

        $hapus_guru = $item->user_id;
        User::where('id', $hapus_guru)->delete();
        Absen::where('user_id', $hapus_guru)->delete();

        return redirect('/guru')->with('status', 'Data Berhasil Dihapus');
    }

    public function timeZone($location) 
    {
        return date_default_timezone_set($location);
    }

    public function absen() 
    {
        $this->timeZone('Asia/Jakarta');
        $user_id = Auth::user()->id;
        $date = date("Y-m-d");
        $cek_absen = Absen::where(['user_id' => $user_id, 'tanggal' => $date])
                            ->get()
                            ->first();
        if(is_null($cek_absen)) {
            $info = array(
                "status" => "Anda Belum Mengisi Absen Hari Ini",
                "btnIn" => "",
                "btnOut" => "disabled"
            );
        } elseif($cek_absen->time_out == NULL) {
            $info = array(
                "status" => "Jangan Lupa Absen Keluar",
                "btnIn" => "disabled",
                "btnOut" => ""
            );
        } else {
            $info = array(
                "status" => "Absensi Hari Ini Telah Berakhir",
                "btnIn" => "disabled",
                "btnOut" => "disabled"
            );
        }

        $items = Absen::where('user_id', $user_id)->orderBy('id', 'DESC')->paginate(10);
        return view('pages.admin.guru.absen', compact('items', 'info'));
    }

    public function absenpros(Request $request)
    {
        $this->timeZone('Asia/Jakarta');
        $user_id = Auth::user()->id;
        $date = date("Y-m-d");
        $time = date("H:i:s");
        $note = $request->note;

        $absen = new Absen;
        
        // Absen Masuk
        if (isset($request["btnIn"])) {
            // Cek Double Data
            $cek_double = $absen->where(['tanggal' => $date, 'user_id' => $user_id])
                    ->count();
            if($cek_double > 0) {
                return redirect()->back();
            }
            $absen->create([
                'user_id' => $user_id,
                'tanggal' => $date,
                'time_in' => $time,
                'note' => $note]);
            return redirect()->back(); 
        } 
        // Absen Keluar
        elseif (isset($request["btnOut"])) {
            $absen->where(['tanggal' => $date, 'user_id' => $user_id])
                    ->update([
                        'time_out' => $time,
                        'note' => $note]);
            return redirect()->back();
        }
        // return $request->all(); 
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

    public function jadwal()
    {
        $items = Jadwalmapel::all();
        return view('pages.admin.guru.jadwal', compact('items'));
    }
}
