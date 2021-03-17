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
    public function __construct()
    {
        $this->middleware('permission:view birthday')->only('index');
    }

    public function index()
    {
        if(Carbon::now()->month == 12){
            $next = 1;
        }
        else{
            $next = 1 + Carbon::now()->month;
        }

        $users = 
        User::whereHas(
            'roles', function($q){
                $q->where('name', 'Mahasiswa');
            }
        )
        ->whereMonth('birthdate', Carbon::now()->month)
        ->get();

        $users1 = 
        User::whereHas(
            'roles', function($q){
                $q->where('name', 'Mahasiswa');
            }
        )
        ->whereMonth('birthdate', $next)
        ->get();

        return view('birthday.index', compact('users', 'users1'));
    }
}
