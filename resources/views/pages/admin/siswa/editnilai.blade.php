@extends('layouts.admin.admin')

@section('title')
    Tambah atau Edit Nilai
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Tambah Nilai Siswa {{$item->nama}}</h1>

        <div class="card shadow">
            <div class="card-body">
              <form action="/siswa/{{$item->id}}/nilaiupdate" method="POST">
                @csrf
                <label for="mapel">Mapel</label>
                <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="mapel"><i class="fas fa-book-reader"></i></span>
                </div>
                <select class="custom-select" name="mapel" required>
                    <option value="{{$nilai->pivot->mapel_id}}">-- Ubah Mapel Bila Perlu --</option>
                    @foreach ($mapel as $mapel)
                        <option value="{{$mapel->id}}">
                        {{$mapel->nama_mapel}}
                        </option>
                    @endforeach
                </select>
                </div>
                <div class="form-group">
                    <label for="nilai">Nilai UH1</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="nilai"><i class="far fa-id-card"></i></span>
                      </div>
                      <input type="text" class="form-control @error('nilai') is-invalid @enderror" placeholder="Nilai UH1" name="nilai_uh1" value="{{$nilai->pivot->nilai_uh1}}">
                      @error('nilai')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="nilai">Nilai UH2</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="nilai"><i class="far fa-id-card"></i></span>
                      </div>
                      <input type="text" class="form-control @error('nilai') is-invalid @enderror" placeholder="Nilai UH2" name="nilai_uh2" value="{{$nilai->pivot->nilai_uh2}}">
                      @error('nilai')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="nilai">UTS</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="nilai"><i class="far fa-id-card"></i></span>
                      </div>
                      <input type="text" class="form-control @error('nilai') is-invalid @enderror" placeholder="UTS" name="uts" value="{{$nilai->pivot->uts}}">
                      @error('nilai')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="nilai">UAS</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="nilai"><i class="far fa-id-card"></i></span>
                      </div>
                      <input type="text" class="form-control @error('nilai') is-invalid @enderror" placeholder="UAS" name="uas" value="{{$nilai->pivot->uas}}">
                      @error('nilai')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="status"><i class="far fa-id-card"></i></span>
                      </div>
                      <input type="text" class="form-control @error('status') is-invalid @enderror" placeholder="Status" name="status" value="{{$nilai->pivot->status}}">
                      @error('status')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                </div>
                <button class="btn btn-primary btn-sm" type="submit">Simpan</button>
              </form>
            </div>
        </div>

    </div>
@endsection


@push('prepend-style')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
@endpush

@push('addon-script')
      {{-- <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script> --}}
      <script>
        @if (Session::has('status'))
          toastr.success("{{Session::get('status')}}", "Trimakasih")
        @endif

        $.fn.editable.defaults.mode = 'inline';

        $(document).ready(function() {
            $('.nilai_uh1').editable();
        });
        $(document).ready(function() {
            $('.nilai_uh2').editable();
        });
        $(document).ready(function() {
            $('.uts').editable();
        });
        $(document).ready(function() {
            $('.uas').editable();
        });
        $(document).ready(function() {
            $('.status').editable();
        });
      </script>
@endpush