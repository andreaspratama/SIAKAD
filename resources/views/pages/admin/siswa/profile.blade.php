@extends('layouts.app')

@section('title')
    Profile {{auth()->user()->siswa->nama}}    
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800 mt-4 mb-2">Profile {{auth()->user()->siswa->nama}}</h1>
        <a href="/siswa/profile/edit" class="btn btn-warning mb-3">Edit Profile</a>

        <!-- DataTales Example -->
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Foto</th>
                        <td>
                            <img src="{{Storage::url(auth()->user()->siswa->image)}}" alt="" style="width: 250px" class="img-thumbnail">
                        </td>
                    </tr>
                    <tr>
                        <th>NISN</th>
                        <td>{{auth()->user()->siswa->nisn}}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{auth()->user()->siswa->nama}}</td>
                    </tr>
                    <tr>
                        <th>Tempat, Tgl Lahir</th>
                        <td>{{auth()->user()->siswa->tpt_lahir}}, {{auth()->user()->siswa->tgl_lahir}}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{auth()->user()->siswa->jns_kelamin}}</td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>{{auth()->user()->siswa->agama}}</td>
                    </tr>
                    <tr>
                        <th>Nama Orang Tua</th>
                        <td>{{auth()->user()->siswa->nama_ortu}}</td>
                    </tr>
                    <tr>
                        <th>Asal Sekolah</th>
                        <td>{{auth()->user()->siswa->asal_sklh}}</td>
                    </tr>
                </table>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection