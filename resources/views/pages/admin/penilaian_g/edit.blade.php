@extends('layouts.admin.admin')

@section('title')
    Edit Data Ruang Kelas
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Ubah Ruang Kelas</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="{{route('ruang.update', $item->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                  <label for="kode_ruang">Kode Ruang</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="kode_ruang"><i class="fas fa-code"></i></span>
                    </div>
                    <input type="text" class="form-control @error('kode_ruang') is-invalid @enderror" placeholder="Kode Ruang" name="kode_ruang" value="{{$item->kode_ruang}}">
                    @error('kode_ruang')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama_ruang">Nama Ruang</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="nama_ruang"><i class="fas fa-school"></i></span>
                    </div>
                    <input type="text" class="form-control @error('nama_ruang') is-invalid @enderror" placeholder="Nama Ruang" name="nama_ruang" value="{{$item->nama_ruang}}">
                    @error('nama_ruang')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                    @enderror
                  </div>
                </div>
                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                <a href="{{route('ruang.index')}}" class="btn btn-secondary btn-sm">Kembali</a>
            </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection