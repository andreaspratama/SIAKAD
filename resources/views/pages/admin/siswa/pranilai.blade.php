@extends('layouts.admin.admin')

@section('title')
    Proses Nilai
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Pilih Siswa</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <label for="">Kelas</label>
            <select class="form-control mb-3" id="kelas">
              <option>-- Pilih Kelas --</option>
              @foreach ($pnilai as $pn)
                <option value={{$pn->kelas}}>{{$pn->kelas}}</option>
              @endforeach
            </select>
            <a href="" onclick="this.href='/guru/nilaiProsesKelas/'+ document.getElementById('kelas').value" class="btn btn-primary"><i class="fas fa-spinner mr-2"></i>Proses Nilai</a>
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
          $('#tablePembayaran').DataTable();
        } );
      </script>
      <script>
        @if (Session::has('status'))
          toastr.success("{{Session::get('status')}}", "Trimakasih")
        @endif
      </script>
@endpush