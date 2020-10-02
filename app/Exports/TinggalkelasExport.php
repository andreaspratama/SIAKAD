<?php

namespace App\Exports;

use App\Tinggalkelas;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TinggalkelasExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tinggalkelas::all();
    }

    public function map($tgl): array
    {
        return [
            $tgl->thnakademik->tahun_akademik,
            $tgl->nisn,
            $tgl->nama,
            $tgl->asal_kls,
            $tgl->tgl_kls,
            $tgl->alasan,
        ];
    }

    public function headings(): array
    {
        return [
            'Tahun Akademik',
            'NIS',
            'Nama',
            'Asal Kelas',
            'Tinggal Kelas',
            'Alasan',
        ];
    }
}
