@extends('layouts.app')

@section('title')
    Nilai | SD IT Bunayya
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 mt-4 mb-4">Nilai {{auth()->user()->name}}</h1>
        
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <a href="/siswa/cetaknilai" class="btn btn-success mb-3">Cetak Nilai</a>
            <div class="table-responsive">
              <table class="table table-bordered text-center table-striped" id="tableGuru" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Mapel</th>
                    <th>Nilai UH1</th>
                    <th>Nilai UH2</th>
                    <th>Nilai UTS</th>
                    <th>Nilai UAS</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($item->mapel as $mapel)
                      <tr>
                        <td>{{$mapel->nama_mapel}}</td>
                        <td>{{$mapel->pivot->nilai_uh1}}</td>
                        <td>{{$mapel->pivot->nilai_uh2}}</td>
                        <td>{{$mapel->pivot->uts}}</td>
                        <td>{{$mapel->pivot->uas}}</td>
                        <td>{{$mapel->pivot->status}}</td>
                        {{-- <td>
                          <a href="/siswa/{{$item->id}}/{{$mapel->id}}/nilaitambah" class="btn btn-primary btn-sm">Tambah</a>
                        </td> --}}
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            {{-- <div class="table-responsive">
              <table class="table table-bordered text-center" id="tablethnakademik" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tahun Akademik</th>
                    <th>Semester</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($items as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->tahun_akademik}}</td>
                        <td>{{$item->semester}}</td>
                        <td>{{$item->status}}</td>
                        <td>
                            <a href="{{route('thnakademik.edit', $item->id)}}" class="btn btn-sm btn-circle btn-warning">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{route('thnakademik.destroy', $item->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-circle btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                  @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div> --}}
          </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection