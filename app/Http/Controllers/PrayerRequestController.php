<?php

namespace App\Http\Controllers;

use App\Models\PrayerRequest;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\PrayerRequestRequest;

class PrayerRequestController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view prayer request')->only('index');
        $this->middleware('permission:edit prayer request')->only('edit');
        $this->middleware('permission:delete prayer request')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $prayerRequests = PrayerRequest::all();
        $users = User::all();

        return view('prayer-requests.index', compact('prayerRequests', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prayer-requests.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrayerRequestRequest $request)
    {
    //     $user = Auth::user()->id;
        PrayerRequest::create([
            // 'user_id' => 123,
            'name' => $request['name'],
            'content' => $request['content'],
            'status' => "requested",
        ]);

        return redirect()->route('home')
            ->with('success', 'Data request doa berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrayerRequest  $prayerRequest
     * @return \Illuminate\Http\Response
     */
    // public function show(PrayerRequest $prayerRequest)
    // {
    //     return view('prayer-request.show', compact('alumni'));
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PrayerRequest  $prayerRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(PrayerRequest $prayerRequest)
    {
        return view('prayer-requests.edit', compact('prayerRequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PrayerRequest  $prayerRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrayerRequest $prayerRequest)
    {
        $prayerRequest->name = $request['name'];
        $prayerRequest->content = $request['content'];
        $prayerRequest->status = $request['status'];
        $prayerRequest->save();

        return redirect()->route('prayer-requests.index')
            ->with('success', 'Data request doa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrayerRequest  $prayerRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrayerRequest $prayerRequest)
    {
        $prayerRequest->delete();

        return redirect()->route('prayer-requests.index')
            ->with('success', 'Data request doa berhasil dihapus');
    }
}
