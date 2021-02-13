<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
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
            $student = Student::firstOrcreate([
                'nrp' => $request['nrp'],
                'name' => $request['name'],
                'department' => $request['department'],
                'year_entry' => $request['year_entry'],
                'year_graduate' => $request['year_graduate']
            ]);

            if($student->wasRecentlyCreated){
                $model_id = Student::select('id')->where('nrp', $request['nrp'])->first();
                $user_id = User::select('id')->where('email', $request['email'])->first();

                Profile::create([
                    'profile_id' => $request['nrp'],
                    'user_id' => $user_id->id,
                    'model_id' => $model_id->id,
                    'model_type' => 'App\Models\Student',
                ]);

                return redirect()->route('students.index')
                    ->with('success', 'Data mahasiswa berhasil ditambahkan');
            }
            else{
                return redirect()->route('students.create')
                ->with('fail', 'Maaf nrp yang didaftarkan sudah digunakan sebelumnya');
            }
        }
        else{
            return redirect()->route('students.create')
            ->with('fail', 'Maaf email yang didaftarkan sudah digunakan sebelumnya');
        }
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

        $student->name = $request['name'];
        $student->nrp = $request['nrp'];
        $student->department = $request['department'];
        $student->year_entry = $request['year_entry'];
        $student->year_graduate = $request['year_graduate'];
        $student->save();

        return redirect()->route('students.index')
            ->with('success', 'Data mahasiswa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'Data mahasiswa berhasil dihapus');
    }
}
