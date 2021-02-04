<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use App\Models\Lecturer;
use App\Models\Profile;
use App\Models\Student;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('profile.index', compact('user'));
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
