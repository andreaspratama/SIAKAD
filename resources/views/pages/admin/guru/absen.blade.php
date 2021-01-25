@extends('layouts.app')

@section('title')
    Absen Guru
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <h1 class="h3 mb-3 text-gray-800 mt-4">
            @if (auth()->user()->guru->jns_kelamin == 'L')
                Absensi Bapak {{auth()->user()->name}}
            @else
                Absensi Ibu {{auth()->user()->name}}
            @endif
        </h1>

        <!-- DataTales Example -->
        <div class="card shadow">
          <div class="card-body">
              <div class="row mb-3">
                <div class="card col-lg-12 ml-auto mr-auto">
                    <div class="card-header">
                      <strong>{{$info['status']}}</strong>
                    </div>
                    <div class="card-body">
                        <form action="/absen" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                              <input type="text" class="form-control" name="note" placeholder="Catatan...">
                            </div>
                            <button type="submit" class="btn btn-flat btn-primary" name="btnIn" {{$info['btnIn']}}>Absen Masuk</button>
                            <button type="submit" class="btn btn-flat btn-primary btnout float-right" name="btnOut" {{$info['btnOut']}}>Absen Keluar</button>
                        </form>
                    </div>
                </div>
                  {{-- <div class="col-lg-12 ml-auto mr-auto">
                    <table class="table table-striped">
                        <form>
                            <tr>
                                <td>
                                    <div class="form-group col-lg-12">
                                        <input type="text" class="form-control" name="note" placeholder="Note...">
                                    </div>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-primary btn-sm" name="btnIn">
                                        Absen Masuk
                                    </button>
                                    <button type="submit" class="btn btn-primary btn-sm" name="btnOut">
                                        Absen Keluar
                                    </button>
                                </td>
                            </tr>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </table>
                  </div> --}}
              </div>
              <div class="row">
                <div class="card col-lg-12 ml-auto mr-auto">
                    <div class="card-header">
                      Riwayat Absensi
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Jam Masuk</th>
                                        <th>Jam Keluar</th>
                                        <th>Catatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($items as $item)
                                        <tr>
                                            <td>{{$item->tanggal}}</td>
                                            <td>{{$item->time_in}}</td>
                                            <td>{{$item->time_out}}</td>
                                            <td>{{$item->note}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $items->links() }}
                    </div>
                </div>
              </div>
              {{-- <div class="row">
                <div class="col text-center">
                  {{ $items->links() }}
                </div>
              </div> --}}
          </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

@push('addon-style')
    <style>
        @media (max-width: 575.98px) {
            .btn-flat {
                width: 100%;
            }

            .btnout {
                margin-top: 10px
            }
        }
    </style>
@endpush