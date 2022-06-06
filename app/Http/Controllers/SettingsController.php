<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use DB;
use Mail;
use Illuminate\Support\Str;
use App\Models\Email_Settings;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_mail()
    {
        $user = Auth::user();

        if($user->hasAnyPermission(['settings.email.access', 'everything'])) {

            $emails = Email_Settings::all();
            return view('settings.mail_index', compact('emails'));

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_mail($id)
    {
        $user = Auth::user();

        if($user->hasAnyPermission(['settings.email.access', 'everything'])) {

            $email = Email_Settings::find($id);
            return view('settings.mail_edit', compact('email'));

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
        //
    }

    public function confirm_email_edit(Request $request, $id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['settings.email.edit', 'everything'])) {

            $email = Email_Settings::find($id);
            $email->update($request->all());

            return redirect('/settings/emails')->with('success', 'You have successfully updated email content.');

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
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
        //
    }
}
