@extends('layouts.admin.admin')

@section('title')
    Edit Data Siswa
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Ubah Data Siswa {{$item->nama}}</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="/siswa/{{$item->id}}/update" method="POST" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              <div class="form-group">
                <label for="nisn">Nisn</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="nisn"><i class="far fa-id-card"></i></span>
                  </div>
                  <input type="text" class="form-control @error('nisn') is-invalid @enderror" placeholder="NISN" name="nisn" value="{{$item->nisn}}">
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
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama" name="nama" value="{{$item->nama}}">
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
                  <input type="text" class="form-control @error('kelas') is-invalid @enderror" placeholder="Kelas" name="kelas" value="{{$item->kelas}}">
                  @error('kelas')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="unit">Unit</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="unit"><i class="fas fa-user-graduate"></i></label>
                  </div>
                  <select class="custom-select" name="unit">
                    <option>-- Pilih --</option>
                    <option value="K1" @if($item->unit == 'K1') selected @endif>K1</option>
                    <option value="K2" @if($item->unit == 'K2') selected @endif>K2</option>
                    <option value="K3" @if($item->unit == 'K3') selected @endif>K3</option>
                    <option value="SMP" @if($item->unit == 'SMP') selected @endif>SMP</option>
                    <option value="SMA" @if($item->unit == 'SMA') selected @endif>SMA</option>
                  </select>
                </div>
              </div>
              <button type="submit" class="btn btn-success btn-sm">Simpan</button>
              <a href="/siswa" class="btn btn-secondary btn-sm">Kembali</a>
            </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection