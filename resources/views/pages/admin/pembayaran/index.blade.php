@extends('layouts.admin.admin')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Pembayaran</h1>
        
        <a href="{{route('pembayaran.create')}}" class="btn btn-primary btn-sm mb-3 mt-3 px-3 py-2">Pembayaran</a>

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
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($items as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->siswa->nama}}</td>
                        <td>{{$item->kelas}}</td>
                        <td>
                            <a href="{{route('pembayaran.show', $item->id)}}" class="btn btn-circle btn-success">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="{{route('pembayaran.edit', $item->id)}}" class="btn btn-circle btn-warning">
                                <i class="fa fa-edit"></i>
                            </a>
                            <form action="{{route('pembayaran.destroy', $item->id)}}" method="POST" class="d-inline">
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
                        <td colspan="3" class="text-center">
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