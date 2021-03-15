<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Alumni;
use App\Models\Profile;
use App\Models\Student;
use App\Models\Lecturer;
use App\Models\OrganizationalRecord;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $organizations = OrganizationalRecord::select()->where('user_id',$user->id)->get();
        return view('profile.index', compact('user','organizations'));
    }

    public function editUser(User $user)
    {
        $auth = Auth::user();
        if($auth->id == $user->id){
            return view('users.edit', compact('user'));
        }
        else{
            abort(401);
        }
    }

    public function editStudent(Student $student)
    {
        $profile = Profile::where("model_type", "App\Models\Student")->where('model_id', $student->id)->first();
        $auth = Auth::user();
        if($auth->id == $profile->user_id){
            return view('students.edit', compact('student'));
        }
        else{
            abort(401);
        }
    }

    public function editLecturer(Lecturer $lecturer)
    {
        return view('lecturers.edit', compact('lecturer'));
    }

    public function editAlumni(Alumni $alumni)
    {
        return view('alumnis.edit', compact('alumni'));
    }
}
