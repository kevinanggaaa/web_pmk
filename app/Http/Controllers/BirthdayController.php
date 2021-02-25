<?php

namespace App\Http\Controllers;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class BirthdayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = 
        User::whereHas(
            'roles', function($q){
                $q->where('name', 'Mahasiswa');
            }
        )
        ->whereMonth('birthdate', Carbon::now()->month)
        ->get();

        return view('birthday.index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $selected_roles = $user->roles;
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
        return view('birthday.show', compact('user','url','selected_roles'));
    }
}
