@extends('layouts.admin.admin')

@section('title')
    Tambah User
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Data User</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="{{route('user.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="name">Nama</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="name"><i class="far fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" name="name" value="{{old('name')}}">
                    @error('name')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="username">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="username"><i class="far fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" name="username" value="{{old('username')}}">
                    @error('username')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <div class="input-group">
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
                  <label for="role">Roles</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="role"><i class="fas fa-user"></i></label>
                    </div>
                    <select class="custom-select" name="role">
                      <option>-- Pilih --</option>
                      <option value="admin">Admin</option>
                      <option value="guru">Guru</option>
                      <option value="siswa">Siswa</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="image">Foto</label>
                  <input type="file" class="form-control-file @error('password') is-invalid @enderror" name="image">
                  @error('image')
                    <div class="invalid-feedback">
                      {{$message}}
                    </div>
                  @enderror
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