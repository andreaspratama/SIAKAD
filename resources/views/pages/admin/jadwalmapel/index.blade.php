@extends('layouts.admin.admin')

@section('title')
    Data Jadwal Mata Pelajaran
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 text-gray-800">Jadwal Mata Pelajaran</h1>

        <a href="/jadwalmapel/exportexcel" class="btn btn-success btn-sm mb-3 px-3 py-2">Laporan Excel</a>
        <a href="/jadwalmapel/exportpdf" class="btn btn-danger btn-sm mb-3 px-3 py-2">Laporan PDF</a>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <a href="/jadwalmapel/create" class="btn btn-primary btn-sm mb-3 px-3 py-2">
              <i class="fas fa-plus mr-2"></i>
              Tambah Jadwal
            </a>
            <div class="table-responsive">
              <table class="table table-striped table-sm table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Mapel</th>
                    <th>Guru</th>
                    <th>Kelas</th>
                    <th>Ruang</th>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($items as $item)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$item->mapel->nama_mapel}}</td>
                      <td>{{$item->guru->nama}}</td>
                      <td>{{$item->kelas}}</td>
                      <td>{{$item->ruang->nama_ruang}}</td>
                      <td>{{$item->hari}}</td>
                      <td>{{$item->jam_mulai}}</td>
                      <td>{{$item->jam_selesai}}</td>
                      <td>
                          <a href="/jadwalmapel/{{$item->id}}/edit" class="btn btn-circle btn-sm btn-warning">
                              <i class="fa fa-edit"></i>
                          </a>
                          <a href="#" class="btn btn-sm btn-circle btn-danger delete" jmapel-id="{{$item->id}}">
                              <i class="fa fa-trash"></i>
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
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
      <script>
        $(document).ready(function() {
          $('#dataTable').DataTable();
        } );
      </script>
      <script>
        $('.delete').click(function(){
          // var $jmapelnama = $(this).attr('jmapel-nama');
          var $jmapelid = $(this).attr('jmapel-id');
          swal({
            title: "Apakah Kamu Yakin",
            text: "Data Jadwal  Mapel Akan Terhapus",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
              console.log(willDelete);
            if (willDelete) {
              window.location = "jadwalmapel/"+$jmapelid+"/destroy";
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