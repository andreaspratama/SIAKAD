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
                <label for="tpt_lahir">Tempat Lahir</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="tpt_lahir"><i class="fas fa-home"></i></span>
                  </div>
                  <input type="text" class="form-control @error('tpt_lahir') is-invalid @enderror" placeholder="Tempat Lahir" name="tpt_lahir" value="{{$item->tpt_lahir}}">
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
                  <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" placeholder="Tanggal Lahir" name="tgl_lahir" value="{{$item->tgl_lahir}}">
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
                    <option value="L" @if($item->jns_kelamin == 'L') selected @endif>Laki-Laki</option>
                    <option value="P" @if($item->jns_kelamin == 'P') selected @endif>Perempuan</option>
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
                    <option value="Islam" @if($item->agama == 'Islam') selected @endif>Islam</option>
                    <option value="Kristen" @if($item->agama == 'Kristen') selected @endif>Kristen</option>
                    <option value="Katolik" @if($item->agama == 'Katolik') selected @endif>Katolik</option>
                    <option value="Hindu" @if($item->agama == 'Hindu') selected @endif>Hindu</option>
                    <option value="Budha" @if($item->agama == 'Budha') selected @endif>Budha</option>
                  </select>
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