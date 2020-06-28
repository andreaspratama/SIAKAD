@extends('layouts.admin.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Jenis Pembayaran</h1>
        
        <a href="{{route('jenispembayaran.create')}}" class="btn btn-primary btn-sm mb-3 mt-3 px-3 py-2">Tambah Jenis Pembayaran</a>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Jenis Pembayaran</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($items as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->jenis_pembayaran}}</td>
                        <td>
                            <a href="{{route('jenispembayaran.edit', $item->id)}}" class="btn btn-circle btn-warning">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{route('jenispembayaran.destroy', $item->id)}}" method="POST" class="d-inline">
                                @csrf
                                @method('delete')
                                <button class="btn btn-circle btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                  @empty
                    <tr>
                        <td colspan="4" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection