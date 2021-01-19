@extends('layouts.admin.admin')

@section('title')
    Data Pembayaran
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Pembayaran</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="{{route('pembayaran.store')}}" method="POST">
              @csrf
              <div class="row">

                <div class="col-lg-6">
    
                  <!-- Default Card Example -->
                  <div class="card mb-4">
                    <div class="card-header">
                      Data Siswa
                    </div>
                    <div class="card-body">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-code"></i></span>
                        </div>
                        <input type="text" class="form-control @error('nisn') is-invalid @enderror" placeholder="NISN..." name="nisn" aria-describedby="basic-addon1" value="{{old('nisn')}}">
                        @error('nisn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" placeholder="Nama..." name="nama" aria-describedby="basic-addon1" value="{{old('nama')}}">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-layer-group"></i></label>
                        </div>
                        <select class="custom-select @error('kelas') is-invalid @enderror" id="inputGroupSelect01" name="kelas">
                          <option selected>-- Pilih Kelas --</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                        </select>
                        @error('kelas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>
                  </div>
    
                </div>
    
                <div class="col-lg-6">
    
                  <!-- Default Card Example -->
                  <div class="card mb-4">
                    <div class="card-header">
                      Data Pembayaran
                    </div>
                    <div class="card-body">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-money-check-alt"></i></label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="jenispem_id">
                          <option selected>-- Pilih Pembayaran --</option>
                          @foreach ($jenispems as $jenis)
                            <option value="{{$jenis->id}}">{{$jenis->jenis}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                        <input type="text" class="form-control @error('jum_pemb') is-invalid @enderror" placeholder="Jumlah Pembayaran..." name="jum_pemb" aria-describedby="basic-addon1" value="{{old('jum_pemb')}}">
                        @error('jum_pemb')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-info-circle"></i></span>
                        </div>
                        <input type="text" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Keterangan..." name="keterangan" aria-describedby="basic-addon1" value="{{old('keterangan')}}">
                        @error('keterangan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      <button class="btn btn-primary">Transaksi</button>
                    </div>
                  </div>
    
                </div>
    
              </div>
            </form>
          </div>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <a href="{{route('pembayaran.cetakexcel')}}" class="btn btn-success btn-sm mb-3 px-3 py-2">Laporan Excel</a>
            <a href="{{route('pembayaran.cetakpdf')}}" class="btn btn-danger btn-sm mb-3 px-3 py-2">Laporan PDF</a>
            <div class="table-responsive">
              <table class="table table-striped table-sm table-bordered text-center" id="tablePembayaran" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Pembayaran</th>
                    <th>Jumlah Bayar</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($items as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->nama}}</td>
                        <td>
                          @if ($item->jenispem == null)
                              Jenis Pembayaran Terhapus
                          @else
                              {{$item->jenispem->jenis}}
                          @endif
                        </td>
                        <td>Rp. {{number_format($item->jum_pemb)}}</td>
                        <td>{{$item->tanggal}}</td>
                        <td>
                            <a href="{{route('pembayaran.show', $item->id)}}" class="btn btn-circle btn-sm btn-info">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{route('pembayaran.edit', $item->id)}}" class="btn btn-circle btn-sm btn-warning">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-circle btn-danger delete" pembayaran-id="{{$item->id}}">
                              <i class="fa fa-trash"></i>
                            </a>
                            {{-- <form action="{{route('pembayaran.destroy', $item->id)}}" method="POST" class="d-inline">
                              @csrf
                              @method('delete')
                              <button class="btn btn-circle btn-sm btn-danger">
                                  <i class="fa fa-trash"></i>
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
        $('.delete').click(function(){
          var $pembayaranid = $(this).attr('pembayaran-id');
          swal({
            title: "Apakah Kamu Yakin",
            text: "Data Pembayaran Akan Terhapus",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
          .then((willDelete) => {
              console.log(willDelete);
            if (willDelete) {
              window.location = "pembayaran/"+$pembayaranid+"/hapus";
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