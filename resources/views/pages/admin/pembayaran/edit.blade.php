@extends('layouts.admin.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Ubah Jenis Pembayaran</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="{{route('jenispembayaran.update', $item->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                  <label for="jenis_pembayaran">Jenis Pembayaran</label>
                  <input type="text" class="form-control @error('jenis_pembayaran') is-invalid @enderror" name="jenis_pembayaran" placeholder="Kode Mapel" value="{{$item->jenis_pembayaran}}">
                  @error('jenis_pembayaran')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
                </div>
                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                <a href="{{route('jenispembayaran.index')}}" class="btn btn-secondary btn-sm">Kembali</a>
            </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection