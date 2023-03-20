<?php

namespace App\Exports;

use App\Models\seed_data;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromCollection;

class SeedExport implements FromCollection, WithStyles, ShouldAutoSize, WithHeadings, WithMapping
{
    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],
        ];
    }

    public function headings(): array
    {
        return [
            'Name',
            'Growth (in Days)',
        ];
    }

    public function map($crop): array
    {
        return [
            $crop->name,
            $crop->growth,
        ];
    }

    public function collection()
    {
        return seed_data::all();
    }
}
