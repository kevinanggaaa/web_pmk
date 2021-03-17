<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Profile;
use App\Models\Student;
use Maatwebsite\Excel\Row;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class StudentImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $ultah = explode('-', $row['birthdate']);
        $year = $ultah[0];
        $month = $ultah[1];
        $day  = $ultah[2];
        $ultah = $day . '' . $month . '' . $year;
        
        $student = Student::firstOrCreate(
            [
                'nrp' => $row['nrp'],
            ],
            [
                'name' => $row['name'],
                'department' => $row['department'],
                'year_entry' => $row['year_entry'],
                'year_graduate' => $row['year_graduate']
            ]
        );

        if($student->wasRecentlyCreated){
            $user = User::firstOrCreate(
                [
                    'email' => $row['email']
                ],
                [
                    'password' => Hash::make($ultah),
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
                    'avatar' => "default.jpg",
                ]
            );
            $user ->assignRole('Mahasiswa');


            Profile::create([
                'profile_id' => $row['nrp'],
                'user_id' => $user->id,
                'model_id' => $student->id,
                'model_type' => 'App\Models\Student',
            ]);
        }

        // if (! $student->wasRecentlyCreated) {
        //     $student->update([
        //         'name' => $row['name'],
        //         'nrp' => $row['nrp'],
        //         'department' => $row['department'],
        //         'year_entry' => $row['year_entry'],
        //         'year_graduate' => $row['year_graduate'],
        //     ]);
        // }

        // return new Student([
        //     //
        // ]);
    }
}
