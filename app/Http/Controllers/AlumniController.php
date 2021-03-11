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
    public function __construct()
    {
        $this->middleware('permission:view alumni')->only('index');
        $this->middleware('permission:view detail alumni')->only('export_excel');
        $this->middleware('permission:view detail alumni')->only('show');
        $this->middleware('permission:add alumni')->only('create');
        $this->middleware('permission:add alumni')->only('import_excel');
        $this->middleware('permission:edit alumni')->only('edit');
        $this->middleware('permission:delete alumni')->only('destroy');
    }

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

    public function createform()
    {
        return view('alumnis.form-create');
    }

    public function nameBirthdate()
    {
        $alumnis = Alumni::all();
        return view('alumnis.name-birthdate', compact('alumnis'));
    }

    public function checkBirthdate(Request $request)
    {
        $alumnis = Alumni::all();
        $birthdate = $request->input('birthdate');
        $alumni_id = $request->input('name');

        $profile = Profile::select()
                    ->where('model_id', $alumni_id)
                    ->where('model_type', "App\Models\Alumni")
                    ->first();
        $user_id = User::select()->where('id', $profile->user_id)->first();

        if($birthdate == $user_id->birthdate){

        }
        else{
            return view('alumnis.name-birthdate', compact('alumnis'))
                ->with('fail','Maaf data yang dimasukkan salah.');;
        } 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AlumniRequest $request)
    {
        $ultah = explode('-', $request->birthdate);
        $year = $ultah[0];
        $month = $ultah[1];
        $day  = $ultah[2];
        $ultah = $day . '' . $month . '' . $year;
        
        if($request['avatar'] == null){
            $file_name = 'default.jpg';
        }
        else{
          $file = $request['avatar'];
          $file_name = time().'_'.$file->getClientOriginalName();

          // isi dengan nama folder tempat kemana file diupload
          $tujuan_upload = 'avatar';
          $file->move($tujuan_upload, $file_name);
        }

        $user = User::firstOrCreate(
            [
                'email' => $request['email']
            ],
            [
                'password' => bcrypt($ultah),
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
                'avatar' => $file_name,        
            ]
        );

        $alumni = Alumni::firstOrCreate(
            [
                'email' => $request['email']
            ],
            [
                'name' => $request['name'],
                'department' => $request['department'],
                'job' => $request['job'],
                'angkatan' => $request['angkatan']
            ]
        );

        if($alumni->wasRecentlyCreated){
            $model_id = Alumni::select('id')->where('email', $request['email'])->first();
            $user_id = User::select('id')->where('email', $request['email'])->first();

            Profile::create([
                'profile_id' => $request['email'],
                'user_id' => $user_id->id,
                'model_id' => $model_id->id,
                'model_type' => 'App\Models\Alumni',
            ]);

            $user->assignRole('Alumni');

            return redirect()->route('alumnis.index')
                ->with('success', 'Data alumni berhasil ditambahkan');
        }
        
        return view('alumnis.create-error')
            ->with('request', $request)
            ->with('message','Data alumni gagal ditambahkan karena terdapat duplikasi pada email');
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
        $cek_email = Alumni::select()
        ->where('email',$request->email)
        ->whereNotIn('id', [$alumni->id])
        ->first();

        if($cek_email == null){
            $alumni->email = $request['email'];
            $alumni->name = $request['name'];
            $alumni->department = $request['department'];
            $alumni->job = $request['job'];
            $alumni->angkatan = $request['angkatan'];
            $alumni->save();

            $user_id = Auth::user()->id;

            User::select()
            ->where('id', $user_id)
            ->update(['email' => $request['email']]);

            return redirect()->route('alumnis.index')
            ->with('success', 'Data alumni berhasil diubah');
        }
        else{
            $alumni->name = $request['name'];
            $alumni->department = $request['department'];
            $alumni->job = $request['job'];
            $alumni->angkatan = $request['angkatan'];
            $alumni->save();

            return redirect('admin/profiles/'.$alumni->id.'/editAlumni')
                ->with('fail','Data alumni gagal diubah karena duplikasi email');
        }    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumni $alumni)
    {
        
        $user = Profile::select()
        ->where('model_type',"App\Models\Alumni")
        ->where('model_id',$alumni->id)
        ->first();

        $check_profile = Profile::select()
        ->whereNotIn('model_type',['App\Models\Alumni'])
        ->where('user_id',$user->user_id)
        ->get();

        $alumni->delete();

        $delete_profile = Profile::select()
        ->where('model_type',"App\Models\Alumni")
        ->where('user_id',$user->user_id)
        ->delete();

        if($check_profile->isEmpty()){
            $delete_user = User::select()->where('id',$user->user_id)->delete();
        }

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
        Session::flash('sukses', 'Data Alumni Telah Diimport!');

        // alihkan halaman kembali
        return redirect('/admin/alumnis');
    }
}
