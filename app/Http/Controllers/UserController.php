<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Models\Profile;
use App\Models\Student;
use App\Models\Lecturer;
use App\Models\Alumni;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'name' => $request['name'],
            'pkk' => $request['pkk'],
            'address' => $request['address'],
            'address_origin' => $request['address_origin'],
            'phone' => $request['phone'],
            'parent_phone' => $request['parent_phone'],
            'line' => $request['line'],
            'birthdate' => $request['birthdate'],
            'gender' => $request['gender'],
            'avatar' => $request['avatar'],
            'date_death' => $request['date_death']
        ]);

        $user->assignRole($request->role_ids);

        return redirect()->route('users.index')
            ->with('success', 'Data user berhasil ditambahkan');
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
        return view('users.show', compact('user', 'selected_roles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $selected_roles = $user->roles;
        $unselected_roles = Role::all()->diff($selected_roles);
        return view('users.edit')
            ->with([
                'user' => $user,
                'selected_roles' => $selected_roles,
                'unselected_roles' => $unselected_roles,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->name = $request['name'];
        $user->pkk = $request['pkk'];
        $user->address = $request['address'];
        $user->address_origin = $request['address_origin'];
        $user->phone = $request['phone'];
        $user->parent_phone = $request['parent_phone'];
        $user->line = $request['line'];
        $user->birthdate = $request['birthdate'];
        $user->gender = $request['gender'];
        $user->avatar = $request['avatar'];
        $user->date_death = $request['date_death'];
        $user->save();

        $user->syncRoles($request->role_ids);

        return redirect()->route('users.index')
            ->with('success', 'Data user berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $profiles = Profile::select()->where('user_id',$user->id)->get();

        foreach ($profiles as $profile){ 
            if($profile->model_type == "App\Models\Student"){

                
                $number = $profile->model_id;
                // $profile->delete();
                // dd($profile);
                $data = Student::where('id', $number)->first()->delete();

                // $data = Student::where('id', $profile->model_id)->first()->delete();
                // $profile->delete();
                
            // $deletedRows = Flight::where('active', 0)->delete();
            }
            else if($profile->model_type == "App\Models\Lecturer"){
                $number = $profile->model_id;
                // $profile->delete();
                $data = Lecturer::where('id', $number)->first()->delete();

                // $data = Lecturer::where('id', $profile->model_id)->first()->delete();
                // $profile->delete();
            }
            else if($profile->model_type == "App\Models\Alumni"){
                $number = $profile->model_id;
                // $profile->delete();
                $data = Alumni::where('id', $number)->first()->delete();

                // $data = Alumni::where('id', $profile->model_id)->first()->delete();
                // $profile->delete();
            }
        }

        $delete_profile = Profile::select()->where('user_id',$user->id)->delete();
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Data user berhasil dihapus');
    }
}
