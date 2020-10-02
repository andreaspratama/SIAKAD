@extends('layouts.admin.admin')

@section('title')
    Tambah Data Sekolah
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Sekolah</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="{{route('sekolah.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="nama">Nama</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="nama"><i class="fas fa-school"></i></span>
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
                  <label for="alamat">Alamat</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="alamat"><i class="fas fa-map-marker-alt"></i></i></span>
                    </div>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="3"></textarea>
                    @error('alamat')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="email"><i class="fas fa-envelope"></i></span>
                    </div>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{old('email')}}">
                    @error('email')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="no_tlpn">Nomor Telepon</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="no_tlpn"><i class="fas fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control @error('no_tlpn') is-invalid @enderror" placeholder="Nomor Telepon" name="no_tlpn" value="{{old('no_tlpn')}}">
                    @error('no_tlpn')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="akreditasi">Akreditasi</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="akreditasi"><i class="fas fa-school"></i></label>
                    </div>
                    <select class="custom-select" name="akreditasi">
                      <option>-- Pilih --</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                      <option value="C">C</option>
                      <option value="D">D</option>
                      <option value="E">E</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                    <label for="kepala_sklh">Kepala Sekolah</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="kepala_sklh"><i class="far fa-user"></i></span>
                      </div>
                      <input type="text" class="form-control @error('kepala_sklh') is-invalid @enderror" placeholder="Kepala Sekolah" name="kepala_sklh" value="{{old('kepala_sklh')}}">
                      @error('kepala_sklh')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                </div>
                <div class="form-group">
                  <label for="image">Foto</label>
                  <input type="file" class="form-control-file" name="image">
                </div>
                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                <button type="reset" class="btn btn-warning btn-sm">Reset</button>
                <a href="{{route('sekolah.index')}}" class="btn btn-secondary btn-sm">Kembali</a>
            </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection