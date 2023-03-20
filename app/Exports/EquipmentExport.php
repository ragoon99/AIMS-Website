<?php

namespace App\Exports;

use App\Models\equipment_data;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromCollection;

class EquipmentExport implements FromCollection, WithStyles, ShouldAutoSize, WithHeadings, WithMapping
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
        ];
    }

    public function map($equipment): array
    {
        return [
            $equipment->name,
            $equipment->mrp,
        ];
    }

    public function collection()
    {
        return equipment_data::all();
    }
}
