@extends('layouts.admin.admin')

@section('title')
    Edit Info Akademik
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Data Info</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="{{route('info.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="judul">Judul</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="judul"><i class="fas fa-code"></i></span>
                    </div>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" placeholder="Judul..." name="judul" value="{{$item->judul}}">
                    @error('judul')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="tanggal">Tanggal</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="tanggal"><i class="fas fa-calendar-day"></i></span>
                    </div>
                    <input type="date" class="form-control @error('tanggal') is-invalid @enderror" placeholder="Nama Info" name="tanggal" value="{{$item->tanggal}}">
                    @error('tanggal')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                    <label for="image">Gambar</label>
                    <input type="file" class="form-control-file @error('image') is-invalid @enderror" id="image" name="image">
                    @error('image')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3">{{$item->deskripsi}}</textarea>
                    @error('deskripsi')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                <button type="reset" class="btn btn-warning btn-sm">Reset</button>
                <a href="{{route('info.index')}}" class="btn btn-secondary btn-sm">Kembali</a>
            </form>
          </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection