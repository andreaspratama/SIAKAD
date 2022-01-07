@extends('layouts.admin.admin')

@section('title')
    Tambah Data Guru
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Data Guru</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="/guru/store" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="nip">Nip</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="nip"><i class="far fa-id-card"></i></span>
                  </div>
                  <input type="text" class="form-control @error('nip') is-invalid @enderror" placeholder="Nip" name="nip" value="{{old('nip')}}">
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
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" name="nama" value="{{old('nama')}}">
                  @error('nama')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="image">Foto</label>
                <input type="file" class="form-control-file  @error('image') is-invalid @enderror" name="image">
                @error('image')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                @enderror
              </div>
              <button type="submit" class="btn btn-success btn-sm">Simpan</button>
              <button type="reset" class="btn btn-warning btn-sm">Reset</button>
              <a href="/guru" class="btn btn-secondary btn-sm">Kembali</a>
            </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection