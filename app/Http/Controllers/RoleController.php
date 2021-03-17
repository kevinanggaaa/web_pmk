<?php

namespace App\Http\Controllers;

// use App\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view role')->only('index');
        $this->middleware('permission:view detail role')->only('show');
        $this->middleware('permission:add role')->only('create');
        $this->middleware('permission:edit role')->only('edit');
        $this->middleware('permission:delete role')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pageNumber = $request->query('page');
        $roles = Role::where('name', '!=', 'Super Admin')->paginate(10, ['*'], 'page', $pageNumber);

        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::all();

        return view('roles.create')
            ->with(['permissions' => $permission]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permission_ids);

        return redirect()->route('roles.index')
            ->with('success', 'Role berhasil dimodifikasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role, Request $request)
    {
        $pageNumber = $request->query('page');
        $users = $role->users()->paginate(1, ['*'], 'page', $pageNumber);

        return view('roles.show')->with(['role' => $role, 'permissions' => $role->permissions, 'users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $selected_permissions = $role->permissions;
        $unselected_permissions = Permission::all()->diff($selected_permissions);

        return view('roles.edit')->with([
            'role' => $role,
            'selected_permissions' => $selected_permissions,
            'unselected_permissions' => $unselected_permissions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        if ($role->name != $request->name) {
            $role->name = $request->name;
            $role->save();
        }
        $role->syncPermissions($request->permission_ids);

        return redirect()->route('roles.index')
            ->with('success', 'Role berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role = Role::findById($id);
        $role->delete();

        return redirect()->route('roles.index')
            ->with('success', 'Role berhasil dihapus.');
    }
}
