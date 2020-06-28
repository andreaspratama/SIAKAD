@extends('layouts.admin.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Detail Pembayaran Spp {{$item->siswa->nama}}</h1>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <td>{{$item->siswa->nama}}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{$item->thnakademik->tahun_akademik}}</td>
                    </tr>
                    <tr>
                        <th>Semester</th>
                        <td>{{$item->semester}}</td>
                    </tr>
                    <tr>
                        <th>Jenis Pembayaran</th>
                        <td>{{$item->jenispembayaran->jenis_pembayaran}}</td>
                    </tr>
                    <tr>
                        <th>Nominal</th>
                        <td>{{$item->jumlah}}</td>
                    </tr>
                </table>
                <a href="{{route('pembayaran.index')}}" class="btn btn-secondary btn-sm">Kembali</a>
            </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection