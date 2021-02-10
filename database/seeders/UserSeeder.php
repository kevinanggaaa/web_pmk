<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = User::create([
            'name' => 'superadmin',
            'email' => 'superadmin@pmk.its.ac.id',
            'password' => bcrypt('superadmin123'),
        ]);

        $super_admin->assignRole('Super Admin');

        $student = User::create([
            'name' => 'student',
            'email' => 'student@pmk.its.ac.id',
            'password' => bcrypt('student123'),
        ]);

        $student->assignRole('Mahasiswa');
    }
}
