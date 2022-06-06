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
use App\Models\Order;
use App\Models\Customer;
use App\Models\Vehicle;
use App\Mail\OrderParts;
use App\Mail\CancelOrderParts;
use App\Mail\WorkOrderStart;
use App\Mail\WorkOrderFinish;
use App\Models\Part_Order;
use App\Models\Email_Settings;
use App\Models\Billing_Settings;
use Illuminate\Support\Str;
use Mail;
use PDF;
use DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $filesPath = '/home/u874210567/domains/labairimtaimone.lt/public_html/garage/temporary/orders/comments/';
    public $invoicesPath = '/home/u874210567/domains/labairimtaimone.lt/public_html/garage/temporary/invoices/';

    public function index()
    {

        $user = Auth::user();

        if($user->hasAnyPermission(['orders.access', 'everything'])) {
            $orders = Order::all();
            $vehicles = Vehicle::all();
            return view('orders.index', compact('orders', 'user', 'vehicles'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create_new_customer($id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['customers.create', 'everything'])) {

            $order = Order::find($id);
            return view('orders.create_customer', compact('order'));

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function confirm_customer_creation(Request $request, $id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['customers.create', 'everything'])) {

            $validated = $request->validate([
                'company' => 'required',
                'name' => 'required',
                'city' => 'required',
                'address' => 'required',
                'postal_code' => 'required',
                'state' => 'required',
                'email' => 'required_without:telephone',
                'customer_type' => 'required',
            ]);

            $order = Order::find($id);
            $customer = Customer::create($request->all());

            $order->update([
                'customer_id' => $customer->id
            ]);

            return redirect('/work/orders/create/'.$order->id.'/step-one')->with('success', 'Successfully created new customer and added to the list. Please continue filling order.');

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function create()
    {
        $user = Auth::user();

        if($user->hasAnyPermission(['orders.create', 'everything'])) {

            $customers = Customer::all();
            $order = Order::create([
                'order_fill_status' => 0
            ]);

            return redirect('/work/orders/create/'.$order->id.'/step-one')->send();
            // return view('orders.create', compact('customers', 'order', 'vehicle', 'mechanics'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }
    }

    public function create_step_one($id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['orders.create', 'everything'])) {
            $customers = Customer::all();
            $mechanics = User::all();
            $order = Order::find($id);
            $parts = Part::all();

            if($order->vehicle_id) {
                $vehicle = Vehicle::find($order->vehicle_id);
            } else {
                $vehicle = 0;
            }

            return view('orders.create', compact('customers', 'order', 'user', 'mechanics', 'vehicle', 'parts'));
        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function create_step_two($id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['orders.create', 'everything'])) {
            $customers = Customer::all();
            $mechanics = User::all();
            $order = Order::find($id);
            $parts = Part::all();
            $order->update([
                'order_fill_status' => 2
            ]);
            if($order->vehicle_id) {
                $vehicle = Vehicle::find($order->vehicle_id);
            } else {
                $vehicle = 0;
            }
            return view('orders.create', compact('customers', 'order', 'user', 'mechanics', 'vehicle', 'parts'));
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
        //
    }

    public function store_step_one(Request $request, $id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['orders.create', 'everything'])) {

            $customers = Customer::all();
            $order = Order::find($id);

            $order->update([
                'customer_id' => $request->customer_id,
            ]);

            if($eVehicle = Vehicle::where('vin_code', '=', $request->vin_code)->first()){
                
                $order->update([
                    'vehicle_id' => $eVehicle->id,
                ]);

                if($eVehicle->odometer_before) {
                    $odometer = json_decode($eVehicle->odometer_before);
                } else {
                    $odometer = [];
                }

                array_push($odometer, $request->odometer_now);

                $eVehicle->update([
                    'odometer_before' => json_encode($odometer),
                    'odometer_now' => $request->odometer_now
                ]);

            } else {

                $vehicle = Vehicle::create($request->all());

                $order->update([
                    'vehicle_id' => $vehicle->id,
                ]);

                if($vehicle->odometer_before) {
                    $odometer = json_decode($vehicle->odometer_before);
                } else {
                    $odometer = [];
                }

                array_push($odometer, $request->odometer_now);

                $vehicle->update([
                    'odometer_before' => json_encode($odometer),
                    'odometer_now' => $request->odometer_now
                ]);

            }

            $array = [];

            $rCount = 0;

            foreach($request->to_be_done as $tbd) {

                $item = [
                    'value' => $tbd,
                    'status' => false,
                    'mechanic' => 'none'
                ];

                array_push($array, $item);
                $rCount++;

            }

            // var_dump(json_encode($array));

            $order->update([
                'to_be_done' => json_encode($array)
            ]);

            if($request->comments) {

                $comments = [];

                if($request->file('pictures')) {

                    $pics = [];

                    foreach($request->file('pictures') as $pic) {

                        $picName = time().'-'.$pic->getClientOriginalName();

                        array_push($pics, $picName);

                        if(!file_exists($this->filesPath . $id)) {
                            mkdir($this->filesPath . $id, 0777);
                        }
        
                        $pic->move($this->filesPath . $id ,$picName);

                    }
                } else {
                    $pics = null;
                }

                $item = [
                    'owner' => $user->name . " " . $user->last_name,
                    'comment' => $request->comments,
                    'pictures' => $pics,
                    'date' => Carbon::now('America/Los_Angeles')->format('Y-m-d H:i')
                ];

                array_push($comments, $item);

                $order->update([
                    'comments' => $comments
                ]);

            }

            $customer = Customer::find($order->customer_id);

            $email = $customer->email;

            $startMail = Email_Settings::find(5);
            $vehicle = Vehicle::find($order->vehicle_id);

            $data = [
                'title' => $startMail->title,
                'paragraph' => $startMail->paragraph,
                'footer' => $startMail->footer,
                'vehicle_vin' => $vehicle->vin_code,
                'vehicle_model' => $vehicle->model,
                'vehicle_make' => $vehicle->make,
            ];

            if($request->email_send == "yes") {
                Mail::to($email)->send(new WorkOrderStart($data));
            }

            $order->update([
                // 'mechanic_id' => $request->mechanic_id,
                'priority' => $request->priority,
                'budget' => $request->budget,
                'order_fill_status' => 1
                // 'comments' => $comments
            ]);

            return redirect('/work/orders')->with('success', 'You have successfully created work order.');

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function store_step_two(Request $request, $id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['orders.create', 'everything'])) {

            $customers = Customer::all();
            $order = Order::find($id);

            return redirect('/work/orders/create/'.$order->id.'/step-three');

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
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

        if($user->hasAnyPermission(['orders.view', 'everything'])) {

            $order = Order::find($id);
            if($order->customer_id) {
                $customer = Customer::find($order->customer_id);
            } else { $customer = null; }

            if($order->vehicle_id) {
                $vehicle = Vehicle::find($order->vehicle_id);
            } else { $vehicle = null; }

            // if($order->mechanic_id) {
            //     $mechanic = User::find($order->mechanic_id);
            // } else { $mechanic = null; }

            $mechanics = User::all();

            return view('orders.view', compact('user', 'order', 'customer', 'vehicle', 'mechanics'));

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }
    }

    // public function order_finish($id)
    // {
    //     $user = Auth::user();

    //     if($user->hasAnyPermission(['orders.finish', 'everything'])) {

    //         $order = Order::find($id);
    //         $customer = Customer::find($order->customer_id);
    //         $vehicle = Vehicle::find($order->vehicle_id);

    //         $mechanics = User::all();

    //         $toDoList = json_decode($order->to_be_done);

    //         if($toDoList) {
    //             foreach($toDoList as $tdl) {
    //                 if($tdl->status == false) {
    //                     return redirect()->back()->with('error', 'All order tasks must be done if you want to finish order.');
    //                 }
    //             }
    //         } else {
    //             return redirect()->back()->with('error', 'There are no tasks created, nothing to finish.');
    //         }

    //         if($order->parts_ids) {

    //             $partIds = json_decode($order->parts_ids);
    //             $parts = [];

    //             foreach($partIds as $p) {
    //                 $part = Part::find($p);
    //                 if($part->qty == null || $part->qty <= 0) {
    //                     return redirect()->back()->with('error', 'You do not own enough parts to finish the order, please check in edit page.');
    //                 }
    //                 array_push($parts, $part);
    //             }

    //         }

    //         return view('orders.finish', compact('user', 'order', 'customer', 'parts', 'vehicle', 'mechanics'));

    //     } else {
    //         return redirect()->back()->with('error', 'You do not have permission to access this page.');
    //     }
    // }

    public function finish(Request $request, $id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['orders.finish', 'everything'])) {

            $order = Order::find($id);
            $customer = Customer::find($order->customer_id);
            $vehicle = Vehicle::find($order->vehicle_id);

            $email = $customer->email;

            $startMail = Email_Settings::find(5);

            $data = [
                'title' => $startMail->title,
                'paragraph' => $startMail->paragraph,
                'footer' => $startMail->footer,
                'vehicle_vin' => $vehicle->vin_code,
                'vehicle_model' => $vehicle->model,
                'vehicle_make' => $vehicle->make,
            ];

            if($request->email_send == "yes") {
                Mail::to($email)->send(new WorkOrderFinish($data));
            }

            $order->update([
                'order_fill_status' => 2
            ]);

            return view('orders.set_price', compact('order', 'customer', 'vehicle', 'user'));

            // return redirect('/work/pdf/order/'.$id)->with('success', 'You have successfully confirmed the order.');

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
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

        $order = Order::find($id);

        if($order->order_fill_status == 2) {
            return redirect('/work/orders/finish/'.$order->id);
        } else if($order->order_fill_status == 3) {
            return redirect('/work/pdf/'.$order->id.'/order/');
        } else {

            if($user->hasAnyPermission(['orders.edit', 'everything'])) {

                $customers = Customer::all();
                $vehicle = Vehicle::find($order->vehicle_id);
                $mechanics = User::all();
                $parts = Part::all();

                return view('orders.edit', compact('user', 'order', 'customers', 'vehicle', 'parts', 'mechanics'));

            } else {
                return redirect()->back()->with('error', 'You do not have permission to access this page.');
            }

        }

    }

    public function pdf_select_edit($id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['orders.finish', 'everything'])) {

            $order = Order::find($id);
            $customer = Customer::find($order->customer_id);

            return view('orders.pdf_select', compact('user', 'order', 'customer'));

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function pdf_select(Request $request, $id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['orders.finish', 'everything'])) {

            $order = Order::find($id);
            $customer = Customer::find($order->customer_id);
            $vehicle = Vehicle::find($order->vehicle_id);

            if($request->action == 'complete') {

                $invoiceParts = [];
                $invoiceJobs = [];

                $jobsCount = count($request->jobMechanicId);
                $partsCount = count($request->partId);

                if($vehicle->odometer_now) {
                    
                    $order->update([
                        'order_end_odometer' => $vehicle->odometer_now
                    ]);

                }

                for($i = 0; $i < $jobsCount; $i++) {

                    $hourCost = $request->jobCost[$i] / $request->jobHours[$i];

                    $item = [
                        'mechanic' => $request->jobMechanicId[$i],
                        'job' => $request->jobitself[$i],
                        'job_hours' => $request->jobHours[$i],
                        'discount' => $request->jobDiscount[$i],
                        'discount_cost' => $request->jobDiscountReducedPrice[$i],
                        'taxes' => $request->jobTax[$i],
                        'total_cost' => $request->jobCost[$i],
                        'hour_cost' => round($hourCost, 2),
                        'tax_cost' => $request->jobTaxCost[$i],
                        'human_who_clicked_save' => Auth::user()->name . " " . Auth::user()->last_name,
                        'date_saved' => Carbon::now('America/Los_Angeles')->format('Y-m-d H:i')
                    ];

                    array_push($invoiceJobs, $item);

                }

                for($i = 0; $i < $partsCount; $i++) {

                    $part = Part::find($request->partId[$i]);

                    $item = [
                        'part_title' => $part->description,
                        'quantity' => $request->partQuantity[$i],
                        'unit_cost' => $request->partUnitCost[$i],
                        'discount' => $request->partDiscount[$i],
                        'discount_cost' => $request->partDiscountReducedPrice[$i],
                        'taxes' => $request->partTax[$i],
                        'total_cost' => $request->partTotal[$i],
                        'tax_cost' => $request->partTaxCost[$i],
                        'human_who_clicked_save' => Auth::user()->name . " " . Auth::user()->last_name,
                        'date_saved' => Carbon::now('America/Los_Angeles')->format('Y-m-d H:i')
                    ];

                    array_push($invoiceParts, $item);

                }

                $order->update([
                    'invoice_data_parts' => json_encode($invoiceParts),
                    'invoice_data_jobs' => json_encode($invoiceJobs),
                    'order_fill_status' => 3,
                    'order_end_odometer' => $vehicle->odometer_now
                ]);

                if($order->comments != null) {
                    $comments = json_decode($order->comments);
                } else {
                    $comments = [];
                }

                if($request->comments) {

                    if($request->file('pictures')) {

                        $pics = [];

                        foreach($request->file('pictures') as $pic) {

                            $picName = time().'-'.$pic->getClientOriginalName();

                            array_push($pics, $picName);

                            if(!file_exists($this->filesPath . $id)) {
                                mkdir($this->filesPath . $id, 0777);
                            }
            
                            $pic->move($this->filesPath . $id ,$picName);

                        }
                    } else {
                        $pics = null;
                    }

                    $item = [
                        'owner' => $user->name . " " . $user->last_name,
                        'comment' => $request->comments,
                        'pictures' => $pics,
                        'date' => Carbon::now('America/Los_Angeles')->format('Y-m-d H:i')
                    ];

                    array_push($comments, $item);

                    $order->update([
                        'comments' => json_encode($comments)
                    ]);

                }

                return view('orders.pdf_select', compact('user', 'order', 'customer'));

            } else {

                $order->update([
                    'order_fill_status' => 1
                ]);

                return redirect('/work/orders/edit/'.$order->id);

            }

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function pdf_complete(Request $request, $id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['orders.finish', 'everything'])) {

            $order = Order::find($id);
            $customer = Customer::find($order->customer_id);
            $parts = json_decode($order->invoice_data_parts);

            $actions = json_decode($order->invoice_data_jobs);

            $getDate = Carbon::now('America/Los_Angeles')->format('Y-m-d H:i');

            $data = [
                'title' => 'First PDF for Coding Driver',
                'type' => 'Invoice',
                'date' => $getDate,
                'ownerBusinessName' => 'UAB Garazh',
                'ownerBusinessAddress' => 'Kalabybyskiu 17',
                'ownerTaxID' => 'Number One',
                'ownerBankInformation' => 'LT17706040253594582',
                'ownerBankName' => 'Bank of Kusys',
                'customerBusinessName' => $customer->company,
                'customerBusinessAddress' => $customer->address. ', ' . $customer->postal_code,
                'customerBusinessCity' => $customer->city,
                'customerTaxID' => $customer->tax_id,
                // 'customerBankInformation' => $customer->,
                'content' => 'regarding nothing.',
                'parts' => $parts,
                'actions' => $actions,
            ];
            

            if(!file_exists($this->invoicesPath . $id)) {
                mkdir($this->invoicesPath . $id, 0777);
            }

            $pdf = PDF::loadView('generate_pdf', $data);
            $generateRandomTitle = Str::random(20);
            $pdfName = $generateRandomTitle . '.pdf';
            $pdf->save($this->invoicesPath . $id . '/' . $pdfName);

            $invoice = Invoice::create([
                'invoice_url' => 'https://garage.labairimtaimone.lt/temporary/invoices/'.$id.'/'.$pdfName,
                'model_type' => 'App\Models\Order',
                'model_id' => $id,
            ]);

            $order->update([
                'order_fill_status' => 6
            ]);

            return view('orders.pdf_complete', compact('user', 'order', 'customer', 'invoice'));

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

    public function remove_part(Request $request, $id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['orders.edit', 'everything'])) {

            $order = Order::find($id);
            $row = $request->remove_part_row;

            $array = json_decode($order->used_parts);

            unset($array[$row]);

            $order->update([
                'used_parts' => json_encode($array)
            ]);

            return redirect()->back()->with('success', 'You have successfully removed part.');

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        }

    }

    public function remove_job(Request $request, $id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['orders.edit', 'everything'])) {

            $order = Order::find($id);
            $row = $request->remove_job_row;

            $array = json_decode($order->done_jobs);

            unset($array[$row]);

            $order->update([
                'done_jobs' => json_encode($array)
            ]);

            return redirect()->back()->with('success', 'You have successfully removed a job.');

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        }

    }

    public function add_job(Request $request, $id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['orders.edit', 'everything'])) {

            $order = Order::find($id);
            $customer = Customer::find($order->customer_id);

            if($order->done_jobs) {

                $array = json_decode($order->done_jobs);

                $placeholder = 0;

                if($customer->default_calculation == "yes") {
                    $billingSettings = Billing_Settings::find(1);
                    $rateForLabor = $billingSettings->work_hourly_cost;
                    $placeholder = $request->hours_worked * $rateForLabor;
                } else {


                    $calcPrice = $request->hours_worked * $customer->task_labor_rate;

                    if($customer->shop_charge_percentage) {

                        if($customer->base_shop_charge == 2) {

                            $addPriceCalculated = $customer->shop_charge_percentage / 100 * $customer->task_labor_rate;
                            $placeholder = $calcPrice + $addPriceCalculated;

                        }

                    }

                }

                $item = [
                    'date' => Carbon::now('America/Los_Angeles')->format('Y-m-d H:i'),
                    'job' => $request->job_desc,
                    'mechanic' => $request->mechanic,
                    'hours_worked' => $request->hours_worked,
                    'cost' => round($placeholder, 2)
                ];

                array_push($array, $item);

                $order->update([
                    'done_jobs' => json_encode($array)
                ]);

                return redirect('/work/orders/edit/'.$order->id)->with('success', 'Successfully added a new job!');

            } else {

                $array = [];

                $placeholder = 0;

                if($customer->default_calculation == "yes") {
                    $billingSettings = Billing_Settings::find(1);
                    $rateForLabor = $billingSettings->work_hourly_cost;
                    $placeholder = $request->hours_worked * $rateForLabor;
                } else {
                    $placeholder = $request->hours_worked * $customer->task_labor_rate;
                }

                $item = [
                    'date' => Carbon::now('America/Los_Angeles')->format('Y-m-d H:i'),
                    'job' => $request->job_desc,
                    'mechanic' => $request->mechanic,
                    'hours_worked' => $request->hours_worked,
                    'cost' => round($placeholder, 2)
                ];

                array_push($array, $item);

                $order->update([
                    'done_jobs' => json_encode($array)
                ]);

                return redirect('/work/orders/edit/'.$order->id)->with('success', 'Successfully added a new job!');

            }

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        }

    }

    public function add_part(Request $request, $id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['orders.edit', 'everything'])) {

            $order = Order::find($id);
            $customer = Customer::find($order->customer_id);

            if($order->used_parts) {

                $array = json_decode($order->used_parts);

                $placeholder = 0;

                if($customer->part_charge_base == 0) {

                    $billingSettings = Billing_Settings::find(1);
                    $thePart = Part::find($request->part_id);

                    $calcPrice = $thePart->last_cost;

                    if($thePart->charge_base == 0) {
                        $addPriceCalculated = $billingSettings->part_percentage / 100 * $thePart->last_cost;
                        $placeholder = $calcPrice + $addPriceCalculated;
                    } else if ($thePart->charge_base == 1) {
                        $placeholder = $thePart->last_cost;
                    } else if ($thePart->charge_base == 2) {
                        $addPriceCalculated = $thePart->charge_base_cost / 100 * $thePart->last_cost;
                        $placeholder = $calcPrice + $addPriceCalculated;
                    } else if ($thePart->charge_base == 4) {
                        $placeholder = $thePart->charge_base_price_a;
                    } else if ($thePart->charge_base == 5) {
                        $placeholder = $thePart->charge_base_price_b;
                    } else if ($thePart->charge_base == 6) {
                        $placeholder = $thePart->charge_base_price_c;
                    } else if ($thePart->charge_base == 7) {
                        $placeholder = $thePart->charge_base_price_d;
                    } else if ($thePart->charge_base == 8) {
                        $placeholder = $thePart->charge_base_price_e;
                    }

                    // if($customer->shop_charge_percentage) {

                    //     if($customer->base_shop_charge == 3) {

                    //         $addCustomerSetPercentage = $customer->shop_charge_percentage / 100 * $placeholder;
                    //         $placeholder = $placeholder + $addCustomerSetPercentage;

                    //     }

                    // }
                    
                } else if($customer->part_charge_base == 1) {

                    $billingSettings = Billing_Settings::find(1);
                    $thePart = Part::find($request->part_id);

                    $placeholder = $thePart->last_cost;

                    if($customer->shop_charge_percentage) {

                        if($customer->base_shop_charge == 3) {

                            $addCustomerSetPercentage = $customer->shop_charge_percentage / 100 * $placeholder;
                            $placeholder = $placeholder + $addCustomerSetPercentage;

                        }

                    }

                } else if ($customer->part_charge_base == 2) {

                    $billingSettings = Billing_Settings::find(1);
                    $thePart = Part::find($request->part_id);

                    $calcPrice = $thePart->last_cost;

                    $addPriceCalculated = $customer->part_cost_percentage / 100 * $thePart->last_cost;
                    $placeholder = $calcPrice + $addPriceCalculated;

                    if($customer->shop_charge_percentage) {

                        if($customer->base_shop_charge == 3) {

                            $addCustomerSetPercentage = $customer->shop_charge_percentage / 100 * $placeholder;
                            $placeholder = $placeholder + $addCustomerSetPercentage;

                        }

                    }

                }

                $item = [
                    'date' => Carbon::now('America/Los_Angeles')->format('Y-m-d H:i'),
                    'part' => $request->part_id,
                    'quantity' => $request->part_quantity,
                    'cost' => round($placeholder, 2)
                ];

                array_push($array, $item);

                $order->update([
                    'used_parts' => json_encode($array)
                ]);

                return redirect('/work/orders/edit/'.$order->id)->with('success', 'Successfully added part!');

            } else {

                $array = [];

                $placeholder = 0;

                if($customer->part_charge_base == 0) {

                    $billingSettings = Billing_Settings::find(1);
                    $thePart = Part::find($request->part_id);

                    $calcPrice = $thePart->last_cost;

                    if($thePart->charge_base == 0) {
                        $addPriceCalculated = $billingSettings->part_percentage / 100 * $thePart->last_cost;
                        $placeholder = $calcPrice + $addPriceCalculated;
                    } else if ($thePart->charge_base == 1) {
                        $placeholder = $thePart->last_cost;
                    } else if ($thePart->charge_base == 2) {
                        $addPriceCalculated = $thePart->charge_base_cost / 100 * $thePart->last_cost;
                        $placeholder = $calcPrice + $addPriceCalculated;
                    } else if ($thePart->charge_base == 4) {
                        $placeholder = $thePart->charge_base_price_a;
                    } else if ($thePart->charge_base == 5) {
                        $placeholder = $thePart->charge_base_price_b;
                    } else if ($thePart->charge_base == 6) {
                        $placeholder = $thePart->charge_base_price_c;
                    } else if ($thePart->charge_base == 7) {
                        $placeholder = $thePart->charge_base_price_d;
                    } else if ($thePart->charge_base == 8) {
                        $placeholder = $thePart->charge_base_price_e;
                    }

                    if($customer->shop_charge_percentage) {

                        if($customer->base_shop_charge == 3) {

                            $addCustomerSetPercentage = $customer->shop_charge_percentage / 100 * $placeholder;
                            $placeholder = $placeholder + $addCustomerSetPercentage;

                        }

                    }
                    
                } else if($customer->part_charge_base == 1) {

                    $billingSettings = Billing_Settings::find(1);
                    $thePart = Part::find($request->part_id);

                    $placeholder = $thePart->last_cost;

                    if($customer->shop_charge_percentage) {

                        if($customer->base_shop_charge == 3) {

                            $addCustomerSetPercentage = $customer->shop_charge_percentage / 100 * $placeholder;
                            $placeholder = $placeholder + $addCustomerSetPercentage;

                        }

                    }

                } else if ($customer->part_charge_base == 2) {

                    $billingSettings = Billing_Settings::find(1);
                    $thePart = Part::find($request->part_id);

                    $calcPrice = $thePart->last_cost;

                    $addPriceCalculated = $customer->part_cost_percentage / 100 * $thePart->last_cost;
                    $placeholder = $calcPrice + $addPriceCalculated;

                    if($customer->shop_charge_percentage) {

                        if($customer->base_shop_charge == 3) {

                            $addCustomerSetPercentage = $customer->shop_charge_percentage / 100 * $placeholder;
                            $placeholder = $placeholder + $addCustomerSetPercentage;

                        }

                    }

                }

                $item = [
                    'date' => Carbon::now('America/Los_Angeles')->format('Y-m-d H:i'),
                    'part' => $request->part_id,
                    'quantity' => $request->part_quantity,
                    'cost' => round($placeholder, 2)
                ];

                array_push($array, $item);

                $order->update([
                    'used_parts' => json_encode($array)
                ]);

                return redirect('/work/orders/edit/'.$order->id)->with('success', 'Successfully added part!');

            }

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        }

    }

    public function update(Request $request, $id)
    {

        $user = Auth::user();

        if($user->hasAnyPermission(['orders.edit', 'everything'])) {

            if($request->action == 'update_status') {

                $order = Order::find($id);

                $order->update([
                    'order_fill_status' => $request->order_fill_status
                ]);

                return redirect('/work/orders/')->with('success', 'Successfully updated order status!');

            }

            if($request->action == 'save') {

                $order = Order::find($id);

                $arrayTbd = json_decode($order->to_be_done, true);

                foreach($arrayTbd as $key => $item) {

                    $arrayTbd[$key]['status'] = $request->to_be_done_status[$key] == 'true' ? true : false;

                }

                $order->update([
                    'to_be_done' => json_encode($arrayTbd)
                ]);

                if($order->comments != null) {
                    $comments = json_decode($order->comments);
                } else {
                    $comments = [];
                }

                if($request->comments) {

                    if($request->file('pictures')) {

                        $pics = [];

                        foreach($request->file('pictures') as $pic) {

                            $picName = time().'-'.$pic->getClientOriginalName();

                            array_push($pics, $picName);

                            if(!file_exists($this->filesPath . $id)) {
                                mkdir($this->filesPath . $id, 0777);
                            }
            
                            $pic->move($this->filesPath . $id ,$picName);

                        }
                    } else {
                        $pics = null;
                    }

                    $item = [
                        'owner' => $user->name . " " . $user->last_name,
                        'comment' => $request->comments,
                        'pictures' => $pics,
                        'date' => Carbon::now('America/Los_Angeles')->format('Y-m-d H:i')
                    ];

                    array_push($comments, $item);

                    $order->update([
                        'comments' => json_encode($comments)
                    ]);

                }

                $order->update([
                    'customer_id' => $request->customer_id,
                    // 'mechanic_id' => $request->mechanic_id,
                    // 'parts_ids' => json_encode($partsArr),
                    'priority' => $request->priority,
                    'budget' => $request->budget,
                    // 'to_be_done' => $request->to_be_done,
                    // 'comments' => $request->comments
                ]);

                // $vehicle = Vehicle::find($order->vehicle_id);
                // $vehicle->update([
                //     'make' => $request->make,
                //     'type' => $request->type,
                //     'model' => $request->model,
                //     'vin_code' => $request->vin_code,
                //     'engine' => $request->engine,
                //     'gas_type' => $request->gas_type,
                //     'color' => $request->color,
                //     'year' => $request->year,
                //     'odometer_now' => $request->odometer_now,
                //     'company_vehicle_number' => $request->company_vehicle_number,
                //     'number_plate' => $request->number_plate,
                //     'engine_number' => $request->engine_number
                // ]);

                return redirect('/work/orders/edit/'.$order->id)->with('success', 'Successfully updated order information!');

            } else {

                $order = Order::find($id);
                $vehicle = Vehicle::find($order->vehicle_id);

                $validTasks = json_decode($order->to_be_done);

                foreach($validTasks as $task) {
                    if($task->status == false) {
                        return redirect()->back()->with('error', 'Please confirm that all tasks have been completed. Set their status to YES and click save order.');
                    }
                }

                if($vehicle->odometer_before) {
                    $odometer = json_decode($vehicle->odometer_before);
                } else {
                    $odometer = [];
                }

                array_push($odometer, $request->odometer_now);

                $vehicle->update([
                    'odometer_before' => json_encode($odometer),
                    'odometer_now' => $request->odometer_now
                ]);

                $order->update([
                    'order_fill_status' => 2
                ]);

                return redirect('/work/orders/finish/'.$order->id)->with('Order confirmed, please adjust prices if needed.')->send();

            }


        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user = Auth::user();

        if($user->hasAnyPermission(['orders.delete', 'everything'])) {

            $order = Order::find($id);
            $order->delete();

            return redirect('/work/orders/')->with('success', 'Successfully deleted order!');

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this function.');
        }

    }

    public function pre_delete($id) {

        $user = Auth::user();

        if($user->hasAnyPermission(['orders.delete', 'everything'])) {

            $order = Order::find($id);
            $customer = Customer::find($order->customer_id);
            $vehicle = Vehicle::find($order->vehicle_id);
            $mechanic = User::find($order->mechanic_id);

            return view('orders.pre-delete', compact('user', 'order', 'customer', 'vehicle', 'mechanic'));

        } else {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

    }

    public function delete_comment(Request $request) {

        $data = $request->all();

        $order = Order::find($data['id']);
        $comments = json_decode($order->comments);

        $removeableComment = $data['comment_id'];

        unset($comments[$removeableComment]);

        $order->update([
            'comments' => json_encode($comments)
        ]);

        return true;

    }

    public function get_similar_vehicle(Request $request) {

        $data = $request->all();

        if($data['vinCode']) {
            $vehicles = Vehicle::where([['vin_code', 'LIKE','%' . $data['vinCode'] . '%'], ['type', '=', $data['type']]])->get();
            return json_encode($vehicles);
        }

    }

    public function add_this_vehicle(Request $request) {

        $data = $request->all();

        if($data['id']) {
            $vehicle = Vehicle::find($data['id']);
            return json_encode($vehicle);
        }

    }

}
