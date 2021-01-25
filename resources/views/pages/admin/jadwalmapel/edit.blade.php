@extends('layouts.admin.admin')

@section('title')
    Edit Data Jadwal Mata Pelajaran
@endsection

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Ubah Jadwal</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <form action="/jadwalmapel/{{$item->id}}/update" method="POST">
                @method('PUT')
                @csrf
                <label for="guru_id">Guru</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="gurus_id"><i class="fas fa-user"></i></span>
                  </div>
                  <select name="guru_id" required class="custom-select">
                    <option value="{{$item->guru_id}}">-- Ubah Bila Perlu --</option>
                    @foreach ($gurus as $gurus)
                        <option value="{{$gurus->id}}">
                            {{$gurus->nama}}
                        </option>
                    @endforeach
                  </select>
                </div>
                <label for="mapel_id">Mapel</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="mapels_id"><i class="fas fa-book-reader"></i></span>
                  </div>
                  <select class="custom-select" name="mapel_id">
                    <option value="{{$item->mapel_id}}">-- Ubah Bila Perlu --</option>
                    @foreach ($mapels as $mapels)
                        <option value="{{$mapels->id}}">
                          {{$mapels->nama_mapel}}
                        </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="kelas">Kelas</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <label class="input-group-text" for="kelas"><i class="fas fa-user-graduate"></i></label>
                    </div>
                    <select class="custom-select" name="kelas">
                      <option>-- Pilih --</option>
                      <option value="1" @if($item->kelas == '1') selected @endif>1</option>
                      <option value="2" @if($item->kelas == '2') selected @endif>2</option>
                      <option value="3" @if($item->kelas == '3') selected @endif>3</option>
                      <option value="4" @if($item->kelas == '4') selected @endif>4</option>
                      <option value="5" @if($item->kelas == '5') selected @endif>5</option>
                      <option value="6" @if($item->kelas == '6') selected @endif>6</option>
                    </select>
                  </div>
                </div>
                <label for="ruang_id">Ruang</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="ruangs_id"><i class="fas fa-school"></i></span>
                  </div>
                  <select class="custom-select" name="ruang_id">
                    <option value="{{$item->ruang_id}}">-- Ubah Bila Perlu --</option>
                    @foreach ($ruangs as $ruangs)
                        <option value="{{$ruangs->id}}">
                          {{$ruangs->nama_ruang}}
                        </option>
                    @endforeach
                  </select>
                </div>
                <label for="hari">Hari</label>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="hari"><i class="fas fa-cloud-sun"></i></span>
                  </div>
                  <select class="custom-select" name="hari">
                    <option value="Senin" @if($item->hari == 'Senin') selected @endif>Senin</option>
                    <option value="Selasa" @if($item->hari == 'Selasa') selected @endif>Selasa</option>
                    <option value="Rabu" @if($item->hari == 'Rabu') selected @endif>Rabu</option>
                    <option value="Kamis" @if($item->hari == 'Kamis') selected @endif>Kamis</option>
                    <option value="Jumat" @if($item->hari == 'Jumat') selected @endif>Jumat</option>
                    <option value="Sabtu" @if($item->hari == 'Sabtu') selected @endif>Sabtu</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="jam_mulai">Jam Mulai</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="jam_mulai"><i class="far fa-clock"></i></span>
                    </div>
                    <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" placeholder="Jam Mulai" name="jam_mulai" value="{{$item->jam_mulai}}">
                    @error('jam_mulai')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                    @enderror
                  </div>
                </div>
                <div class="form-group">
                  <label for="jam_selesai">Jam Selesai</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="jam_selesai"><i class="far fa-clock"></i></span>
                    </div>
                    <input type="time" class="form-control @error('jam_selesai') is-invalid @enderror" placeholder="Jam Selesai" name="jam_selesai" value="{{$item->jam_selesai}}">
                    @error('jam_selesai')
                      <div class="invalid-feedback">
                          {{$message}}
                      </div>
                    @enderror
                  </div>
                </div>
                <button type="submit" class="btn btn-success btn-sm">Simpan</button>
                <a href="/jadwalmapel" class="btn btn-secondary btn-sm">Kembali</a>
            </form>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->
@endsection