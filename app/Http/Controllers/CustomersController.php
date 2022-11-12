<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\User;

class CustomersController extends Controller
{

    // public $filesPath = '/home/u958765773/domains/labairimtaimone.lt/public_html/garage/media/customers/';
    // public $removeFilesPath = '/home/u958765773/domains/labairimtaimone.lt/public_html/';

    public $filesPath = '/Users/maeqh/Desktop/noname/Projects/garageservicesproject/public/media/customers/';
    public $removeFilesPath = '/Users/maeqh/Desktop/noname/Projects/garageservicesproject/public';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $customers = Customer::all();
        return view('customers.index', compact('customers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = Auth::user();

        if($user->hasAnyPermission(['customers.create', 'everything'])) {

            return view('customers.create');

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

        if($user->hasAnyPermission(['customers.create', 'everything'])) {

            if($validated = $request->validate([
                'company' => 'required',
                'name' => 'required',
                'city' => 'required',
                'address' => 'required',
                'postal_code' => 'required',
                'state' => 'required',
                'email' => 'required_without:telephone',
                'customer_type' => 'required',
            ])) {

                $createCustomer = Customer::create($request->all());

                if($request->file('avatar')) {

                    $pTitle = time() . '-' . $request->file('avatar')->getClientOriginalName();
    
                    if(!file_exists($this->filesPath . $createCustomer->id)) {
                        mkdir($this->filesPath . $createCustomer->id, 0777);
                    }
    
                    $request->file('avatar')->move($this->filesPath . $createCustomer->id , $pTitle);
    
                    $createCustomer->update([
                        'avatar' => '/media/profiles/' . $createCustomer->id . '/' . $pTitle,
                    ]);
    
                }

                return redirect('/customers')->with('success', 'Successfully created new customer!');
                
            } else {
                return redirect()->back()->withInput();
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
        $user = Auth::user();

        if($user->hasAnyPermission(['customers.view', 'everything'])) {

            $customer = Customer::find($id);
            return view('customers.view', compact('customer'));

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

        if($user->hasAnyPermission(['customers.edit', 'everything'])) {

            $customer = Customer::find($id);
            return view('customers.edit', compact('customer'));

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

        if($user->hasAnyPermission(['customers.edit', 'everything'])) {

            $validated = $request->validate([
                'task_labor_rate' => 'required_without:default_calculation',
                'shop_charge_percentage' => 'required_without:default_calculation'
            ]);

            $customer = Customer::find($id);
            $customer->update($request->except(['avatar']));

            if($request->default_calculation) {
                $customer->update([
                    'default_calculation' => 'yes'
                ]);
            } else {
                $customer->update([
                    'default_calculation' => 'no'
                ]);
            }

            if($request->file('avatar')) {

                // remove current picture
                if($customer->avatar) {
                    unlink($this->removeFilesPath . $customer->avatar);
                }
    
                // reform slightly original title
                $pTitle = time() . '-' . $request->file('avatar')->getClientOriginalName();
    
                // check if such profile folder exists, if not create new
                if(!file_exists($this->filesPath . $customer->id)) {
                    mkdir($this->filesPath . $customer->id, 0777);
                }
    
                // place the picture in to the user folder
                $request->file('avatar')->move($this->filesPath . $customer->id , $pTitle);
    
                // update database
                $customer->update([
                    'avatar' => '/media/customers/' . $customer->id . '/' . $pTitle,
                ]);
    
            }

            return redirect('/management/customers/edit/'.$id)->with('success', 'Successfully updated customer!');

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        }

    }

    public function showDestroy($id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['customers.delete', 'everything'])) {

            $customer = Customer::find($id);
            return view('customers.delete', compact('customer'));

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

        if($user->hasAnyPermission(['customers.delete', 'everything'])) {

            $customer = Customer::find($id);

            if($customer->avatar) {
                unlink($this->removeFilesPath . $customer->avatar);
            }

            $customer->delete();

            return redirect('/management/customers')->with('success', 'Successfully deleted customer!');

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }
    }

}
