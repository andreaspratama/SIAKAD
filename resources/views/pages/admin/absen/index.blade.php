@extends('layouts.admin.admin')

@section('title')
    Data Absen Guru
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 text-gray-800">Data Absen Guru</h1>
        
        <a href="{{route('absenguru.cetakexcel')}}" class="btn btn-success btn-sm mb-3 px-3 py-2">Laporan Excel</a>
        <a href="{{route('absenguru.cetakpdf')}}" class="btn btn-danger btn-sm mb-3 px-3 py-2">Laporan PDF</a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <div class="table-responsive">
              <table id="tableAbsen" class="table table-striped table-bordered text-center table-sm" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Keluar</th>
                    <th>Catatan</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($items as $item)
                    <tr>
                      <td>{{$loop->iteration}}</td>
                      <td>{{$item->user->name}}</td>
                      <td>{{$item->tanggal}}</td>
                      <td>{{$item->time_in}}</td>
                      <td>{{$item->time_out}}</td>
                      <td>{{$item->note}}</td>
                    </tr>
                  @endforeach
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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      <script>
        $(document).ready(function() {
          $('#tableAbsen').DataTable();
        } );
      </script>
      <script>
        $('.delete').click(function(){
          var $absennama = $(this).attr('absen-nama');
          var $absenid = $(this).attr('absen-id');
          swal({
            title: "Apakah Kamu Yakin",
            text: "Data Absen "+$absennama+" Akan Terhapus",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
              console.log(willDelete);
            if (willDelete) {
              window.location = "absen/"+$absenid+"/destroy";
            } else {
              swal("Data "+$absennama+" Tidak Terhapus");
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