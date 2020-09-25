@extends('layouts.app')

@section('title')
    Tugas Kelas
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-3 text-gray-800 mt-4">Tugas Pak {{auth()->user()->guru->nama}}</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
              <div class="row mb-3">
                  <div class="col-lg-6 p-2" style="background-color: red">
                    @foreach ($items as $item)
                    <div class="card mb-3">
                      <div class="card-header">
                        {{$item->title}} {{$item->tanggal}}
                      </div>
                      <div class="card-body">
                        <h5 class="card-title">{{$item->title}}</h5>
                        <h6 class="card-text">Kelas : {{$item->kelas}}</h6>
                        <h6 class="card-text">Batas Waktu : {{$item->deadline}}</h6>
                        <p class="card-text">{{$item->deskripsi}}</p>
                        <a href="#" class="btn btn-primary float-right">Detail</a>
                      </div>
                    </div>
                    @endforeach
                  </div>
                  <div class="col-lg-6 p-2">
                    <form action="/guru/store" method="POST">
                        @csrf
                        <div class="form-group">
                          <label for="title">Title</label>
                          <div class="input-group">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Title..." name="title" value="{{old('title')}}">
                            @error('title')
                              <div class="invalid-feedback">
                                  {{$message}}
                              </div>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="deadline">Deadline</label>
                          <div class="input-group">
                            <input type="date" class="form-control @error('deadline') is-invalid @enderror" placeholder="Deadline..." name="deadline" value="{{old('deadline')}}">
                            @error('deadline')
                              <div class="invalid-feedback">
                                  {{$message}}
                              </div>
                            @enderror
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="kelas">Kelas</label>
                          <div class="input-group mb-3">
                            <select class="custom-select" name="kelas">
                              <option>-- Pilih --</option>
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                              <option value="6">6</option>
                            </select>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="deskripsi">Deskripsi</label>
                          <div class="input-group">
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" rows="3" placeholder="Deskripsi..."></textarea>
                            @error('deskripsi')
                              <div class="invalid-feedback">
                                  {{$message}}
                              </div>
                            @enderror
                          </div>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                        <button type="reset" class="btn btn-warning btn-sm">Reset</button>
                    </form>
                  </div>
              </div>
              <div class="row">
                <div class="col text-center">
                  {{ $items->links() }}
                </div>
              </div>
          </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection