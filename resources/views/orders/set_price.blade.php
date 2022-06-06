@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Work Related <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/orders') }}" class="breadcrumb-style">Orders</a> 
        <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/orders/finish/'.$order->id) }}" class="breadcrumb-style">Finish order #{{ $order->id }}</a>
    </div>
@endsection

@section('content-d')

    <div style="margin-top: 20px;"></div>

    {{-- <div class="row pl-13 col-md-12 content-row">
        <button id="user_create" class="mb-4 btn btn-primary"><i class="fas fa-plus-square"></i> Add new entry</button>
    </div> --}}

    <div class="row pl-13 col-12 content-row">
        @if(Session::has('success'))
            <div class="alert alert-info text-center">{{ Session::get('success') }}</div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
        @endif
    </div>

    <div class="row">
        {{-- pl-13 pr-27 content-row  --}}
        <div class="col-md-12 pl-13 pr-27 content-row">

            <div class="card card-custom">
                <div class="card-header card-header-custom">
                    Finish order # {{ $order->id }}
                </div>
        
                <div class="card-body" style="">
                    <div class="row">

                        <div class="pre-form-texts">Order information</div>

                        <form action="{{ url('/work/pdf/order/'.$order->id) }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="col-md-12 form-group mt-3">
                            <label for="">Customer</label>
                            <div class="mt-2"></div>
                            <select class="permissions-select form-control" name="customer_id">
                                {{-- @foreach($customers as $customer) --}}
                                    <option value="{{ $customer->id }}" @if($order->customer_id == $customer->id) selected @endif>{{ $customer->name }}</option>
                                {{-- @endforeach --}}
                            </select>
                        </div>

                        {{-- <div class="row">
                            <div class="col-md-12 form-group mt-3">
                                <label for="">Mechanic</label>
                                <div class="mt-2"></div>
                                <select class="permissions-select form-control" name="mechanic_id">
                                    @foreach($mechanics as $mechanic)
                                        @if($mechanic->hasRole('Mechanic'))
                                        <option value="{{ $mechanic->id }}" @if($order->mechanic == $mechanic->id) selected @endif>{{ $mechanic->name . " " . $mechanic->last_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}

                        <div class="mt-3"></div>
                        <div class="pre-form-texts">Vehicle information</div>
                        <div class="row">
                            <div class="col-md-12 form-group mt-3">
                                <label for="">Type</label>
                                <select name="type" class="form-control" id="select_type" required>
                                    {{-- <option value="" @if($vehicle == null) disabled @endif>Select type</option> --}}
                                    <option value="car" @if($vehicle) @if($vehicle->type == 'car') selected @else disabled @endif @endif>Car</option>
                                    <option value="truck" @if($vehicle) @if($vehicle->type == 'truck') selected @else disabled @endif @endif>Truck</option>
                                    <option value="trailer" @if($vehicle) @if($vehicle->type == 'trailer') selected @else disabled @endif @endif>Trailer</option>
                                </select>
                            </div>
                        </div>

                        <div class="truck-window" style="display:none;">
                            <div class="row mt-3 mb-3">
                                <div class="col-md-4 form-group mt-3">
                                    <label for="">VIN</label>
                                    <input type="text" name="vin_code" class="form-control" @if($vehicle) value="{{ $vehicle->vin_code }}" @endif required>
                                </div>
                                <div class="col-md-4 form-group mt-3">
                                    <label for="">Model</label>
                                    <input type="text" name="model" class="form-control" @if($vehicle) value="{{ $vehicle->model }}" @endif required>
                                </div>
                                <div class="col-md-4 form-group mt-3">
                                    <label for="">Make</label>
                                    <input type="text" name="make" class="form-control" @if($vehicle) value="{{ $vehicle->make }}" @endif required>
                                </div>
                                <div class="col-md-4 form-group mt-1">
                                    <label for="">Engine</label>
                                    <input type="text" name="engine" class="form-control" @if($vehicle) value="{{ $vehicle->engine }}" @endif required>
                                </div>
                                <div class="col-md-4 form-group mt-1">
                                    <label for="">Engine Number</label>
                                    <input type="text" name="engine_number" class="form-control" @if($vehicle) value="{{ $vehicle->engine_number }}" @endif required>
                                </div>
                                <div class="col-md-4 form-group mt-1">
                                    <label for="">Gas Type</label>
                                    <input type="text" name="gas_type" class="form-control" @if($vehicle) value="{{ $vehicle->gas_type }}" @endif required>
                                </div>
                                <div class="col-md-4 form-group mt-1">
                                    <label for="">Year</label>
                                    <input type="text" name="year" class="form-control" @if($vehicle) value="{{ $vehicle->year }}" @endif required>
                                </div>
                                <div class="col-md-4 form-group mt-1">
                                    <label for="">Truck number (company)</label>
                                    <input type="text" name="company_vehicle_number" class="form-control" @if($vehicle) value="{{ $vehicle->company_vehicle_number }}" @endif>
                                </div>
                                <div class="col-md-4 form-group mt-1">
                                    <label for="">Number plate</label>
                                    <input type="text" name="number_plate" class="form-control" @if($vehicle) value="{{ $vehicle->number_plate }}" @endif required>
                                </div>
                                <div class="col-md-4 form-group mt-1">
                                    <label for="">Color</label>
                                    <input type="text" name="color" class="form-control" @if($vehicle) value="{{ $vehicle->color }}" @endif>
                                </div>
                                <div class="col-md-4 form-group mt-1">
                                    <label for="">Odometer (miles)</label>
                                    <input type="text" name="odometer_now" class="form-control" @if($vehicle) value="{{ $vehicle->odometer_now }}" @endif>
                                </div>
                            </div>
                        </div>

                        <div class="car-window" style="display:none;">
                            <div class="row mt-3 mb-3">
                                <div class="col-md-4 form-group mt-3">
                                    <label for="">VIN</label>
                                    <input type="text" name="vin_code" class="form-control" @if($vehicle) value="{{ $vehicle->vin_code }}" @endif required>
                                </div>
                                <div class="col-md-4 form-group mt-3">
                                    <label for="">Model</label>
                                    <input type="text" name="model" class="form-control" @if($vehicle) value="{{ $vehicle->model }}" @endif required>
                                </div>
                                <div class="col-md-4 form-group mt-3">
                                    <label for="">Make</label>
                                    <input type="text" name="make" class="form-control" @if($vehicle) value="{{ $vehicle->make }}" @endif required>
                                </div>
                                <div class="col-md-4 form-group mt-1">
                                    <label for="">Engine</label>
                                    <input type="text" name="engine" class="form-control" @if($vehicle) value="{{ $vehicle->engine }}" @endif required>
                                </div>
                                <div class="col-md-4 form-group mt-1">
                                    <label for="">Engine Number</label>
                                    <input type="text" name="engine_number" class="form-control" @if($vehicle) value="{{ $vehicle->engine_number }}" @endif required>
                                </div>
                                <div class="col-md-4 form-group mt-1">
                                    <label for="">Gas Type</label>
                                    <input type="text" name="gas_type" class="form-control" @if($vehicle) value="{{ $vehicle->gas_type }}" @endif required>
                                </div>
                                <div class="col-md-4 form-group mt-1">
                                    <label for="">Year</label>
                                    <input type="text" name="year" class="form-control" @if($vehicle) value="{{ $vehicle->year }}" @endif required>
                                </div>
                                <div class="col-md-4 form-group mt-1">
                                    <label for="">Car number (company)</label>
                                    <input type="text" name="company_vehicle_number" class="form-control" @if($vehicle) value="{{ $vehicle->company_vehicle_number }}" @endif>
                                </div>
                                <div class="col-md-4 form-group mt-1">
                                    <label for="">Number plate</label>
                                    <input type="text" name="number_plate" class="form-control" @if($vehicle) value="{{ $vehicle->number_plate }}" @endif required>
                                </div>
                                <div class="col-md-4 form-group mt-1">
                                    <label for="">Color</label>
                                    <input type="text" name="color" class="form-control" @if($vehicle) value="{{ $vehicle->color }}" @endif>
                                </div>
                                <div class="col-md-4 form-group mt-1">
                                    <label for="">Odometer (miles)</label>
                                    <input type="text" name="odometer_now" class="form-control" @if($vehicle) value="{{ $vehicle->odometer_now }}" @endif>
                                </div>
                            </div>
                        </div>

                        <div class="trailer-window" style="display:none;">
                            <div class="row mt-3 mb-3">
                                <div class="col-md-4 form-group mt-3">
                                    <label for="">VIN</label>
                                    <input type="text" name="vin_code" class="form-control" @if($vehicle) value="{{ $vehicle->vin_code }}" @endif required>
                                </div>
                                <div class="col-md-4 form-group mt-3">
                                    <label for="">Model</label>
                                    <input type="text" name="model" class="form-control" @if($vehicle) value="{{ $vehicle->model }}" @endif>
                                </div>
                                <div class="col-md-4 form-group mt-3">
                                    <label for="">Make</label>
                                    <input type="text" name="make" class="form-control" @if($vehicle) value="{{ $vehicle->make }}" @endif>
                                </div>
                                <div class="col-md-4 form-group mt-1">
                                    <label for="">Year</label>
                                    <input type="text" name="year" class="form-control" @if($vehicle) value="{{ $vehicle->year }}" @endif>
                                </div>
                                <div class="col-md-4 form-group mt-1">
                                    <label for="">Trailer number (company)</label>
                                    <input type="text" name="company_vehicle_number" class="form-control" @if($vehicle) value="{{ $vehicle->company_vehicle_number }}" @endif>
                                </div>
                                <div class="col-md-4 form-group mt-1">
                                    <label for="">Number plate</label>
                                    <input type="text" name="number_plate" class="form-control" @if($vehicle) value="{{ $vehicle->number_plate }}" @endif required>
                                </div>
                                <div class="col-md-4 form-group mt-1">
                                    <label for="">Color</label>
                                    <input type="text" name="color" class="form-control" @if($vehicle) value="{{ $vehicle->color }}" @endif>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="pre-form-texts">Task(-s) information</div>

                    <div class="row">
                        <div class="col-md-12 form-group">
                            <div id="to_be_done_list" class="mt-2 mb-3">

                                @if($order->to_be_done)

                                @php $toBeDoneList = json_decode($order->to_be_done); $toDoCount = 10000; @endphp


                                <div class="table-responsive mt-2" style="overflow: scroll;">
                                    <table id="tasks_table" class="table display table-hover table-striped" style="width:100%;">
            
                                        <thead>
                                            <tr>
                                                <th style="width:80%;text-align:center;">Task</th>
                                                <th style="text-align:center;">Status</th>
                                            </tr>
                                        </thead>
            
                                        <tbody>
                                            @foreach($toBeDoneList as $tbd)
                                            <tr>
                                                <td style="width:80%;text-align:center;">{{ $tbd->value }}</td>
                                                <td style="text-align:center;"> 
                                                    <select name="to_be_done_status[]" data-toggle="tooltip" title="Is it done?" class="form-control select_foo" id="">
                                                        <option value="true" @if($tbd->status == true) selected disabled @else disabled @endif>Yes</option>
                                                        <option value="false" @if($tbd->status == false) selected disabled @else disabled @endif>No</option>
                                                    </select> 
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
            
                                    </table>
                                </div>

                                    {{-- @foreach($toBeDoneList as $tbd)
                                    @php $toDoCount++; @endphp
                                    <div class="row appended-to-do-row{{ $toDoCount }}">
                                        <div class="col-4">
                                            <input type="text" name="to_be_done[]" value="{{ $tbd->value }}" class="form-control mt-1" required>
                                        </div>
                                        <div class="col-3 mt-1">
                                            <select name="mechanics[]" id="" class="form-control" required>
                                                @if($tbd->mechanic == null)
                                                    <option value="" selected="selected" disabled>Select a mechanic</option>
                                                @endif
                                                @foreach($mechanics as $mechanic)
                                                    @if($mechanic->hasRole('Mechanic'))
                                                        <option value="{{ $mechanic->id }}" @if($tbd->mechanic == $mechanic->id) selected @endif>{{ $mechanic->name . " " . $mechanic->last_name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-2">
                                            <button type="button" class="btn btn-primary btn-sm mt-1 remove-to-do" style="float:right;" data-idt="{{ $toDoCount }}">Remove</button>
                                        </div>
                                    </div>
                                    @endforeach --}}
                                @endif

                            </div>
                            {{-- <textarea type="text" id="editor" name="to_be_done" class="form-control"> @if($order->to_be_done != null) {{ $order->to_be_done }} @endif </textarea> --}}
                        </div>
                    </div>

                    <div class="pre-form-texts">Job(-s) information</div>

                    <div class="row">
                        <div class="col-md-12 form-group mt-3">
                            <div id="to_be_done" class="mt-2 mb-3">

                                <div class="table-responsive mt-2" style="overflow: scroll;">
                                    <table id="jobs_table" class="table display table-hover table-striped" style="width:100%;">
            
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">Mechanic</th>
                                                <th style="text-align:center;">Job</th>
                                                <th style="text-align:center;">Hours</th>
                                                <th style="text-align:center;">Taxes %</th>
                                                <th style="text-align:center;">Discount %</th>
                                                <th style="text-align:center;">Cost $</th>
                                                {{-- <th style="text-align:center;">Action</th> --}}
                                            </tr>
                                        </thead>
            
                                        <tbody>
                                            @if($order->done_jobs)
                                            @php $doneJobs = json_decode($order->done_jobs); $toBeCount = 20000; $doneJobRows = 0; @endphp

                                                @foreach($doneJobs as $dj)
                                                <tr>
                                                    @php $mechanicName = \App\Models\User::find($dj->mechanic); @endphp
                                                    <td style="text-align:center;"><input type="text" name="jobMechanic[]" class="form-control jmech jmech{{ $doneJobRows }}" data-job_r="{{ $doneJobRows }}" value="{{ $mechanicName->name . " " . $mechanicName->last_name }}" disabled> <input type="hidden" name="jobMechanicId[]" value="{{ $dj->mechanic }}"></td>
                                                    <td style="text-align:center;"><input type="text" class="form-control" value="{{ $dj->job }}" disabled>
                                                        <input type="hidden" name="jobitself[]" class="form-control jjob jjob{{ $doneJobRows }}" data-job_r="{{ $doneJobRows }}" value="{{ $dj->job }}">
                                                    </td>
                                                    <td style="text-align:center;"><input type="text" class="form-control" data-job_r="{{ $doneJobRows }}" value="{{ $dj->hours_worked }}" disabled step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)">
                                                        <input type="hidden" name="jobHours[]" class="form-control jhours jhours{{ $doneJobRows }}" data-job_r="{{ $doneJobRows }}" value="{{ $dj->hours_worked }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <select name="jobTax[]" class="form-control jtax jtax{{ $doneJobRows }}" data-job_r="{{ $doneJobRows }}" style="min-width:70px;" id="" required>
                                                            <option value="" data-dsop="0" selected disabled>Choose</option>
                                                            <option value="10">10 %</option>
                                                            <option value="21">21 %</option>
                                                        </select>
                                                    </td>
                                                    <td style="text-align:center;"><input type="hidden" name="jobDiscount[]" class="form-control jdisc jdisc{{ $doneJobRows }}" data-job_r="{{ $doneJobRows }}" value="0.00" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)"></td>
                                                    
                                                    <td style="text-align:center;"><input type="text" name="jobCost[]" class="form-control jcost jcost{{ $doneJobRows }}" data-job_r="{{ $doneJobRows }}" value="{{ $dj->cost }}" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)">
                                                        <input type="hidden" class="form-control jtotalactual jtotalactual{{ $doneJobRows }}" value="{{ $dj->cost }}">
                                                        <input type="hidden" class="form-control jtotalactualad jtotalactualad{{ $doneJobRows }}" value="{{ $dj->cost }}">
                                                        <input type="hidden" name="jobTaxCost[]" class="jtaxcost{{ $doneJobRows }}" value="">
                                                        <input type="hidden" name="jobDiscountReducedPrice[]" class="jdcost{{ $doneJobRows }}" value="0">
                                                    </td>
                                                    {{-- <td style="text-align:center;"><button type="button" class="btn btn-sm btn-primary btn-remove-done-job" data-done_job_id="{{ $doneJobRows }}">Delete</button></td> --}}
                                                    @php $doneJobRows++; @endphp
                                                </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
            
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pre-form-texts">Part(-s) information</div>

                    <div class="row">
                        {{-- <div class="col-md-12">
                            <button type="button" style="float:right;" data-toggle="modal" data-target="#addpart" class="add-to-do btn btn-info btn-sm">Add part</button>
                        </div> --}}
                        <div class="col-md-12 form-group mt-3">
                            <div id="to_be_done" class="mt-2 mb-3">

                                <div class="table-responsive mt-2" style="overflow: scroll;">
                                    <table id="jobs_table" class="table display table-hover table-striped" style="width:100%;">
            
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">Part</th>
                                                <th style="text-align:center;">Quantity</th>
                                                <th style="text-align:center;">Unit Cost $</th>
                                                <th style="text-align:center;">Taxes %</th>
                                                <th style="text-align:center;">Discount %</th>
                                                <th style="text-align:center;">Total Cost $</th>
                                                {{-- <th style="text-align:center;">Action</th> --}}
                                            </tr>
                                        </thead>
            
                                        <tbody>
                                            @if($order->used_parts)
                                            @php $usedParts = json_decode($order->used_parts); $usedPartsRow = 0; @endphp

                                                @foreach($usedParts as $up)
                                                <tr>
                                                    @php $partName = \App\Models\Part::find($up->part); @endphp
                                                    <td style="text-align:center;"><input type="text" name="partDescription[]" class="form-control pdesc pdesc{{ $usedPartsRow }}" data-part_r="{{ $usedPartsRow }}" value="{{ $partName->description }}" disabled> 
                                                        <input type="hidden" name="partId[]" value="{{ $up->part }}">
                                                    </td>
                                                    <td style="text-align:center;"><input type="number" class="form-control" data-part_r="{{ $usedPartsRow }}" value="{{ $up->quantity }}" step="1" disabled onchange="(function(el){el.value=parseFloat(el.value).toFixed(1);})(this)">
                                                        <input type="hidden" name="partQuantity[]" class="form-control pquant pquant{{ $usedPartsRow }}" data-part_r="{{ $usedPartsRow }}" value="{{ $up->quantity }}">
                                                    </td>
                                                    <td style="text-align:center;"><input type="number" class="form-control" data-part_r="{{ $usedPartsRow }}" value="{{ $up->cost }}" step="0.01" disabled onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)">
                                                        <input type="hidden" name="partUnitCost[]" class="form-control pcost pcost{{ $usedPartsRow }}" data-part_r="{{ $usedPartsRow }}" value="{{ $up->cost }}">
                                                    </td>
                                                    <td style="text-align:center;">
                                                        <select name="partTax[]" class="form-control ptax ptax{{ $usedPartsRow }}" data-part_r="{{ $usedPartsRow }}" style="min-width:70px;" id="" required>
                                                            <option value="" data-dsop="0" selected disabled>Choose</option>
                                                            <option value="10">10 %</option>
                                                            <option value="21">21 %</option>
                                                        </select>
                                                    </td>
                                                    <td style="text-align:center;"><input type="hidden" name="partDiscount[]" class="form-control pdisc pdisc{{ $usedPartsRow }}" data-part_r="{{ $usedPartsRow }}" value="0.00" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)"></td>
                                                    <td style="text-align:center;"><input type="number" name="partTotal[]" class="form-control ptotal ptotal{{ $usedPartsRow }}" data-part_r="{{ $usedPartsRow }}" value="{{ $up->cost * $up->quantity }}" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)">
                                                        <input type="hidden" class="form-control ptotalactual ptotalactual{{ $usedPartsRow }}" value="{{ $up->cost * $up->quantity }}" data-part_r="{{ $usedPartsRow }}">
                                                        <input type="hidden" class="form-control ptotalactualad ptotalactualad{{ $usedPartsRow }}" value="{{ $up->cost * $up->quantity }}" data-part_r="{{ $usedPartsRow }}">
                                                        <input type="hidden" name="partTaxCost[]" class="ptaxcost{{ $usedPartsRow }}" value="">
                                                        <input type="hidden" name="partDiscountReducedPrice[]" class="pdcost{{ $usedPartsRow }}" value="0">
                                                    </td>
                                                    {{-- <td style="text-align:center;"><button type="button" class="btn btn-sm btn-primary btn-remove-used-part" data-part_row="{{ $usedPartsRow }}">Delete</button></td> --}}
                                                    @php $usedPartsRow++; @endphp
                                                </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
            
                                    </table>

                                    {{-- <div class="mt-3"></div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" name="action" value="calculate" style="float:right;" class="btn btn-sm btn-primary btn-primary-second">Calculate prices <i class="fas fa-check"></i></button>
                                        </div>
                                    </div> --}}

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-2"></div>
                        <div class="pre-form-texts">Other information</div>
                        <div class="mt-3"></div>



                        <div class="mt-3"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Order priority</label>
                                <div class="form-check">
                                    @if($order->priority == "yes")
                                        <input class="form-check-input" type="checkbox" name="priority" value="yes" id="flexCheckDefault" checked disabled>
                                    @else
                                        <input class="form-check-input" type="checkbox" name="priority" value="yes" id="flexCheckDefault" disabled>
                                    @endif
                                    <label class="form-check-label" for="flexCheckDefault" style="padding-top: 4px;">Yes</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Order budget</label>
                                <input type="number" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" name="budget" value="{{ $order->budget }}" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="mt-3"></div>
                        <div class="pre-form-texts">Additional comments</div>
                        
                        @if($order->comments != null)
                        
                            @php $cmts = json_decode($order->comments); @endphp
                            @php 
                            // function date_compare($a, $b)
                            // {
                            //     return strcmp($a->date,$b->date);
                            // }
                            // usort($cmts, 'date_compare');
                            @endphp
                            @foreach($cmts as $key => $c)
                                <div class="row col-12 mt-1 mb-1 comment-box">
                                    <div class="col-6">
                                        <label>{{ $c->owner }}</label> 
                                        @if($c->owner == $user->name . " " . $user->last_name)
                                            <button type="button" data-toggle="tooltip" data-order-id="{{ $order->id }}" data-comment-id="{{ $key }}" title="Delete comment" class="delete_comment cancel_part"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        <label style="float:right;">{{ $c->date }}</label>
                                    </div>

                                    <span>{{ $c->comment }}</span>

                                    @if($c->pictures)
                                    @php $pictureCount = 0; @endphp
                                        @foreach($c->pictures as $pic)
                                            @php $pictureCount++; @endphp
                                            <div class="col-2">
                                                <a class="attachment-text" href="{{ url('/temporary/orders/comments/'.$order->id."/".$pic) }}">Attachment {{ $pictureCount }}</a> 
                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                            @endforeach

                        @endif
                        <div class="row col-12">
                            <div class="col-9 form-group mt-3">
                                <label for="">Your comment</label>
                                <textarea type="text" id="editor" name="comments" class="form-control"></textarea>
                            </div>
                            <div class="col-3 mt-3" style="vertical-align: middle;">
                                <div class="row">
                                    <label for="">Attach picture(-s)</label>
                                    <input type="file" name="pictures[]" class="form-control" multiple>
                                </div>
                            </div>
                        </div>

                    <div class="mt-3"></div>
                    <div class="row">
                        <div class="col-6">
                            <button type="submit" name="action" value="back" style="float:right;" data-toggle="tooltip" title="Go back to edit the order" class="col-12 btn btn-primary btn-primary-second" formnovalidate><i class="fas fa-caret-square-left"></i></button>
                        </div>
                        <div class="col-6">
                            <button type="submit" name="action" value="complete" style="float:right;" data-toggle="tooltip" title="Finish up and go to set up invoice" class="col-12 btn btn-primary btn-primary-second"><i class="fas fa-check"></i></button>
                        </div>
                    </div>
                </form>
                </div>
            </div>

            <div class="mt-3"></div>

            <a href="{{ url('/work/orders') }}" style="float:right;" class="btn btn-primary"><i class="fas fa-caret-square-left"></i> Back to orders list</a>

        </div>
    </div>

