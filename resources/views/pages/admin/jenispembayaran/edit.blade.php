@extends('layouts.admin.admin')

@section('title')
    Edit Data Jenis Pembayaran
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Ubah Jenis Pembayaran</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="{{route('jenispem.update', $item->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                  <label for="jenis">Jenis Pembayaran</label>
                  <input type="text" class="form-control @error('jenis') is-invalid @enderror" name="jenis" placeholder="Kode Mapel" value="{{$item->jenis}}">
                  @error('jenis')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                <a href="{{route('jenispem.index')}}" class="btn btn-secondary btn-sm">Kembali</a>
            </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection