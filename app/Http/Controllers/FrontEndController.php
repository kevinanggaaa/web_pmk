<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandingPageAbout;
use App\Models\LandingPageVisiMisi;
use App\Models\LandingPageHome;
use App\Models\LandingPageRenungan;

class FrontEndController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexHome()
    {
        
    }

    public function indexVisiMisi()
    {
        
    }

    public function indexAbout()
    {
        
    }

    public function indexRenungan()
    {
        
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
        //
    }

    public function storeVisiMisi(Request $request)
    {
        
    }

    public function storeAbout(Request $request)
    {
        
    }

    public function storeRenungan(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showHome($id)
    {
        //
    }

    public function showVisiMisi($id)
    {
        
    }

    public function showAbout($id)
    {
        
    }

    public function showRenungan($id)
    {
        
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editHome($id)
    {
        //
    }

    public function editVisiMisi($id)
    {
        
    }

    public function editAbout($id)
    {
        
    }

    public function editRenungan($id)
    {
        
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
        //
    }

    public function updateVisiMisi(Request $request, $id)
    {
        
    }

    public function updateAbout(Request $request, $id)
    {
        
    }

    public function updateRenungan(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyHome($id)
    {
        $home = LandingPageHome::find($id);
        $home->delete();
        return redirect()->route('landingPageHome.index')
            ->with('success', 'Data landing page home berhasil dihapus');
    }

    public function destroyVisiMisi($id)
    {
        $VisiMisi = LandingPageVisiMisi::find($id);
        $VisiMisi->delete();
        return redirect()->route('landingPageVisiMisi.index')
            ->with('success', 'Data landing page visi misi berhasil dihapus');
    }

    public function destroyAbout($id)
    {
        $About = LandingPageAbout::find($id);
        $About->delete();
        return redirect()->route('landingPageAbout.index')
            ->with('success', 'Data landing page about berhasil dihapus');
    }

    public function destroyRenungan($id)
    {
        $Renungan = LandingPageRenungan::find($id);
        $Renungan->delete();
        return redirect()->route('landingPageRenungan.index')
            ->with('success', 'Data landing page renungan berhasil dihapus');
    }
}
