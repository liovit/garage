<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use App\Models\Part;
use App\Models\Supplier;
use App\Models\Invoice;
use Mail;
use App\Mail\OrderParts;
use App\Mail\CancelOrderParts;
use App\Models\Part_Order;
use App\Models\Email_Settings;
use DB;
use Illuminate\Support\Str;

class PartsController extends Controller
{

    public $filesPath = '/home/u874210567/domains/labairimtaimone.lt/public_html/garage/temporary/parts/';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        if($user->hasAnyPermission(['parts.access', 'everything'])) {
            $parts = Part_Order::all();
            return view('parts.index', compact('parts', 'user'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function index_garage() {
        $user = Auth::user();

        if($user->hasAnyPermission(['parts.garage.access', 'everything'])) {
            $parts = Part::all();
            return view('parts.garage_index', compact('parts', 'user'));
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

        if($user->hasAnyPermission(['parts.create', 'everything'])) {
            return view('parts.create');
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function order() {

        $user = Auth::user();

        if($user->hasAnyPermission(['parts.create', 'everything'])) {
            $suppliers = Supplier::all();
            return view('parts.order', compact('suppliers'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function confirm_order(Request $request) {

        $user = Auth::user();

        if($user->hasAnyPermission(['parts.create', 'everything'])) {

            $count = count($request->code);
            $codeArr = []; $descArr = []; $qtyArr = [];
            $barCodeArr = []; $categoryArr = []; $typeArr = [];
            $modelArr = []; $makeArr = []; $styleArr = [];

            $generateOrderId = Str::random(12);
            $orderStatus = $request->status;

            $allParts = Part::all();

            for($i = 0; $i < $count; $i++) {

                $part = Part_Order::create([

                    'supplier_id' => $request->supplier,
                    'code' => $request->code[$i],
                    'bar_code' => $request->bar_code[$i],
                    'description' => $request->description[$i],
                    'product_no' => $request->product_no[$i],
                    'order_qty' => $request->order_qty[$i],
                    'unit_cost' => $request->unit_cost[$i],
                    'cost' => $request->cost[$i],
                    'qty_rec' => $request->qty_rec[$i],
                    'qty_rec_today' => $request->qty_rec_today[$i],
                    'date_rec' => $request->date_rec[$i],
                    'qty_return' => $request->qty_return[$i],
                    'instructions' => $request->instructions[$i],
                    'category' => $request->category[$i],
                    'type' => $request->type[$i],
                    'model' => $request->model[$i],
                    'make' => $request->make[$i],
                    'style' => $request->style[$i],
                    'status' => $request->status,
                    'order_id' => $generateOrderId,
                    'order_status' => $orderStatus,

                ]);

                // the check for on order additions to parts in garage
                foreach($allParts as $p) {
                    if($p->code == $part->code) {
                        $c = $p->on_order + $part->order_qty;
                        $p->update([
                            'on_order' => $c.'.00'
                        ]);
                    }
                }

                if($request->code[$i]) { array_push($codeArr, $request->code[$i]); } else { array_push($codeArr, null); }
                if($request->description[$i]) { array_push($descArr, $request->description[$i]); } else { array_push($descArr, null); }
                if($request->order_qty[$i]) { array_push($qtyArr, $request->order_qty[$i]); } else { array_push($qtyArr, null); }
                if($request->bar_code[$i]) { array_push($barCodeArr, $request->bar_code[$i]); } else { array_push($barCodeArr, null); }
                if($request->category[$i]) { array_push($categoryArr, $request->category[$i]); } else { array_push($categoryArr, null); }
                if($request->type[$i]) { array_push($typeArr, $request->type[$i]); } else { array_push($typeArr, null); }
                if($request->make[$i]) { array_push($makeArr, $request->make[$i]); } else { array_push($makeArr, null); }
                if($request->model[$i]) { array_push($modelArr, $request->model[$i]); } else { array_push($modelArr, null); }
                if($request->style[$i]) { array_push($styleArr, $request->style[$i]); } else { array_push($styleArr, null); }

            }

            $orderMail = Email_Settings::find(1);

            $data = [
                'title' => $orderMail->title,
                'paragraph' => $orderMail->paragraph,
                'footer' => $orderMail->footer,
                'code' => $codeArr,
                'bar_code' => $barCodeArr,
                'description' => $descArr,
                'category' => $categoryArr,
                'type' => $typeArr,
                'model' => $modelArr,
                'make' => $makeArr,
                'style' => $styleArr,
                'quantity' => $qtyArr,
            ];

            if($request->emails) {
                foreach ($request->emails as $email) {
                    Mail::to($email)->send(new OrderParts($data));
                }
            }

            return redirect('/work/parts')->with('success', 'Successfully ordered new parts!');

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

    public function edit_upload_pictures(Request $request, $id) {

        $user = Auth::user();

        $part = Part::find($id);
        $imagesArr = [];

        if($user->hasAnyPermission(['parts.garage.edit', 'everything'])) {

            foreach($request->file('file') as $image) {

                $imageName = time().'-'.$image->getClientOriginalName(); // change image names later

                if($part->pictures) {
                    $imagesArr2 = json_decode($part->pictures);
                    array_push($imagesArr2, $imageName);
                    $part->update([
                        'pictures' => json_encode($imagesArr2)
                    ]);
                } else if ($part->pictures == null) {
                    array_push($imagesArr, $imageName);
                    $part->update([
                        'pictures' => json_encode($imagesArr)
                    ]);
                }

                if(!file_exists($this->filesPath . $id)) {
                    mkdir($this->filesPath . $id, 0777);
                }

                $image->move($this->filesPath . $id ,$imageName);

            }

            return redirect('/work/parts/edit/'.$id)->with('success', 'You have successfully uploaded pictures.');

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        }

    }

    public function edit_upload_invoices(Request $request, $id) {

        $user = Auth::user();

        $part = Part::find($id);
        $invoicesArr = [];

        if($user->hasAnyPermission(['parts.garage.edit', 'everything'])) {

            foreach($request->file('invoice') as $invoice) {

                $invoiceName = time().'-'.$invoice->getClientOriginalName(); // change image names later

                $newInvoice = Invoice::create([
                    'invoice_url' => $invoiceName,
                    'created_at' => Carbon::now(),
                    'model_type' => 'App\Models\Part',
                    'model_id' => $part->id
                ]);

                if($part->invoices) {
                    $invoicesArr2 = json_decode($part->invoices);
                    array_push($invoicesArr2, $newInvoice->id);
                    $part->update([
                        'invoices' => json_encode($invoicesArr2)
                    ]);
                } else if ($part->invoices == null) {
                    array_push($invoicesArr, $newInvoice->id);
                    $part->update([
                        'invoices' => json_encode($invoicesArr)
                    ]);
                }

                if(!file_exists($this->filesPath . $id)) {
                    mkdir($this->filesPath . $id, 0777);
                }

                $invoice->move($this->filesPath . $id ,$invoiceName);

            }

            return redirect('/work/parts/edit/'.$id)->with('success', 'You have successfully uploaded invoices.');

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

        if($user->hasAnyPermission(['parts.garage.view', 'everything'])) {

            $part = Part::find($id);
            $supplier = Supplier::find($part->supplier_id);
            return view('parts.garage_view', compact('part', 'supplier'));

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }
    }

    public function view_order($id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['parts.view', 'everything'])) {

            $part = Part_Order::where('order_id', '=', $id)->first();
            $supplier = Supplier::find($part->supplier_id);
            $parts = Part_Order::where('order_id', '=', $id)->get();
            return view('parts.view', compact('part', 'supplier', 'parts'));

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
    public function edit($id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['parts.garage.edit', 'everything'])) {

            if(is_numeric($id)) {

                $part = Part::find($id);
                $suppliers = Supplier::all();
                $supplier = Supplier::find($part->supplier_id);
                return view('parts.garage_edit', compact('part', 'suppliers', 'supplier'));

            } else {

                $part = Part_Order::where('order_id', '=', $id)->first();
                $suppliers = Supplier::all();
                $parts = Part_Order::where('order_id', '=', $id)->get();
                return view('parts.edit', compact('part', 'suppliers', 'parts'));

            }

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        }

    }

    public function edit_confirm(Request $request, $id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['parts.garage.edit', 'everything'])) {

            $part = Part::find($id);
            $part->update($request->all());
            return redirect()->back()->with('success', 'You have successfully updated this part.');

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        }

    }

    public function confirm_order_edit(Request $request, $id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['parts.edit', 'everything'])) {

            $parts = Part_Order::where('order_id', '=', $id)->get();

            foreach($parts as $part) {

                $part->update([
                    'order_status' => $request->order_status,
                    'supplier_id' => $request->supplier
                ]);

                if($part->order_status == 2) {
                    // to do on order receive, jump these parts to garage

                    if($part->status != 2) {

                        $pps = Part::all();
                        $partsCount = count($pps);
                        $array = [];

                        foreach($pps as $p) {
                            if($p->code == $part->code) {
                                $calc = $p->qty + $part->order_qty;

                                if($p->history) {

                                    $history = json_decode($p->history);
        
                                    $item = [
                                        'date' => Carbon::now(),
                                        'price' => $part->unit_cost,
                                        'description' => $part->description,
                                        'supplier' => $part->supplier_id,
                                    ];
        
                                    array_push($history, $item);
                                    
                                } else {
                                    $history = [[
                                        'date' => Carbon::now(),
                                        'price' => $part->unit_cost,
                                        'description' => $part->description,
                                        'supplier' => $part->supplier_id,
                                    ]];
                                }

                                $p->update([
                                    'qty' => $calc,
                                    'history' => json_encode($history),
                                    'costing_method' => 1,
                                    'last_cost' => $part->unit_cost,
                                ]);

                                break;
                            } else {
                                array_push($array, 0);
                            }
                        }

                        $arrayCount = count($array);

                        if($arrayCount == $partsCount) {

                            $history = [[
                                'date' => Carbon::now(),
                                'price' => $part->unit_cost,
                                'description' => $part->description,
                                'supplier' => $part->supplier_id,
                            ]];

                            Part::create([
                                'code' => $part->code,
                                'bar_code' => $part->bar_code,
                                'category' => $part->category,
                                'type' => $part->type,
                                'location' => $part->location,
                                'on_hand' => $part->on_hand,
                                'price' => $part->prices, // this is where you probably will have to increase by some number
                                'supplier_id' => $part->supplier_id,
                                'qty' => $part->order_qty,
                                'model' => $part->model,
                                'make' => $part->make,
                                'style' => $part->style,
                                'pictures' => $part->pictures,
                                'invoices' => $part->invoices,
                                'warranty_time' => $part->warranty_time,
                                'warranty_interval' => $part->warranty_interval,
                                'prices' => $part->prices,
                                'discount' => $part->discount,
                                'description' => $part->description,
                                'garage_location' => $part->garage_location,
                                'status' => null,
                                'history' => json_encode($history),
                                'product_no' => $part->product_no,
                                'order_qty' => $part->order_qty,
                                'unit_cost' => $part->unit_cost,
                                'cost' => $part->cost,
                                'qty_rec' => $part->qty_rec,
                                'qty_rec_today' => $part->qty_rec_today,
                                'unit_cost_today' => $part->unit_cost_today,
                                'date_rec' => $part->date_rec,
                                'qty_return' => $part->qty_return,
                                'instructions' => $part->instructions,
                                'charge_base' => 0,
                                'costing_method' => 1,
                                'last_cost' => $part->unit_cost,
                            ]);
                        }

                    }

                    $part->update([
                        'status' => 2
                    ]);

                }

            }

            return redirect('/work/parts')->with('success', 'You have successfully updated the order!');

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        }

    }

    public function edit_order_part(Request $request, $id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['parts.edit', 'everything'])) {

            $part = Part_Order::find($id);
            $part->update($request->all());

            if($part->status == 2) {

                // to do on received parts, jump them to garage
                $parts = Part::all();
                $partsCount = count($parts);
                $array = [];

                foreach($parts as $p) {
                    if($p->code == $part->code) {
                        $calc = $p->qty + $part->order_qty;

                        if($p->history) {

                            $history = json_decode($p->history);

                            $item = [
                                'date' => Carbon::now(),
                                'price' => $part->unit_cost,
                                'description' => $part->description,
                                'supplier' => $part->supplier_id,
                            ];

                            array_push($history, $item);
                            
                        } else {
                            $history = [[
                                'date' => Carbon::now(),
                                'price' => $part->unit_cost,
                                'description' => $part->description,
                                'supplier' => $part->supplier_id,
                            ]];
                        }

                        $p->update([
                            'qty' => $calc,
                            'history' => json_encode($history),
                            'costing_method' => 1,
                            'last_cost' => $part->unit_cost,
                        ]);

                        break;
                    } else {
                        array_push($array, 0);
                    }
                }

                $arrayCount = count($array);

                if($arrayCount == $partsCount) {

                    $history = [[
                        'date' => Carbon::now(),
                        'price' => $part->unit_cost,
                        'description' => $part->description,
                        'supplier' => $part->supplier_id,
                    ]];

                    Part::create([
                        'code' => $part->code,
                        'bar_code' => $part->bar_code,
                        'category' => $part->category,
                        'type' => $part->type,
                        'location' => $part->location,
                        'on_hand' => $part->on_hand,
                        'price' => $part->prices, // this is where you probably will have to increase by some number
                        'supplier_id' => $part->supplier_id,
                        'qty' => $part->order_qty,
                        'model' => $part->model,
                        'make' => $part->make,
                        'style' => $part->style,
                        'pictures' => $part->pictures,
                        'invoices' => $part->invoices,
                        'warranty_time' => $part->warranty_time,
                        'warranty_interval' => $part->warranty_interval,
                        'prices' => $part->prices,
                        'discount' => $part->discount,
                        'description' => $part->description,
                        'garage_location' => $part->garage_location,
                        'status' => null,
                        'history' => json_encode($history),
                        'product_no' => $part->product_no,
                        'order_qty' => $part->order_qty,
                        'unit_cost' => $part->unit_cost,
                        'cost' => $part->cost,
                        'qty_rec' => $part->qty_rec,
                        'qty_rec_today' => $part->qty_rec_today,
                        'unit_cost_today' => $part->unit_cost_today,
                        'date_rec' => $part->date_rec,
                        'qty_return' => $part->qty_return,
                        'instructions' => $part->instructions,
                        'charge_base' => 0,
                        'costing_method' => 1,
                        'last_cost' => $part->unit_cost,
                    ]);
                }
                
                return redirect('/work/parts/edit/'.$part->order_id)->with('success', 'You have successfully updated part information. However, since the status was changed to received the part can not be edited anymore. Part(-s) were automatically added to garage, either to existing ones or created new rows. Further editions of that specific part can be completed there.');

            } else {
                return redirect('/work/parts/edit/'.$part->order_id)->with('success', 'You have successfully updated part information.');
            }


        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();

        if($user->hasAnyPermission(['parts.garage.delete', 'everything'])) {
            
            $part = Part::find($id);

            if($part->pictures != null) {
                $pics = json_decode($part->pictures);
                foreach($pics as $pic) {
                    unlink($this->filesPath . $id . '/' . $pic);
                }
            }

            $part->delete();

            return redirect('/work/parts/garage')->with('success', 'You have successfully deleted part.');

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function delete_picture(Request $request, $id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['parts.garage.delete', 'everything'])) {

            $part = Part::find($id);

            $pics = json_decode($part->pictures);

            foreach($pics as $pic) {
                if($pic == $request->picture) {
                    unlink($this->filesPath . $part->id . "/" . $pic);
                    break;
                }
            }

            $key = array_search($request->picture, $pics);
            unset($pics[$key]);

            if(count($pics) == 0) {
                $part->update([
                    'pictures' => null,
                ]);
            } else {
                $part->update([
                    'pictures' => json_encode($pics)
                ]);
            }

            return redirect('/work/parts/edit/'. $part->id)->with('success', 'You have successfully deleted picture.');

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function pre_delete_part($id) {
        
        $user = Auth::user();

        if($user->hasAnyPermission(['parts.garage.delete', 'everything'])) {

            $p = Part::find($id);
            $supplier = Supplier::find($p->supplier_id);
            return view('parts.garage_pre_delete', compact('p', 'supplier'));

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function pre_delete_order($id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['parts.delete', 'everything'])) {

            $part = Part_Order::where('order_id', '=', $id)->first();
            $supplier = Supplier::find($part->supplier_id);
            $parts = Part_Order::where('order_id', '=', $id)->get();
            return view('parts.pre_delete', compact('part', 'supplier', 'parts'));
        
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function delete_order($id, Request $request) {

        $user = Auth::user();

        if($user->hasAnyPermission(['parts.delete', 'everything'])) {

            $part = Part_Order::where('order_id', '=', $id)->first();
            $supplier = Supplier::find($part->supplier_id);
            $parts = Part_Order::where([['order_id', '=', $id], ['status', '!=', '2']])->get();

            $count = count($parts);
            $codeArr = []; $descArr = []; $qtyArr = [];
            $barCodeArr = []; $categoryArr = []; $typeArr = [];
            $modelArr = []; $makeArr = []; $styleArr = [];

            for($i = 0; $i < $count; $i++) {

                if($parts[$i]->code) { array_push($codeArr, $parts[$i]->code); } else { array_push($codeArr, null); }
                if($parts[$i]->description) { array_push($descArr, $parts[$i]->description); } else { array_push($descArr, null); }
                if($parts[$i]->order_qty) { array_push($qtyArr, $parts[$i]->order_qty); } else { array_push($qtyArr, null); }
                if($parts[$i]->bar_code) { array_push($barCodeArr, $parts[$i]->bar_code); } else { array_push($barCodeArr, null); }
                if($parts[$i]->category) { array_push($categoryArr, $parts[$i]->category); } else { array_push($categoryArr, null); }
                if($parts[$i]->type) { array_push($typeArr, $parts[$i]->type); } else { array_push($typeArr, null); }
                if($parts[$i]->make) { array_push($makeArr, $parts[$i]->make); } else { array_push($makeArr, null); }
                if($parts[$i]->model) { array_push($modelArr, $parts[$i]->model); } else { array_push($modelArr, null); }
                if($parts[$i]->style) { array_push($styleArr, $parts[$i]->style); } else { array_push($styleArr, null); }

            }

            $email = $supplier->supplier_email;

            $cancelMail = Email_Settings::find(2);

            $data = [
                'title' => $cancelMail->title,
                'paragraph' => $cancelMail->paragraph,
                'footer' => $cancelMail->footer,
                'order_id' => $part->order_id,
                'code' => $codeArr,
                'bar_code' => $barCodeArr,
                'description' => $descArr,
                'category' => $categoryArr,
                'type' => $typeArr,
                'model' => $modelArr,
                'make' => $makeArr,
                'style' => $styleArr,
                'quantity' => $qtyArr,
            ];

            // var_dump($request);

            if($request->email_send == "yes") {
                Mail::to($email)->send(new CancelOrderParts($data));
            }

            for($i = 0; $i < $count; $i++) {
                $parts[$i]->delete();
            }

            if($request->email_send == "yes") {
                return redirect('/work/parts')->with('success', 'Successfully deleted order and informed supplier about cancelation.');
            } else {
                return redirect('/work/parts')->with('success', 'Successfully deleted order.');
            }
        
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        }

    }

    public function get_emails(Request $request) {

        $data = $request->all();

        $supplier = Supplier::find($data['supplier']);

        return json_encode($supplier);

    }

    public function get_products(Request $request) {

        $data = $request->all();

        if($data['product']) {

            // search by word
            $products = Part::where([['description', 'LIKE', $data['product'].'%'], ['supplier_id', '=', $data['supplier']]])->get();
            return json_encode($products);

        }

    }

    public function get_existing_part(Request $request) {

        $data = $request->all();

        if($data['id']) {
            $product = Part::find($data['id']);
            return json_encode($product);
        }

    }

}
