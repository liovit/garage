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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function suppliers() {

        $user = Auth::user();

        if($user->hasAnyPermission(['suppliers.management.access', 'suppliers.management.view', 'everything'])) {
            $suppliers = Supplier::all();
            return view('management.suppliers', compact('suppliers'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }
    }

    public function roles() {

        $user = Auth::user();

        if($user->hasAnyPermission(['roles.management.view', 'roles.management.access', 'everything'])) {

            $roles = Role::all();
            return view('management.roles', compact('roles'));

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function permissions() {

        $user = Auth::user();

        if($user->hasAnyPermission(['permissions.management.access', 'permissions.management.view', 'everything'])) {
            $permissions = Permission::all();
            return view('management.permissions', compact('permissions'));
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

    public function suppliers_create() {

        $user = Auth::user();

        if($user->hasAnyPermission(['suppliers.management.create', 'everything'])) {
            return view('management.suppliers_create');
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function roles_create() {

        $user = Auth::user();

        if($user->hasAnyPermission(['roles.management.create', 'everything'])) {
            $permissions = Permission::all();
            return view('management.roles_create', compact('permissions'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function permissions_create() {
        return view('management.permissions_create');
    }

    public function supplier_confirm_creation(Request $request) {

        $user = Auth::user();

        if($user->hasAnyPermission(['suppliers.management.create', 'everything'])) {

            $createSupplier = Supplier::create([
                'supplier_name' => $request->supplier_name,
                'supplier_company' => $request->supplier_company,
                'supplier_city' => $request->supplier_city,
                'supplier_state' => $request->supplier_state,
                'supplier_address' => $request->supplier_address,
                'supplier_post' => $request->supplier_post,
                'supplier_email' => $request->supplier_email,
                'supplier_telephone' => $request->supplier_telephone,
                'supplier_fax' => $request->supplier_fax,
                'supplier_toll' => $request->supplier_toll,
                'supplier_alt_phone' => $request->supplier_alt_phone,
                'billing_city' => $request->billing_city,
                'billing_state' => $request->billing_state,
                'billing_address' => $request->billing_address,
                'billing_post' => $request->billing_post,
                'billing_email' => $request->billing_email,
                'billing_telephone' => $request->billing_telephone,
                'billing_fax' => $request->billing_fax,
                'billing_toll' => $request->billing_toll,
                'billing_alt_phone' => $request->billing_alt_phone,
                'comments' => $request->comments,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            $alt_names = []; $alt_emails = []; $alt_phones = []; $alt_faxes = [];

            if($request->alt_contacts_names) {
                foreach($request->alt_contacts_names as $name) {
                    array_push($alt_names, $name);
                }
            }

            if($request->alt_contacts_emails) {
                foreach($request->alt_contacts_emails as $email) {
                    array_push($alt_emails, $email);
                }
            }

            if($request->alt_contacts_phones) {
                foreach($request->alt_contacts_phones as $phone) {
                    array_push($alt_phones, $phone);
                }
            }

            if($request->alt_contacts_faxes) {
                foreach($request->alt_contacts_faxes as $fax) {
                    array_push($alt_faxes, $fax);
                }
            }

            $createSupplier->update([
                'alt_contacts_names' => $alt_names,
                'alt_contacts_emails' => $alt_emails,
                'alt_contacts_phones' => $alt_phones,
                'alt_contacts_faxes' => $alt_faxes
            ]);

            if($createSupplier) {
                return redirect('/management/suppliers')->with('success', 'Successfully created new supplier!');
            }

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        }

    }

    public function role_confirm_creation(Request $request) {

        $user = Auth::user();

        if($user->hasAnyPermission(['roles.management.create', 'everything'])) {
            $role = Role::create(['name' => $request->n]);
            $role->syncPermissions($request->permissions);
            return redirect('/management/roles')->with('success', 'Successfully created new role ('.$request->n.')!');
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        }

    }

    public function permission_confirm_creation(Request $request) {

        $user = Auth::user();

        if($user->hasAnyPermission(['everything'])) {
            Permission::create(['name' => $request->n]);
            return redirect('/management/permissions')->with('success', 'Successfully created new permission ( '.$request->n.' )!');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show_role($id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['roles.management.view', 'everything'])) {
            $role = Role::find($id);
            return view('management.roles_view', compact('role'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }
    }

    public function show_supplier($id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['suppliers.management.view', 'everything'])) {
            $supplier = Supplier::find($id);
            return view('management.suppliers_view', compact('supplier'));
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

    public function edit_role($id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['roles.management.edit', 'everything'])) {
            $role = Role::find($id);
            $permissions = Permission::all();
            return view('management.roles_edit', compact('role', 'permissions'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function edit_supplier($id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['suppliers.management.edit', 'everything'])) {
            $supplier = Supplier::find($id);
            return view('management.suppliers_edit', compact('supplier'));
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

    public function update_alt_contact(Request $request) {

        $data = $request->all();

        $supplier = Supplier::find($data['supplierId']);
        $id = $data['id'];

        $allContactsNames = json_decode($supplier->alt_contacts_names);
        $allContactsPhones = json_decode($supplier->alt_contacts_phones);
        $allContactsFaxes = json_decode($supplier->alt_contacts_faxes);
        $allContactsEmails = json_decode($supplier->alt_contacts_emails);

        $nameReplacement = array($id => $data['name']);
        $emailReplacement = array($id => $data['email']);
        $phoneReplacement = array($id => $data['phone']);
        $faxReplacement = array($id => $data['fax']);

        $newNames = array_replace($allContactsNames, $nameReplacement);
        $newPhones = array_replace($allContactsPhones, $phoneReplacement);
        $newFaxes = array_replace($allContactsFaxes, $faxReplacement);
        $newEmails = array_replace($allContactsEmails, $emailReplacement);

        $replacedNames = json_encode($newNames);
        $replacedPhones = json_encode($newPhones);
        $replacedEmails = json_encode($newEmails);
        $replacedFaxes = json_encode($newFaxes);

        $supplier->update([
            'alt_contacts_names' => $replacedNames,
            'alt_contacts_emails' => $replacedEmails,
            'alt_contacts_faxes' => $replacedFaxes,
            'alt_contacts_phones' => $replacedPhones
        ]);

        return $request->all();

    }

    public function confirm_supplier_update(Request $request, $id) {

        $supplier = Supplier::find($id);

        $supplier->update([
            'supplier_name' => $request->supplier_name,
            'supplier_company' => $request->supplier_company,
            'supplier_city' => $request->supplier_city,
            'supplier_state' => $request->supplier_state,
            'supplier_address' => $request->supplier_address,
            'supplier_post' => $request->supplier_post,
            'supplier_email' => $request->supplier_email,
            'supplier_telephone' => $request->supplier_telephone,
            'supplier_fax' => $request->supplier_fax,
            'supplier_toll' => $request->supplier_toll,
            'supplier_alt_phone' => $request->supplier_alt_phone,
            'billing_company' => $request->billing_company,
            'billing_name' => $request->billing_name,
            'billing_city' => $request->billing_city,
            'billing_state' => $request->billing_state,
            'billing_address' => $request->billing_address,
            'billing_post' => $request->billing_post,
            'billing_email' => $request->billing_email,
            'billing_telephone' => $request->billing_telephone,
            'billing_fax' => $request->billing_fax,
            'billing_toll' => $request->billing_toll,
            'billing_alt_phone' => $request->billing_alt_phone,
            'comments' => $request->comments,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        $alt_names = json_decode($supplier->alt_contacts_names);
        $alt_emails = json_decode($supplier->alt_contacts_emails);
        $alt_phones = json_decode($supplier->alt_contacts_phones);
        $alt_faxes = json_decode($supplier->alt_contacts_faxes);

        if($request->alt_contacts_names) {
            foreach($request->alt_contacts_names as $name) {
                array_push($alt_names, $name);
            }
        }

        if($request->alt_contacts_emails) {
            foreach($request->alt_contacts_emails as $email) {
                array_push($alt_emails, $email);
            }
        }

        if($request->alt_contacts_phones) {
            foreach($request->alt_contacts_phones as $phone) {
                array_push($alt_phones, $phone);
            }
        }

        if($request->alt_contacts_faxes) {
            foreach($request->alt_contacts_faxes as $fax) {
                array_push($alt_faxes, $fax);
            }
        }

        $newNames = json_encode($alt_names);
        $newEmails = json_encode($alt_emails);
        $newFaxes = json_encode($alt_faxes);
        $newPhones = json_encode($alt_phones);

        $supplier->update([
            'alt_contacts_names' => $newNames,
            'alt_contacts_emails' => $newEmails,
            'alt_contacts_phones' => $newPhones,
            'alt_contacts_faxes' => $newFaxes
        ]);

        return redirect('/management/suppliers')->with('success', 'Successfully updated supplier!');

    }

    public function confirm_role_update(Request $request, $id) {

        $role = Role::find($id);

        $role->update([
            'name' => $request->n,
            'updated_at' => Carbon::now()
        ]);

        $role->syncPermissions($request->permissions);

        return redirect('/management/roles')->with('success', 'Successfully updated role!');

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

    public function pre_delete_supplier($id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['suppliers.management.delete', 'everything'])) {
            $supplier = Supplier::find($id);
            return view('management.suppliers_delete', compact('supplier'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function delete_supplier($id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['suppliers.management.delete', 'everything'])) {
            $supplier = Supplier::find($id);
            $supplier->delete();
            return redirect('/management/suppliers')->with('success', 'Successfully deleted supplier!');
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        }

    }

    public function pre_delete_role($id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['roles.management.delete', 'everything'])) {
            $role = Role::find($id);
            return view('management.roles_delete', compact('role'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function delete_role($id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['roles.management.delete', 'everything'])) {
            $role = Role::find($id);
            $rn = $role->name;
            $role->delete();
            return redirect('/management/roles')->with('success', 'Successfully deleted ('. $rn .') role!');
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function delete_alt_contact(Request $request) {

        $data = $request->all();

        $supplier = Supplier::find($data['supplierId']);
        $id = $data['id'];

        $allContactsNames = json_decode($supplier->alt_contacts_names);
        $allContactsPhones = json_decode($supplier->alt_contacts_phones);
        $allContactsFaxes = json_decode($supplier->alt_contacts_faxes);
        $allContactsEmails = json_decode($supplier->alt_contacts_emails);

        unset($allContactsNames[$id]);
        unset($allContactsPhones[$id]);
        unset($allContactsFaxes[$id]);
        unset($allContactsEmails[$id]);

        $newNames = json_encode($allContactsNames);
        $newPhones = json_encode($allContactsPhones);
        $newEmails = json_encode($allContactsEmails);
        $newFaxes = json_encode($allContactsFaxes);

        $supplier->update([
            'alt_contacts_names' => $newNames,
            'alt_contacts_emails' => $newEmails,
            'alt_contacts_faxes' => $newFaxes,
            'alt_contacts_phones' => $newPhones
        ]);

        return $request->id;
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
