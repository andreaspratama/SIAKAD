@extends('layouts.admin.admin')

@section('title')
    Detail Pembayaran
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-3 text-gray-800 mt-4">Detail Pembayaran {{$item->nama}}</h1>

        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Nisn</th>
                        <td>{{$item->nisn}}</td>
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
                        <td>
                            @if ($item->jenispem == 0)
                                Jenis Pembayaran Terhapus
                            @else
                                {{$item->jenispem->jenis}}
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>Jumlah Pembayaran</th>
                        <td>Rp. {{number_format($item->jum_pemb)}}</td>
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