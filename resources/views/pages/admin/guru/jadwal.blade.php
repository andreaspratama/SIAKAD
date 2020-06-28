@extends('layouts.app')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-3 text-gray-800 mt-4">Jadwal {{auth()->user()->guru->nama}}</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Mapel</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Ruang</th>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($items as $item)
                    @if (auth()->user()->guru->nama === $item->guru->nama)
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
                  {{-- @forelse (auth()->user()->guru->mapel as $mapel)
                      <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$mapel->nama_mapel}}</td>
                          <td>{{$mapel->pivot->kelas}}</td>
                          <td>{{$mapel->pivot->ruang}}</td>
                          <td>{{$mapel->pivot->hari}}</td>
                          <td>{{$mapel->pivot->jam_mulai}}</td>
                          <td>{{$mapel->pivot->jam_selesai}}</td>
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