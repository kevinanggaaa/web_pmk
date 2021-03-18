<?php

namespace App\Http\Controllers;

use App\Models\OrganizationalRecord;
use Illuminate\Http\Request;
use App\Http\Requests\OrganizationalRecordRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class OrganizationalRecordController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view organizational record')->only('index');
        $this->middleware('permission:view detail organizational record')->only('show');
        $this->middleware('permission:add organizational record')->only('create');
        $this->middleware('permission:edit organizational record')->only('edit');
        $this->middleware('permission:delete organizational record')->only('destroy');
    }
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
        $users = User::all();
        return view('organizationalRecords.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = $request->input('name');

        OrganizationalRecord::create([
            'user_id' => $user_id,
            'position' => $request['position'],
            'category' => $request['category'],
            'year_start' => $request['year_start'],
            'year_end' => $request['year_end'],
        ]);

        return redirect()->route('organizational-records.index')
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrganizationalRecord  $organizationalRecord
     * @return \Illuminate\Http\Response
     */
    public function edit(OrganizationalRecord $organizationalRecord)
    {
        $users = User::all();
        return view('organizationalRecords.edit', compact('organizationalRecord','users'));
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
        $user_id = $request->input('name');
        $organizationalRecord->user_id = $user_id;
        $organizationalRecord->position = $request['position'];
        $organizationalRecord->category = $request['category'];
        $organizationalRecord->year_start = $request['year_start'];
        $organizationalRecord->year_end = $request['year_end'];

        $organizationalRecord->save();

        return redirect()->route('organizational-records.index')
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

        return redirect()->route('organizational-records.index')
            ->with('success', 'Data organisasi berhasil dihapus');
    }
}