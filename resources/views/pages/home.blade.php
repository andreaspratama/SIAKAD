@extends('layouts.app')

@section('title')
    Home | SD IT Bunayya
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container">
        
        <div class="home">
            @if (auth()->user()->role == 'siswa')
                <h1 class="h3 mb-4 text-gray-800 mt-4 mb-2">Info Akademik</h1>
                @foreach ($infos as $item)
                    <div class="eventEvent" data-aos="zoom-in">
                        <div class="row">
                            <div class="col-lg-3 eventImg">
                                <img src="{{Storage::url($item->image)}}" alt="" class="img-thumbnail">
                            </div>
                            <div class="col-lg-9 eventComponent  align-self-center">
                                <h3>{{$item->judul}}</h3>
                                <div class="detailsEvents">
                                    <div class="detail">
                                        <span><i class="fa fa-calendar"></i></span>
                                        {{$item->tanggal}}
                                    </div>
                                </div>
                                <div class="descriptionEvents">
                                    <p>
                                        {{Str::limit($item->deskripsi, 200, '...')}}
                                    </p>
                                </div>
                                <a href="/home/info/{{$item->slug}}" class="btn btn-read">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            <div class="row">
                        <div class="col align-self-center">
                            @if (auth()->user()->role == 'guru')
                                <h1 class="mb-3">
                                    @if (auth()->user()->role == 'guru')
                                        Selamat Datang Pak {{auth()->user()->name}}
                                    @endif
                                    @if (auth()->user()->role == 'siswa')   
                                        Selamat Datang {{auth()->user()->name}}
                                    @endif
                                </h1>
                                <p class="mb-5">
                                    @if (auth()->user()->role == 'guru')
                                        Selamat Datang di Sistem Informasi Akademik SD IT Bunayya Semarang <br>
                                        {{-- @if (auth()->user()->role == 'guru')
                                            <a href="{{route('dashboard.guru')}}" class="btn btn-primary mt-3">Masuk Dashboard</a>
                                        @endif --}}
                                    @endif
                                    {{-- @if (auth()->user()->role == 'siswa')
                                        Selamat Datang di Sistem Informasi Akademik SD IT Bunayya Semarang <br>
                                    @endif --}}
                                </p>
                            @endif
                        </div>
                        <div class="col d-none d-sm-none d-md-block">
                            @if (auth()->user()->role == 'guru')
                                <img width="450" src="frontend/images/pend.jpg" alt="">
                            @endif
                            {{-- @if (auth()->user()->role == 'siswa')
                                <img width="450" src="frontend/images/pend.jpg" alt="">
                            @endif --}}
                        </div>
            </div>
            @if (auth()->user()->role == 'admin')
                <div class="row">
                    <div class="info ml-auto mr-auto mt-3">
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
                            {{-- <div class="row">
                                <div class="col text-center">
                                <p>Tahun Ajaran {{$thnakademik->tahun_akademik}} / {{$thnakademik->semester}}</p>
                                </div>
                            </div> --}}
                        {{-- @foreach ($thnakademik as $akademik)
                            <div class="row">
                            <div class="col text-center">
                                <p>Tahun Ajaran {{$akademik->tahun_akademik}}</p>
                            </div>
                            </div>
                        @endforeach --}}
                    </div>
                </div>
            @endif
            {{$infos->links()}}
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection