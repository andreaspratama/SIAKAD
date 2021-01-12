@extends('layouts.admin.admin')

@section('title')
    Data Pembayaran Online
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Pembayaran Online</h1>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <a href="{{route('pembayaranonline.cetakexcel')}}" class="btn btn-success btn-sm mb-3 px-3 py-2">Laporan Excel</a>
            <a href="{{route('pembayaranonline.cetakpdf')}}" class="btn btn-danger btn-sm mb-3 px-3 py-2">Laporan PDF</a>
            <div class="table-responsive">
              <table class="table table-striped table-sm table-bordered text-center" id="tableMapel" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($items as $item)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$item->nama}}</td>
                      <td>{{$item->kelas}}</td>
                      <td>
                        <img src="{{Storage::url($item->image)}}" alt="" class="img-thumbnail" height="30%" width="40%">
                      </td>
                      <td>
                        <a href="{{route('detail.pemb', $item->id)}}" class="btn btn-info btn-sm btn-circle"><i class="fas fa-eye"></i></a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
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
          $('#tableMapel').DataTable();
        } );
      </script>
      <script>
        @if (Session::has('status'))
          toastr.success("{{Session::get('status')}}", "Trimakasih")
        @endif
      </script>
@endpush