<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;

class MySettings extends Controller
{
    
    public function index() {

        $user = Auth::user();
        return view('settings.index', compact('user'));

    }

    public function change_password(Request $request) {

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:6',
            'new_password_confirm' => 'required',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('error', 'Current password does not match!');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password successfully changed!');

    }

    public function set_notifications (Request $request) {

        $request->validate([
            'notifications' => 'required'
        ]);

        $user = Auth::user();

        $user->notifications = $request->notifications;
        $user->save();

        return back()->with('success', 'Notification settings have been successfully set!');

    }

}
