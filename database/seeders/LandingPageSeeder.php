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
            'description' => 'Persekutuan Mahasiswa Kristen ITS adalah organisasi mahasiswa yang bergerak dalam bidang kerohanian Kristen.',
            'image' => 'example2.JPG'
        ]);

        LandingPageHome::create([
            'title' => 'PJ',
            'subtitle' => 'Persekutuan Jumat',
            'description' => 'Persekutuan Jumat merupakan kegiatan yang memberikan pertumbuhan rohani.',
            'image' => 'example3.JPG'
        ]);

        LandingPageVisiMisi::create([
            'title1' => 'Iman',
            'description1' => 'Membangun iman mahasiswa kristen melalui acara kerohanian',
            'title2' => 'Media Informasi',
            'description2' => 'Menanamkan nilai PMK ITS melalui  wadah media informasi',
            'title3' => 'Pertumbuhan',
            'description3' => 'Mewadahi pertumbuhan mahasiswa PMK ITS melalui persekutuan, pelayanan, dan pemuridan',
            'judul' => 'Visi PMK ITS',
            'subjudul' => 'Menjadi alat untuk memperkenalkan Kristus kepada mahasiswa Kristen ITS dan wadah bersekutu dalam membangun iman Kristen yang berintegritas kepada Tuhan dan sesama',
        ]);

        LandingPageAbout::create([
            'title' => 'Apa itu TPKK dan PMK ITS ?',
            'subtitle' => 'About',
            'description' => 'TPK Kristen mewadahi mahasiswa beragama Kristen dan menyelenggarakan berbagai acara keagamaan. PMK adalah Persekutuan Mahasiswa Kristen',
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
            'speaker' => 'speaker 1',
            'report' => 'great',
            'creator_id' => '1',
            'creator_type' => 'mahasiswa',
            'image' => 'default.jpg'
        ]);

        Event::create([
            'title' => 'Persekutuan Jumat Kedua',
            'description' => 'Persekutuan Jumat Kedua',
            'type' => 'PJ',
            'start' => '2021-02-20 00:00:00',
            'end' => '2021-02-21 00:00:00',
            'slug' => 'persekutuan-jumat-kedua',
            'attendant_count' => '3',
            'attendant_id' => '1;2;3',
            'speaker' => 'speaker 2',
            'report' => 'great',
            'creator_id' => '1',
            'creator_type' => 'mahasiswa',
            'image' => 'default.jpg'
        ]);

        Event::create([
            'title' => 'Persekutuan Jumat Ketiga',
            'description' => 'Persekutuan Jumat Ketiga',
            'type' => 'PJ',
            'start' => '2021-02-20 00:00:00',
            'end' => '2021-02-21 00:00:00',
            'slug' => 'persekutuan-jumat-ketiga',
            'attendant_count' => '2',
            'attendant_id' => '1;2;',
            'speaker' => 'speaker 3',
            'report' => 'great',
            'creator_id' => '1',
            'creator_type' => 'mahasiswa',
            'image' => 'default.jpg',
        ]);


        LandingPageRenungan::create([
            'title' => 'Kaya di dalam Tuhan',
            'lokasiFirman' => '2 KORINTUS 8:1-15',
            'isiFirman' => 'Karena itu, sekarang, sama seperti kamu kaya dalam segala sesuatu—dalam iman, dalam perkataan, dalam pengetahuan, dalam kesungguhan untuk membantu, dan dalam kasihmu terhadap kami—demikianlah juga hendaknya kamu kaya dalam pelayanan kasih ini. (2 Korintus 8:7)',
            'bacaan' => 'Kekayaan di dalam iman kepada Tuhan Yesus Kristus tidak bergantung kepada harta benda. Karena itu tidak perlu menunggu memiliki banyak harta untuk dapat menjadi kaya di dalam Tuhan. Pun tidak perlu menunggu berkelimpahan harta untuk dapat melakukan kasih.',
            'image' => 'example1.JPG'
        ]);
        
        LandingPageRenungan::create([
            'title' => 'Berkemah',
            'lokasiFirman' => ' 2 KORINTUS 5:1-10',
            'isiFirman' => 'Selama kita di dalam kemah ini, kita mengeluh, karena kita rindu mengenakan tempat kediaman surgawi. (2 Korintus 5:2)',
            'bacaan' => 'Rick Warren mengatakan, hidup adalah persiapan untuk kekekalan. Di dunia ini Allah ingin melatih kita untuk hidup dalam kekekalan. Tuhan lebih tertarik kepada karakter kita daripada kesuksesan kita, kesucian hidup daripada kesenangan.',
            'image' => 'example2.JPG'
        ]);

        LandingPageRenungan::create([
            'title' => 'Selamat karena kebiasaan',
            'lokasiFirman' => 'AMSAL 22:6, 24-25',
            'isiFirman' => 'Didiklah orang muda menurut jalan yang patut baginya, maka pada masa tuanya pun ia tidak akan menyimpang dari pada jalan itu. (Amsal 22:6)',
            'bacaan' => 'Kitab Amsal banyak mengusung tema pendidikan. Kunci pendidikan terletak pada kebiasaan yang dibangun lewat pengulangan dari waktu ke waktu. Akhirnya, kebiasaan yang terbentuk itulah yang mengendalikan sebagian besar dari perilaku dan tindakan kita.',
            'image' => 'example3.JPG'
        ]);
    }
}
