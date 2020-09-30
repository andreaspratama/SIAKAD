<?php

namespace App\Exports;

use App\Absen;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AbsenExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Absen::all();
    }

    public function map($absen): array
    {
        return [
            $absen->user->name,
            $absen->tanggal,
            $absen->time_in,
            $absen->time_out,
            $absen->note,
        ];
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Tanggal',
            'Jam Masuk',
            'Jam Keluar',
            'Catatan',
        ];
    }
}
