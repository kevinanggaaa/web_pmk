<?php

namespace App\Exports;

use App\Models\Lecturer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class LecturerExport implements FromCollection, WithHeadings, WithEvents, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Lecturer::get([
            'nidn', 'name', 'department',
        ]);
    }

    public function headings(): array
    {
        return [
            'nidn',
            'name',
            'department',
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class   =>  function (AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A1:C1')
                    ->getFill()->setFillType(Fill::FILL_SOLID)
                    ->getStartColor()->setARGB(Color::COLOR_YELLOW);
            },
        ];
    }

    /**
     * @param mixed $row
     *
     * @return array
     */
    public function map($row): array
    {
        return [
            $row->nidn,
            $row->name,
            $row->department,
        ];
    }
}
