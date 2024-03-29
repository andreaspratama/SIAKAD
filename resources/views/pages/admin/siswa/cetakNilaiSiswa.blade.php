@extends('layouts.admin.admin')

@section('title')
    Cetak Nilai Persemester
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Cetak Nilai Persemester {{$data->nama}}</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <label for="">Kelas</label>
            <select class="form-control mb-3" id="thnakademik">
              @foreach ($items as $item)
                <option value="{{$item->id}}">{{$item->tahun_akademik}} / {{$item->semester}}</option>
              @endforeach
            </select>
            {{-- <label for="">Tahun Akademik</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-day"></i></span>
                </div>
                <input type="date" class="form-control" id="tglawal" name="tglawal" aria-describedby="basic-addon1">
            </div> --}}
            {{-- <label for="">Tanggal Akhir</label>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fas fa-calendar-day"></i></span>
                </div>
                <input type="date" class="form-control" id="tglakhir" name="tglakhir" aria-describedby="basic-addon1">
            </div> --}}
            <a href="" onclick="this.href='/cetakNilaiPeraka/'+ document.getElementById('thnakademik').value" class="btn btn-primary"><i class="fas fa-print mr-2"></i>Cetak Laporan</a>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
@endsection
@push('prepend-style')
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endpush

@push('addon-script')
      <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
      <script>
        $(document).ready(function() {
          $('#tableAbsen').DataTable();
        } );
      </script>
      <script>
        @if (Session::has('status'))
          toastr.success("{{Session::get('status')}}", "Trimakasih")
        @endif
      </script>
@endpush