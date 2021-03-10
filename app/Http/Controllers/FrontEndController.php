<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\LandingPageHome;
use App\Models\LandingPageAbout;
use Illuminate\Support\Facades\DB;
use App\Models\LandingPageRenungan;
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
        $homes = LandingPageHome::latest()->take(3)->get();
        $VisiMisi = DB::table('landing_page_visi_misis')->latest()->first();
        $about = DB::table('landing_page_abouts')->latest()->first();
        $renungans = LandingPageRenungan::latest()->take(3)->get();
        $psJumats = Event::where('type', 'PJ')->latest()->take(3)->get();

        return view('home', compact('homes', 'VisiMisi', 'about', 'renungans', 'psJumats'));
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
            'image' => $nama_file
        ]);

        return redirect()->route('landingPage.indexRenungan')
            ->with('success', 'Data landing page renungan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showHome($id)
    {
        $home = LandingPageHome::select()->where('id', $id)->first();
        return view('landingPageHome.show', compact('home'));
    }

    public function showVisiMisi($id)
    {
        $VisiMisi = LandingPageVisiMisi::select()->where('id', $id)->first();
        return view('landingPageVisiMisi.show', compact('VisiMisi'));
    }

    public function showAbout($id)
    {
        $about = LandingPageAbout::select()->where('id', $id)->first();
        return view('landingPageAbout.show', compact('about'));
    }

    public function showRenungan($id)
    {
        $renungan = LandingPageRenungan::select()->where('id', $id)->first();
        return view('landingPageRenungan.show', compact('renungan'));
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editHome($id)
    {
        $home = LandingPageHome::select()->where('id', $id)->first();
        return view('landingPageHome.edit', compact('home'));
    }

    public function editVisiMisi($id)
    {
        $VisiMisi = LandingPageVisiMisi::select()->where('id', $id)->first();
        return view('landingPageVisiMisi.edit', compact('VisiMisi'));
    }

    public function editAbout($id)
    {
        $about = LandingPageAbout::select()->where('id', $id)->first();
        return view('landingPageAbout.edit', compact('about'));
    }

    public function editRenungan($id)
    {
        $renungan = LandingPageRenungan::select()->where('id', $id)->first();
        return view('landingPageRenungan.edit', compact('renungan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateHome(Request $request, $id)
    {
        $home = LandingPageHome::select()->where('id', $id)->first();

        $home->title = $request->title;
        $home->subtitle = $request->subtitle;
        $home->description = $request->description;
        $home->save();

        return redirect()->route('landingPage.indexHome')
                ->with('success', 'Data landing page home berhasil diubah');
    }

    public function updateVisiMisi(Request $request, $id)
    {

        $VisiMisi = LandingPageVisiMisi::select()->where('id', $id)->first();

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

    public function updateAbout(Request $request, $id)
    {
        $about = LandingPageAbout::select()->where('id', $id)->first();

        $about->title = $request->title;
        $about->subtitle = $request->subtitle;
        $about->description = $request->description;
        $about->save();

        return redirect()->route('landingPage.indexAbout')
                ->with('success', 'Data landing page about berhasil diubah');
    }

    public function updateRenungan(Request $request, $id)
    {

        $renungan = LandingPageRenungan::select()->where('id', $id)->first();

        $renungan->title = $request->title;
        $renungan->lokasiFirman = $request->lokasiFirman;
        $renungan->isiFirman = $request->isiFirman;
        $renungan->bacaan = $request->bacaan;
        $renungan->save();

        return redirect()->route('landingPage.indexRenungan')
                ->with('success', 'Data landing page renungan berhasil diubah');

    }

    public function updateHomeAvatar(Request $request, User $id)
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

        $home = LandingPageHome::select()->where('id', $id)->first();

        $home->image = $nama_file;
        $home->save();

        return redirect()->route('landingPage.indexHome')
            ->with('success', 'Foto landing page home berhasil diubah');
    }

    public function updateAboutAvatar(Request $request, User $id)
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

        $about = LandingPageAbout::select()->where('id', $id)->first();

        $about->image = $nama_file;
        $about->save();

        return redirect()->route('landingPage.indexAbout')
            ->with('success', 'Foto landing page about berhasil diubah');
    }

    public function updateRenunganAvatar(Request $request, User $id)
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

        $renungan = LandingPageRenungan::select()->where('id', $id)->first();

        $renungan->image = $nama_file;
        $renungan->save();

        return redirect()->route('landingPage.indexRenungan')
            ->with('success', 'Foto landing page renungan berhasil diubah');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyHome($id)
    {
        $home = LandingPageHome::select()->where('id', $id)->first();
        $home->delete();
        return redirect()->route('landingPage.indexHome')
            ->with('success', 'Data landing page home berhasil dihapus');
    }

    public function destroyVisiMisi($id)
    {
        $VisiMisi = LandingPageVisiMisi::select()->where('id', $id)->first();
        $VisiMisi->delete();
        return redirect()->route('landingPage.indexVisiMisi')
            ->with('success', 'Data landing page visi misi berhasil dihapus');
    }

    public function destroyAbout($id)
    {
        $about = LandingPageAbout::select()->where('id', $id)->first();
        $About->delete();
        return redirect()->route('landingPage.indexAbout')
            ->with('success', 'Data landing page about berhasil dihapus');
    }

    public function destroyRenungan($id)
    {
        $renungan = LandingPageRenungan::select()->where('id', $id)->first();
        $Renungan->delete();
        return redirect()->route('landingPage.indexRenungan')
            ->with('success', 'Data landing page renungan berhasil dihapus');
    }
}
