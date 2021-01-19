@extends('layouts.admin.admin')

@section('title')
    Data Siswa Tinggal Kelas
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 text-gray-800">Siswa Tinggal Kelas</h1>

        <a href="{{route('tglkelas.cetakexcel')}}" class="btn btn-success btn-sm mb-3 px-3 py-2">Laporan Excel</a>
        <a href="{{route('tglkelas.cetakpdf')}}" class="btn btn-danger btn-sm mb-3 px-3 py-2">Laporan PDF</a>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <a href="{{route('tinggalkelas.create')}}" class="btn btn-primary btn-sm mb-3 px-3 py-2">
              <i class="fas fa-plus mr-2"></i>
              Tambah Data
            </a>
            <div class="table-responsive">
              <table class="table table-striped table-sm table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Asal Kelas</th>
                    <th>Tinggal Kelas</th>
                    <th>Tahun Akademik</th>
                    <th>Alasan</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($items as $item)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$item->nisn}}</td>
                      <td>{{$item->nama}}</td>
                      <td>{{$item->asal_kls}}</td>
                      <td>{{$item->tgl_kls}}</td>
                      <td>
                        @if ($item->thnakademik == null)
                            Tahun Akademik Terhapus
                        @else
                            {{$item->thnakademik->tahun_akademik}}
                        @endif
                      </td>
                      <td>{{$item->alasan}}</td>
                      <td>
                          <a href="{{route('tinggalkelas.edit', $item->id)}}" class="btn btn-circle btn-sm btn-warning">
                              <i class="fa fa-edit"></i>
                          </a>
                          <a href="#" class="btn btn-sm btn-circle btn-danger delete" tgl-id="{{$item->id}}">
                              <i class="fa fa-trash"></i>
                          </a>
                          {{-- <form action="" method="POST" class="d-inline" tgl-id = "{{$item->id}}">
                            @csrf
                            <button class="btn btn-danger btn-sm btn-circle delete">
                              <i class="fas fa-trash"></i>
                            </button>
                          </form> --}}
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
    {{-- @include('sweetalert::alert') --}}
@endsection

@push('prepend-style')
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
@endpush

@push('addon-script')
      <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <script>
        $(document).ready(function() {
          $('#dataTable').DataTable();
        } );
      </script>
      <script>
        $('.delete').click(function(){
          var $tglid = $(this).attr('tgl-id');
          swal({
            title: "Apakah Kamu Yakin",
            text: "Data Akan Terhapus",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
              console.log(willDelete);
            if (willDelete) {
              window.location = "siswa/"+$tglid+"/tinggalkelas";
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