@extends('layouts.admin.admin')

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
                  <label for="is_aktiv">Is Aktiv</label>
                  <select class="form-control" name="is_aktiv" required>
                    <option value="Aktiv" @if($item->is_aktiv == 'Aktiv') selected @endif>Aktiv</option>
                    <option value="Tidak Aktiv" @if($item->is_aktiv == 'Tidak Aktiv') selected @endif>Tidak Aktiv</option>
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