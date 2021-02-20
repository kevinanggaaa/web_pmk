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
        $metadata = Storage::disk('google')->listContents('1oEa6ivIQ16Iu_WgyGa6ftMOxqOj7whwm');
        $path=null;
        foreach($metadata as $item){
            $name = "1oEa6ivIQ16Iu_WgyGa6ftMOxqOj7whwm/" . $item['name'];
            if($name == $user->avatar){
                $path = $item['path'];
                break;
            }
        };
        $url = Storage::disk('google')->url($path);
        
        return view('profile.index', compact('user','organizations','url'));
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
