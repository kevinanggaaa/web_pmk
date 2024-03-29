<?php

namespace App\Http\Controllers;

use App\Models\Counselor;
use Illuminate\Http\Request;
use App\Http\Requests\CounselorRequest;

class CounselorController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view counselor')->only('index');
        $this->middleware('permission:view detail counselor')->only('show');
        $this->middleware('permission:add counselor')->only('create');
        $this->middleware('permission:edit counselor')->only('edit');
        $this->middleware('permission:delete counselor')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counselors = Counselor::all();

        return view('counselors.index', compact('counselors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('counselors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CounselorRequest $request)
    {
        Counselor::create([
            'name' => $request['name'],
            'phone' => $request['phone'],
        ]);

        return redirect()->route('counselors.index')
            ->with('success', 'Data konselor berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Counselor  $counselor
     * @return \Illuminate\Http\Response
     */
    public function show(Counselor $counselor)
    {
        return view('counselors.show', compact('counselor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Counselor  $counselor
     * @return \Illuminate\Http\Response
     */
    public function edit(Counselor $counselor)
    {
        return view('counselors.edit', compact('counselor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Counselor  $counselor
     * @return \Illuminate\Http\Response
     */
    public function update(CounselorRequest $request, Counselor $counselor)
    {
        $counselor->name = $request['name'];
        $counselor->phone = $request['phone'];
        $counselor->save();

        return redirect()->route('counselors.index')
            ->with('success', 'Data konselor berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Counselor  $counselor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Counselor $counselor)
    {
        $counselor->delete();

        return redirect()->route('counselors.index')
            ->with('success', 'Data konselor berhasil dihapus');
    }
}
