@extends('layouts.admin.admin')

@section('title')
    Jadwal Mengajar
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-3 text-gray-800 mt-4">
          @if (auth()->user()->guru->jns_kelamin == 'L')
              Jadwal Bapak {{auth()->user()->name}}
          @else
              Jadwal Ibu {{auth()->user()->name}}
          @endif
        </h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Mapel</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Ruang</th>
                    <th>Hari</th>
                    <th>Jam Mulai</th>
                    <th>Jam Selesai</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($items as $item)
                    @if (auth()->user()->name === $item->guru->nama)
                      <tr>
                        <td>{{$item->mapel->nama_mapel}}</td>
                        <td>{{$item->guru->nama}}</td>
                        <td>{{$item->kelas}}</td>
                        <td>{{$item->ruang->nama_ruang}}</td>
                        <td>{{$item->hari}}</td>
                        <td>{{$item->jam_mulai}}</td>
                        <td>{{$item->jam_selesai}}</td>
                      </tr>
                    @endif
                  @endforeach
                  {{-- @forelse (auth()->user()->guru->mapel as $mapel)
                      <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{$mapel->nama_mapel}}</td>
                          <td>{{$mapel->pivot->kelas}}</td>
                          <td>{{$mapel->pivot->ruang}}</td>
                          <td>{{$mapel->pivot->hari}}</td>
                          <td>{{$mapel->pivot->jam_mulai}}</td>
                          <td>{{$mapel->pivot->jam_selesai}}</td>
                      </tr>
                  @empty
                      
                  @endforelse --}}
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
          $('#dataTable').DataTable();
        } );
      </script>
      <script>
        $('.delete').click(function(){
          var $gurunama = $(this).attr('guru-nama');
          var $guruid = $(this).attr('guru-id');
          swal({
            title: "Apakah Kamu Yakin",
            text: "Data Guru "+$gurunama+" Akan Terhapus",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
              console.log(willDelete);
            if (willDelete) {
              window.location = "guru/"+$guruid+"/destroy";
            } else {
              swal("Data Guru "+$gurunama+" Tidak Terhapus");
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