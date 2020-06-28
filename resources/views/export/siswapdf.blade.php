<!DOCTYPE html>
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
</html>