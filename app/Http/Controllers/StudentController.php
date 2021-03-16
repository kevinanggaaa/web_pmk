<?php

namespace App\Http\Controllers;

use Session;
use App\Models\User;
use App\Models\Profile;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Exports\StudentExport;
use App\Imports\StudentImport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StudentRequest;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view student')->only('index');
        $this->middleware('permission:view detail student')->only('export_excel');
        $this->middleware('permission:view detail student')->only('show');
        $this->middleware('permission:add student')->only('create');
        $this->middleware('permission:add student')->only('import_excel');
        $this->middleware('permission:edit student')->only('edit');
        $this->middleware('permission:delete student')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {   
        $ultah = explode('-', $request->birthdate);
        $year = $ultah[0];
        $month = $ultah[1];
        $day  = $ultah[2];
        $ultah = $day . '' . $month . '' . $year;

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
      
        

        $student = Student::firstOrCreate(
            [
                'nrp' => $request['nrp']
            ],
            [
                'name' => $request['name'],
                'department' => $request['department'],
                'year_entry' => $request['year_entry'],
                'year_graduate' => $request['year_graduate']
            ]
        );

        if($student->wasRecentlyCreated){
            // $model_id = Student::select('id')->where('nrp', $request['nrp'])->first();
            // $user_id = User::select('id')->where('email', $request['email'])->first();

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
                    'avatar' => $nama_file,
                ]
            );

            Profile::create([
                'profile_id' => $request['nrp'],
                'user_id' => $user->id,
                'model_id' => $student->id,
                'model_type' => 'App\Models\Student',
            ]);

            $user->assignRole('Mahasiswa');

            return redirect()->route('students.index')
                ->with('success', 'Data mahasiswa berhasil ditambahkan');
        }

        return view('students.create-error')
            ->with('request', $request)
            ->with('message','Data mahasiswa gagal ditambahkan karena terdapat duplikasi pada email / nrp');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        $profile = Profile::select()->where('profile_id', $student['nrp'])->first();
        $user = User::select()->where('id',$profile->user_id)->first();
 
        return view('students.show', compact('student', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        // return view('students.edit', compact('student'))->with('messages','error');
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, Student $student)
    {
        $cek_nrp = Student::select()
        ->where('nrp',$request->nrp)
        ->whereNotIn('id', [$student->id])
        ->first();

        $student->name = $request['name'];
        $student->department = $request['department'];
        $student->year_entry = $request['year_entry'];
        $student->year_graduate = $request['year_graduate'];
        $student->save();

        if($cek_nrp == null){
            $student->nrp = $request['nrp'];
            $student->save();

            return redirect()->route('students.index')
                ->with('success', 'Data mahasiswa berhasil diubah');
        }

        else{
            
            return redirect('admin/profiles/'.$student->id.'/editStudent')
                ->with('fail','Data mahasiswa gagal diubah karena duplikasi nrp');

            // return redirect()->route('students.edit')
            //     ->with('fail', 'Data mahasiswa gagal diubah karena duplikasi nrp');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $user = Profile::select()
        ->where('model_type',"App\Models\Student")
        ->where('model_id',$student->id)
        ->first();

        $check_profile = Profile::select()
        ->whereNotIn('model_type',['App\Models\Student'])
        ->where('user_id',$user->user_id)
        ->get();

        $student->delete();

        $delete_profile = Profile::select()
        ->where('model_type',"App\Models\Student")
        ->where('user_id',$user->user_id)
        ->delete();

        if($check_profile->isEmpty()){
            $delete_user = User::select()->where('id',$user->user_id)->delete();
        }
        
        return redirect()->route('students.index')
            ->with('success', 'Data mahasiswa berhasil dihapus');
    }

    public function export_excel()
    {
        return Excel::download(new StudentExport, 'mahasiswa.xlsx');
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
        $file->move('file_mahasiswa', $nama_file);

        // import data
        Excel::import(new StudentImport, public_path('/file_mahasiswa/'.$nama_file));

        // notifikasi dengan session
        Session::flash('sukses', 'Data Mahasiswa Telah Diimport!');

        // alihkan halaman kembali
        return redirect('/admin/students');
    }
}
