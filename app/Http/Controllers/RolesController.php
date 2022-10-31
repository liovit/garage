<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Carbon\Carbon;

class RolesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();

        if($user->hasAnyPermission(['roles.management.view', 'roles.management.access', 'everything'])) {

            $roles = Role::all();
            return view('management.roles.index', compact('roles'));

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = Auth::user();

        if($user->hasAnyPermission(['roles.management.create', 'everything'])) {
            $permissions = Permission::all();
            return view('management.roles.create', compact('permissions'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user = Auth::user();

        if($user->hasAnyPermission(['roles.management.create', 'everything'])) {

            $role = Role::create(['name' => $request->name, 'description' => $request->description]);
            $role->syncPermissions($request->permissions);

            return redirect('/management/roles')->with('success', 'Successfully created new role ('.$request->name.')!');

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = Auth::user();

        if($user->hasAnyPermission(['roles.management.view', 'everything'])) {

            $role = Role::find($id);
            return view('management.roles.view', compact('role'));

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $user = Auth::user();

        if($user->hasAnyPermission(['roles.management.edit', 'everything'])) {

            $role = Role::find($id);
            $permissions = Permission::all();

            return view('management.roles.edit', compact('role', 'permissions'));

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $role = Role::find($id);

        $role->update([
            'name' => $request->name,
            'description' => $request->description,
            'updated_at' => Carbon::now()
        ]);

        $role->syncPermissions($request->permissions);

        return redirect('/management/roles')->with('success', 'Successfully updated role!');

    }

    /**
     * Show pre - removing page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showDestroy($id)
    {

        $user = Auth::user();

        if($user->hasAnyPermission(['roles.management.delete', 'everything'])) {

            $role = Role::find($id);
            $permissions = Permission::all();
            return view('management.roles.delete', compact('role', 'permissions'));

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = Auth::user();

        if($user->hasAnyPermission(['roles.management.delete', 'everything'])) {

            $role = Role::find($id);
            $roleTitle = $role->name;
            $role->delete();

            return redirect('/management/roles')->with('success', 'Successfully deleted ('. $roleTitle .') role!');
            
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

}
