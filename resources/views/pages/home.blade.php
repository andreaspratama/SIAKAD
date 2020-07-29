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
                    @else
                        Selamat Datang {{auth()->user()->name}}
                    @endif
                </h1>
                <p class="mb-5">
                    Selamat Datang di Sistem Informasi Akademik SD IT Bunayya Semarang
                </p>
                @if (auth()->user()->role == 'admin')
                    <a href="/home/admin" class="btn btn-primary">
                        Masuk Dashboard
                    </a>
                @endif
            </div>
            <div class="col d-none d-sm-none d-md-block">
                <img width="450" src="frontend/images/pend.jpg" alt="">
            </div>
        </div>
    </div>
</section>
@endsection