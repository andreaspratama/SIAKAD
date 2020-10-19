<?php

namespace App\Exports;

use App\Absensiswa;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AbsensiswaExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Absensiswa::all();
    }

    public function map($absensiswa): array
    {
        return [
            $absensiswa->user->name,
            $absensiswa->tanggal,
            $absensiswa->time_in,
            $absensiswa->note,
        ];
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Tanggal',
            'Jam Masuk',
            'Catatan',
        ];
    }
}
