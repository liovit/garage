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
use App\Models\Vehicle;
use App\Models\Order;

class VehiclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $filesPath = '/home/u874210567/domains/labairimtaimone.lt/public_html/garage/temporary/vehicles/';

    public function index()
    {
        $user = Auth::user();

        if($user->hasAnyPermission(['vehicles.access', 'everything'])) {

            $vehicles = Vehicle::all();

            return view('vehicles.index', compact('vehicles'));

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

        if($user->hasAnyPermission(['vehicles.access', 'everything'])) {

            return view('vehicles.create');

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

        if($user->hasAnyPermission(['vehicles.create', 'everything'])) {

            $vehicle = Vehicle::create($request->all());

            if($request->file('file')) {

                $pics = [];

                foreach($request->file('file') as $pic) {

                    $picName = time().'-'.$pic->getClientOriginalName();

                    array_push($pics, $picName);

                    if(!file_exists($this->filesPath . $vehicle->id)) {
                        mkdir($this->filesPath . $vehicle->id, 0777);
                    }
    
                    $pic->move($this->filesPath . $vehicle->id ,$picName);

                }

                $vehicle->update([
                    'pictures' => json_encode($pics)
                ]);

            }

            return redirect('/work/vehicles')->with('success', 'You have successfully added a new vehicle.');

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

        if($user->hasAnyPermission(['vehicles.view', 'everything'])) {

            $vehicle = Vehicle::find($id);

            $history = Order::where([['vehicle_id', '=', $vehicle->id], ['order_fill_status', '=', 7]])->get();

            return view('vehicles.view', compact('vehicle', 'history'));

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

        if($user->hasAnyPermission(['vehicles.edit', 'everything'])) {

            $vehicle = Vehicle::find($id);
            return view('vehicles.edit', compact('vehicle'));

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
        $user = Auth::user();

        if($user->hasAnyPermission(['vehicles.edit', 'everything'])) {

            $vehicle = Vehicle::find($id);

            $vehicle->update($request->all());

            if($request->file('file')) {

                if($vehicle->pictures) {
                    $pics = json_decode($vehicle->pictures);
                } else {
                    $pics = [];
                }

                foreach($request->file('file') as $pic) {

                    $picName = time().'-'.$pic->getClientOriginalName();

                    array_push($pics, $picName);

                    if(!file_exists($this->filesPath . $vehicle->id)) {
                        mkdir($this->filesPath . $vehicle->id, 0777);
                    }
    
                    $pic->move($this->filesPath . $vehicle->id ,$picName);

                }

                $vehicle->update([
                    'pictures' => json_encode($pics)
                ]);

            }

            return redirect('/work/vehicles/edit/'.$vehicle->id)->with('success', 'You have successfully updated vehicle information.');

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

    public function pre_delete($id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['vehicles.delete', 'everything'])) {

            $vehicle = Vehicle::find($id);
            return view('vehicles.delete', compact('vehicle'));

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function destroy($id)
    {
        $user = Auth::user();

        if($user->hasAnyPermission(['vehicles.delete', 'everything'])) {
            
            $vehicle = Vehicle::find($id);

            if($vehicle->pictures != null) {
                $pics = json_decode($vehicle->pictures);
                foreach($pics as $pic) {
                    unlink($this->filesPath . $id . '/' . $pic);
                }
            }

            $vehicle->delete();

            return redirect('/work/vehicles')->with('success', 'You have successfully deleted vehicle.');

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        }
    }

    public function delete_picture(Request $request, $id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['vehicles.edit', 'everything'])) {

            $vehicle = Vehicle::find($id);

            $pictures = json_decode($vehicle->pictures);

            foreach($pictures as $pic) {
                if($pic == $request->picture) {
                    unlink($this->filesPath . $vehicle->id . "/" . $pic);
                    break;
                }
            }

            $key = array_search($request->picture, $pictures);
            unset($pictures[$key]);

            $vehicle->update([
                'pictures' => json_encode($pictures)
            ]);

            $vehicle->save();

            return redirect('/work/vehicles/edit/'.$vehicle->id)->with('success', 'You have successfully deleted picture.');

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        } 

    }

    public function get_history(Request $request) {

        $data = $request->all();

        if($data['id']) {
            $object = Order::find($data['id']);
            return json_encode($object);
        }

    }

}
