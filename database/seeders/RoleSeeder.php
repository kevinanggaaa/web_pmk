<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Gate;

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

        $dosen = Role::create([
            'name' => 'Dosen',
            'guard_name' => 'web',
        ]);

        $alumni = Role::create([
            'name' => 'Alumni',
            'guard_name' => 'web',
        ]);

        $pengurus_pemuridan = Role::create([
            'name' => 'pengurus pemuridan',
            'guard_name' => 'web',
        ]);

        $pengurus_dope = Role::create([
            'name' => 'pengurus dope',
            'guard_name' => 'web',
        ]);

        $pengurus_medfo = Role::create([
            'name' => 'pengurus medfo',
            'guard_name' => 'web',
        ]);

        $pengurus_kutu = Role::create([
            'name' => 'pengurus kutu',
            'guard_name' => 'web',
        ]);

        $bph_pemuridan = Role::create([
            'name' => 'bph pemuridan',
            'guard_name' => 'web',
        ]);

        $bph_dope = Role::create([
            'name' => 'bph dope',
            'guard_name' => 'web',
        ]);

        $bph_kutu = Role::create([
            'name' => 'bph kutu',
            'guard_name' => 'web',
        ]);

        $bph_medfo = Role::create([
            'name' => 'bph medfo',
            'guard_name' => 'web',
        ]);

        $ketua = Role::create([
            'name' => 'ketua',
            'guard_name' => 'web',
        ]);

        $sekretaris = Role::create([
            'name' => 'sekretaris',
            'guard_name' => 'web',
        ]);

        $bendahara = Role::create([
            'name' => 'bendahara',
            'guard_name' => 'web',
        ]);

        $pkk = Role::create([
            'name' => 'pkk',
            'guard_name' => 'web',
        ]);

        $pengurus_tpkk = Role::create([
            'name' => 'pengurus tpkk',
            'guard_name' => 'web',
        ]);

        $pengurus_alumni = Role::create([
            'name' => 'pengurus alumni',
            'guard_name' => 'web',
        ]);

        // Define permissions
        $add_student = Permission::create(['name' => 'add student', 'guard_name' => 'web']);
        $view_student = Permission::create(['name' => 'view student', 'guard_name' => 'web']);
        $view_detail_student = Permission::create(['name' => 'view detail student', 'guard_name' => 'web']);
        $edit_student = Permission::create(['name' => 'edit student', 'guard_name' => 'web']);
        $delete_student = Permission::create(['name' => 'delete student', 'guard_name' => 'web']);

        $add_alumni = Permission::create(['name' => 'add alumni', 'guard_name' => 'web']);
        $view_alumni = Permission::create(['name' => 'view alumni', 'guard_name' => 'web']);
        $view_detail_alumni = Permission::create(['name' => 'view detail alumni', 'guard_name' => 'web']);
        $edit_alumni = Permission::create(['name' => 'edit alumni', 'guard_name' => 'web']);
        $delete_alumni = Permission::create(['name' => 'delete alumni', 'guard_name' => 'web']);

        $add_lecturer = Permission::create(['name' => 'add lecturer', 'guard_name' => 'web']);
        $view_lecturer = Permission::create(['name' => 'view lecturer', 'guard_name' => 'web']);
        $view_detail_lecturer = Permission::create(['name' => 'view detail lecturer', 'guard_name' => 'web']);
        $edit_lecturer = Permission::create(['name' => 'edit lecturer', 'guard_name' => 'web']);
        $delete_lecturer = Permission::create(['name' => 'delete lecturer', 'guard_name' => 'web']);

        $add_event = Permission::create(['name' => 'add event', 'guard_name' => 'web']);
        $view_event = Permission::create(['name' => 'view event', 'guard_name' => 'web']);
        $view_detail_event = Permission::create(['name' => 'view detail event', 'guard_name' => 'web']);
        $edit_event = Permission::create(['name' => 'edit event', 'guard_name' => 'web']);
        $delete_event = Permission::create(['name' => 'delete event', 'guard_name' => 'web']);

        $add_counseling = Permission::create(['name' => 'add counseling', 'guard_name' => 'web']);
        $view_counseling = Permission::create(['name' => 'view counseling', 'guard_name' => 'web']);
        $view_detail_counseling = Permission::create(['name' => 'view detail counseling', 'guard_name' => 'web']);
        $edit_counseling = Permission::create(['name' => 'edit counseling', 'guard_name' => 'web']);
        $delete_counseling = Permission::create(['name' => 'delete counseling', 'guard_name' => 'web']);

        $add_counselor = Permission::create(['name' => 'add counselor', 'guard_name' => 'web']);
        $view_counselor = Permission::create(['name' => 'view counselor', 'guard_name' => 'web']);
        $view_detail_counselor = Permission::create(['name' => 'view detail counselor', 'guard_name' => 'web']);
        $edit_counselor = Permission::create(['name' => 'edit counselor', 'guard_name' => 'web']);
        $delete_counselor = Permission::create(['name' => 'delete counselor', 'guard_name' => 'web']);

        $add_prayer_request = Permission::create(['name' => 'add prayer request', 'guard_name' => 'web']);
        $view_prayer_request = Permission::create(['name' => 'view prayer request', 'guard_name' => 'web']);
        $view_detail_prayer_request = Permission::create(['name' => 'view detail prayer request', 'guard_name' => 'web']);
        $edit_prayer_request = Permission::create(['name' => 'edit prayer request', 'guard_name' => 'web']);
        $delete_prayer_request = Permission::create(['name' => 'delete prayer request', 'guard_name' => 'web']);

        $add_organizational_record = Permission::create(['name' => 'add organizational record', 'guard_name' => 'web']);
        $view_organizational_record = Permission::create(['name' => 'view organizational record', 'guard_name' => 'web']);
        $view_detail_organizational_record = Permission::create(['name' => 'view detail organizational record', 'guard_name' => 'web']);
        $edit_organizational_record = Permission::create(['name' => 'edit organizational record', 'guard_name' => 'web']);
        $delete_organizational_record = Permission::create(['name' => 'delete organizational record', 'guard_name' => 'web']);

        $add_role = Permission::create(['name' => 'add role', 'guard_name' => 'web']);
        $view_role = Permission::create(['name' => 'view role', 'guard_name' => 'web']);
        $view_detail_role = Permission::create(['name' => 'view detail role', 'guard_name' => 'web']);
        $edit_role = Permission::create(['name' => 'edit role', 'guard_name' => 'web']);
        $delete_role = Permission::create(['name' => 'delete role', 'guard_name' => 'web']);

        $add_user = Permission::create(['name' => 'add user', 'guard_name' => 'web']);
        $view_user = Permission::create(['name' => 'view user', 'guard_name' => 'web']);
        $view_detail_user = Permission::create(['name' => 'view detail user', 'guard_name' => 'web']);
        $edit_user = Permission::create(['name' => 'edit user', 'guard_name' => 'web']);
        $delete_user = Permission::create(['name' => 'delete user', 'guard_name' => 'web']);

        $view_birthday = Permission::create(['name' => 'view birthday', 'guard_name' => 'web']);

        $add_home = Permission::create(['name' => 'add home', 'guard_name' => 'web']);
        $view_home = Permission::create(['name' => 'view home', 'guard_name' => 'web']);
        $view_detail_home = Permission::create(['name' => 'view detail home', 'guard_name' => 'web']);
        $edit_home = Permission::create(['name' => 'edit home', 'guard_name' => 'web']);
        $delete_home = Permission::create(['name' => 'delete home', 'guard_name' => 'web']);

        $add_visi_misi = Permission::create(['name' => 'add visi misi', 'guard_name' => 'web']);
        $view_visi_misi = Permission::create(['name' => 'view visi misi', 'guard_name' => 'web']);
        $view_detail_visi_misi = Permission::create(['name' => 'view detail visi misi', 'guard_name' => 'web']);
        $edit_visi_misi = Permission::create(['name' => 'edit visi misi', 'guard_name' => 'web']);
        $delete_visi_misi = Permission::create(['name' => 'delete visi misi', 'guard_name' => 'web']);

        $add_about = Permission::create(['name' => 'add about', 'guard_name' => 'web']);
        $view_about = Permission::create(['name' => 'view about', 'guard_name' => 'web']);
        $view_detail_about = Permission::create(['name' => 'view detail about', 'guard_name' => 'web']);
        $edit_about = Permission::create(['name' => 'edit about', 'guard_name' => 'web']);
        $delete_about = Permission::create(['name' => 'delete about', 'guard_name' => 'web']);

        $add_renungan = Permission::create(['name' => 'add renungan', 'guard_name' => 'web']);
        $view_renungan = Permission::create(['name' => 'view renungan', 'guard_name' => 'web']);
        $view_detail_renungan = Permission::create(['name' => 'view detail renungan', 'guard_name' => 'web']);
        $edit_renungan = Permission::create(['name' => 'edit renungan', 'guard_name' => 'web']);
        $delete_renungan = Permission::create(['name' => 'delete renungan', 'guard_name' => 'web']);

        $add_testimony = Permission::create(['name' => 'add testimony', 'guard_name' => 'web']);
        $view_testimony = Permission::create(['name' => 'view testimony', 'guard_name' => 'web']);
        $view_detail_testimony = Permission::create(['name' => 'view detail testimony', 'guard_name' => 'web']);
        $edit_testimony = Permission::create(['name' => 'edit testimony', 'guard_name' => 'web']);
        $delete_testimony = Permission::create(['name' => 'delete testimony', 'guard_name' => 'web']);

        $add_count = Permission::create(['name' => 'add count', 'guard_name' => 'web']);
        $view_count = Permission::create(['name' => 'view count', 'guard_name' => 'web']);
        $view_detail_count = Permission::create(['name' => 'view detail count', 'guard_name' => 'web']);
        $edit_count = Permission::create(['name' => 'edit count', 'guard_name' => 'web']);
        $delete_count = Permission::create(['name' => 'delete count', 'guard_name' => 'web']);
        
        // Give Role Permission
        
        /*
            Ketua
        */
        $ketua->givePermissionTo($add_student);
        $ketua->givePermissionTo($view_student);
        $ketua->givePermissionTo($view_detail_student);
        $ketua->givePermissionTo($delete_student);

        $ketua->givePermissionTo($view_alumni);
        $ketua->givePermissionTo($view_detail_alumni);

        $ketua->givePermissionTo($add_lecturer);
        $ketua->givePermissionTo($view_lecturer);
        $ketua->givePermissionTo($view_detail_lecturer);
        $ketua->givePermissionTo($edit_lecturer);
        $ketua->givePermissionTo($delete_lecturer);

        $ketua->givePermissionTo($add_counseling);
        $ketua->givePermissionTo($edit_counseling);
        $ketua->givePermissionTo($view_counseling);
        $ketua->givePermissionTo($view_detail_counseling);
        $ketua->givePermissionTo($delete_counseling);

        $ketua->givePermissionTo($add_counselor);
        $ketua->givePermissionTo($edit_counselor);
        $ketua->givePermissionTo($view_counselor);
        $ketua->givePermissionTo($view_detail_counselor);
        $ketua->givePermissionTo($delete_counselor);

        $ketua->givePermissionTo($view_event);
        $ketua->givePermissionTo($view_detail_event);
        $ketua->givePermissionTo($view_prayer_request);
        $ketua->givePermissionTo($view_detail_prayer_request);
        $ketua->givePermissionTo($add_prayer_request);
        $ketua->givePermissionTo($view_organizational_record);
        $ketua->givePermissionTo($view_detail_organizational_record);
        $ketua->givePermissionTo($add_organizational_record);

        /*
            Sekretaris
        */
        $sekretaris->givePermissionTo($add_student);
        $sekretaris->givePermissionTo($view_student);
        $sekretaris->givePermissionTo($view_detail_student);
        $sekretaris->givePermissionTo($delete_student);

        $sekretaris->givePermissionTo($view_alumni);
        $sekretaris->givePermissionTo($view_detail_alumni);

        $sekretaris->givePermissionTo($add_lecturer);
        $sekretaris->givePermissionTo($view_lecturer);
        $sekretaris->givePermissionTo($view_detail_lecturer);
        $sekretaris->givePermissionTo($edit_lecturer);
        $sekretaris->givePermissionTo($delete_lecturer);

        $sekretaris->givePermissionTo($add_counseling);
        $sekretaris->givePermissionTo($edit_counseling);
        $sekretaris->givePermissionTo($view_counseling);
        $sekretaris->givePermissionTo($view_detail_counseling);
        $sekretaris->givePermissionTo($delete_counseling);

        $sekretaris->givePermissionTo($add_counselor);
        $sekretaris->givePermissionTo($edit_counselor);
        $sekretaris->givePermissionTo($view_counselor);
        $sekretaris->givePermissionTo($view_detail_counselor);
        $sekretaris->givePermissionTo($delete_counselor);

        $sekretaris->givePermissionTo($view_event);
        $sekretaris->givePermissionTo($view_detail_event);
        $sekretaris->givePermissionTo($view_prayer_request);
        $sekretaris->givePermissionTo($view_detail_prayer_request);
        $sekretaris->givePermissionTo($add_prayer_request);
        $sekretaris->givePermissionTo($view_organizational_record);
        $sekretaris->givePermissionTo($view_detail_organizational_record);
        $sekretaris->givePermissionTo($add_organizational_record);

        /*
            Bendahara
        */
        $bendahara->givePermissionTo($add_student);
        $bendahara->givePermissionTo($view_student);
        $bendahara->givePermissionTo($view_detail_student);
        $bendahara->givePermissionTo($delete_student);

        $bendahara->givePermissionTo($view_alumni);
        $bendahara->givePermissionTo($view_detail_alumni);

        $bendahara->givePermissionTo($add_lecturer);
        $bendahara->givePermissionTo($view_lecturer);
        $bendahara->givePermissionTo($view_detail_lecturer);
        $bendahara->givePermissionTo($edit_lecturer);
        $bendahara->givePermissionTo($delete_lecturer);

        $bendahara->givePermissionTo($add_counseling);
        $bendahara->givePermissionTo($edit_counseling);
        $bendahara->givePermissionTo($view_counseling);
        $bendahara->givePermissionTo($view_detail_counseling);
        $bendahara->givePermissionTo($delete_counseling);

        $bendahara->givePermissionTo($add_counselor);
        $bendahara->givePermissionTo($edit_counselor);
        $bendahara->givePermissionTo($view_counselor);
        $bendahara->givePermissionTo($view_detail_counselor);
        $bendahara->givePermissionTo($delete_counselor);

        $bendahara->givePermissionTo($view_event);
        $bendahara->givePermissionTo($view_detail_event);
        $bendahara->givePermissionTo($view_prayer_request);
        $bendahara->givePermissionTo($view_detail_prayer_request);
        $bendahara->givePermissionTo($add_prayer_request);
        $bendahara->givePermissionTo($view_organizational_record);
        $bendahara->givePermissionTo($view_detail_organizational_record);
        $bendahara->givePermissionTo($add_organizational_record);

        /*
            Mahasiswa
        */
        $mahasiswa->givePermissionTo($view_student);

        $mahasiswa->givePermissionTo($view_lecturer);

        $mahasiswa->givePermissionTo($add_counseling);
        $mahasiswa->givePermissionTo($edit_counseling);
        $mahasiswa->givePermissionTo($view_counseling);
        $mahasiswa->givePermissionTo($view_detail_counseling);

        $mahasiswa->givePermissionTo($view_counselor);

        $mahasiswa->givePermissionTo($view_event);
        $mahasiswa->givePermissionTo($view_detail_event);
        $mahasiswa->givePermissionTo($view_prayer_request);
        $mahasiswa->givePermissionTo($view_detail_prayer_request);
        $mahasiswa->givePermissionTo($add_prayer_request);
        $mahasiswa->givePermissionTo($view_organizational_record);
        $mahasiswa->givePermissionTo($view_detail_organizational_record);
        $mahasiswa->givePermissionTo($add_organizational_record);

        /*
            Dosen
        */
        $dosen->givePermissionTo($view_student);

        $dosen->givePermissionTo($view_alumni);

        $dosen->givePermissionTo($view_lecturer);

        $dosen->givePermissionTo($add_counseling);
        $dosen->givePermissionTo($edit_counseling);
        $dosen->givePermissionTo($view_counseling);
        $dosen->givePermissionTo($view_detail_counseling);

        $dosen->givePermissionTo($view_counselor);

        $dosen->givePermissionTo($view_event);
        $dosen->givePermissionTo($view_detail_event);
        


        /*
            Dosen pengurus tpkk
        */
        $pengurus_tpkk->givePermissionTo($view_student);

        $pengurus_tpkk->givePermissionTo($view_alumni);

        $pengurus_tpkk->givePermissionTo($add_lecturer);
        $pengurus_tpkk->givePermissionTo($view_lecturer);
        $pengurus_tpkk->givePermissionTo($view_detail_lecturer);
        $pengurus_tpkk->givePermissionTo($delete_lecturer);

        $pengurus_tpkk->givePermissionTo($add_counseling);
        $pengurus_tpkk->givePermissionTo($edit_counseling);
        $pengurus_tpkk->givePermissionTo($view_counseling);
        $pengurus_tpkk->givePermissionTo($view_detail_counseling);

        $pengurus_tpkk->givePermissionTo($view_counselor);
        $pengurus_tpkk->givePermissionTo($view_detail_counselor);

        $pengurus_tpkk->givePermissionTo($view_event);
        $pengurus_tpkk->givePermissionTo($view_detail_event);
        

    
        /*
            Alumni
        */
        $alumni->givePermissionTo($view_alumni);

        $alumni->givePermissionTo($add_counseling);
        $alumni->givePermissionTo($edit_counseling);
        $alumni->givePermissionTo($view_counseling);
        $alumni->givePermissionTo($view_detail_counseling);

        $alumni->givePermissionTo($view_counselor);

        $alumni->givePermissionTo($view_event);
        $alumni->givePermissionTo($view_detail_event);

        
        /*
            Pengurus alumni
        */
        $pengurus_alumni->givePermissionTo($add_alumni);
        $pengurus_alumni->givePermissionTo($view_alumni);
        $pengurus_alumni->givePermissionTo($view_detail_alumni);
        $pengurus_alumni->givePermissionTo($edit_alumni);
        $pengurus_alumni->givePermissionTo($delete_alumni);

        $pengurus_alumni->givePermissionTo($view_lecturer);

        $pengurus_alumni->givePermissionTo($add_counseling);
        $pengurus_alumni->givePermissionTo($edit_counseling);
        $pengurus_alumni->givePermissionTo($view_counseling);
        $pengurus_alumni->givePermissionTo($view_detail_counseling);

        $pengurus_alumni->givePermissionTo($view_counselor);
        
        $pengurus_alumni->givePermissionTo($view_event);
        $pengurus_alumni->givePermissionTo($view_detail_event);
        
    }
}
