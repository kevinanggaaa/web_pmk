<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Profile;
use App\Models\Student;
use App\Models\Lecturer;
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

    public function editStudent(Student $student)
    {
        return view('students.edit', compact('student'));
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
