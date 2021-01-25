@extends('layouts.admin.admin')

@section('title')
    Detail Pembayaran Online
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Detail Pembayaran Online {{$item->nama}}</h1>

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Image</th>
                        <td>
                            <img src="{{Storage::url($item->image)}}" alt="" style="width: 500px;height: 350px" class="img-thumbnail">
                        </td>
                    </tr>
                    <tr>
                        <th>Nisn</th>
                        <td>{{$item->nisn}}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{$item->nama}}</td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>{{$item->tanggal}}</td>
                    </tr>
                    <tr>
                        <th>Jenis Pembayaran</th>
                        <td>
                            @if ($item->jenispem == null)
                                Jenis Pembayaran Terhapus
                            @else
                                {{$item->jenispem->jenis}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td>{{$item->kelas}}</td>
                    </tr>
                </table>
                <a href="{{route('online.pemb')}}" class="btn btn-secondary btn-sm">Kembali</a>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    {{-- <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Nilai</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <form action="/pembayaran online/{{$item->id}}/nilai" method="POST">
                    @csrf
                    <label for="mapel">Mapel</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="mapel"><i class="fas fa-book-reader"></i></span>
                    </div>
                    <select class="custom-select" name="mapel" required>
                        <option>-- Pilih Mapel --</option>
                        @foreach ($matapelajarans as $matapelajaran)
                            <option value="{{$matapelajaran->id}}">
                            {{$matapelajaran->nama_mapel}}
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
                          <input type="text" class="form-control @error('nilai') is-invalid @enderror" placeholder="Nilai UH1" name="nilai_uh1" value="{{old('nilai')}}">
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
                          <input type="text" class="form-control @error('nilai') is-invalid @enderror" placeholder="Nilai UH2" name="nilai_uh2" value="{{old('nilai')}}">
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
                          <input type="text" class="form-control @error('nilai') is-invalid @enderror" placeholder="UTS" name="uts" value="{{old('nilai')}}">
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
                          <input type="text" class="form-control @error('nilai') is-invalid @enderror" placeholder="UAS" name="uas" value="{{old('nilai')}}">
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
                          <input type="text" class="form-control @error('status') is-invalid @enderror" placeholder="Status" name="status" value="{{old('status')}}">
                          @error('status')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                          @enderror
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                </form>
            </div>
        </div>
        </div>
    </div> --}}
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