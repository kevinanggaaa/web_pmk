<?php

namespace App\Imports;

use App\Models\Alumni;
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Row;

class AlumniImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // $row = $row->toArray();

        $alumni = Alumni::firstOrCreate([
                'name' => $row['name'],
                'department' => $row['department'],
                'job' => $row['job'],
        ]);

        User::firstOrcreate([
            'email' => $row['email'],
            'password' => bcrypt($row['email']),
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
        ]);
        
        // ->assignRole('mahasiswa')

        if (! $alumni->wasRecentlyCreated) {
            $alumni->update([
                'name' => $row['name'],
                'department' => $row['department'],
                'job' => $row['job'],
            ]);
        }
        // return new Alumni([
        //     //
        // ]);
    }
}
