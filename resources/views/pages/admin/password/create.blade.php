@extends('layouts.admin.admin')

@section('title')
    Ubah Password
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Ubah Password</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="{{route('password.update')}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label for="old_password">Password Lama</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="old_password"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control @error('old_password') is-invalid @enderror" placeholder="Password Lama" name="old_password" value="{{old('old_password')}}">
                    @error('old_password')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="password">Password Baru</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="password"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" value="{{old('password')}}">
                    @error('password')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="password_confirmation">Konfirmasi Password</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="password_confirmation"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Konfirmasi Password" name="password_confirmation" value="{{old('password_confirmation')}}">
                    @error('password_confirmation')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                    @enderror
                  </div>
                </div>

                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                <button type="reset" class="btn btn-warning btn-sm">Reset</button>
                <a href="{{route('user.index')}}" class="btn btn-secondary btn-sm">Kembali</a>
            </form>
          </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection