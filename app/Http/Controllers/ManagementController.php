<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Part;
use App\Models\Supplier;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class ManagementController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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

    public function test() {

        $parts = Part::all();
        $users = User::all();

        foreach($parts as $part) {

            if($part->qty <= 1) {

                $data = [
                    'title' => $part->description,
                    'quantity' => $part->qty,
                    'message' => 'Are running out, please check on the website and order new if you need any.',
                ];
    
                foreach($users as $user) {
                    if($user->notifications == 1 || $user->notifications == 4) {
                        Mail::to('tomas.balciunass11@gmail.com')->send(new partsRunOut($data));
                    }
                }

            }

        }

    }

    public function testUpload(Request $request) {

        $image = $request->file('file');

        $imageName = time().'.'.$image->extension();
        $image->move(public_path('temporary'),$imageName);

        return response()->json(['success'=>$imageName]);

    }

    public function test_create(Request $request) {

        return $request->all();

    }

}
