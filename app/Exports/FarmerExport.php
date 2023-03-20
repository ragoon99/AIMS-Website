<?php

namespace App\Exports;

use App\Models\farmers;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\FromCollection;

class FarmerExport implements FromCollection, WithStyles, ShouldAutoSize, WithHeadings, WithMapping
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
            'First Name',
            'Middle Name',
            'Last Name',
            'Age',
            'Gender',
            "Date of Birth",
            "Address",
            "Province",
            "State",
        ];
    }

    public function map($farmer): array
    {
        return [
            $farmer->fname,
            $farmer->mname,
            $farmer->lname,
            $farmer->age,
            $farmer->sex,
            $farmer->dob,
            $farmer->address,
            $farmer->province,
            $farmer->state,
        ];
    }

    public function collection()
    {
        return farmers::all();
    }
}
