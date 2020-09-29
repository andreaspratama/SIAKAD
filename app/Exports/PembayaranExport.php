<?php

namespace App\Exports;

use App\Pembayaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PembayaranExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Pembayaran::all();
    }

    public function map($pembayaran): array
    {
        return [
            $pembayaran->jenispem->jenis,
            $pembayaran->nis,
            $pembayaran->nama,
            $pembayaran->kelas,
            $pembayaran->tanggal,
            'Rp. '. number_format($pembayaran->jum_pemb),
            $pembayaran->keterangan,
        ];
    }

    public function headings(): array
    {
        return [
            'Jenis Pembayaran',
            'NIS',
            'Nama',
            'Kelas',
            'Tanggal',
            'Jumlah Pembayaran',
            'Keterangan',
        ];
    }
}
