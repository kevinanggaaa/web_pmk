<?php

namespace App\Http\Controllers;

use App\Models\OrganizationalRecord;
use Illuminate\Http\Request;
use App\Http\Requests\OrganizationalRecordRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class OrganizationalRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organizationalRecords = OrganizationalRecord::all();
        $users = User::all();

        return view('organizationalRecords.index', compact('organizationalRecords', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organizationalRecords.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user()->id;
        // dd($request['year_end']);
        OrganizationalRecord::create([
            'user_id' => $user,
            'position' => $request['position'],
            'category' => $request['category'],
            'year_start' => $request['year_start'],
            'year_end' => $request['year_end'],
        ]);

        return redirect()->route('organizationalRecords.index')
            ->with('success', 'Data organisasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrganizationalRecord  $organizationalRecord
     * @return \Illuminate\Http\Response
     */
    public function show(OrganizationalRecord $organizationalRecord)
    {
        return view('organizationalRecords.show', compact('organizationalRecord'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrganizationalRecord  $organizationalRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(OrganizationalRecord $organizationalRecord)
    {
        return view('organizationalRecords.edit', compact('organizationalRecord'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OrganizationalRecord  $organizationalRecord
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrganizationalRecord $organizationalRecord)
    {
        $organizationalRecord->position = $request['position'];
        $organizationalRecord->category = $request['category'];
        $organizationalRecord->year_start = $request['year_start'];
        $organizationalRecord->year_end = $request['year_end'];

        $organizationalRecord->save();

        return redirect()->route('organizationalRecords.index')
            ->with('success', 'Data organisasi berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrganizationalRecord  $organizationalRecord
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrganizationalRecord $organizationalRecord)
    {
        $organizationalRecord->delete();

        return redirect()->route('organizationalRecords.index')
            ->with('success', 'Data organisasi berhasil dihapus');
    }
}