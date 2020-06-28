<?php

namespace App\Exports;

use App\JadwalMapel;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class JadwalmapelExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return JadwalMapel::all();
    }

    public function map($jadwalmapel): array
    {
        return [
            $jadwalmapel->mapel->nama_mapel,
            $jadwalmapel->guru->nama,
            $jadwalmapel->kelas,
            $jadwalmapel->ruang,
            $jadwalmapel->hari,
            $jadwalmapel->jam_mulai,
            $jadwalmapel->jam_selesai,
        ];
    }

    public function headings(): array
    {
        return [
            'Nama Mapel',
            'Nama Guru',
            'Kelas',
            'Ruang',
            'Hari',
            'Jam Mulai',
            'Jam Selesai',
        ];
    }
}
