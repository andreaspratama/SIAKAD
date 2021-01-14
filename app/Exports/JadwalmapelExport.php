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
        if ($jadwalmapel->guru == null) {
            $rguru = "Guru Terhapus";
        } else {
            $rguru = $jadwalmapel->guru->nama;
        }

        if ($jadwalmapel->mapel == null) {
            $rmapel = "Mapel Terhapus";
        } else {
            $rmapel = $jadwalmapel->mapel->nama_mapel;
        }

        if ($jadwalmapel->ruang == null) {
            $rruang = "Ruang Terhapus";
        } else {
            $rruang = $jadwalmapel->ruang->nama_ruang;
        }
        
        return [
            $rmapel,
            $rguru,
            $jadwalmapel->kelas,
            $rruang,
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
