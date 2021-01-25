@extends('layouts.admin.admin')

@section('title')
    Profile {{auth()->user()->guru->nama}}
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-3 text-gray-800 mt-4">
            @if (auth()->user()->guru->jns_kelamin == 'L')
                Profile Bapak {{auth()->user()->name}}
            @else
                Profile Ibu {{auth()->user()->name}}
            @endif
        </h1>

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
                            <img src="{{Storage::url(auth()->user()->guru->image)}}" alt="" style="width: 250px" class="img-thumbnail">
                        </td>
                    </tr>
                    <tr>
                        <th>Nip</th>
                        <td>{{auth()->user()->guru->nip}}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{auth()->user()->guru->nama}}</td>
                    </tr>
                    <tr>
                        <th>Tempat, Tgl Lahir</th>
                        <td>{{auth()->user()->guru->tpt_lahir}}, {{auth()->user()->guru->tgl_lahir}}</td>
                    </tr>
                    <tr>
                        <th>Jenis Kelamin</th>
                        <td>{{auth()->user()->guru->jns_kelamin}}</td>
                    </tr>
                    <tr>
                        <th>Agama</th>
                        <td>{{auth()->user()->guru->agama}}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{auth()->user()->guru->alamat}}</td>
                    </tr>
                </table>
            </div>
        </div>
      </div>
      <!-- /.container-fluid -->
@endsection