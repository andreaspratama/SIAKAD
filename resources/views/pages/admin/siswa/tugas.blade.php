@extends('layouts.app')

@section('title')
    Tugas Kelas
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-3 text-gray-800 mt-4">Tugas Siswa {{auth()->user()->siswa->nama}}</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
              <div class="row mb-3">
                  <div class="col-lg-8 p-2" style="background-color: red">
                    @foreach ($items as $item)
                      @if (auth()->user()->siswa->kelas === $item->kelas)
                        <div class="card mb-3">
                          <div class="card-header">
                            {{$item->title}} - {{$item->tanggal}}
                          </div>
                          <div class="card-body">
                            <h5 class="card-title">{{$item->title}}</h5>
                            <h6 class="card-text">Kelas : {{$item->kelas}}</h6>
                            <h6 class="card-text">Batas Waktu : {{$item->deadline}}</h6>
                            <p class="card-text">{{$item->deskripsi}}</p>
                            <a href="#" class="btn btn-primary float-right">Detail</a>
                          </div>
                        </div>
                      @endif
                    @endforeach
                  </div>
              </div>
              {{-- <div class="row">
                <div class="col text-center">
                  {{ $items->links() }}
                </div>
              </div> --}}
          </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection