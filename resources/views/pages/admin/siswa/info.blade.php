@extends('layouts.app')

@section('title')
    Info Akademik | SD IT Bunayya  
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800 mt-4 mb-2">Info Akademik</h1>

        <!-- DataTales Example -->
        <div class="card shadow">
            <div class="card-body">
                <div class="events mb-5">
                    {{-- <div class="container"> --}}
                        @foreach ($items as $item)
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
                                    <a href="/siswa/info/{{$item->slug}}" class="btn btn-read">Read More</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    {{-- </div> --}}
                </div>
                {{$items->links()}}
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection