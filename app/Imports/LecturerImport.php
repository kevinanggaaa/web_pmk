<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Profile;
use App\Models\Lecturer;
use Maatwebsite\Excel\Row;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class LecturerImport implements ToModel, WithHeadingRow
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

        $lecturer = Lecturer::firstOrCreate(
            [
                'nidn' => $row['nidn'],
            ],
            [
                'name' => $row['name'],
                'department' => $row['department'],
        ]);

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

        $user->assignRole('Dosen');

        if ($lecturer->wasRecentlyCreated) {
            $model_id = Lecturer::select('id')->where('nidn', $row['nidn'])->first();
            $user_id = User::select('id')->where('email', $row['email'])->first();

            Profile::create([
                'profile_id' => $row['nidn'],
                'user_id' => $user_id->id,
                'model_id' => $model_id->id,
                'model_type' => 'App\Models\Lecturer',
            ]);
        }

        // if (!$lecturer->wasRecentlyCreated) {
        //     $lecturer->update([
        //         'nidn' => $row['nidn'],
        //         'name' => $row['name'],
        //         'department' => $row['department'],
        //     ]);
        // }
        // return new Lecturer([
        //     //
        // ]);
    }
}
