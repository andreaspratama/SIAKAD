@extends('layouts.app')

@section('title')
    Home | SD IT Bunayya
@endsection

@section('content')
<section class="hero mt-4">
    <div class="container">
        <div class="row">
            <div class="col align-self-center">
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
                    @if (auth()->user()->role == 'siswa')
                        Selamat Datang di Sistem Informasi Akademik SD IT Bunayya Semarang <br>
                    @endif
                </p>
            </div>
            <div class="col d-none d-sm-none d-md-block">
                @if (auth()->user()->role == 'guru')
                    <img width="450" src="frontend/images/pend.jpg" alt="">
                @endif
                @if (auth()->user()->role == 'siswa')
                    <img width="450" src="frontend/images/pend.jpg" alt="">
                @endif
            </div>
        </div>
        @if (auth()->user()->role == 'admin')
            <div class="row">
                <a href="/home/admin" class="btn btn-primary mt-0 mb-3">
                    Masuk Dashboard
                </a>
            </div> 
            <div class="row">
                <div class="info ml-auto mr-auto">
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
        <div class="row">
        </div>
    </div>
</section>
@endsection