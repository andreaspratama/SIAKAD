@extends('layouts.admin.admin')

@section('title')
    
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800 mt-4 mb-4">Masukan Nilai</h1>
        
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nama</th>
                      <th width="200px">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($items as $item)
                      <tr>
                        <td>{{$item->nama}}</td>
                        <td>
                          <a href="/siswa/{{$item->id}}/nilai" class="btn btn-primary btn-sm">Tambah</a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
            {{-- <div class="table-responsive">
              <table class="table table-bordered text-center" id="tablethnakademik" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Tahun Akademik</th>
                    <th>Semester</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($items as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->tahun_akademik}}</td>
                        <td>{{$item->semester}}</td>
                        <td>{{$item->status}}</td>
                        <td>
                            <a href="{{route('thnakademik.edit', $item->id)}}" class="btn btn-sm btn-circle btn-warning">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{route('thnakademik.destroy', $item->id)}}" method="POST" class="d-inline">
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
            </div> --}}
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
