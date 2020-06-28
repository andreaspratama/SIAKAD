@extends('layouts.admin.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Siswa</h1>
        
        <a href="/siswa/exportexcel" class="btn btn-success btn-sm mb-3 mt-3 px-3 py-2">Laporan Excel</a>
        <a href="/siswa/exportpdf" class="btn btn-danger btn-sm mb-3 mt-3 px-3 py-2">Laporan PDF</a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <a href="/siswa/create" class="btn btn-primary btn-sm mb-3 px-3 py-2">
              <i class="fas fa-plus mr-2"></i>
              Tambah Data Siswa
            </a>
            <div class="table-responsive">
              <table id="tableSiswa" class="table table-striped table-bordered text-center table-sm" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nisn</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($items as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nisn}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->kelas}}</td>
                        <td>
                          <a href="/siswa/{{$item->id}}/show"" class="btn btn-circle btn-success btn-sm">
                              <i class="fa fa-eye"></i>
                          </a>
                          <a href="/siswa/{{$item->id}}/edit"" class="btn btn-circle btn-warning btn-sm">
                              <i class="fa fa-edit"></i>
                          </a>
                          <a href="#" class="btn btn-sm btn-circle btn-danger delete" siswa-nama="{{$item->nama}}" siswa-id="{{$item->id}}">
                              <i class="fa fa-trash"></i>
                          </a>
                        </td>
                    </tr>
                  @empty
                    <tr>
                        <td colspan="5" class="text-center">
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
          $('#tableSiswa').DataTable();
        } );
      </script>
      <script>
        $('.delete').click(function(){
          var $siswanama = $(this).attr('siswa-nama');
          var $siswaid = $(this).attr('siswa-id');
          swal({
            title: "Apakah Kamu Yakin",
            text: "Data Siswa "+$siswanama+" Akan Terhapus",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
              console.log(willDelete);
            if (willDelete) {
              window.location = "siswa/"+$siswaid+"/destroy";
            } else {
              swal("Data "+$siswanama+" Tidak Terhapus");
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