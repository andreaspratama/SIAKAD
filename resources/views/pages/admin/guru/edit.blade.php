@extends('layouts.admin.admin')

@section('title')
    Edit Data Guru
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Ubah Data Guru {{$item->nama}}</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="/guru/{{$item->id}}/update" method="POST" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <div class="form-group">
                <label for="nip">Nip</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="nip"><i class="far fa-id-card"></i></span>
                  </div>
                  <input type="text" class="form-control @error('nip') is-invalid @enderror" placeholder="Nip" name="nip" value="{{$item->nip}}">
                  @error('nip')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="nama">Nama</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="nama"><i class="far fa-user"></i></span>
                  </div>
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" name="nama" value="{{$item->nama}}">
                  @error('nama')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="image">Foto</label>
                <input type="file" class="form-control-file" name="image">
                <p class="text-danger">Masukan Foto Bila Perlu</p>
              </div>
              <button type="submit" class="btn btn-success btn-sm">Simpan</button>
              <a href="/guru" class="btn btn-secondary btn-sm">Kembali</a>
            </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection