@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Work Related <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/orders') }}" class="breadcrumb-style">Orders</a> 
        <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/orders/create/'.$order->id) }}" class="breadcrumb-style">Create new order</a>
    </div>
@endsection

@section('content-d')

    <div style="margin-top: 20px;"></div>

    <div class="row pl-13 col-md-12 content-row">
        @if(Session::has('success'))
            <div class="alert alert-info text-center">{{ Session::get('success') }}</div>
        @endif
        @if(Session::has('error'))
            <div class="alert alert-danger text-center">{{ Session::get('error') }}</div>
        @endif
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row">
        {{-- pl-13 pr-27 content-row  --}}
        <div class="col-md-12 pl-13 pr-27 content-row">

            <div class="card card-custom">
                <div class="card-header card-header-custom">
                    Create new order
                </div>
                <div class="card-body card-body-custom">
                    <div class="mt-2"></div>
                    {{-- <div class="col-md-12">
                        <div style="text-align:center;margin-top:30px;">
                            <span id="step-1" class="step @if($order->order_fill_status == 1) active @endif @if($order->order_fill_status == 2 || $order->order_fill_status == 3 || $order->order_fill_status == 4 || $order->order_fill_status == 5) finish @endif"></span>
                            <span id="step-2" class="step @if($order->order_fill_status == 2) active @endif @if($order->order_fill_status == 3 || $order->order_fill_status == 4 || $order->order_fill_status == 5) finish @endif"></span>
                            <span id="step-3" class="step @if($order->order_fill_status == 3) active @endif @if($order->order_fill_status == 4 || $order->order_fill_status == 5) finish @endif"></span>
                            <span id="step-4" class="step @if($order->order_fill_status == 4) active @endif @if($order->order_fill_status == 5) finish @endif"></span>
                            <span id="step-4" class="step @if($order->order_fill_status == 5) active @endif"></span>
                        </div>
                    </div> --}}
                    {{-- <div class="mt-2"></div> --}}
                    {{-- @if($order->order_fill_status == 1) --}}

                    <div class="pre-form-texts">Customer information</div>
                    
                    <a href="{{ url('/work/orders/create-new-customer/'.$order->id) }}" class="mt-3 col-12 btn btn-sm btn-info">Add new customer</a>

                    <div class="pre-form-texts mt-3 text-center">OR</div>

                    <form action="{{ url('/work/orders/'.$order->id.'/store/step-one') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 form-group mt-3">
                                <label for="">Select a customer</label>
                                <div class="mt-2"></div>
                                <select class="permissions-select form-control" name="customer_id">
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}" @if($order->customer_id == $customer->id) selected @endif>{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- <div class="mt-3"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" style="float:right;" class="col-6 btn btn-primary btn-primary-second">Next <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
                            </div>
                        </div> --}}
                        <div class="mt-2"></div>
                    {{-- </form> --}}
                    {{-- @endif --}}
                    {{-- @if($order->order_fill_status == 2) --}}

                            <div class="pre-form-texts">Vehicle information</div>
                            <div class="row">
                                <div class="col-md-12 form-group mt-3">
                                    <label for="">Type</label>
                                    <select name="type" class="form-control" id="select_type" required>
                                        <option value="none" @if($vehicle == null) selected disabled @endif>Select type</option>
                                        <option value="car" @if($vehicle) @if($vehicle->type == 'car') selected @endif @endif>Car</option>
                                        <option value="truck" @if($vehicle) @if($vehicle->type == 'truck') selected @endif @endif>Truck</option>
                                        <option value="trailer" @if($vehicle) @if($vehicle->type == 'trailer') selected @endif @endif>Trailer</option>
                                    </select>
                                </div>
                            </div>

                            <div class="search-input-box row form-group mt-3" style="display:none;">
                                <div class="col-12">
                                    <label for="">Quick search</label>
                                    <input type="text" class="form-control search-input" placeholder="Enter vin code">
                                </div>
                            </div>

                            <div id="search-results" class="mt-3">

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
                                    @if($vehicle)
                                        @if($vehicle->odometer_before != null)
                                            <div class="col-md-4 form-group mt-1">
                                                <label for="">Odometer</label>
                                                <input type="text" name="odometer_now" class="form-control" @if($vehicle) value="{{ $vehicle->odometer_before }}" @endif>
                                            </div>
                                        @else
                                        <div class="col-md-4 form-group mt-1">
                                            <label for="">Odometer</label>
                                            <input type="text" name="odometer_now" class="form-control" @if($vehicle) value="{{ $vehicle->odometer_now }}" @endif>
                                        </div>
                                        @endif
                                    @else
                                        <div class="col-md-4 form-group mt-1">
                                            <label for="">Odometer</label>
                                            <input type="text" name="odometer_now" class="form-control" @if($vehicle) value="{{ $vehicle->odometer_noww }}" @endif>
                                        </div>
                                    @endif
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
                                    @if($vehicle)
                                        @if($vehicle->odometer_before != null)
                                            <div class="col-md-4 form-group mt-1">
                                                <label for="">Odometer</label>
                                                <input type="text" name="odometer_now" class="form-control" @if($vehicle) value="{{ $vehicle->odometer_before }}" @endif>
                                            </div>
                                        @else
                                        <div class="col-md-4 form-group mt-1">
                                            <label for="">Odometer</label>
                                            <input type="text" name="odometer_now" class="form-control" @if($vehicle) value="{{ $vehicle->odometer_now }}" @endif>
                                        </div>
                                        @endif
                                    @else
                                        <div class="col-md-4 form-group mt-1">
                                            <label for="">Odometer</label>
                                            <input type="text" name="odometer_now" class="form-control" @if($vehicle) value="{{ $vehicle->odometer_now }}" @endif>
                                        </div>
                                    @endif
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

                        <div class="mt-3"></div>
                        {{-- <div class="row">
                            @if($order->order_fill_status == 2)
                                <div class="col-6 mt-1">
                                    <a href="{{ url('/work/orders/create/'.$order->id.'/step-one') }}"><button type="button" style="float:right;" class="col-12 btn btn-primary btn-primary-second"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Previous</button></a>
                                </div>
                            @endif
                            <div class="col-6 mt-1">
                                <button type="submit" style="float:right;" class="col-12 btn btn-primary btn-primary-second">Next <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
                            </div>
                        </div> --}}
                    {{-- @endif --}}
                    {{-- @if($order->order_fill_status == 3) --}}
                    {{-- <form action="{{ url('/work/orders/'.$order->id.'/store/step-three') }}" method="post" autocomplete="off"> --}}
                        {{-- @csrf --}}
                        <div class="mt-2"></div>
                        <div class="pre-form-texts">To do information</div>
                        <div class="row">
                            <div class="col-md-12 form-group mt-3">
                                <label for="">Make a list of things that must be done</label>
                                <button type="button" class="add-to-do btn btn-primary btn-sm">Add more</button>
                                <div id="to_be_done_list" class="mt-3 mb-3">

                                    @if($order->to_be_done)
                                    @php $toBeDoneList = json_decode($order->to_be_done); $toDoCount = 0; @endphp
                                        @foreach($toBeDoneList as $tbd)
                                        @php $toDoCount++; @endphp
                                        <div class="row appended-to-do-row{{ $toDoCount }}">
                                            <div class="col-10">
                                                <input type="text" name="to_be_done[]" value="{{ $tbd->value }}" class="form-control mt-1" required>
                                            </div>
                                            {{-- <div class="col-3 mt-1">
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
                                            </div> --}}
                                            <div class="col-2">
                                                <button type="button" class="btn btn-primary btn-sm mt-1 remove-to-do" style="float:right;" data-idt="{{ $toDoCount }}">Remove</button>
                                            </div>
                                        </div>
                                        @endforeach
                                    @else 
                                        <div class="row appended-to-do-row19999">
                                            <div class="col-10">
                                                <input type="text" name="to_be_done[]" class="form-control mt-1" required>
                                            </div>
                                            {{-- <div class="col-3 mt-1">
                                                <select name="mechanics[]" id="" class="form-control" required>
                                                    @if($order->to_be_done == null)
                                                        <option value="" selected="selected" disabled>Select a mechanic</option>
                                                    @endif
                                                    @foreach($mechanics as $mechanic)
                                                        @if($mechanic->hasRole('Mechanic'))
                                                            <option value="{{ $mechanic->id }}">{{ $mechanic->name . " " . $mechanic->last_name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div> --}}
                                            <div class="col-2">
                                                {{-- <button type="button" class="btn btn-primary btn-sm mt-1 remove-to-do" style="float:right;" data-idt="19999">Remove</button> --}}
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        {{-- <div class="mt-3"></div>
                        <div class="row">
                            @if($order->order_fill_status == 3)
                                <div class="col-6">
                                    <a href="{{ url('/work/orders/create/'.$order->id.'/step-two') }}"><button type="button" style="float:right;" class="col-12 btn btn-primary btn-primary-second"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Previous</button></a>
                                </div>
                            @endif
                            <div class="col-6">
                                <button type="submit" style="float:right;" class="col-12 btn btn-primary btn-primary-second">Next <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
                            </div>
                        </div> --}}
                    {{-- </form> --}}
                    {{-- @endif --}}

                    {{-- @if($order->order_fill_status == 4) --}}

                        {{-- important --}}

                        {{-- <div class="mt-2"></div>
                        <div class="pre-form-texts">Part(-s) information</div>
                        <button type="button" id="add_more_parts" class="mt-3 col-12 btn btn-sm btn-info">Add a different part</button>
                        <div class="pre-form-texts mt-3 text-center">OR</div>
                        <div class="row">
                            <div class="col-md-12 form-group mt-1">
                                <label for="">Search for parts to add</label>
                                <select name="parts[]" id="" class="permissions-select form-control" multiple>
                                    @foreach($parts as $part)
                                        @if($part->pictures != null)
                                            @php $pics = json_decode($part->pictures); @endphp
                                            @php $pic = url('/temporary/parts/'.$part->id.'/'.$pics[0]); @endphp
                                        @else
                                            @php $pic = url('/temporary/part-placeholder.jpg'); @endphp
                                        @endif

                                        @if($order->parts_ids == null)

                                            <option value="{{ $part->id }}"><img src="{{ $pic }}" style="width:50px;height:50px;">
                                            Description: <b>{{ $part->description }}</b>, @if($part->code)Code: <b>{{ $part->code }}</b>, @endif
                                            @if($part->bar_code)Bar Code: <b>{{ $part->bar_code }}</b>.@endif </option>

                                        @else
                                            @php $selectedParts = json_decode($order->parts_ids); @endphp

                                            @foreach($selectedParts as $sp)
                                                @if($sp == $part->id) 

                                                    <option value="{{ $part->id }}" selected="selected"><img src="{{ $pic }}" style="width:50px;height:50px;">
                                                    Description: <b>{{ $part->description }}</b>, @if($part->code)Code: <b>{{ $part->code }}</b>, @endif
                                                    @if($part->bar_code)Bar Code: <b>{{ $part->bar_code }}</b>.@endif </option>

                                                @else

                                                    <option value="{{ $part->id }}"><img src="{{ $pic }}" style="width:50px;height:50px;">
                                                    Description: <b>{{ $part->description }}</b>, @if($part->code)Code: <b>{{ $part->code }}</b>, @endif
                                                    @if($part->bar_code)Bar Code: <b>{{ $part->bar_code }}</b>.@endif </option>

                                                @endif
                                            @endforeach
                                        @endif
                                        
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row add_more_parts_rows">
                        </div> --}}

                        {{-- important --}}

                        {{-- <div class="mt-3"></div>
                        <div class="row">
                            @if($order->order_fill_status == 4)
                                <div class="col-6">
                                    <a href="{{ url('/work/orders/create/'.$order->id.'/step-three') }}"><button type="button" style="float:right;" class="col-12 btn btn-primary btn-primary-second"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Previous</button></a>
                                </div>
                            @endif
                            <div class="col-6">
                                <button type="submit" style="float:right;" class="col-12 btn btn-primary btn-primary-second">Next <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
                            </div>
                        </div> --}}
                    {{-- @endif --}}

                    {{-- @if($order->order_fill_status == 5) --}}
                        <div class="mt-2"></div>
                        <div class="pre-form-texts">Other information</div>
                        <div class="mt-3"></div>
                        {{-- <div class="row">
                            <div class="col-md-12">
                                <label for="">Mechanic</label>
                                <div class="mt-2"></div>
                                <select class="permissions-select form-control" name="mechanic_id">
                                    @if($order->mechanic_id == null)
                                        <option value="" selected="selected" disabled>Select a mechanic</option>
                                    @endif
                                    @foreach($mechanics as $mechanic)
                                        @if($mechanic->hasRole('Mechanic'))
                                            <option value="{{ $mechanic->id }}" @if($order->mechanic == $mechanic->id) selected @endif>{{ $mechanic->name . " " . $mechanic->last_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div> --}}
                        <div class="mt-3"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">Order priority</label>
                                <div class="form-check">
                                    @if($order->priority == "yes")
                                        <input class="form-check-input" type="checkbox" name="priority" value="yes" id="flexCheckDefault" checked>
                                    @else
                                        <input class="form-check-input" type="checkbox" name="priority" value="yes" id="flexCheckDefault">
                                    @endif
                                    <label class="form-check-label" for="flexCheckDefault" style="padding-top: 4px;">Yes</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="">Order budget</label>
                                <input type="number" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" name="budget" class="form-control">
                            </div>
                        </div>
                        @if($customer->email)
                        <div class="mt-3"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pre-form-texts-small" style="font-size:14px;">Would you like to send email to customer (<span style="color:rgb(163, 171, 207);">{{ $customer->email }}</span>) that you're starting the order?</div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="email_send" value="yes" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault" style="padding-top: 4px;">Yes</label>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="mt-3"></div>
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
                            {{-- @if($order->order_fill_status == 5)
                                <div class="col-6">
                                    <a href="{{ url('/work/orders/create/'.$order->id.'/step-four') }}"><button type="button" style="float:right;" class="col-12 btn btn-primary btn-primary-second"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Previous</button></a>
                                </div>
                            @endif --}}
                            <div class="col-12">
                                <button type="submit" style="float:right;" class="col-6 btn btn-primary btn-primary-second">Finish order creation <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <div class="mt-3"></div>
                    </form>
                    {{-- @endif --}}

                </div>
            </div>

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

    $(document).on('click', '.cancel_part', function() {
        $(this).parents('.appended_part').remove();
    });

    var toDoCount = 0;

    $('.add-to-do').on('click', function() {
        toDoCount++;
        $('#to_be_done_list').append('\
        <div class="row appended-to-do-row'+toDoCount+'">\
            <div class="col-10">\
                <input type="text" name="to_be_done[]" class="form-control mt-1" required>\
            </div>\
            <div class="col-2">\
                <button type="button" class="btn btn-primary btn-sm mt-1 remove-to-do" style="float:right;" data-idt="'+toDoCount+'">Remove</button>\
            </div>\
        </div>\
        ');

        // <div class="col-3 mt-1">\
        //     <select name="mechanics[]" id="" class="form-control" required>\
        //         @if($order->to_be_done == null)\
        //             <option value="" selected="selected" disabled>Select a mechanic</option>\
        //         @endif\
        //         @foreach($mechanics as $mechanic)\
        //             @if($mechanic->hasRole("Mechanic"))\
        //                 <option value="{{ $mechanic->id }}">{{ $mechanic->name . " " . $mechanic->last_name }}</option>\
        //             @endif\
        //         @endforeach\
        //     </select>\
        // </div>\

        $('select').select2({
            minimumResultsForSearch: 1
        });
    });

    $(document).on('click', '.remove-to-do', function() {
        var row = $(this).attr('data-idt');
        // console.log(row);
        $('.appended-to-do-row'+row).remove();
    });

    // looking for vehicles

    $('.search-input').on('keyup', function(e) {

        var vinCode = $('.search-input').val();
        var type = $('#select_type option:selected').val();

        $.ajax({
            type: 'POST',
            url: '/orders/get-similar-vehicle',
            data: {vinCode: vinCode, type: type},
            beforeSend: function() {

            },
            success: function(data) {

                $('#search-results').empty();

                if(data) {

                    var objects = JSON.parse(data);
                    // console.log(objects);

                    objects.forEach(function(i, v) {

                        // console.log(i, v);

                        var id = i['id'];

                        if(i['pictures'] != null) {
                            var firstPic = JSON.parse(i.pictures);
                            // console.log(i['pictures'].shift());
                            var picture = "{{ url('/temporary/parts/') }}" + "/" + id + "/" + firstPic[0];
                        } else {
                            var picture = "{{ url('/temporary/part-placeholder.jpg') }}";
                        }
                        

                        if(!$('.evehicle'+id+'').length) {
                            $('#search-results').append('<div class="d-flex row evehicle'+id+'"><div class="col-md-12 bought-part-hover mt-1" style="height:50px;"> <img src="'+picture+'" style="width:50px;height:50px;">\
                            Model: <b>'+i['model']+'</b>, Make: <b>'+i['make']+'</b>, \
                            Vin Code: <b>'+i['vin_code']+'</b>. \
                            <button class="b-parts-btn btn btn-sm btn-primary" style="float:right;vertical-align:middle;" data-ide="'+id+'">Select this vehicle</button></div></div>')
                        }



                    });

                }

            }
        });

    });

    $(document).on('click', '.b-parts-btn', function(e) {

        e.preventDefault();

        var id = $(this).attr('data-ide');

        if(id) {

            $.ajax({

                type:'POST',
                url: '/orders/add-this-vehicle',
                data: {id: id},
                beforeSend: function() {

                },
                success:function(data) {

                    var obj = JSON.parse(data);

                    if(obj['odometer_before']) {
                        var getOdo = JSON.parse(obj['odometer_before']);
                        var odometer = getOdo.pop();
                    } else {
                        var odometer = obj['odometer_now'];
                    }

                    $('input[name="vin_code"]').val(obj['vin_code']);
                    $('input[name="model"]').val(obj['model']);
                    $('input[name="make"]').val(obj['make']);
                    $('input[name="engine"]').val(obj['engine']);
                    $('input[name="gas_type"]').val(obj['gas_type']);
                    $('input[name="year"]').val(obj['year']);
                    $('input[name="engine_number"]').val(obj['engine_number']);
                    $('input[name="number_plate"]').val(obj['number_plate']);
                    $('input[name="color"]').val(obj['color']);
                    $('input[name="odometer_now"]').val(odometer);
                    $('input[name="company_vehicle_number"]').val(obj['company_vehicle_number']);

                },

            });

            }

    });

    $('#add_more_parts').on('click', function() {

    $('.add_more_parts_rows').append('<div class="appended_part">\
        <div class="mt-3"></div>\
        <div class="pre-form-texts">Part(-s) information <button type="button" data-toggle="tooltip" title="Remove part(-s)" class="cancel_part"><i class="fa fa-times-circle" aria-hidden="true"></i></button></div>\
        <div class="row parts-row">\
            <div class="col-md-2 form-group mt-3">\
                <label for="">Code</label>\
                <div class="mt-2"></div>\
                <input type="text" name="code[]" class="form-control code-autofill" placeholder="">\
            </div>\
            <div class="col-md-2 form-group mt-3">\
                <label for="">Bar Code</label>\
                <div class="mt-2"></div>\
                <input type="text" name="bar_code[]" class="form-control" placeholder="">\
            </div>\
            <div class="col-md-2 form-group mt-3">\
                <label for="">Description</label>\
                <div class="mt-2"></div>\
                <input type="text" name="description[]" class="form-control similar_product" placeholder="" required>\
            </div>\
            <div class="col-md-2 form-group mt-3">\
                <label for="">Instructions</label>\
                <div class="mt-2"></div>\
                <input type="text" name="instructions[]" class="form-control" placeholder="">\
            </div>\
            <div class="col-md-2 form-group mt-3">\
                <label for="">Type</label>\
                <div class="mt-2"></div>\
                <input type="text" name="type[]" class="form-control" placeholder="">\
            </div>\
            <div class="col-md-2 form-group mt-3">\
                <label for="">Model</label>\
                <div class="mt-2"></div>\
                <input type="text" name="model[]" class="form-control" placeholder="">\
            </div>\
            <div class="col-md-2 form-group mt-3">\
                <label for="">Make</label>\
                <div class="mt-2"></div>\
                <input type="text" name="make[]" class="form-control" placeholder="">\
            </div>\
            <div class="col-md-2 form-group mt-3">\
                <label for="">Style</label>\
                <div class="mt-2"></div>\
                <input type="text" name="style[]" class="form-control" placeholder="">\
            </div>\
            <div class="col-md-2 form-group mt-3 mb-3">\
                <label for="">Part Category</label>\
                <div class="mt-2"></div>\
                <input type="text" name="category[]" class="form-control" placeholder="">\
            </div><div class="col-md-12 similar_product_show"></div>\
        </div></div>');
    });

    $(document).ready(function() {
        $('.permissions-select').select2({
            minimumResultsForSearch: 1
        });

        $('select').select2({
            minimumResultsForSearch: 1
        });

        var cType = $("#select_type option:selected").val();
        
        if(cType == 'car') {
            $('.car-window').css('display', 'block');
            $('.truck-window').css('display', 'none');
            $('.trailer-window').css('display', 'none');
            $('.search-input-box').css('display', 'block');

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
            $('.search-input-box').css('display', 'block');
 
            $('.car-window input').each(function(){
                $(this).attr('disabled', 'disabled');
            });
            $('.trailer-window input').each(function(){
                $(this).attr('disabled', 'disabled');
            });

        } else if(cType == 'trailer') {

            $('.car-window').css('display', 'none');
            $('.truck-window').css('display', 'none');
            $('.trailer-window').css('display', 'block');
            $('.search-input-box').css('display', 'block');

            $('.truck-window input').each(function(){
                $(this).attr('disabled', 'disabled');
            });
            $('.car-window input').each(function(){
                $(this).attr('disabled', 'disabled');
            });
            
        } else {
            $('.car-window').css('display', 'none');
            $('.truck-window').css('display', 'none');
            $('.trailer-window').css('display', 'none');
            $('.search-input-box').css('display', 'none');
        }

    });

    $('#select_type').on('change', function() {

        if(this.value == 'car') {
            $('.car-window').css('display', 'block');
            $('.truck-window').css('display', 'none');
            $('.trailer-window').css('display', 'none');
            $('.search-input-box').css('display', 'block');

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
            $('.search-input-box').css('display', 'block');
 
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
            $('.search-input-box').css('display', 'block');

            $('.truck-window input').each(function(){
                $(this).attr('disabled', 'disabled');
            });
            $('.trailer-window input').each(function(){
                $(this).removeAttr('disabled');
            });
            $('.car-window input').each(function(){
                $(this).attr('disabled', 'disabled');
            });
            
        } else {
            $('.car-window').css('display', 'none');
            $('.truck-window').css('display', 'none');
            $('.trailer-window').css('display', 'none');
            $('.search-input-box').css('display', 'none');
        }

    });

</script>

@endsection