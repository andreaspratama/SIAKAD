@extends('layouts.admin.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Ruang Kelas</h1>
        
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <a href="{{route('ruang.create')}}" class="btn btn-primary btn-sm mb-3 px-3 py-2">
              <i class="fas fa-plus mr-2"></i>
              Tambah Data
            </a>
            <div class="table-responsive">
              <table class="table table-striped table-sm table-bordered text-center" id="tableRuang" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Ruang</th>
                    <th>Nama Ruang Kelas</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($items as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->kode_ruang}}</td>
                        <td>{{$item->nama_ruang}}</td>
                        <td>
                            <a href="{{route('ruang.edit', $item->id)}}" class="btn btn-circle btn-sm btn-warning">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{route('ruang.destroy', $item->id)}}" method="POST" class="d-inline">
                              @csrf
                              @method('delete')
                              <button class="btn btn-circle btn-sm btn-danger">
                                  <i class="fa fa-trash"></i>
                              </button>
                          </form>
                        </td>
                    </tr>
                  @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                  @endforelse
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
          $('#tableRuang').DataTable();
        } );
      </script>
      <script>
        @if (Session::has('status'))
          toastr.success("{{Session::get('status')}}", "Trimakasih")
        @endif
      </script>
@endpush