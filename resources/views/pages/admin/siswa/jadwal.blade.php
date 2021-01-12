@extends('layouts.app')

@section('title')
    SD IT Bunayya - Jadwal
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-3 text-gray-800 mt-3">Jadwal Siswa {{auth()->user()->name}}</h1>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="table">
                        <thead>
                            <tr>
                                <th>Nama Mapel</th>
                                <th>Nama Guru</th>
                                <th>Kelas</th>
                                <th>Ruang</th>
                                <th>Hari</th>
                                <th>Jam Mulai</th>
                                <th>Jam Selesai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $item)
                                @if (auth()->user()->siswa->kelas === $item->kelas)
                                    <tr>
                                        <td>{{$item->mapel->nama_mapel}}</td>
                                        <td>{{$item->guru->nama}}</td>
                                        <td>{{$item->kelas}}</td>
                                        <td>{{$item->ruang->nama_ruang}}</td>
                                        <td>{{$item->hari}}</td>
                                        <td>{{$item->jam_mulai}}</td>
                                        <td>{{$item->jam_selesai}}</td>
                                    </tr>
                                @endif
                            @endforeach
                            {{-- @forelse (auth()->user()->siswa->mapel as $mapel)
                                <tr>
                                    <td>{{$mapel->nama_mapel}}</td>
                                </tr>
                            @empty
                                
                            @endforelse --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
      <!-- /.container-fluid -->
@endsection

@push('prepend-style')
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endpush

@push('addon-script')
      <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <script>
        $(document).ready(function() {
          $('#table').DataTable();
        } );
      </script>
@endpush