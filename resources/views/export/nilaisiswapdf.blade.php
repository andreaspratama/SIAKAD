<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nilai {{$siswa->nama}}</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <h3 class="mb-3 text-center">Hasil Nilai Siswa {{$siswa->nama}}</h3>
    <table class="table table-striped table-bordered text-center table-sm">
        <thead>
            <tr>
                <th>Mapel</th>
                <th>Nilai UH1</th>
                <th>Nilai UH2</th>
                <th>Nilai uts</th>
                <th>Nilai uas</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            {{-- {{dd($matapelajarans)}} --}}
            @forelse ($siswa->mapel as $mapel)
                <tr>
                    <td>{{$mapel->nama_mapel}}</td>
                    <td>{{$mapel->pivot->nilai_uh1}}</td>
                    <td>{{$mapel->pivot->nilai_uh2}}</td>
                    <td>{{$mapel->pivot->uts}}</td>
                    <td>{{$mapel->pivot->uas}}</td>
                    <td>{{$mapel->pivot->status}}</td>
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>
