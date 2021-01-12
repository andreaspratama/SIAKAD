@extends('layouts.admin.admin')

@section('title')
    Edit Pembayaran
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Ubah Pembayaran Atas Nama {{$item->nama}}</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="{{route('pembayaran.update', $item->id)}}" method="POST">
              @csrf
              @method('PUT')
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
                        <input type="text" class="form-control" placeholder="NISN..." name="nisn" value="{{$item->nisn}}" aria-describedby="basic-addon1">
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Nama..." name="nama" value="{{$item->nama}}" aria-describedby="basic-addon1">
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <label class="input-group-text" for="inputGroupSelect01"><i class="fas fa-layer-group"></i></label>
                        </div>
                        <select class="custom-select" id="inputGroupSelect01" name="kelas">
                          <option selected>Kelas...</option>
                          <option value="1" @if($item->kelas == '1') selected @endif>1</option>
                          <option value="2" @if($item->kelas == '2') selected @endif>2</option>
                          <option value="3" @if($item->kelas == '3') selected @endif>3</option>
                          <option value="4" @if($item->kelas == '4') selected @endif>4</option>
                          <option value="5" @if($item->kelas == '5') selected @endif>5</option>
                          <option value="6" @if($item->kelas == '6') selected @endif>6</option>
                        </select>
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
                          <option value="{{$item->jenispem_id}}">-- Ubah Bila Perlu --</option>
                          @foreach ($jenispems as $jenis)
                            <option value="{{$jenis->id}}">{{$jenis->jenis}}</option>
                          @endforeach
                        </select>
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-dollar-sign"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Jumlah Pembayaran..." value="{{$item->jum_pemb}}" name="jum_pemb" aria-describedby="basic-addon1">
                      </div>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-info-circle"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Keterangan..." name="keterangan" value="{{$item->keterangan}}" aria-describedby="basic-addon1">
                      </div>
                      <button class="btn btn-primary">Ubah Pembayaran</button>
                      <a href="{{route('pembayaran.index')}}" class="btn btn-secondary">Batal</a>
                    </div>
                  </div>
    
                </div>
    
              </div>
            </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection