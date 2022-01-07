@extends('layouts.admin.admin')

@section('title')
    Tambah Data Siswa
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Data Siswa</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="/siswa/store" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="nisn">Nisn</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="nisn"><i class="far fa-id-card"></i></span>
                    </div>
                    <input type="text" class="form-control @error('nisn') is-invalid @enderror" placeholder="NISN" name="nisn" value="{{old('nisn')}}">
                    @error('nisn')
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
                  <label for="kelas">Kelas</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="kelas"><i class="fas fa-school"></i></span>
                    </div>
                    <input type="text" class="form-control @error('kelas') is-invalid @enderror" placeholder="kelas" name="kelas" value="{{old('kelas')}}">
                    @error('kelas')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="kelas">Unit</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="unit"><i class="fas fa-school"></i></label>
                    </div>
                    <select class="form-control" name="unit">
                      <option>-- Pilih Unit --</option>
                      <option value="K1">K1</option>
                      <option value="K2">K2</option>
                      <option value="K3">K3</option>
                      <option value="SMP">SMP</option>
                      <option value="SMA">SMA</option>
                    </select>
                  </div>
                </div>
                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                <button type="reset" class="btn btn-warning btn-sm">Reset</button>
                <a href="/siswa" class="btn btn-secondary btn-sm">Kembali</a>
            </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection