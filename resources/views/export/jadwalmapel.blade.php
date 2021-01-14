<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Data Jadwal</title>
  </head>
  <body>
    {{-- <img src="{{url('foto/bunayya.png')}}" alt=""> --}}
    <h3 class="text-center mb-3">Laporan Data Mata Pelajaran Bunayya</h3>
    <table class="table table-striped table-bordered text-center table-sm">
        <thead>
            <tr>
                <th>Nama Mapel</th>
                <th>Nama Guru</th>
                <th>Kelas</th>
                <th>Ruang</th>
                <th>Hari</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwal as $j)
                <tr>
                    <td>
                        @if ($j->mapel == null)
                            Mapel Terhapus
                        @else
                            {{$j->mapel->nama_mapel}}
                        @endif
                    </td>
                    <td>
                        @if ($j->guru == null)
                            Guru Terhapus
                        @else
                            {{$j->guru->nama}}
                        @endif
                    </td>
                    <td>{{$j->kelas}}</td>
                    <td>
                        @if ($j->ruang == null)
                            Ruang Terhapus
                        @else
                            {{$j->ruang->nama_ruang}}
                        @endif
                    </td>
                    <td>{{$j->hari}}</td>
                    <td>{{$j->jam_mulai}}</td>
                    <td>{{$j->jam_selesai}}</td>
                </tr>
            @endforeach
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <h1 class="mb-3 text-center">Data Jadwal Mata Pelajaran SD IT Bunayya</h1>
    <table class="table text-center">
        <thead>
            <tr>
                <th>Nama Mapel</th>
                <th>Nama Guru</th>
                <th>Kelas</th>
                <th>Ruang</th>
                <th>Hari</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($jadwal as $j)
                <tr>
                    <td>{{$j->mapel->nama_mapel}}</td>
                    <td>{{$j->guru->nama}}</td>
                    <td>{{$j->kelas}}</td>
                    <td>{{$j->ruang->nama_ruang}}</td>
                    <td>{{$j->hari}}</td>
                    <td>{{$j->jam_mulai}}</td>
                    <td>{{$j->jam_selesai}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html> --}}