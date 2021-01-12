@extends('layouts.admin.admin')

@section('title')
    Data User
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data User</h1>
        {{-- <form action="/siswa" class="form-inline my-3 my-lg-0 pb-3" method="GET">
          <input type="search" class="form-control mr-sm2" placeholder="Search" aria-label="Search" name="cari">
          <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
        </form> --}}
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <a href="{{route('user.create')}}" class="btn btn-primary btn-sm mb-3 px-3 py-2">
              <i class="fas fa-plus mr-2"></i>
              Tambah Data User
            </a>
            <div class="table-responsive">
              <table id="User" class="table table-striped table-bordered text-center table-sm" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($items as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->username}}</td>
                        <td>{{$item->role}}</td>
                        <td>
                            <a href="{{route('user.edit', $item->id)}}" class="btn btn-circle btn-sm btn-warning">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-circle btn-danger delete" user-id="{{$item->id}}">
                              <i class="fa fa-trash"></i>
                            </a>
                            {{-- <form action="{{route('user.destroy', $item->id)}}" onclick=”return confirm(‘Yakin Hapus?’)” method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-circle btn-sm btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form> --}}
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
              {{-- {{$items->links()}} --}}
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
          $('#User').DataTable();
        } );
      </script>
      <script>
        $('.delete').click(function(){
          var $userid = $(this).attr('user-id');
          swal({
            title: "Apakah Kamu Yakin",
            text: "Data User Akan Terhapus",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
              console.log(willDelete);
            if (willDelete) {
              window.location = "user/"+$userid+"/hapus";
            } else {
              swal("Data Tidak Terhapus");
            }
          });
        })
      </script>
      <script>
        @if (Session::has('status'))
          toastr.success("{{Session::get('status')}}", "Trimakasih")
        @endif
      </script>
@endpush