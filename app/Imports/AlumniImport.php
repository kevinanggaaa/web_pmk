<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Alumni;
use App\Models\Profile;
use Maatwebsite\Excel\Row;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


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

        $ultah = explode('-', $row['birthdate']);
        $year = $ultah[0];
        $month = $ultah[1];
        $day  = $ultah[2];
        $ultah = $day . '' . $month . '' . $year;

        $alumni = Alumni::firstOrCreate(
            [
                'email' => $row['email'],
            ],
            [
                'name' => $row['name'],
                'department' => $row['department'],
                'job' => $row['job'],
                'angkatan' => $row['angkatan'],
            ]
        );

        $user = User::firstOrCreate(
            [
                'email' => $row['email'],
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

        $user->assignRole('Alumni');

        if ($alumni->wasRecentlyCreated) {
            $model_id = Alumni::select('id')->where('email', $row['email'])->first();
            $user_id = User::select('id')->where('email', $row['email'])->first();

            Profile::create([
                'profile_id' => $row['email'],
                'user_id' => $user_id->id,
                'model_id' => $model_id->id,
                'model_type' => 'App\Models\Alumni',
            ]);
        }

        // if (!$alumni->wasRecentlyCreated) {
        //     $alumni->update([
        //         'name' => $row['name'],
        //         'department' => $row['department'],
        //         'job' => $row['job'],
        //     ]);
        // }
        // return new Alumni([
        //     //
        // ]);
    }
}
