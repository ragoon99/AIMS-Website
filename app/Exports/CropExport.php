<?php

namespace App\Exports;

use App\Models\crops_data;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromCollection;

class CropExport implements WithMapping, WithHeadings, ShouldAutoSize, WithStyles, FromCollection
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
            'Province',
            'Ward',
            'Municipality',
            'Market Rate Price',
            "Farmer's Rate Price",
        ];
    }

    public function map($crop): array
    {
        return [
            $crop->name,
            $crop->province,
            $crop->ward,
            $crop->municipality,
            $crop->mrp,
            $crop->frp,
        ];
    }

    public function collection()
    {
        return crops_data::all();
    }
}
