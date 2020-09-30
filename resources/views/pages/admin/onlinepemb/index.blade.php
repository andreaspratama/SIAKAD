@extends('layouts.app')

@section('title')
    Upload Bukti Pembayaran | SD IT Bunayya 
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800 mt-4 mb-2">Upload Bukti Pembayaran</h1>

        <!-- DataTales Example -->
        <div class="card shadow">
            <div class="card-body">
                <form class="col-lg-8 ml-auto mr-auto" action="{{route('upload.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label for="nisn">NISN</label>
                      <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn" name="nisn" placeholder="Masukan Nisn..." value="{{old('nisn')}}">
                      @error('nisn')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" placeholder="Masukan Nama..." value="{{old('nama')}}">
                      @error('nama')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                      @enderror
                    </div>
                    <div class="form-group">
                        <label for="jenispem_id">Jenis Pembayaran</label>
                        <select class="form-control @error('jenispem_id') is-invalid @enderror" id="jenispem_id" name="jenispem_id">
                          <option>-- Pilih Jenis Pembayaran --</option>
                          @foreach ($jenispems as $jp)
                            <option value="{{$jp->id}}">{{$jp->jenis}}</option>
                          @endforeach
                        </select>
                        @error('jenispem_id')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal" name="tanggal" placeholder="Masukan Tanggal..." value="{{old('tanggal')}}">
                        @error('tanggal')
                          <div class="invalid-feedback">
                              {{$message}}
                          </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas">
                          <option>-- Pilih Kelas --</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                        </select>
                        @error('kelas')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Foto Bukti</label>
                        <input type="file" class="form-control-file @error('image') is-invalid @enderror" name="image">
                        @error('image')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Upload Bukti Pembayaran</button>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
    @include('sweetalert::alert')
@endsection