@extends('layouts.admin.admin')

@section('title')
    Tambah Data Jenis Pembayaran
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Jenis Pembayaran</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="{{route('jenispem.store')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="jenis">Jenis Pembayaran</label>
                  <input type="text" class="form-control @error('jenis') is-invalid @enderror" name="jenis" placeholder="Jenis Pembayaran" value="{{old('jenis')}}">
                  @error('jenis')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                <button type="reset" class="btn btn-warning btn-sm">Reset</button>
                <a href="{{route('jenispem.index')}}" class="btn btn-secondary btn-sm">Kembali</a>
            </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection