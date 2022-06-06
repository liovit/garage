<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\User;

class CustomersController extends Controller
{
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
            $customer->update($request->all());

            if($request->default_calculation) {
                $customer->update([
                    'default_calculation' => 'yes'
                ]);
            } else {
                $customer->update([
                    'default_calculation' => 'no'
                ]);
            }

            return redirect('/customers')->with('success', 'Successfully updated customer!');

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        }

    }

    public function pre_delete($id) {

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
            $customer->delete();
            return redirect('/customers')->with('success', 'Successfully deleted customer!');

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }
    }

    public function post(Request $request) {

        // return var_dump($request->all());
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

                Customer::create($request->all());
                return redirect('/customers')->with('success', 'Successfully created new customer!');
                
            } else {
                return redirect()->back()->withInput();
            }

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        }

    }

}
