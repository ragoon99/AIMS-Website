<?php

namespace App\Exports;

use App\Models\livestock_data;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromCollection;

class LivestockExport implements FromCollection, WithStyles, ShouldAutoSize, WithHeadings, WithMapping
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
            'Market Rate Price',
            "Farmer's Rate Price",
        ];
    }

    public function map($crop): array
    {
        return [
            $crop->name,
            $crop->mrp,
            $crop->frp,
        ];
    }

    public function collection()
    {
        return livestock_data::all();
    }
}
