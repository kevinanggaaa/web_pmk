<?php

namespace App\Imports;

use App\Models\Student;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;


class StudentImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // $row = $row->toArray();

        $student = Student::firstOrCreate([
                'name' => $row['name'],
                'nrp' => $row['nrp'],
                'department' => $row['department'],
                'year_entry' => $row['year_entry'],
                'year_graduate' => $row['year_graduate'],
        ]);

        $user = User::firstOrcreate([
            'email' => $row['email'],
            'password' => bcrypt($row['nrp']),
            'name' => $row['name'],
            'pkk' => $row['pkk'],
            'address' => $row['address'],
            'address_origin' => $row['address_origin'],
            'phone' => $row['phone'],
            'parent_phone' => $row['parent_phone'],
            'line' => $row['line'],
            'birthdate' => $row['birthdate'],
            'gender' => $row['gender'],
            'date_death' => $row['date_death'],
            'avatar' => "1oEa6ivIQ16Iu_WgyGa6ftMOxqOj7whwm/default.jpg",
        ]);
        
        $user ->assignRole('Mahasiswa');

        if (! $student->wasRecentlyCreated) {
            $student->update([
                'name' => $row['name'],
                'nrp' => $row['nrp'],
                'department' => $row['department'],
                'year_entry' => $row['year_entry'],
                'year_graduate' => $row['year_graduate'],
            ]);
        }
        // return new Student([
        //     //
        // ]);
    }
}
