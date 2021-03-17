<?php

namespace App\Exports;

use App\Models\User;
use App\Models\Profile;
use App\Models\Student;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Color;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentExport implements FromCollection, WithHeadings, WithEvents, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Student::get([
            'name', 'nrp', 'department',
            'year_entry', 'year_graduate',
        ]);
    }

    public function headings(): array
    {
        return [
            'name',
            'nrp',
            'email',
            'department',
            'year_entry',
            'year_graduate',
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class   =>  function (AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A1:F1')
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
        $profile = Profile::where('profile_id',$row->nrp)->first();
        $user = User::where('id',$profile->user_id)->first();
        return [
            $row->name,
            $row->nrp,
            $user->email,
            $row->department,
            $row->year_entry,
            $row->year_graduate,
        ];
    }
}
