@extends('layouts.admin.admin')

@section('title')
    Dashboard
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
      </div>

      <!-- Content Row -->
      <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Data Siswa</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{$siswa}}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Data Guru</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{$guru}}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Mata Pelajaran</div>
                  <div class="row no-gutters align-items-center">
                    <div class="col-auto">
                      <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$mapel}}</div>
                    </div>
                  </div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
          <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
              <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Ruang Kelas</div>
                  <div class="h5 mb-0 font-weight-bold text-gray-800">{{$ruang}}</div>
                </div>
                <div class="col-auto">
                  <i class="fas fa-comments fa-2x text-gray-300"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->
    {{-- <!-- Begin Page Content -->
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
      @foreach ($akademiks as $akademik)
        <div class="row">
          <div class="col text-center">
            <p>Tahun Ajaran {{$akademik->tahun_akademik}}</p>
          </div>
        </div>
      @endforeach
    </div>
    <!-- /.container-fluid --> --}}
@endsection
