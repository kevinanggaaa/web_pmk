<?php

namespace App\Http\Controllers;

use App\Models\Counseling;
use App\Models\Counselor;
use Illuminate\Http\Request;
use App\Http\Requests\CounselingRequest;
use Illuminate\Support\Facades\Auth;

class CounselingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counselors = Counselor::all();

        if(Auth::user()->hasRole(['Super Admin', 'bph medfo', 'pengurus medfo'])){
            $counselings = Counseling::all();
        } 
        else{
            $user = Auth::user()->id;
            $counselings = Counseling::select()->where('user_id', $user)->get();
        }   

        return view('counselings.index', compact('counselings', 'counselors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $counselors = Counselor::all();

        return view('counselings.create', compact('counselors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CounselingRequest $request)
    {
        
        $user = Auth::user()->id;
        Counseling::create([
            'user_id' => $user,
            'counselor_id' => $request['counselor_id'],
            'date_time' => $request['date_time'],
            'topic' => $request['topic'],
        ]);

        return redirect()->route('counselings.index')
            ->with('success', 'Data konseling berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Counseling  $counseling
     * @return \Illuminate\Http\Response
     */
    public function show(Counseling $counseling)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Counseling  $counseling
     * @return \Illuminate\Http\Response
     */
    public function edit(Counseling $counseling)
    {
        $counselors = Counselor::all();

        return view('counselings.edit', compact('counseling', 'counselors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Counseling  $counseling
     * @return \Illuminate\Http\Response
     */
    public function update(CounselingRequest $request, Counseling $counseling)
    {
        $counseling->date_time = $request['date_time'];
        $counseling->topic = $request['topic'];
        $counseling->counselor_id = $request['counselor_id'];
        $counseling->save();

        return redirect()->route('counselings.index')
            ->with('success', 'Data konseling berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Counseling  $counseling
     * @return \Illuminate\Http\Response
     */
    public function destroy(Counseling $counseling)
    {
        $counseling->delete();

        return redirect()->route('counselings.index')
            ->with('success', 'Data counseling berhasil dihapus');
    }
}
