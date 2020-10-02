@extends('layouts.admin.admin')

@section('title')
    Edit Data Tahun Akademik
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Ubah Tahun Akademik</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="{{route('thnakademik.update', $item->id)}}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                  <label for="tahun_akademik">Tahun Akademik</label>
                  <input type="text" class="form-control @error('tahun_akademik') is-invalid @enderror" name="tahun_akademik" placeholder="Tahun Akademik" value="{{$item->tahun_akademik}}">
                  @error('tahun_akademik')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="semester">Semester</label>
                  <select class="form-control" name="semester" required>
                    <option value="Ganjil" @if($item->semester == 'Ganjil') selected @endif>Ganjil</option>
                    <option value="Genap" @if($item->semester == 'Genap') selected @endif>Genap</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="status">Status</label>
                  <select class="form-control" name="status" required>
                    <option value="Aktif" @if($item->status == 'Aktif') selected @endif>Aktif</option>
                    <option value="Tidak Aktif" @if($item->status == 'Tidak Aktif') selected @endif>Tidak Aktif</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                <a href="{{route('thnakademik.index')}}" class="btn btn-secondary btn-sm">Kembali</a>
            </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection