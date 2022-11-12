<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Supplier;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class SuppliersController extends Controller
{

    // public $filesPath = '/home/u958765773/domains/labairimtaimone.lt/public_html/garage/media/suppliers/';
    // public $removeFilesPath = '/home/u958765773/domains/labairimtaimone.lt/public_html/';

    public $filesPath = '/Users/maeqh/Desktop/noname/Projects/garageservicesproject/public/media/suppliers/';
    public $removeFilesPath = '/Users/maeqh/Desktop/noname/Projects/garageservicesproject/public';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();

        if($user->hasAnyPermission(['suppliers.management.access', 'suppliers.management.view', 'everything'])) {
            $suppliers = Supplier::all();
            return view('suppliers.index', compact('suppliers'));
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

        if($user->hasAnyPermission(['suppliers.management.create', 'everything'])) {
            return view('suppliers.create');
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

        if($user->hasAnyPermission(['suppliers.management.create', 'everything'])) {

            if($validated = $request->validate([
                'supplier_company' => 'required',
                'supplier_name' => 'required',
                'supplier_email' => 'required',
                'supplier_telephone' => 'required',
                'billing_company' => 'required',
                'billing_name' => 'required',
                'billing_city' => 'required',
                'billing_address' => 'required',
                'billing_post' => 'required',
                'billing_state' => 'required',
                'billing_email' => 'required_without:billing_telephone',
            ])) {

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

                if($request->file('avatar')) {

                    $pTitle = time() . '-' . $request->file('avatar')->getClientOriginalName();
    
                    if(!file_exists($this->filesPath . $createSupplier->id)) {
                        mkdir($this->filesPath . $createSupplier->id, 0777);
                    }
    
                    $request->file('avatar')->move($this->filesPath . $createSupplier->id , $pTitle);
    
                    $createSupplier->update([
                        'avatar' => '/media/profiles/' . $createSupplier->id . '/' . $pTitle,
                    ]);
    
                }
    
                $alt_names = []; $alt_emails = []; $alt_phones = []; $alt_faxes = [];
    
                if($request->alt_contacts_names) {
                    foreach($request->alt_contacts_names as $name) {
                        if($name) {
                            array_push($alt_names, $name);
                        } else {
                            array_push($alt_names, null);
                        }
                    }
                }
    
                if($request->alt_contacts_emails) {
                    foreach($request->alt_contacts_emails as $email) {
                        if($email) {
                            array_push($alt_emails, $email);
                        } else {
                            array_push($alt_emails, null);
                        }
                    }
                }
    
                if($request->alt_contacts_phones) {
                    foreach($request->alt_contacts_phones as $phone) {
                        if($phone)
                        {
                            array_push($alt_phones, $phone);
                        } else {
                            array_push($alt_phones, null);
                        }
                    }
                }
    
                if($request->alt_contacts_faxes) {
                    foreach($request->alt_contacts_faxes as $fax) {
                        if($fax) {
                            array_push($alt_faxes, $fax);
                        } else {
                            array_push($alt_faxes, null);
                        }
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

        if($user->hasAnyPermission(['suppliers.management.view', 'everything'])) {
            $supplier = Supplier::find($id);
            return view('suppliers.view', compact('supplier'));
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

        if($user->hasAnyPermission(['suppliers.management.edit', 'everything'])) {
            $supplier = Supplier::find($id);
            return view('suppliers.edit', compact('supplier'));
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

        $supplier = Supplier::find($id);

        if($validated = $request->validate([
            'supplier_company' => 'required',
            'supplier_name' => 'required',
            'supplier_email' => 'required',
            'supplier_telephone' => 'required',
            'billing_company' => 'required',
            'billing_name' => 'required',
            'billing_city' => 'required',
            'billing_address' => 'required',
            'billing_post' => 'required',
            'billing_state' => 'required',
            'billing_email' => 'required_without:billing_telephone',
        ])) {

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

            if($request->file('avatar')) {

                // remove current picture
                if($supplier->avatar) {
                    unlink($this->removeFilesPath . $supplier->avatar);
                }
    
                // reform slightly original title
                $pTitle = time() . '-' . $request->file('avatar')->getClientOriginalName();
    
                // check if such profile folder exists, if not create new
                if(!file_exists($this->filesPath . $supplier->id)) {
                    mkdir($this->filesPath . $supplier->id, 0777);
                }
    
                // place the picture in to the user folder
                $request->file('avatar')->move($this->filesPath . $supplier->id , $pTitle);
    
                // update database
                $supplier->update([
                    'avatar' => '/media/suppliers/' . $supplier->id . '/' . $pTitle,
                ]);
    
            }
    
            $alt_names = json_decode($supplier->alt_contacts_names);
            $alt_emails = json_decode($supplier->alt_contacts_emails);
            $alt_phones = json_decode($supplier->alt_contacts_phones);
            $alt_faxes = json_decode($supplier->alt_contacts_faxes);
    
            if($request->alt_contacts_names) {
                foreach($request->alt_contacts_names as $name) {
                    if($name) {
                        array_push($alt_names, $name);
                    } else {
                        array_push($alt_names, null);
                    }
                }
            }
    
            if($request->alt_contacts_emails) {
                foreach($request->alt_contacts_emails as $email) {
                    if($email) {
                        array_push($alt_emails, $email);
                    } else {
                        array_push($alt_emails, null);
                    }
                }
            }
    
            if($request->alt_contacts_phones) {
                foreach($request->alt_contacts_phones as $phone) {
                    if($phone)
                    {
                        array_push($alt_phones, $phone);
                    } else {
                        array_push($alt_phones, null);
                    }
                }
            }
    
            if($request->alt_contacts_faxes) {
                foreach($request->alt_contacts_faxes as $fax) {
                    if($fax) {
                        array_push($alt_faxes, $fax);
                    } else {
                        array_push($alt_faxes, null);
                    }
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

        } else {
            return redirect()->back()->withInput();
        }

        return redirect('/management/suppliers')->with('success', 'Successfully updated supplier!');

    }

    // function for alternative contact updates (separate function in edit page)
    public function updateAltContact(Request $request) {

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

    // function for alternative contact deletes (separate function in edit page)
    public function deleteAltContact(Request $request) {

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

    // show delete page view
    public function showDestroy($id) 
    {

        $user = Auth::user();

        if($user->hasAnyPermission(['suppliers.management.delete', 'everything'])) {
            $supplier = Supplier::find($id);
            return view('suppliers.delete', compact('supplier'));
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

        if($user->hasAnyPermission(['suppliers.management.delete', 'everything'])) {

            $supplier = Supplier::find($id);

            if($supplier->avatar) {
                unlink($this->removeFilesPath . $supplier->avatar);
            }

            $supplier->delete();

            return redirect('/management/suppliers')->with('success', 'Successfully deleted supplier!');
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        }

    }
}
