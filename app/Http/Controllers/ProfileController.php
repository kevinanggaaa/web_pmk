<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Alumni;
use App\Models\Profile;
use App\Models\Student;
use App\Models\Lecturer;
use Spatie\Permission\Models\Role;
use App\Models\OrganizationalRecord;
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
        $selected_roles = $user->roles;
        $unselected_roles = Role::all()->diff($selected_roles);
        $auth = Auth::user();
        if($auth->id == $user->id){
            return view('users.edit', compact('user','selected_roles','unselected_roles'));
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
        $profile = Profile::where("model_type", "App\Models\Lecturer")->where('model_id', $lecturer->id)->first();
        $auth = Auth::user();
        if($auth->id == $profile->user_id){
            return view('lecturers.edit', compact('lecturer'));
        }
        else{
            abort(401);
        }
    
    }

    public function editAlumni(Alumni $alumni)
    {
        $profile = Profile::where("model_type", "App\Models\Alumni")->where('model_id', $alumni->id)->first();
        $auth = Auth::user();
        if($auth->id == $profile->user_id){
            return view('alumnis.edit', compact('alumni'));
        }
        else{
            abort(401);
        }
    }
}
