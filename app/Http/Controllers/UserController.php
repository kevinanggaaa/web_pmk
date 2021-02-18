<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file_name = $request->file('avatar')->store("1oEa6ivIQ16Iu_WgyGa6ftMOxqOj7whwm","google");
        User::create([
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
            'avatar' => $file_name,
            'date_death' => $request['date_death']
        ]);

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
        return view('users.show', compact('user','url'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
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
        $file = $request['avatar'];

        $nama_file = time().'_'.$file->getClientOriginalName();

        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'profile_picture';
        $file->move($tujuan_upload, $nama_file);

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
        $user->avatar = $nama_file;
        $user->date_death = $request['date_death'];
        $user->save();

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
        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Data user berhasil dihapus');
    }
}
