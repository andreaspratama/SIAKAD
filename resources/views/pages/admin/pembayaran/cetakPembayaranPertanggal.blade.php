@extends('layouts.admin.admin')

@section('title')
    Cetak Pembayaran
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Laporan Pembayaran</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            {{-- <a href="{{route('pembayaran.cetakexcel')}}" class="btn btn-success btn-sm mb-3 px-3 py-2">Laporan Excel</a>
            <a href="{{route('pembayaran.cetakpdf')}}" class="btn btn-danger btn-sm mb-3 px-3 py-2">Laporan PDF</a> --}}
            <div class="table-responsive">
              <table class="table table-striped table-sm table-bordered text-center" id="tablePembayaran" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Pembayaran</th>
                    <th>Jumlah Bayar</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pembayaranPertanggal as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->jenispem->jenis}}</td>
                        <td>Rp. {{$item->jum_pemb}}</td>
                        <td>{{$item->tanggal}}</td>
                        <td>
                            <a href="{{route('pembayaran.show', $item->id)}}" class="btn btn-circle btn-sm btn-info">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{route('pembayaran.edit', $item->id)}}" class="btn btn-circle btn-sm btn-warning">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{route('pembayaran.destroy', $item->id)}}" method="POST" class="d-inline">
                              @csrf
                              @method('delete')
                              <button class="btn btn-circle btn-sm btn-danger">
                                  <i class="fa fa-trash"></i>
                              </button>
                          </form>
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
          $('#tablePembayaran').DataTable();
        } );
      </script>
      <script>
        @if (Session::has('status'))
          toastr.success("{{Session::get('status')}}", "Trimakasih")
        @endif
      </script>
@endpush