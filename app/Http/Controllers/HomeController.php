<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('dashboard');
    }

    public function calendar() {

        $events = Event::all();
        return view('main.calendar', compact('events'));

    }

    public function calendar_view_event($id) {
        
        $event = Event::find($id);
        return view('main.calendar_view', compact('event'));

    }

    public function calendar_new_event() {

        $user = Auth::user();

        if($user->hasAnyPermission(['calendar.create', 'everything'])) {
            return view('main.calendar_create');
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function calendar_confirm_creation(Request $request) {

        $user = Auth::user();

        if($user->hasAnyPermission(['calendar.create', 'everything'])) {
            
            $event = Event::create([
                'description' => $request->description,
                'date' => $request->date,
                'time_from' => $request->time_from,
                'time_to' => $request->time_to
            ]);

            if($event) {
                return redirect('/calendar')->with('success', 'Successfully created new event!');
            }

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        }

    }

    public function calendar_edit_event($id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['calendar.edit', 'everything'])) {

            $event = Event::find($id);
            return view('main.calendar_edit', compact('event'));

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function calendar_event_update(Request $request, $id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['calendar.edit', 'everything'])) {

            $event = Event::find($id);
            $event->update($request->all());
            return redirect('/calendar')->with('success', 'Successfully updated event '.$event->description.'!');

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        }

    }

    public function calendar_event_pre_delete($id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['calendar.delete', 'everything'])) {
            $event = Event::find($id);
            return view('main.calendar_delete', compact('event'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function calendar_event_delete($id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['calendar.delete', 'everything'])) {
            $event = Event::find($id);
            $name = $event->description;
            $event->delete();
            return redirect('/calendar')->with('success', 'Successfully deleted ('. $name .') event!');
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

}
