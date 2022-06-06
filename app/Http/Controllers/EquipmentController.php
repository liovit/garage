<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Equipment;
use App\Models\Equipment_Order;
use App\Models\Invoice;
use App\Models\Supplier;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Email_Settings;
use Mail;
use App\Mail\OrderEquipment;

class EquipmentController extends Controller
{

    public $filesPath = '/home/u874210567/domains/labairimtaimone.lt/public_html/garage/temporary/equipment/';
    public $invoicesPath = '/home/u874210567/domains/labairimtaimone.lt/public_html/garage/temporary/invoices/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();

        if($user->hasAnyPermission(['equipment.access', 'everything'])) {
            $equipment = Equipment::all();
            return view('equipment.index', compact('equipment', 'user'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function order_index() {

        $user = Auth::user();

        if($user->hasAnyPermission(['equipment.orders.access', 'everything'])) {
            $equipment = Equipment_Order::all();
            return view('equipment.orders.index', compact('equipment', 'user'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function order() {

        $user = Auth::user();

        if($user->hasAnyPermission(['equipment.orders.create', 'everything'])) {
            // $equipment = Equipment::all();
            $suppliers = Supplier::all();
            return view('equipment.orders.create', compact('suppliers', 'user'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function edit_order($id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['equipment.orders.edit', 'everything'])) {

            $equipment = Equipment_Order::where('order_id', '=', $id)->first();
            $suppliers = Supplier::all();
            $alleq = Equipment_Order::where('order_id', '=', $id)->get();
            return view('equipment.orders.edit', compact('equipment', 'suppliers', 'alleq'));

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function edit_order_item(Request $request, $id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['equipment.orders.edit', 'everything'])) {

            $equipment = Equipment_Order::find($id);
            $equipment->update($request->all());

            if($equipment->status == 2) {

                // to do on received parts, jump them to garage
                $eqs = Equipment::all();
                $eqsCount = count($eqs);
                $array = [];

                foreach($eqs as $p) {
                    if($p->code == $equipment->code) {
                        $calc = $p->quantity + $equipment->quantity;
                        $p->update([
                            'quantity' => $calc
                        ]);
                        break;
                    } else {
                        array_push($array, 0);
                    }
                }

                $arrayCount = count($array);

                if($arrayCount == $eqsCount) {
                    Equipment::create([
                        'code' => $equipment->code,
                        'bar_code' => $equipment->bar_code,
                        'description' => $equipment->description,
                        'type' => $equipment->type,
                        'supplier_id' => $equipment->supplier_id,
                        'quantity' => $equipment->quantity,
                        'price' => $equipment->price,
                        'status' => null,
                        'instructions' => $equipment->instructions
                    ]);
                }
                
                return redirect('/work/order/equipment/edit/'.$equipment->order_id)->with('success', 'You have successfully updated equipment information. However, since the status was changed to received the item can not be edited anymore. Item(-s) were automatically added to garage, either to existing ones or created new rows. Further editions of that specific item can be completed there.');

            } else {
                return redirect('/work/order/equipment/edit/'.$equipment->order_id)->with('success', 'You have successfully updated equipment information.');
            }


        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
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

        if($user->hasAnyPermission(['equipment.create', 'everything'])) {
            return view('equipment.create');
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

        if($user->hasAnyPermission(['equipment.create', 'everything'])) {

            $equipment = Equipment::create($request->all());

            if($request->file('file')) {

                $image = $request->file('file');
                $imageName = time().'-'.$image->getClientOriginalName();

                $equipment->update([
                    'picture' => $imageName
                ]);

                if(!file_exists($this->filesPath . $equipment->id)) {
                    mkdir($this->filesPath . $equipment->id, 0777);
                }

                $image->move($this->filesPath . $equipment->id ,$imageName);

            }

            return redirect('/work/equipment')->with('success', 'You have successfully added new equipment.');

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }
    }

    public function confirm_order(Request $request) {

        $user = Auth::user();

        if($user->hasAnyPermission(['equipment.orders.create', 'everything'])) {

            $count = count($request->code);
            $codeArr = []; $descArr = []; $qtyArr = [];
            $barCodeArr = []; $typeArr = [];

            $generateOrderId = Str::random(12);
            $orderStatus = $request->status;

            $allParts = Equipment::all();

            for($i = 0; $i < $count; $i++) {

                $part = Equipment_Order::create([

                    'supplier_id' => $request->supplier,
                    'code' => $request->code[$i],
                    'bar_code' => $request->bar_code[$i],
                    'description' => $request->description[$i],
                    'quantity' => $request->order_qty[$i],
                    'price' => $request->unit_cost[$i],
                    'instructions' => $request->instructions[$i],
                    'type' => $request->type[$i],
                    'status' => $request->status,
                    'order_id' => $generateOrderId,
                    'order_status' => $orderStatus,

                ]);

                if($request->code[$i]) { array_push($codeArr, $request->code[$i]); } else { array_push($codeArr, null); }
                if($request->description[$i]) { array_push($descArr, $request->description[$i]); } else { array_push($descArr, null); }
                if($request->order_qty[$i]) { array_push($qtyArr, $request->order_qty[$i]); } else { array_push($qtyArr, null); }
                if($request->bar_code[$i]) { array_push($barCodeArr, $request->bar_code[$i]); } else { array_push($barCodeArr, null); }
                if($request->type[$i]) { array_push($typeArr, $request->type[$i]); } else { array_push($typeArr, null); }

            }

            $orderMail = Email_Settings::find(3);

            $data = [
                'title' => $orderMail->title,
                'paragraph' => $orderMail->paragraph,
                'footer' => $orderMail->footer,
                'code' => $codeArr,
                'bar_code' => $barCodeArr,
                'description' => $descArr,
                'type' => $typeArr,
                'quantity' => $qtyArr,
            ];

            if($request->emails) {
                foreach ($request->emails as $email) {
                    Mail::to($email)->send(new OrderEquipment($data));
                }
            }

            return redirect('/work/orders-index/equipment')->with('success', 'You have successfully ordered new equipment!');

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        }

    }

    public function confirm_edit_order(Request $request, $id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['equipment.orders.edit', 'everything'])) {

            $eqs = Equipment_Order::where('order_id', '=', $id)->get();

            foreach($eqs as $e) {

                $e->update([
                    'order_status' => $request->order_status,
                    'supplier_id' => $request->supplier
                ]);

                if($e->order_status == 2) {

                    // to do on order receive, jump equipment to garage

                    if($e->status != 2) {

                        $pps = Equipment::all();
                        $eqsCount = count($pps);
                        $array = [];

                        foreach($pps as $p) {
                            if($p->code == $e->code) {
                                $calc = $p->quantity + $e->quantity;
                                $p->update([
                                    'quantity' => $calc
                                ]);
                                break;
                            } else {
                                array_push($array, 0);
                            }
                        }

                        $arrayCount = count($array);

                        if($arrayCount == $eqsCount) {
                            Equipment::create([
                                'code' => $e->code,
                                'bar_code' => $e->bar_code,
                                'type' => $e->type,
                                'price' => $e->price, // this is where you probably will have to increase by some number
                                'supplier_id' => $e->supplier_id,
                                'quantity' => $e->quantity,
                                'description' => $e->description,
                                'invoices' => $e->invoices,
                                'status' => null,
                                'instructions' => $e->instructions
                            ]);
                        }

                    }

                    $e->update([
                        'status' => 2
                    ]);

                }

            }

            return redirect('/work/orders-index/equipment')->with('success', 'You have successfully updated the order!');

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        }

    }

    public function upload_invoices(Request $request, $id) {

        $user = Auth::user();

        $eq = Equipment::find($id);
        $invoicesArr = [];

        if($user->hasAnyPermission(['equipment.edit', 'everything'])) {

            foreach($request->file('invoice') as $invoice) {

                $invoiceName = time().'-'.$invoice->getClientOriginalName(); // change image names later

                $newInvoice = Invoice::create([
                    'invoice_url' => $invoiceName,
                    'created_at' => Carbon::now(),
                    'model_type' => 'App\Models\Equipment',
                    'model_id' => $eq->id
                ]);

                if($eq->invoices) {
                    $invoicesArr2 = json_decode($eq->invoices);
                    array_push($invoicesArr2, $newInvoice->id);
                    $eq->update([
                        'invoices' => json_encode($invoicesArr2)
                    ]);
                } else if ($eq->invoices == null) {
                    array_push($invoicesArr, $newInvoice->id);
                    $eq->update([
                        'invoices' => json_encode($invoicesArr)
                    ]);
                }

                if(!file_exists($this->filesPath . $id)) {
                    mkdir($this->filesPath . $id, 0777);
                }

                $invoice->move($this->invoicesPath, $invoiceName);

            }

            return redirect('/work/equipment/edit/'.$id)->with('success', 'You have successfully uploaded invoices.');

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

        if($user->hasAnyPermission(['equipment.view', 'everything'])) {
            $equipment = Equipment::find($id);
            return view('equipment.view', compact('equipment', 'user'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }
    }

    public function show_order($id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['equipment.orders.view', 'everything'])) {

            $eq = Equipment_Order::where('order_id', '=', $id)->first();
            $supplier = Supplier::find($eq->supplier_id);
            $eqs = Equipment_Order::where('order_id', '=', $id)->get();
            return view('equipment.orders.view', compact('eq', 'supplier', 'eqs'));

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

        if($user->hasAnyPermission(['equipment.edit', 'everything'])) {
            $equipment = Equipment::find($id);
            return view('equipment.edit', compact('equipment', 'user'));
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

        if($user->hasAnyPermission(['equipment.edit', 'everything'])) {

            $equipment = Equipment::find($id);
            $equipment->update($request->all());

            if($request->file('file')) {

                $image = $request->file('file');
                $imageName = time().'-'.$image->getClientOriginalName();

                $equipment->update([
                    'picture' => $imageName
                ]);

                if(!file_exists($this->filesPath . $id)) {
                    mkdir($this->filesPath . $id, 0777);
                }

                $image->move($this->filesPath . $id ,$imageName);

            }

            return redirect('/work/equipment')->with('success', 'You have successfully updated equipment.');

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

        if($user->hasAnyPermission(['equipment.delete', 'everything'])) {

            $equipment = Equipment::find($id);
            return view('equipment.pre_delete', compact('equipment'));

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function destroy($id)
    {
        $user = Auth::user();

        if($user->hasAnyPermission(['equipment.delete', 'everything'])) {

            $equipment = Equipment::find($id);
            $equipment->delete();

            return redirect('/work/equipment')->with('success', 'You have successfully deleted equipment.');

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function pre_delete_order($id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['equipment.orders.delete', 'everything'])) {

            $eq = Equipment_Order::where('order_id', '=', $id)->first();
            $supplier = Supplier::find($eq->supplier_id);
            $eqs = Equipment_Order::where('order_id', '=', $id)->get();
            return view('equipment.orders.delete', compact('eq', 'supplier', 'eqs'));
        
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function delete_order($id, Request $request) {

        $user = Auth::user();

        if($user->hasAnyPermission(['equipment.orders.delete', 'everything'])) {

            $eq = Equipment_Order::where('order_id', '=', $id)->first();
            $supplier = Supplier::find($eq->supplier_id);
            $eqs = Equipment_Order::where([['order_id', '=', $id], ['status', '!=', '2']])->get();

            $count = count($eqs);
            $codeArr = []; $descArr = []; $qtyArr = [];
            $barCodeArr = []; $typeArr = [];

            for($i = 0; $i < $count; $i++) {

                if($eqs[$i]->code) { array_push($codeArr, $eqs[$i]->code); } else { array_push($codeArr, null); }
                if($eqs[$i]->description) { array_push($descArr, $eqs[$i]->description); } else { array_push($descArr, null); }
                if($eqs[$i]->order_qty) { array_push($qtyArr, $eqs[$i]->order_qty); } else { array_push($qtyArr, null); }
                if($eqs[$i]->bar_code) { array_push($barCodeArr, $eqs[$i]->bar_code); } else { array_push($barCodeArr, null); }
                if($eqs[$i]->type) { array_push($typeArr, $eqs[$i]->type); } else { array_push($typeArr, null); }

            }

            $email = $supplier->supplier_email;

            $cancelMail = Email_Settings::find(4);

            $data = [
                'title' => $cancelMail->title,
                'paragraph' => $cancelMail->paragraph,
                'footer' => $cancelMail->footer,
                'order_id' => $eq->order_id,
                'code' => $codeArr,
                'bar_code' => $barCodeArr,
                'description' => $descArr,
                'type' => $typeArr,
                'quantity' => $qtyArr,
            ];

            // var_dump($request);

            if($request->email_send == "yes") {
                Mail::to($email)->send(new CancelEquipmentOrder($data));
            }

            for($i = 0; $i < $count; $i++) {
                $eqs[$i]->delete();
            }

            if($request->email_send == "yes") {
                return redirect('/work/orders-index/equipment')->with('success', 'Successfully deleted order and informed supplier about cancelation.');
            } else {
                return redirect('/work/orders-index/equipment')->with('success', 'Successfully deleted order.');
            }
        
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        }

    }

    public function get_products(Request $request) {

        $data = $request->all();

        if($data['product']) {

            // search by word
            $products = Equipment::where([['description', 'LIKE', $data['product'].'%'], ['supplier_id', '=', $data['supplier']]])->get();
            return json_encode($products);

        }

    }

}
