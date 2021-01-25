<?php

namespace App\Exports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SiswaExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Siswa::all();
    }

    public function map($siswa): array
    {
        return [
            $siswa->nisn,
            $siswa->nama,
            $siswa->tpt_lahir,
            $siswa->tgl_lahir,
            $siswa->jns_kelamin,
            $siswa->agama,
            $siswa->alamat,
            $siswa->nama_ortu,
            $siswa->kelas,
        ];
    }

    public function headings(): array
    {
        return [
            'NISN',
            'Nama',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Agama',
            'Alamat',
            'Nama Ortu',
            'Kelas',
        ];
    }
}
