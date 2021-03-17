<?php

namespace App\Exports;

use App\Models\Alumni;
use App\Models\Profile;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class AlumniExport implements FromCollection, WithHeadings, WithEvents, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Alumni::get([
            'name', 'department', 'job', 'alumni', 'angkatan',
        ]);
    }

    public function headings(): array
    {
        return [
            'name',
            'email',
            'department',
            'job',
            'angkatan',
            'address_origin',
            'phone',
            'line',
            'birthdate',
            'gender',
            'date_death',
        ];
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class   =>  function (AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A1:K1')
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
        $profile = Profile::select()->where('profile_id', $row->email)->first();
        $user = User::select()->where('id', $profile->user_id)->first();

        return [
            $row->name,
            $user->email,
            $row->department,
            $row->job,
            $user->angkatan,
            $user->address_origin,
            $user->phone,
            $user->line,
            $user->birthdate,
            $user->gender,
            $user->date_death,
        ];
    }
}
