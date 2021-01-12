@extends('layouts.admin.admin')

@section('title')
    Edit User
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit Data User {{$item->name}}</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="{{route('user.update', $item->id)}}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                  <label for="name">Nama</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="name"><i class="far fa-user"></i></span>
                    </div>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" name="name" value="{{$item->name}}">
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
                    <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" name="username" value="{{$item->username}}">
                    @error('username')
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
                      <option value="siswa" @if($item->role == 'siswa') selected @endif>Siswa</option>
                      <option value="admin" @if($item->role == 'admin') selected @endif>Admin</option>
                      <option value="guru" @if($item->role == 'guru') selected @endif>Guru</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="image">Foto</label>
                  <input type="file" class="form-control-file" name="image">
                  <p class="text-danger">Masukan Foto Bila Perlu</p>
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