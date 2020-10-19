@extends('layouts.app')

@section('title')
    Info Akademik   
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800 mt-4 mb-2">{{$item->judul}} <span class="tgl">{{$item->tanggal}}</span></h1>

        <!-- DataTales Example -->
        <div class="card shadow">
            <div class="card-body">
                <img src="{{Storage::url($item->image)}}" alt="" width="250px" class="mb-3">
                <p>
                    {{$item->deskripsi}}
                </p>
            </div>
            <a href="/home" class="btn btn-secondary btn-sm">Kembali</a>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

@push('addon-style')
    <style>
        .tgl {
            font-size: 18px;
            margin-left: 20px;
        }

        img {
            float: left;
        }

        p {
            text-align: justify
        }

        .btn {
            width: 100px;
            margin-left: 20px;
            margin-bottom: 15px;
        }
    </style>
@endpush