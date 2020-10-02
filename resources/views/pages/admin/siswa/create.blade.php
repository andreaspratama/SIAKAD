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
                  <label for="tpt_lahir">Tempat Lahir</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="tpt_lahir"><i class="fas fa-home"></i></span>
                    </div>
                    <input type="text" class="form-control @error('tpt_lahir') is-invalid @enderror" placeholder="Tempat Lahir" name="tpt_lahir" value="{{old('tpt_lahir')}}">
                    @error('tpt_lahir')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="tgl_lahir">Tanggal Lahir</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="tgl_lahir"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" placeholder="Tanggal Lahir" name="tgl_lahir" value="{{old('tgl_lahir')}}">
                    @error('tgl_lahir')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="jns_kelamin">Jenis Kelamin</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="jns_kelamin"><i class="fas fa-venus-mars"></i></label>
                    </div>
                    <select class="custom-select" name="jns_kelamin">
                      <option>-- Pilih --</option>
                      <option value="L">Laki-Laki</option>
                      <option value="P">Perempuan</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="agama">Agama</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="agama"><i class="fas fa-heart"></i></label>
                    </div>
                    <select class="custom-select" name="agama">
                      <option>-- Pilih --</option>
                      <option value="Islam">Islam</option>
                      <option value="Kristen">Kristen</option>
                      <option value="Katolik">Katolik</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Budha">Budha</option>
                    </select>
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
                  <label for="nama_ortu">Nama Orang Tua</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="nama_ortu"><i class="far fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control @error('nama_ortu') is-invalid @enderror" placeholder="Nama Orang Tua" name="nama_ortu" value="{{old('nama_ortu')}}">
                    @error('nama_ortu')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="kelas">Kelas</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="kelas"><i class="fas fa-user-graduate"></i></label>
                    </div>
                    <select class="custom-select" name="kelas">
                      <option>-- Pilih --</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="asal_sklh">Asal Sekolah</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="asal_sklh"><i class="fas fa-school"></i></span>
                    </div>
                    <input type="text" class="form-control @error('asal_sklh') is-invalid @enderror" placeholder="Asal Sekolah" name="asal_sklh" value="{{old('asal_sklh')}}">
                    @error('asal_sklh')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="image">Foto</label>
                  <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image">
                  @error('image')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                  @enderror
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