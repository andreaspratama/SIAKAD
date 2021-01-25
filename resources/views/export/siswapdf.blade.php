<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Data Siswa</title>
  </head>
  <body>
    {{-- <img src="{{url('foto/bunayya.png')}}" alt=""> --}}
    <h3 class="text-center mb-3">Laporan Data Siswa Bunayya</h3>
    <table class="table table-striped table-bordered text-center table-sm">
        <thead>
            <tr>
                <th>NISN</th>
                <th>Nama</th>
                <th>Tempat, Tgl Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Alamat</th>
                <th>Nama Ortu</th>
                <th>Kelas</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($siswa as $s)
                <tr>
                    <td>{{$s->nisn}}</td>
                    <td>{{$s->nama}}</td>
                    <td>{{$s->tpt_lahir}}, {{$s->tgl_lahir}}</td>
                    <td>{{$s->jns_kelamin}}</td>
                    <td>{{$s->agama}}</td>
                    <td>{{$s->alamat}}</td>
                    <td>{{$s->nama_ortu}}</td>
                    <td>{{$s->kelas}}</td>
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
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Selamat Datang</h1>
    <table class="table" style="border: 1px solid #ddd">
        <thead>
            <tr>
                <th>NISN</th>
                <th>Nama</th>
                <th>Tempat, Tgl Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Alamat</th>
                <th>Nama Ortu</th>
                <th>Kelas</th>
                <th>Asal Sekolah</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($siswa as $s)
                <tr>
                    <td>{{$s->nisn}}</td>
                    <td>{{$s->nama}}</td>
                    <td>{{$s->tpt_lahir}}, {{$s->tgl_lahir}}</td>
                    <td>{{$s->jns_kelamin}}</td>
                    <td>{{$s->agama}}</td>
                    <td>{{$s->alamat}}</td>
                    <td>{{$s->nama_ortu}}</td>
                    <td>{{$s->kelas}}</td>
                    <td>{{$s->asal_sklh}}</td>
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
</body>
</html> --}}