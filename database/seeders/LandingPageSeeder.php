<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\LandingPageAbout;
use App\Models\LandingPageHome;
use App\Models\LandingPageRenungan;
use App\Models\LandingPageVisiMisi;
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
            'image' => 'example1.JPG'
        ]);

        LandingPageHome::create([
            'title' => 'Perkumpulan Mahasiswa Kristen ITS',
            'subtitle' => 'PMK ITS',
            'description' => 'Persekutuan Mahasiswa Kristen ITS adalah organisasi mahasiswa yang bergerak dalam bidang kerohanian Kristen. Beberapa pelayanan yang dikerjakan oleh PMK ITS antara lain Persekutuan Jumat, KKR Mahasiswa Baru, Camp Mahasiswa Baru, Natal & Paskah ITS, serta pelayanan diakonia dan lainnya.',
            'image' => 'example2.JPG'
        ]);

        LandingPageHome::create([
            'title' => 'PJ',
            'subtitle' => 'Persekutuan Jumat',
            'description' => 'Persekutuan Jumat merupakan kegiatan yang memberikan pertumbuhan rohani.',
            'image' => 'example3.JPG'
        ]);

        LandingPageVisiMisi::create([
            'title1' => 'Misi #1',
            'title2' => 'Misi #2',
            'title3' => 'Misi #3',
            'description1' => 'Membuat PMK yang lebih baik',
            'description2' => 'Membuat PMK yang lebih teratur',
            'description3' => 'Membuat PMK yang lebih maju',
            'judul' => 'Visi',
            'subjudul' => 'Memperkuat kehidupan rohani mahasiswa Kristen ITS'
        ]);

        LandingPageAbout::create([
            'title' => 'Apa itu TPKK dan PMK ITS ?',
            'subtitle' => 'About',
            'description' => 'TPK Kristen mewadahi mahasiswa beragama Kristen dan menyelenggarakan berbagai acara keagamaan. PMK adalah Persekutuan Mahasiswa Kristen',
            'image' => 'example1.jpg'
        ]);

        LandingPageRenungan::create([
            'title' => 'Renungan 1',
            'lokasiFirman' => 'Matius 1 : 1',
            'isiFirman' => 'Inilah silsilah Yesus Kristus, anak Daud, anak Abraham.',
            'bacaan' => 'Inilah silsilah Yesus Kristus, anak Daud, anak Abraham.',
            'image' => 'example1.jpg'
        ]);

        Event::create([
            'title' => 'Persekutuan Jumat Perdana',
            'description' => 'Persekutuan Jumat Perdana',
            'type' => 'PJ',
            'start' => '2021-02-20 00:00:00',
            'end' => '2021-02-21 00:00:00',
            'slug' => 'persekutuan-jumat-perdana',
            'attendant_count' => '1',
            'attendant_id' => '1;',
            'report' => 'great',
            'creator_id' => '1',
            'creator_type' => 'mahasiswa',
            'image' => 'default.jpg'
        ],[
            'title' => 'Persekutuan Jumat Kedua',
            'description' => 'Persekutuan Jumat Kedua',
            'type' => 'PJ',
            'start' => '2021-02-20 00:00:00',
            'end' => '2021-02-21 00:00:00',
            'slug' => 'persekutuan-jumat-kedua',
            'attendant_count' => '3',
            'attendant_id' => '1;2;3',
            'report' => 'great',
            'creator_id' => '1',
            'creator_type' => 'mahasiswa',
            'image' => 'default.jpg'
        ],[
            'title' => 'Persekutuan Jumat Ketiga',
            'description' => 'Persekutuan Jumat Ketiga',
            'type' => 'PJ',
            'start' => '2021-02-20 00:00:00',
            'end' => '2021-02-21 00:00:00',
            'slug' => 'persekutuan-jumat-ketiga',
            'attendant_count' => '2',
            'attendant_id' => '1;2;',
            'report' => 'great',
            'creator_id' => '1',
            'creator_type' => 'mahasiswa',
            'image' => 'default.jpg'
        ]);
    }
}
