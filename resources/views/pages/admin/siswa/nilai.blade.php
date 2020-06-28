@extends('layouts.app')

@section('title')
    SD IT Bunayya - Nilai {{auth()->user()->siswa->nama}}
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-3 text-gray-800 mt-3">Nilai Siswa {{auth()->user()->siswa->nama}}</h1>
        <a href="/siswa/cetaknilai" class="btn btn-success btn-sm mb-3 mt-3 px-3 py-2">Cetak Nilai</a>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Nama Mapel</th>
                            <th>Nilai UH1</th>
                            <th>Nilai UH2</th>
                            <th>Nilai uts</th>
                            <th>Nilai uas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse (auth()->user()->siswa->mapel as $mapel)
                            <tr>
                                <td>{{$mapel->nama_mapel}}</td>
                                <td>{{$mapel->pivot->nilai_uh1}}</td>
                                <td>{{$mapel->pivot->nilai_uh2}}</td>
                                <td>{{$mapel->pivot->uts}}</td>
                                <td>{{$mapel->pivot->uas}}</td>
                            </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
      <!-- /.container-fluid -->
@endsection