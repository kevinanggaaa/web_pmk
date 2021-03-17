<?php

namespace Database\Seeders;

use App\Models\Alumni;
use App\Models\Lecturer;
use App\Models\Profile;
use App\Models\Student;
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
            'pkk' => 'Kevin',
            'address' => 'Jl. Keputih, Surabaya',
            'address_origin' => 'Pekanbaru, Riau',
            'phone' => '081100000001',
            'parent_phone' => '081100000002',
            'line' => 'superadmin',
            'birthdate' => '2000-04-15',
            'gender' => 'L',
            'avatar' => 'default.jpg',
        ]);

        $super_admin->assignRole('Super Admin');
        $super_admin->assignRole('Mahasiswa');

        Student::create([
            'name' => 'superadmin',
            'nrp' => '05111840000002',
            'department' => 'Teknik Informatika',
            'year_entry' => '2018',
        ]);

        Lecturer::create([
            'nidn' => '51724',
            'name' => 'superadmin',
            'department' => 'Teknik Informatika'
        ]);

        Alumni::create([
            'email' => 'superadmin@pmk.its.ac.id',
            'name' => 'superadmin',
            'department' => 'Teknik Informatika',
            'job' => 'Pedagang',
            'angkatan' => '2018',
        ]);

        Profile::create([
            'profile_id' => '05111840000002',
            'user_id' => '1',
            'model_id' => '1',
            'model_type' => 'App\Models\Student',
        ]);
        
        Profile::create([
            'profile_id' => '51724',
            'user_id' => '1',
            'model_id' => '1',
            'model_type' => 'App\Models\Lecturer',
        ]);

        Profile::create([
            'profile_id' => 'superadmin@pmk.its.ac.id',
            'user_id' => '1',
            'model_id' => '1',
            'model_type' => 'App\Models\Alumni',
        ]);

        $student = User::create([
            'name' => 'student',
            'email' => 'student@pmk.its.ac.id',
            'password' => bcrypt('student123'),
            'pkk' => 'Kevin',
            'address' => 'Jl. Keputih, Surabaya',
            'address_origin' => 'Pekanbaru, Riau',
            'phone' => '081100000003',
            'parent_phone' => '081100000004',
            'line' => 'superadmin',
            'birthdate' => '2000-04-15',
            'gender' => 'L',
            'avatar' => 'default.jpg',
        ]);

        $student->assignRole('Mahasiswa');

        Student::create([
            'name' => 'student',
            'nrp' => '05111840000001',
            'department' => 'Teknik Informatika',
            'year_entry' => '2018',
        ]);
        
        Profile::create([
            'profile_id' => '05111840000001',
            'user_id' => '2',
            'model_id' => '2',
            'model_type' => 'App\Models\Student',
        ]);

        $lecturer = User::create([
            'name' => 'lecturer',
            'email' => 'lecturer@pmk.its.ac.id',
            'password' => bcrypt('lecturer123'),
            'pkk' => 'Kevin',
            'address' => 'Jl. Keputih, Surabaya',
            'address_origin' => 'Pekanbaru, Riau',
            'phone' => '081100000005',
            'parent_phone' => '081100000006',
            'line' => 'superadmin',
            'birthdate' => '2000-04-15',
            'gender' => 'L',
            'avatar' => 'default.jpg',
        ]);

        $lecturer->assignRole('Dosen');

        Lecturer::create([
            'nidn' => '51723',
            'name' => 'lecturer',
            'department' => 'Teknik Informatika'
        ]);

        Profile::create([
            'profile_id' => '51723',
            'user_id' => '2',
            'model_id' => '2',
            'model_type' => 'App\Models\Lecturer',
        ]);

        $alumni = User::create([
            'name' => 'alumni',
            'email' => 'alumni@pmk.its.ac.id',
            'password' => bcrypt('alumni123'),
            'pkk' => 'Kevin',
            'address' => 'Jl. Keputih, Surabaya',
            'address_origin' => 'Pekanbaru, Riau',
            'phone' => '081100000007',
            'parent_phone' => '081100000008',
            'line' => 'superadmin',
            'birthdate' => '2000-04-15',
            'gender' => 'L',
            'avatar' => 'default.jpg',
        ]);

        $alumni->assignRole('Alumni');

        Alumni::create([
            'email' => 'alumni@pmk.its.ac.id',
            'name' => 'alumni',
            'department' => 'Teknik Informatika',
            'job' => 'Pedagang',
            'angkatan' => '2018',
        ]);

        Profile::create([
            'profile_id' => 'alumni@pmk.its.ac.id',
            'user_id' => '2',
            'model_id' => '2',
            'model_type' => 'App\Models\Alumni',
        ]);
    }
}
