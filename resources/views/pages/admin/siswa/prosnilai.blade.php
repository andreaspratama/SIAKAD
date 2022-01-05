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
            
            {{-- <a href="{{route('pembayaran.cetakpdf')}}" class="btn btn-danger btn-sm mb-3 px-3 py-2">Laporan PDF</a> --}}
            <div class="table-responsive">
              <table class="table table-striped table-sm table-bordered text-center" id="tablePembayaran" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pnilai as $pn)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$pn->nama}}</td>
                        <td>{{$pn->kelas}}</td>
                        <td>
                            <a href="/siswa/{{$pn->id}}/nilai" class="btn btn-sm btn-primary">
                                Nilai
                            </a>
                            {{-- <a href="{{route('pembayaran.edit', $pn->id)}}" class="btn btn-circle btn-sm btn-warning">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{route('pembayaran.destroy', $pn->id)}}" method="POST" class="d-inline">
                              @csrf
                              @method('delete')
                              <button class="btn btn-circle btn-sm btn-danger">
                                  <i class="fa fa-trash"></i>
                              </button>
                          </form> --}}
                          <a href="/siswa/{{$pn->id}}/nilai/detail" class="btn btn-sm btn-success">
                            Detail
                          </a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <a href="/guru/nilai" class="btn btn-secondary btn-sm mt-3 px-3 py-2"><i class="fas fa-backward mr-2"></i> Input Nilai Kelas Lain</a>
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