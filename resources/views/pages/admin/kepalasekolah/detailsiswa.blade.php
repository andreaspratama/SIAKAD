@extends('layouts.app')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-5 mt-3 text-gray-800">Detail Siswa {{$item->nama}}</h1>

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Foto</th>
                        <td>
                            <img src="{{Storage::url($item->image)}}" alt="" style="width: 250px" class="img-thumbnail">
                        </td>
                    </tr>
                    <tr>
                        <th>Nis</th>
                        <td>{{$item->nisn}}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{$item->nama}}</td>
                    </tr>
                    <tr>
                        <th>Tempat, Tgl Lahir</th>
                        <td>{{$item->tpt_lahir}}, {{$item->tgl_lahir}}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{$item->jns_kelamin}}</td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>{{$item->agama}}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{$item->alamat}}</td>
                    </tr>
                    <tr>
                        <th>Orang Tua</th>
                        <td>{{$item->nama_ortu}}</td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td>{{$item->kelas}}</td>
                    </tr>
                    <tr>
                        <th>Asal Sekolah</th>
                        <td>{{$item->asal_sklh}}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Mapel</th>
                        <td>{{$item->mapel->count()}}</td>
                    </tr>
                </table>

                <a href="/kepalasekolah/siswa" class="btn btn-secondary btn-sm">Kembali</a>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection