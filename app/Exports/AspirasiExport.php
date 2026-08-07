<?php

namespace App\Exports;

use App\Models\Aspirasi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class AspirasiExport implements FromCollection, WithHeadings, WithMapping
{
    public function collection()
    {
        return Aspirasi::latest()->get();
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Nama',
            'Alamat',
            'Kategori',
            'Isi Aspirasi',
            'Status',
        ];
    }

    public function map($aspirasi): array
    {
        return [
            $aspirasi->created_at->format('d-m-Y H:i'),
            $aspirasi->nama ?: '-',
            $aspirasi->alamat ?: '-',
            $aspirasi->kategori ?: '-',
            $aspirasi->isi_aspirasi,
            ucfirst($aspirasi->status),
        ];
    }
}