@extends('layouts.admin.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Ruang Kelas</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="{{route('thnakademik.store')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="tahun_akademik">Tahun Akademik</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="tahun_akademik"><i class="far fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control @error('tahun_akademik') is-invalid @enderror" placeholder="Tahun Akademik" name="tahun_akademik" value="{{old('tahun_akademik')}}">
                    @error('tahun_akademik')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="is_aktiv">Aktive</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="is_aktiv"><i class="fas fa-check"></i></label>
                    </div>
                    <select class="custom-select" name="is_aktiv">
                      <option>-- Pilih --</option>
                      <option value="Aktive">Aktive</option>
                      <option value="Tidak Aktive">Tidak Aktive</option>
                    </select>
                  </div>
                </div>
                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                <button type="reset" class="btn btn-warning btn-sm">Reset</button>
                <a href="{{route('thnakademik.index')}}" class="btn btn-secondary btn-sm">Kembali</a>
            </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection