@extends('layouts.admin.admin')

@section('title')
    Detail Guru
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Detail Guru {{$item->nama}}</h1>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

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
                        <th>Nip</th>
                        <td>{{$item->nip}}</td>
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
                </table>
                <a href="/guru" class="btn btn-secondary btn-sm">Kembali</a>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection