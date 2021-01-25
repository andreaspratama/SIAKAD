@extends('layouts.admin.admin')

@section('title')
    Edit Data Mata Pelajaran
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Mapel {{$item->nama_mapel}}</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="{{route('mapel.update', $item->id)}}" method="POST">
              @method('PUT')
              @csrf
              <div class="form-group">
                <label for="kode_mapel">Kode Mapel</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="kode_mapel"><i class="fas fa-code"></i></span>
                  </div>
                  <input type="text" class="form-control @error('kode_mapel') is-invalid @enderror" placeholder="Kode Mapel" name="kode_mapel" value="{{$item->kode_mapel}}">
                  @error('kode_mapel')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="nama_mapel">Nama Mapel</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="nama_mapel"><i class="fas fa-book-reader"></i></span>
                  </div>
                  <input type="text" class="form-control @error('nama_mapel') is-invalid @enderror" placeholder="Nama Mapel" name="nama_mapel" value="{{$item->nama_mapel}}">
                  @error('nama_mapel')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
                </div>
              </div>
              <button type="submit" class="btn btn-success btn-sm">Simpan</button>
              <a href="{{route('mapel.index')}}" class="btn btn-secondary btn-sm">Kembali</a>
          </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection