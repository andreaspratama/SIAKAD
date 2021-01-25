@extends('layouts.admin.admin')

@section('title')
    Data Sekolah
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <a href="{{route('sekolah.create')}}" class="btn btn-primary btn-sm mb-3 px-3 py-2">
              <i class="fas fa-plus mr-2"></i>
              Tambah Data
            </a>
            <div class="table-responsive">
              <table class="table table-bordered text-center table-sm" id="tabledatasekolah" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>No Telepon</th>
                    <th>Akreditasi</th>
                    <th>Kepala Sekolah</th>
                    <th>Image</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($items as $item)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$item->nama}}</td>
                      <td>{{$item->alamat}}</td>
                      <td>{{$item->email}}</td>
                      <td>{{$item->no_tlpn}}</td>
                      <td>{{$item->akreditasi}}</td>
                      <td>{{$item->kepala_sklh}}</td>
                      <td>
                          <img src="{{Storage::url($item->image)}}" alt="" style="width: 250px" class="img-thumbnail">
                      </td>
                      <td>
                          <a href="{{route('sekolah.edit', $item->id)}}" class="btn btn-circle btn-sm btn-warning">
                              <i class="fa fa-edit"></i>
                          </a>
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
          $('#tabledatasekolah').DataTable();
        } );
      </script>
      <script>
        @if (Session::has('status'))
          toastr.success("{{Session::get('status')}}", "Trimakasih")
        @endif
      </script>
@endpush