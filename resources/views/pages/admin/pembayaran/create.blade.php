@extends('layouts.admin.admin')

@section('title')
    Tambah Data Pembayaran
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Form Pembayaran</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="{{route('pembayaran.store')}}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="siswas_id">Nama</label>
                  <select class="form-control" name="siswas_id" required>
                    <option>-- Pilih Siswa --</option>
                    @foreach ($siswa as $siswa)
                        <option value="{{$siswa->id}}">
                          {{$siswa->nama}}
                        </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="kelas">Kelas</label>
                  <select class="form-control" name="kelas">
                    <option>-- Pilih Kelas --</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="thnakademiks_id">Tahun Akademik</label>
                  <select class="form-control" name="thnakademiks_id">
                    <option>-- Pilih Akademik --</option>
                    @foreach ($thnakademik as $thnakademik)
                      <option value="{{$thnakademik->id}}">
                        {{$thnakademik->tahun_akademik}}
                      </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="semester">Semester</label>
                  <select class="form-control" name="semester">
                    <option>-- Pilih Semester --</option>
                    <option value="Genap">Genap</option>
                    <option value="Ganjil">Ganjil</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="jenispembayarans_id">Pilih Pembayaran</label>
                  <select class="form-control" name="jenispembayarans_id">
                    <option>-- Pilih Semester --</option>
                    @foreach ($jenispembayaran as $jenispembayaran)
                        <option value="{{$jenispembayaran->id}}">
                          {{$jenispembayaran->jenis_pembayaran}}
                        </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="jumlah">Jumlah</label>
                  <input type="text" class="form-control" name="jumlah" placeholder="Jumlah">
                </div>
                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                <button type="reset" class="btn btn-warning btn-sm">Reset</button>
                <a href="{{route('pembayaran.index')}}" class="btn btn-secondary btn-sm">Kembali</a>
            </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection