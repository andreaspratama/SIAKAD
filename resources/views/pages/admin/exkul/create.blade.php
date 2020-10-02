@extends('layouts.admin.admin')

@section('title')
    Tambah Data Exkul
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Exkul Sekolah</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="{{route('exkul.store')}}" method="POST">
              @csrf
              <div class="form-group">
                <label for="nm_exkul">Nama Exkul</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="nm_exkul"><i class="fas fa-school"></i></span>
                  </div>
                  <input type="text" class="form-control @error('nm_exkul') is-invalid @enderror" placeholder="Nama Exkul" name="nm_exkul" value="{{old('nm_exkul')}}">
                  @error('nm_exkul')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="hari">Hari</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <label class="input-group-text" for="hari"><i class="fas fa-calendar-day"></i></label>
                  </div>
                  <select class="custom-select @error('hari') is-invalid @enderror" name="hari">
                    <option>-- Pilih Hari --</option>
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                  </select>
                  @error('hari')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
                </div>
              </div>
              <div class="form-group">
                <label for="jam">Waktu</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="jam"><i class="far fa-clock"></i></span>
                  </div>
                  <input type="time" class="form-control @error('jam') is-invalid @enderror" placeholder="Jam Mulai" name="jam" value="{{old('jam')}}">
                  @error('jam')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
                </div>
              </div>
              <button type="submit" class="btn btn-success btn-sm">Simpan</button>
              <button type="reset" class="btn btn-warning btn-sm">Reset</button>
              <a href="{{route('exkul.index')}}" class="btn btn-secondary btn-sm">Kembali</a>
            </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection