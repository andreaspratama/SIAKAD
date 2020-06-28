<table class="table" style="border: 1px solid #ddd">
    <thead>
        <tr>
            <th>NIP</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($guru as $g)
            <tr>
                <td>{{$g->nip}}</td>
                <td>{{$g->nama}}</td>
                <td>{{$g->tpt_lahir}}</td>
                <td>{{$g->tgl_lahir}}</td>
                <td>{{$g->jns_kelamin}}</td>
                <td>{{$g->agama}}</td>
                <td>{{$g->alamat}}</td>
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