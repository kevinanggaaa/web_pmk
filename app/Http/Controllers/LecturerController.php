<?php

namespace App\Http\Controllers;

use App\Models\Lecturer;
use Illuminate\Http\Request;
use App\Http\Requests\LecturerRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\LecturerExport;
use App\Imports\LecturerImport;
use Session;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class LecturerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view lecturer')->only('index');
        $this->middleware('permission:view detail lecturer')->only('export_excel');
        $this->middleware('permission:view detail lecturer')->only('show');
        $this->middleware('permission:add lecturer')->only('create');
        $this->middleware('permission:add lecturer')->only('import_excel');
        $this->middleware('permission:edit lecturer')->only('edit');
        $this->middleware('permission:delete lecturer')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturers = Lecturer::all();
        return view('lecturers.index', compact('lecturers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lecturers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request['avatar'] == null){
            $nama_file = 'default.jpg';
        }
        else{
          $file = $request['avatar'];
          $nama_file = time().'_'.$file->getClientOriginalName();
          // isi dengan nama folder tempat kemana file diupload
          $tujuan_upload = 'avatar';
          $file->move($tujuan_upload, $nama_file);
        }
      
        $user = User::firstOrCreate(
            [
                'email' => $request['email']
            ],
            [
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
                'avatar' => $nama_file,
            ]
        );

        $lecturer = Lecturer::firstOrCreate(
            [
                'nidn' => $request['nidn']
            ],
            [
                'name' => $request['name'],
                'department' => $request['department']
            ]
        );

        if($lecturer->wasRecentlyCreated){
            $model_id = Lecturer::select('id')->where('nidn', $request['nidn'])->first();
            $user_id = User::select('id')->where('email', $request['email'])->first();

            Profile::create([
                'profile_id' => $request['nidn'],
                'user_id' => $user_id->id,
                'model_id' => $model_id->id,
                'model_type' => 'App\Models\Lecturer',
            ]);

            $user->assignRole('Dosen');

            return redirect()->route('lecturers.index')
                ->with('success', 'Data dosen berhasil ditambahkan');
        }

        return view('lecturers.create-error')
            ->with('request', $request)
            ->with('message','Data dosen gagal ditambahkan karena terdapat duplikasi pada email / nidn');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function show(Lecturer $lecturer)
    {
        $profile = Profile::select()->where('profile_id', $lecturer['nidn'])->first();
        $user = User::select()->where('id',$profile->user_id)->first();
        return view('lecturers.show', compact('lecturer', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecturer $lecturer)
    {
        return view('lecturers.edit', compact('lecturer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        $cek_nidn = Lecturer::select()
        ->where('nidn',$request->nidn)
        ->whereNotIn('id', [$lecturer->id])
        ->first();

        if($cek_email == null){
            $lecturer->nidn = $request['nidn'];
            $lecturer->name = $request['name'];
            $lecturer->department = $request['department'];
            $lecturer->save();

            return redirect()->route('lecturers.index')
                ->with('success', 'Data dosen berhasil diubah');
        }
        else{
            $lecturer->name = $request['name'];
            $lecturer->department = $request['department'];
            $lecturer->save();

            return redirect('admin/profiles/'.$lecturer->id.'/editLecturer')
                ->with('fail','Data dosen gagal diubah karena duplikasi nidn');
        }  

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecturer $lecturer)
    {
        
        $user = Profile::select()
        ->where('model_type',"App\Models\Lecturer")
        ->where('model_id',$lecturer->id)
        ->first();

        $check_profile = Profile::select()
        ->whereNotIn('model_type',['App\Models\Lecturer'])
        ->where('user_id',$user->user_id)
        ->get();

        $lecturer->delete();

        $delete_profile = Profile::select()
        ->where('model_type',"App\Models\Lecturer")
        ->where('user_id',$user->user_id)
        ->delete();

        if($check_profile->isEmpty()){
            $delete_user = User::select()->where('id',$user->user_id)->delete();
        }

        return redirect()->route('lecturers.index')
            ->with('success', 'Data dosen berhasil dihapus');
    }

    public function export_excel()
    {
        return Excel::download(new LecturerExport, 'dosen.xlsx');
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
        $file->move('file_dosen', $nama_file);

        // import data
        Excel::import(new LecturerImport, public_path('/file_dosen/'.$nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Data Dosen Telah Diimport!');

        // alihkan halaman kembali
        return redirect('/admin/lecturers');
    }
}
