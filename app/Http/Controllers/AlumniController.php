<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;
use App\Http\Requests\AlumniRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AlumniExport;
use App\Imports\AlumniImport;
use Session;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alumnis = Alumni::all();

        return view('alumnis.index', compact('alumnis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alumnis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumniRequest $request)
    {

        $user = User::firstOrcreate([
            'email' => $request['email'],
            'password' => bcrypt($request['nrp']),
            'name' => $request['name'],
            'pkk' => $request['pkk'],
            'address' => $request['address'],
            'address_origin' => $request['address_origin'],
            'phone' => $request['phone'],
            'parent_phone' => $request['parent_phone'],
            'line' => $request['line'],
            'birthdate' => $request['birthdate'],
            'gender' => $request['gender'],
            'date_death' => $request['date_death'],
        ]);

        if($user->wasRecentlyCreated){
            $alumni = Alumni::firstOrcreate([
                'email' => $request['email'],
                'name' => $request['name'],
                'department' => $request['department'],
                'job' => $request['job']
            ]);

            if($alumni->wasRecentlyCreated){
                $model_id = Alumni::select('id')->where('email', $request['email'])->first();
                $user_id = User::select('id')->where('email', $request['email'])->first();

                Profile::create([
                    'profile_id' => $request['email'],
                    'user_id' => $user_id->id,
                    'model_id' => $model_id->id,
                    'model_type' => 'App\Models\Alumni',
                ]);

                return redirect()->route('alumnis.index')
                    ->with('success', 'Data alumni berhasil ditambahkan');
            }
            else{
                return redirect()->route('alumnis.create')
                ->with('fail', 'Maaf email yang didaftarkan sudah digunakan sebelumnya');
            }
        }
        else{
            return redirect()->route('alumnis.create')
            ->with('fail', 'Maaf email yang didaftarkan sudah digunakan sebelumnya');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function show(Alumni $alumni)
    {
        $profile = Profile::select()->where('profile_id', $alumni['email'])->first();
        $user = User::select()->where('id',$profile->user_id)->first();
        return view('alumnis.show', compact('alumni', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumni $alumni)
    {
        return view('alumnis.edit', compact('alumni'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function update(AlumniRequest $request, Alumni $alumni)
    {
        $alumni->email = $request['email'];
        $alumni->name = $request['name'];
        $alumni->department = $request['department'];
        $alumni->job = $request['job'];
        $alumni->save();

        return redirect()->route('alumnis.index')
            ->with('success', 'Data alumni berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumni $alumni)
    {
        $alumni->delete();

        return redirect()->route('alumnis.index')
            ->with('success', 'Data alumni berhasil dihapus');
    }

    public function export_excel()
    {
        return Excel::download(new AlumniExport, 'alumni.xlsx');
    }

    public function import_excel(Request $request)
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx',
        ]);

        // menangkap file excel
        $file = $request->file('file');

        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();

        // upload ke folder file_siswa di dalam folder public
        $file->move('file_alumni', $nama_file);

        // import data
        Excel::import(new AlumniImport, public_path('/file_alumni/'.$nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Data Alumni Berhasil Diimport!');

        // alihkan halaman kembali
        return redirect('/admin/alumnis');
    }
}
