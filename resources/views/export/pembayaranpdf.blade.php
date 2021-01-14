<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Data Pembayaran</title>
  </head>
  <body>
    {{-- <img src="{{url('foto/bunayya.png')}}" alt=""> --}}
    <h3 class="text-center mb-3">Laporan Data Pembayaran</h3>
    <table class="table table-striped table-bordered text-center table-sm">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Pembayaran</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pembayaran as $p)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>
                        @if ($p->jenispem == 0)
                            Jenis Pembayaran Terhapus
                        @else
                            {{$p->jenispem->jenis}}
                        @endif
                    </td>
                    <td>{{$p->nisn}}</td>
                    <td>{{$p->nama}}</td>
                    <td>{{$p->kelas}}</td>
                    <td>{{$p->tanggal}}</td>
                    <td>Rp. {{number_format($p->jum_pemb)}}</td>
                    <td>{{$p->keterangan}}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">
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