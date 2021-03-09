<?php

namespace Database\Seeders;

use App\Models\LandingPageHome;
use Illuminate\Database\Seeder;

class LandingPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LandingPageHome::create([
            'title' => 'Tim Pembina Kerohanian ITS',
            'subtitle' => 'TPKK ITS',
            'description' => 'TPK Kristen mewadahi mahasiswa beragama Kristen dan menyelenggarakan berbagai acara keagamaan.',
            'image' => '1615281507_IMG_3100.JPG'
        ],[
            'title' => 'Perkumpulan Mahasiswa Kristen ITS',
            'subtitle' => 'PMK ITS',
            'description' => 'Persekutuan Mahasiswa Kristen ITS adalah organisasi mahasiswa yang bergerak dalam bidang kerohanian Kristen. Beberapa pelayanan yang dikerjakan oleh PMK ITS antara lain Persekutuan Jumat, KKR Mahasiswa Baru, Camp Mahasiswa Baru, Natal & Paskah ITS, serta pelayanan diakonia dan lainnya.',
            'image' => '1615281507_IMG_3100.JPG'
        ],[
            'title' => 'PJ',
            'subtitle' => 'Persekutuan Jumat',
            'description' => 'Persekutuan Jumat merupakan kegiatan yang memberikan pertumbuhan rohani.',
            'image' => '1615281507_IMG_3100.JPG'
        ]);
    }
}