@endsection

@section('scripts')

<script>
    $('.components > li').each(function() {
        $(this).removeClass("active");
    });
    
    $('#workSubmenu').addClass("show");
    $('#orders-link-1').addClass("active");

    $('.btn-remove-done-job').on('click', function() {

        var row = $(this).attr('data-done_job_id');
        $('#remove_job_row').val(row);
        $('#removejob').modal('toggle');

    });

    $('.btn-remove-used-part').on('click', function() {

        var row = $(this).attr('data-part_row');
        $('#remove_part_row').val(row);
        $('#removepart').modal('toggle');

    });

    $('.jdisc').focusout(function() {

        var id = $(this).attr('data-job_r');
        var discountPercent = $(this).val();
        var totalPrice = $('.jtotalactualad'+id).val();

        // calculations
        var reducePriceBy = discountPercent / 100 * totalPrice;
        var reducedPrice = totalPrice - reducePriceBy;

        // set new price
        $('.jcost'+id).val(reducedPrice.toFixed(2));
        // price after discount.
        $('.jtotalactualad'+id).val(reducedPrice.toFixed(2));
        // set discount price reduced by variable
        $('.jdcost'+id).val(reducePriceBy.toFixed(2)); 

    });

    $('.pdisc').focusout(function() {

        var id = $(this).attr('data-part_r');
        var discountPercent = $(this).val();
        var totalPrice = $('.ptotalactualad'+id).val();

        // calculations
        var reducePriceBy = discountPercent / 100 * totalPrice;
        var reducedPrice = totalPrice - reducePriceBy;

        // set new price
        $('.ptotal'+id).val(reducedPrice.toFixed(2));
        // price after discount.
        $('.ptotalactualad'+id).val(reducedPrice.toFixed(2));
        // set discount price reduced by variable
        $('.pdcost'+id).val(reducePriceBy.toFixed(2));        

    });

    $('.jtax').on('change', function() {

        var id = $(this).attr('data-job_r');
        var taxPercent = $(this).val();
        // var priceAfterDiscount = $('.jtotalactualad'+id).val();
        var normalPrice = $('.jtotalactual'+id).val();

        var increasePriceBy = parseInt(taxPercent) / 100 * parseInt(normalPrice);
        var increasedPrice = parseInt(normalPrice) + parseInt(increasePriceBy);

        $('.jcost'+id).val(increasedPrice.toFixed(2));
        $('.jtaxcost'+id).val(increasePriceBy.toFixed(2));
        // below is the price for counting after tax (for discount)
        $('.jtotalactualad'+id).val(increasedPrice.toFixed(2));
        // show discount input, set it to 0 at all times when taxes are changed
        $('.jdisc'+id).attr('type', 'number');
        $('.jdisc'+id).val(0.00);

    });

    $('.ptax').on('change', function() {

        var id = $(this).attr('data-part_r');
        var taxPercent = $(this).val();
        var normalPrice = $('.ptotalactual'+id).val();

        var increasePriceBy = parseInt(taxPercent) / 100 * parseInt(normalPrice);

        var increasedPrice = parseInt(normalPrice) + parseInt(increasePriceBy);

        $('.ptotal'+id).val(increasedPrice.toFixed(2));
        $('.ptaxcost'+id).val(increasePriceBy.toFixed(2));
        // below is the price for counting after tax (for discount)
        $('.ptotalactualad'+id).val(increasedPrice.toFixed(2));
        // show discount input, set it to 0 at all times when taxes are changed
        $('.pdisc'+id).attr('type', 'number');
        $('.pdisc'+id).val(0.00);

    });

    $(document).on('click', '.remove-to-do', function() {
        var row = $(this).attr('data-idt');
        // console.log(row);
        $('.appended-to-do-row'+row).remove();
    });

    $('.delete_comment').on('click', function() {

        var id = $(this).attr('data-order-id');
        var comment_id = $(this).attr('data-comment-id');

        $.ajax({

            type:'POST',
            url: '/orders/delete-comment',
            data: {comment_id: comment_id, id: id},
            beforeSend: function() {

            },
            success:function(data) {
                
                location.reload();

            },

        });

    });

    $("form").submit(function () {

        var this_master = $(this);

        this_master.find('input[type="checkbox"]').each( function () {
            var checkbox_this = $(this);
            if( checkbox_this.is(":checked") == true ) {
                checkbox_this.attr('value','yes');
            } else {
                checkbox_this.prop('checked',true);
                checkbox_this.attr('value','no');
            }
        });
        
    });

    $(document).ready(function() {

        $('.permissions-select').select2({
            minimumResultsForSearch: 1
        });

        $('#customer-select').select2({
            minimumResultsForSearch: 1
        });
        $('#select_type').select2({
            minimumResultsForSearch: 1
        });
        $('#mechanic_select').select2({
            minimumResultsForSearch: 1
        });
        $('#part-selection').select2({
            minimumResultsForSearch: 1
        });

        var cType = $("#select_type option:selected").val();
        
        if(cType == 'car') {
            $('.car-window').css('display', 'block');
            $('.truck-window').css('display', 'none');
            $('.trailer-window').css('display', 'none');

            $('.car-window input').each(function(){
                // $(this).removeAttr('disabled');
                $(this).attr('disabled', 'disabled');
            });
            $('.truck-window input').each(function(){
                $(this).attr('disabled', 'disabled');
            });
            $('.trailer-window input').each(function(){
                $(this).attr('disabled', 'disabled');
            });

        } else if(cType == 'truck') {

            $('.car-window').css('display', 'none');
            $('.truck-window').css('display', 'block');
            $('.trailer-window').css('display', 'none');
 
            $('.car-window input').each(function(){
                $(this).attr('disabled', 'disabled');
            });
            $('.truck-window input').each(function(){
                // $(this).removeAttr('disabled');
                $(this).attr('disabled', 'disabled');
            });
            $('.trailer-window input').each(function(){
                $(this).attr('disabled', 'disabled');
            });

        } else if(cType == 'trailer') {

            $('.car-window').css('display', 'none');
            $('.truck-window').css('display', 'none');
            $('.trailer-window').css('display', 'block');

            $('.truck-window input').each(function(){
                $(this).attr('disabled', 'disabled');
            });
            $('.trailer-window input').each(function(){
                // $(this).removeAttr('disabled');
                $(this).attr('disabled', 'disabled');
            });
            $('.car-window input').each(function(){
                $(this).attr('disabled', 'disabled');
            });
            
        }

    });

    $('#select_type').on('change', function() {

        if(this.value == 'car') {
            $('.car-window').css('display', 'block');
            $('.truck-window').css('display', 'none');
            $('.trailer-window').css('display', 'none');

            $('.truck-window input').each(function(){
                $(this).attr('disabled', 'disabled');
            });
            $('.car-window input').each(function(){
                $(this).removeAttr('disabled');
            });
            $('.trailer-window input').each(function(){
                $(this).attr('disabled', 'disabled');
            });

        } else if(this.value == 'truck') {

            $('.car-window').css('display', 'none');
            $('.truck-window').css('display', 'block');
            $('.trailer-window').css('display', 'none');
 
            $('.car-window input').each(function(){
                $(this).attr('disabled', 'disabled');
            });
            $('.truck-window input').each(function(){
                $(this).removeAttr('disabled');
            });
            $('.trailer-window input').each(function(){
                $(this).attr('disabled', 'disabled');
            });

        } else if(this.value == 'trailer') {

            $('.car-window').css('display', 'none');
            $('.truck-window').css('display', 'none');
            $('.trailer-window').css('display', 'block');

            $('.truck-window input').each(function(){
                $(this).attr('disabled', 'disabled');
            });
            $('.trailer-window input').each(function(){
                $(this).removeAttr('disabled');
            });
            $('.car-window input').each(function(){
                $(this).attr('disabled', 'disabled');
            });
            
        }

    });


</script>

@endsection