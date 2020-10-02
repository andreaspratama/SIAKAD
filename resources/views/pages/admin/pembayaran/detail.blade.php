@extends('layouts.admin.admin')

@section('title')
    Detail Pembayaran
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-3 text-gray-800 mt-4">Detail Transaksi {{$item->nama}}</h1>

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Nis</th>
                        <td>{{$item->nis}}</td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>{{$item->nama}}</td>
                    </tr>
                    <tr>
                        <th>Kelas</th>
                        <td>{{$item->kelas}}</td>
                    </tr>
                    <tr>
                        <th>Jenis Pembayaran</th>
                        <td>{{$item->jenispem->jenis}}</td>
                    </tr>
                    <tr>
                        <th>Jumlah Pembayaran</th>
                        <td>Rp. {{$item->jum_pemb}}</td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td>{{$item->tanggal}}</td>
                    </tr>
                    <tr>
                        <th>Keterangan</th>
                        <td>{{$item->keterangan}}</td>
                    </tr>
                </table>
                <a href="{{route('pembayaran.index')}}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
      </div>
      <!-- /.container-fluid -->
@endsection