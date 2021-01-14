<?php

namespace App\Exports;

use App\Onlinepemb;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PembayaranonlineExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Onlinepemb::all();
    }

    public function map($pembayaranonline): array
    {
        if ($pembayaranonline->jenispem == null) {
            $rjenispem = "Jenis Pembayaran Terhapus";
        } else {
            $rjenispem = $pembayaranonline->jenispem->jenis;
        }

        return [
            $pembayaranonline->nisn,
            $pembayaranonline->nama,
            $rjenispem,
            $pembayaranonline->tanggal,
            $pembayaranonline->kelas,
        ];
    }

    public function headings(): array
    {
        return [
            'NISN',
            'Nama',
            'Jenis Pembayaran',
            'Tanggal',
            'Kelas',    
        ];
    }
}
