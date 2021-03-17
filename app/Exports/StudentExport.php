<?php

namespace App\Exports;

use App\Models\Student;
use App\Models\Profile;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;

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
            'email',
            'nrp',
            'department',
            'pkk',
            'address',
            'address_origin',
            'phone',
            'parent_phone',
            'line',
            'birthdate',
            'gender',
            'date_death',
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
                $event->sheet->getDelegate()->getStyle('A1:O1')
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
        $profile = Profile::select()->where('profile_id', $row->nrp)->first();
        $user = User::select()->where('id', $profile->user_id)->first();

        return [
            $row->name,
            $user->email,
            $row->nrp,
            $row->department,
            $user->pkk,
            $user->address,
            $user->address_origin,
            $user->phone,
            $user->parent_phone,
            $user->line,
            $user->birthdate,
            $user->gender,
            $user->date_death,
            $row->year_entry,
            $row->year_graduate,
        ];
    }
}
