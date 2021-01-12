@extends('layouts.admin.admin')

@section('title')
    Edit Data Sekolah
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Sekolah {{$item->nama}}</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="{{route('sekolah.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
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
                  <label for="alamat">Alamat</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="alamat"><i class="fas fa-map-marker-alt"></i></i></span>
                    </div>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" name="alamat" rows="3">{{$item->alamat}}</textarea>
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
                    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{$item->email}}">
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
                      <span class="input-group-text" id="no_tlpn"><i class="far fa-phone"></i></span>
                    </div>
                    <input type="text" class="form-control @error('no_tlpn') is-invalid @enderror" placeholder="Nomor Telepon" name="no_tlpn" value="{{$item->no_tlpn}}">
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
                      <label class="input-group-text" for="akreditasi"><i class="fas fa-venus-mars"></i></label>
                    </div>
                    <select class="custom-select" name="akreditasi">
                      <option>-- Pilih --</option>
                      <option value="A" @if($item->akreditasi == 'A') selected @endif>A</option>
                      <option value="B" @if($item->akreditasi == 'B') selected @endif>B</option>
                      <option value="C" @if($item->akreditasi == 'C') selected @endif>C</option>
                      <option value="D" @if($item->akreditasi == 'D') selected @endif>D</option>
                      <option value="E" @if($item->akreditasi == 'E') selected @endif>E</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                    <label for="kepala_sklh">Kepala Sekolah</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="kepala_sklh"><i class="far fa-user"></i></span>
                      </div>
                      <input type="text" class="form-control @error('kepala_sklh') is-invalid @enderror" placeholder="Kepala Sekolah" name="kepala_sklh" value="{{$item->kepala_sklh}}">
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
                  <p class="text-danger">Masukan Foto Bila Perlu</p>
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