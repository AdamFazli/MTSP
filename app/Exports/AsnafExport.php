<?php

namespace App\Exports;

use App\Models\Asnaf;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Sheet;


class AsnafExport implements FromCollection, WithHeadings, WithEvents
{
    public function collection()
    {
        return Asnaf::select('name', 'ic', 'gender', 'dob', 'phone', 'address', 'household_size', 'income', 'expenses', 'job_status', 'category', 'status', 'created_at')->get();
    }

    public function headings(): array
    {
        return [
            'Name',
            'IC',
            'Gender',
            'Date of Birth',
            'Phone',
            'Address',
            'Household Size',
            'Income',
            'Expenses',
            'Job Status',
            'Category',
            'Zakat Status',
            'Created At',
        ];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $cellRange = 'A1:M1'; // Adjust based on number of columns
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setBold(true);

                // Auto-filter
                $event->sheet->getDelegate()->setAutoFilter($event->sheet->getDelegate()->calculateWorksheetDimension());

                // Optional: auto-size columns
                foreach (range('A', 'M') as $col) {
                    $event->sheet->getDelegate()->getColumnDimension($col)->setAutoSize(true);
                }
            },
        ];
    }
}
