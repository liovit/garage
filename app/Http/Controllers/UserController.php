<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();

        if($user->hasAnyPermission(['users.management.view', 'users.management.access', 'everything'])) {

            $users = User::all();
            return view('management.users', compact('users'));

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

        if($user->hasAnyPermission(['users.management.create', 'everything'])) {
            $roles = Role::all();
            return view('management.users_create', compact('roles'));
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

        if($user->hasAnyPermission(['users.management.create', 'everything'])) {

            $uDob = $request->d;
            $dob = new \DateTime($uDob);
            $now = new \DateTime();
            $diff = $now->diff($dob);
            $age = $diff->y;

            $createUser = User::create([
                'name' => $request->f,
                'last_name' => $request->l,
                'date_of_birth' => $request->d,
                'email' => $request->e,
                'password' => Hash::make($request->p),
                'phone' => $request->phone,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            $createUser->assignRole($request->role);

            if($createUser) {
                return redirect('/management/users')->with('success', 'Successfully created new user!');
            }

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

        $authUser = Auth::user();

        if($authUser->hasAnyPermission(['users.management.view', 'everything'])) {
            $user = User::find($id);
            return view('management.users_view', compact('user'));
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

        $authUser = Auth::user();

        if($authUser->hasAnyPermission(['users.management.edit', 'everything'])) {
            $user = User::find($id);
            $roles = Role::all();
            return view('management.users_edit', compact('user', 'roles'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::find($id);

        if($request->p) {
            $user->update([
                'password' => Hash::make($request->p),
            ]);
        }

        $user->update([
            'name' => $request->f,
            'last_name' => $request->l,
            'date_of_birth' => $request->d,
            'email' => $request->e,
            // 'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $user->syncRoles($request->role);

        return redirect('/management/users/edit/'.$id)->with('success', 'Successfully updated user!');

    }

    /**
     * Show pre - removing page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_destroy($id)
    {

        $authUser = Auth::user();

        if($authUser->hasAnyPermission(['users.management.delete', 'everything'])) {
            $user = User::find($id);
            return view('management.users_delete', compact('user'));
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

        $authUser = Auth::user();

        if($authUser->hasAnyPermission(['users.management.delete', 'everything'])) {
            $user = User::find($id);
            $user->delete();
            return redirect('/management/users')->with('success', 'Successfully deleted user!');
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        }
        
    }
}
