<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\LandingPageHome;
use App\Models\LandingPageAbout;
use Illuminate\Support\Facades\DB;
use App\Models\LandingPageRenungan;
use App\Models\LandingPageTestimony;
use App\Models\LandingPageVisiMisi;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexAll()
    {
        $homes = LandingPageHome::latest()->take(3)->get()->sortByDesc("id");
        $VisiMisi = DB::table('landing_page_visi_misis')->latest()->first();
        $about = DB::table('landing_page_abouts')->latest()->first();
        $renungans = LandingPageRenungan::latest()->take(3)->get()->sortByDesc("id");
        $psJumats = Event::where('type', 'PJ')->latest()->take(3)->get()->sortByDesc("id");
        $testimonies = LandingPageTestimony::latest()->take(5)->get()->sortByDesc("id");
        $events = Event::where('type', '!=', 'PJ')
                        ->where('type', '!=', 'Student')
                        ->where('type', '!=', 'Alumni')
                        ->where('type', '!=', 'Lecturer')
                        ->latest()->take(3)->get()->sortByDesc("id");

        return view('home', compact('homes', 'VisiMisi', 'about', 'renungans', 'psJumats', 'testimonies', 'events'));
    }

    public function indexHome()
    {
        $homes = LandingPageHome::all();
        return view('landingPageHome.index', compact('homes'));
    }

    public function indexVisiMisi()
    {
        $VisiMisis = LandingPageVisiMisi::all();
        return view('landingPageVisiMisi.index', compact('VisiMisis'));
    }

    public function indexAbout()
    {
        $abouts = LandingPageAbout::all();
        return view('landingPageAbout.index', compact('abouts'));
    }

    public function indexRenungan()
    {
        $renungans = LandingPageRenungan::all();
        return view('landingPageRenungan.index', compact('renungans'));
    }

    public function indexTestimony()
    {
        $testimonies = LandingPageTestimony::all();
        return view('landingPageTestimony.index', compact('testimonies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createHome()
    {
        return view('landingPageHome.create');
    }

    public function createVisiMisi()
    {
        return view('landingPageVisiMisi.create');
    }

    public function createAbout()
    {
        return view('landingPageAbout.create');
    }

    public function createRenungan()
    {
        return view('landingPageRenungan.create');
    }

    public function createTestimony()
    {
        return view('landingPageTestimony.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeHome(Request $request)
    {
        if($request['image'] == null){
            $nama_file = 'default.jpg';
        }
        else{
            $file = $request['image'];
            $nama_file = time().'_'.$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'landingpage/home';
            $file->move($tujuan_upload, $nama_file);
        }
        $home = LandingPageHome::create([
            'title' => $request['title'],
            'subtitle' => $request['subtitle'],
            'description' => $request['description'],
            'image' => $nama_file
        ]);

        return redirect()->route('landingPage.indexHome')
            ->with('success', 'Data landing page home berhasil ditambahkan');
    }

    public function storeVisiMisi(Request $request)
    {
        $VisiMisi = LandingPageVisiMisi::create([
            'title1' => $request['title1'],
            'description1' => $request['description1'],
            'title2' => $request['title2'],
            'description2' => $request['description2'],
            'title3' => $request['title3'],
            'description3' => $request['description3'],
            'judul' => $request['judul'],
            'subjudul' => $request['subjudul'],
        ]);

        return redirect()->route('landingPage.indexVisiMisi')
            ->with('success', 'Data landing page visi misi berhasil ditambahkan');
    }

    public function storeAbout(Request $request)
    {
        if($request['image'] == null){
            $nama_file = 'default.jpg';
        }
        else{
            $file = $request['image'];
            $nama_file = time().'_'.$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'landingpage/about';
            $file->move($tujuan_upload, $nama_file);
        }
        $about = LandingPageAbout::create([
            'title' => $request['title'],
            'subtitle' => $request['subtitle'],
            'description' => $request['description'],
            'image' => $nama_file
        ]);

        return redirect()->route('landingPage.indexAbout')
            ->with('success', 'Data landing page about berhasil ditambahkan');
    }

    public function storeRenungan(Request $request)
    {
        if($request['image'] == null){
            $nama_file = 'default.jpg';
        }
        else{
            $file = $request['image'];
            $nama_file = time().'_'.$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'landingpage/renungan';
            $file->move($tujuan_upload, $nama_file);
        }
        $renungan = LandingPageRenungan::create([
            'title' => $request['title'],
            'lokasiFirman' => $request['lokasiFirman'],
            'isiFirman' => $request['isiFirman'],
            'bacaan' => $request['bacaan'],
            'tanggal' => $request['tanggal'],
            'image' => $nama_file
        ]);

        return redirect()->route('landingPage.indexRenungan')
            ->with('success', 'Data landing page renungan berhasil ditambahkan');
    }

    public function storeTestimony(Request $request)
    {
        if($request['image'] == null){
            $nama_file = 'default.jpg';
        }
        else{
            $file = $request['image'];
            $nama_file = time().'_'.$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'landingpage/testimony';
            $file->move($tujuan_upload, $nama_file);
        }
        $renungan = LandingPageRenungan::create([
            'name' => $request['name'],
            'position' => $request['position'],
            'quote' => $request['quote'],
            'image' => $nama_file
        ]);

        return redirect()->route('landingPage.indexTestimony')
            ->with('success', 'Data landing page kesaksian berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showHome(LandingPageHome $home)
    {
        // $home = LandingPageHome::select()->where('id', $id)->first();
        return view('landingPageHome.show', compact('home'));
    }

    public function showVisiMisi(LandingPageVisiMisi $VisiMisi)
    {
        // $VisiMisi = LandingPageVisiMisi::select()->where('id', $id)->first();
        return view('landingPageVisiMisi.show', compact('VisiMisi'));
    }

    public function showAbout(LandingPageAbout $about)
    {
        // $about = LandingPageAbout::select()->where('id', $id)->first();
        return view('landingPageAbout.show', compact('about'));
    }

    public function showRenungan(LandingPageRenungan $renungan)
    {
        // $renungan = LandingPageRenungan::select()->where('id', $id)->first();
        return view('landingPageRenungan.show', compact('renungan'));
    }


    public function showTestimony(LandingPageTestimony $testimony)
    {
        return view('landingPageTestimony.show', compact('testimony'));
    }

    public function showRenunganDetail(LandingPageRenungan $renungan)
    {
        // $renungan = LandingPageRenungan::select()->where('id', $id)->first();
        return view('landingPageRenungan.renungan', compact('renungan'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editHome(LandingPageHome $home)
    {
        // $home = LandingPageHome::select()->where('id', $id)->first();
        return view('landingPageHome.edit', compact('home'));
    }

    public function editVisiMisi(LandingPageVisiMisi $VisiMisi)
    {
        // $VisiMisi = LandingPageVisiMisi::select()->where('id', $id)->first();
        return view('landingPageVisiMisi.edit', compact('VisiMisi'));
    }

    public function editAbout(LandingPageAbout $about)
    {
        // $about = LandingPageAbout::select()->where('id', $id)->first();
        return view('landingPageAbout.edit', compact('about'));
    }

    public function editRenungan(LandingPageRenungan $renungan)
    {
        // $renungan = LandingPageRenungan::select()->where('id', $id)->first();
        return view('landingPageRenungan.edit', compact('renungan'));
    }

    public function editTestimony(LandingPageTestimony $testimony)
    {
        return view('landingPageTestimony.edit', compact('testimony'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateHome(Request $request,  LandingPageHome $home)
    {
        // $home = LandingPageHome::select()->where('id', $id)->first();

        $home->title = $request->title;
        $home->subtitle = $request->subtitle;
        $home->description = $request->description;
        $home->save();

        return redirect()->route('landingPage.indexHome')
                ->with('success', 'Data landing page home berhasil diubah');
    }

    public function updateVisiMisi(Request $request, LandingPageVisiMisi $VisiMisi)
    {

        // $VisiMisi = LandingPageVisiMisi::select()->where('id', $id)->first();

        $VisiMisi->title1 = $request->title1;
        $VisiMisi->description1 = $request->description1;
        $VisiMisi->title2 = $request->title2;
        $VisiMisi->description2 = $request->description2;
        $VisiMisi->title3 = $request->title3;
        $VisiMisi->description3 = $request->description3;
        $VisiMisi->judul = $request->judul;
        $VisiMisi->subjudul = $request->subjudul;
        $VisiMisi->save();

        return redirect()->route('landingPage.indexVisiMisi')
            ->with('success', 'Data landing page visi misi berhasil diubah');
    }

    public function updateAbout(Request $request, LandingPageAbout $about)
    {
        // $about = LandingPageAbout::select()->where('id', $id)->first();

        $about->title = $request->title;
        $about->subtitle = $request->subtitle;
        $about->description = $request->description;
        $about->save();

        return redirect()->route('landingPage.indexAbout')
                ->with('success', 'Data landing page about berhasil diubah');
    }

    public function updateRenungan(Request $request, LandingPageRenungan $renungan)
    {

        // $renungan = LandingPageRenungan::select()->where('id', $id)->first();

        $renungan->title = $request->title;
        $renungan->lokasiFirman = $request->lokasiFirman;
        $renungan->isiFirman = $request->isiFirman;
        $renungan->bacaan = $request->bacaan;
        $renungan->tanggal = $request->tanggal;
        $renungan->save();

        return redirect()->route('landingPage.indexRenungan')
                ->with('success', 'Data landing page renungan berhasil diubah');

    }

    public function updateTestimony(Request $request, LandingPageTestimony $testimony)
    {
        $testimony->name = $request->name;
        $testimony->position = $request->position;
        $testimony->quote = $request->quote;
        $testimony->save();

        return redirect()->route('landingPage.indexTestimony')
                ->with('success', 'Data landing page kesaksian berhasil diubah');

    }

    public function updateHomeAvatar(Request $request, LandingPageHome $home)
    {
        
        if($request['image'] == null){
            $nama_file = 'default.jpg';
        }
        else{
            $file = $request['image'];
            $nama_file = time().'_'.$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'landingpage/home';
            $file->move($tujuan_upload, $nama_file);
        }

        // $home = LandingPageHome::select()->where('id', $id)->first();

        $home->image = $nama_file;
        $home->save();

        return redirect()->route('landingPage.indexHome')
            ->with('success', 'Foto landing page home berhasil diubah');
    }

    public function updateAboutAvatar(Request $request, LandingPageAbout $about)
    {
        
        if($request['image'] == null){
            $nama_file = 'default.jpg';
        }
        else{
            $file = $request['image'];
            $nama_file = time().'_'.$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'landingpage/about';
            $file->move($tujuan_upload, $nama_file);
        }

        // $about = LandingPageAbout::select()->where('id', $id)->first();

        $about->image = $nama_file;
        $about->save();

        return redirect()->route('landingPage.indexAbout')
            ->with('success', 'Foto landing page about berhasil diubah');
    }

    public function updateRenunganAvatar(Request $request, LandingPageRenungan $renungan)
    {
        
        if($request['image'] == null){
            $nama_file = 'default.jpg';
        }
        else{
            $file = $request['image'];
            $nama_file = time().'_'.$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'landingpage/renungan';
            $file->move($tujuan_upload, $nama_file);
        }

        // $renungan = LandingPageRenungan::select()->where('id', $id)->first();

        $renungan->image = $nama_file;
        $renungan->save();

        return redirect()->route('landingPage.indexRenungan')
            ->with('success', 'Foto landing page renungan berhasil diubah');
    }

    public function updateTestimonyAvatar(Request $request, LandingPageTestimony $testimony)
    {
        
        if($request['image'] == null){
            $nama_file = 'default.jpg';
        }
        else{
            $file = $request['image'];
            $nama_file = time().'_'.$file->getClientOriginalName();
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'landingpage/testimony';
            $file->move($tujuan_upload, $nama_file);
        }

        $testimony->image = $nama_file;
        $testimony->save();

        return redirect()->route('landingPage.indexTestimony')
            ->with('success', 'Foto landing page kesaksian berhasil diubah');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyHome(LandingPageHome $home)
    {
        // $home = LandingPageHome::select()->where('id', $id)->first();
        $home->delete();
        return redirect()->route('landingPage.indexHome')
            ->with('success', 'Data landing page home berhasil dihapus');
    }

    public function destroyVisiMisi(LandingPageVisiMisi $VisiMisi)
    {
        // $VisiMisi = LandingPageVisiMisi::select()->where('id', $id)->first();
        $VisiMisi->delete();
        return redirect()->route('landingPage.indexVisiMisi')
            ->with('success', 'Data landing page visi misi berhasil dihapus');
    }

    public function destroyAbout(LandingPageAbout $about)
    {
        // $about = LandingPageAbout::select()->where('id', $id)->first();
        $about->delete();
        return redirect()->route('landingPage.indexAbout')
            ->with('success', 'Data landing page about berhasil dihapus');
    }

    public function destroyRenungan(LandingPageRenungan $renungan)
    {
        // $renungan = LandingPageRenungan::select()->where('id', $id)->first();
        $renungan->delete();
        return redirect()->route('landingPage.indexRenungan')
            ->with('success', 'Data landing page renungan berhasil dihapus');
    }

    public function destroyTestimony(LandingPageTestimony $testimony)
    {
        $testimony->delete();
        return redirect()->route('landingPage.indexTestimony')
            ->with('success', 'Data landing page kesaksian berhasil dihapus');
    }
}
