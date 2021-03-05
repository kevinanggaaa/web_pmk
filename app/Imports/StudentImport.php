<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Profile;
use App\Models\Student;
use Maatwebsite\Excel\Row;
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

        $user = User::firstOrCreate(
            [
                'email' => $row['email']
            ],
            [
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
                'avatar' => "123",
            ]
        );
        
        $user ->assignRole('Mahasiswa');
        
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
            $model_id = Student::select('id')->where('nrp', $row['nrp'])->first();
            $user_id = User::select('id')->where('email', $row['email'])->first();

            Profile::create([
                'profile_id' => $row['nrp'],
                'user_id' => $user_id->id,
                'model_id' => $model_id->id,
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
