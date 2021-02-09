<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admin = Role::create([
            'name' => 'Super Admin',
            'guard_name' => 'web',
        ]);

        $mahasiswa = Role::create([
            'name' => 'Mahasiswa',
            'guard_name' => 'web',
        ]);
    }
}
