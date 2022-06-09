<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Carbon\Carbon;
use App\Models\User;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{

    // public $filesPath = '/home/u874210567/domains/labairimtaimone.lt/public_html/garage/temporary/vehicles/';
    public $filesPath = '/Users/noname/Desktop/noname/Projects/Laravel/Laravel#Projects/2021/1#GarageServices/public/media/profiles/';
    public $removeFilesPath = '/Users/noname/Desktop/noname/Projects/Laravel/Laravel#Projects/2021/1#GarageServices/public';

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
    public function store(StoreUserRequest $request)
    {
        
        $user = Auth::user();
        $array = [];

        if($user->hasAnyPermission(['users.management.create', 'everything'])) {

            // $uDob = $request->d;
            // $dob = new \DateTime($uDob);
            // $now = new \DateTime();
            // $diff = $now->diff($dob);
            // $age = $diff->y;

            $createUser = User::create([
                'name' => $request->name,
                'last_name' => $request->last_name,
                'date_of_birth' => $request->date_of_birth,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'notifications' => json_encode($array),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            if($request->file('avatar')) {

                $pTitle = time() . '-' . $request->file('avatar')->getClientOriginalName();

                if(!file_exists($this->filesPath . $createUser->id)) {
                    mkdir($this->filesPath . $createUser->id, 0777);
                }

                $request->file('avatar')->move($this->filesPath . $createUser->id , $pTitle);

                $createUser->update([
                    'avatar' => '/media/profiles/' . $createUser->id . '/' . $pTitle,
                ]);

            }

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
    public function update(UpdateUserRequest $request, $id)
    {

        $user = User::find($id);

        $request->validate([
            'email' => 'required|email|unique:users,email,'.$user->id,
        ]);

        $array = $this->validateNotifications($request);

        if($request->password) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        $user->update([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'date_of_birth' => $request->date_of_birth,
            'email' => $request->email,
            'city' => $request->city,
            'address' => $request->address,
            'post' => $request->post,
            'notifications' => json_encode($array),
            // 'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        if($request->file('avatar')) {

            // remove current picture
            if($user->avatar) {
                unlink($this->removeFilesPath . $user->avatar);
            }

            // reform slightly original title
            $pTitle = time() . '-' . $request->file('avatar')->getClientOriginalName();

            // check if such profile folder exists, if not create new
            if(!file_exists($this->filesPath . $user->id)) {
                mkdir($this->filesPath . $user->id, 0777);
            }

            // place the picture in to the user folder
            $request->file('avatar')->move($this->filesPath . $user->id , $pTitle);

            // update database
            $user->update([
                'avatar' => '/media/profiles/' . $user->id . '/' . $pTitle,
            ]);

        }

        $user->syncRoles($request->role);

        return redirect('/management/users/edit/'.$id)->with('success', 'Successfully updated user!');

    }

    /**
     * Update the specified resource (user notification settings) in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateNotifications(Request $request, $id) 
    {

        $user = User::find($id);

        $array = $this->validateNotifications($request);

        $user->notifications = json_encode($array);
        $user->save();

        return redirect('/management/users/'.$user->id)->with('success', 'Successfully updated user notification settings!');

    }

    /**
     * Show pre - removing page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showDestroy($id)
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

            if($user->avatar) {
                unlink($this->removeFilesPath . $user->avatar);
            }

            $user->delete();

            return redirect('/management/users')->with('success', 'Successfully deleted user!');
            
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        }

    }

    /**
     * Adjust array accordingly.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  array $array
     * @return array $array
     */
    public function validateNotifications($request)
    {

        $array = [];

        // events notifications
        if($request->email_notification_1) {
            array_push($array, $request->email_notification_1);
        }

        // warranty notifications
        if($request->email_notification_2) {
            array_push($array, $request->email_notification_2);
        }

        // parts notifications
        if($request->email_notification_3) {
            array_push($array, $request->email_notification_3);
        }

        // tasks notifications
        if($request->email_notification_4) {
            array_push($array, $request->email_notification_4);
        }

        return $array;

    }

}
