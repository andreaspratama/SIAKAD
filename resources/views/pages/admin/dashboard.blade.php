@extends('layouts.admin.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
      @foreach ($items as $item)
        <div class="row">
            <div class="col text-center">
                <h2>
                  Sistem Informasi Akademik
                </h2>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col text-center">
              <img src="{{Storage::url($item->image)}}" alt="" style="width: 170px">
            </div>
        </div>
        <div class="row mt-4">
            <div class="col text-center">
              <h4>{{$item->nama}}</h4>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
              <p>{{$item->alamat}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
              <p>{{$item->email}} / {{$item->no_tlpn}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col text-center">
              <p>Akreditasi {{$item->akreditasi}}</p>
            </div>
        </div>
      @endforeach
    </div>
    <!-- /.container-fluid -->
@endsection