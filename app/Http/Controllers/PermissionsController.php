<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Carbon\Carbon;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();

        if($user->hasAnyPermission(['permissions.management.access', 'permissions.management.view', 'everything'])) {
            
            $permissions = Permission::all();

            return view('management.permissions.index', compact('permissions'));

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

        if($user->hasAnyPermission(['everything'])) {

            return view('management.permissions.create');

        } else {

            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        
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

        if($user->hasAnyPermission(['everything'])) {

            Permission::create(['name' => $request->name]);

            return redirect('/management/permissions')->with('success', 'Successfully created new permission ( '.$request->name.' )!');
        
        } else {

            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        
        }

    }

}
