@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Work Related <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/orders') }}" class="breadcrumb-style">Orders</a> 
        <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/orders/edit/'.$order->id) }}" class="breadcrumb-style">Edit order #{{ $order->id }}</a>
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
                    Edit order # {{ $order->id }}
                </div>
        
                <div class="card-body" style="">
                    <div class="row">

                        <div class="pre-form-texts">Order information</div>

                        @if($order->order_fill_status >= 6)

                            <form action="{{ url('/work/orders/update/'.$order->id) }}" enctype="multipart/form-data" method="post">
                                
                                @csrf

                                <div class="col-md-12 form-group mt-3">
                                    <label for="">Order status</label>
                                    <select name="order_fill_status" class="form-control" id="">
                                        <option value="6" @if($order->order_fill_status == 6) selected @endif>Billing</option>
                                        <option value="7" @if($order->order_fill_status == 7) selected @endif>Completed</option>
                                    </select>
                                </div>

                                <div class="mt-3"></div>

                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" name="action" value="update_status" style="float:right;" class="col-12 btn btn-primary btn-primary-second">Update <i class="fas fa-check"></i></button>
                                    </div>
                                </div>

                            </form>
            
                        @else

                        <form action="{{ url('/work/orders/update/'.$order->id) }}" enctype="multipart/form-data" method="post">
                        @csrf

                        <div class="col-md-12 form-group mt-3">
                            <label for="">Customer</label>
                            <div class="mt-2"></div>
                            <select class="permissions-select form-control" name="customer_id">
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" @if($order->customer_id == $customer->id) selected @endif>{{ $customer->name }}</option>
                                @endforeach
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
                                    <option value="" @if($vehicle == null) selected disabled @endif>Select type</option>
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
                                                        <option value="true" @if($tbd->status == true) selected @endif>Yes</option>
                                                        <option value="false" @if($tbd->status == false) selected @endif>No</option>
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
                        <div class="col-md-12">
                            <button type="button" style="float:right;" data-toggle="modal" data-target="#addjob" class="add-to-do btn btn-info btn-sm">Add job</button>
                        </div>
                        <div class="col-md-12 form-group mt-3">
                            <div id="to_be_done" class="mt-2 mb-3">

                                <div class="table-responsive mt-2" style="overflow: scroll;">
                                    <table id="jobs_table" class="table display table-hover table-striped" style="width:100%;">
            
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">Mechanic</th>
                                                <th style="text-align:center;">Job</th>
                                                <th style="text-align:center;">Hours</th>
                                                <th style="text-align:center;">Cost</th>
                                                <th style="text-align:center;">Action</th>
                                            </tr>
                                        </thead>
            
                                        <tbody>
                                            @if($order->done_jobs)
                                            @php $doneJobs = json_decode($order->done_jobs); $toBeCount = 20000; $doneJobRows = 0; @endphp

                                                @foreach($doneJobs as $dj)
                                                <tr>
                                                    @php $mechanicName = \App\Models\User::find($dj->mechanic); @endphp
                                                    <td style="text-align:center;">{{ $mechanicName->name . " " . $mechanicName->last_name }}</td>
                                                    <td style="text-align:center;">{{ $dj->job }}</td>
                                                    <td style="text-align:center;">{{ $dj->hours_worked }}</td>
                                                    <td style="text-align:center;">$ {{ $dj->cost }}</td>
                                                    <td style="text-align:center;"><button type="button" class="btn btn-sm btn-primary btn-remove-done-job" data-done_job_id="{{ $doneJobRows }}">Delete</button></td>
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
                        <div class="col-md-12">
                            <button type="button" style="float:right;" data-toggle="modal" data-target="#addpart" class="add-to-do btn btn-info btn-sm">Add part</button>
                        </div>
                        <div class="col-md-12 form-group mt-3">
                            <div id="to_be_done" class="mt-2 mb-3">

                                <div class="table-responsive mt-2" style="overflow: scroll;">
                                    <table id="jobs_table" class="table display table-hover table-striped" style="width:100%;">
            
                                        <thead>
                                            <tr>
                                                <th style="text-align:center;">Part</th>
                                                <th style="text-align:center;">Quantity</th>
                                                <th style="text-align:center;">Unit Cost</th>
                                                <th style="text-align:center;">Total Cost</th>
                                                <th style="text-align:center;">Action</th>
                                            </tr>
                                        </thead>
            
                                        <tbody>
                                            @if($order->used_parts)
                                            @php $usedParts = json_decode($order->used_parts); $usedPartsRow = 0; @endphp

                                                @foreach($usedParts as $up)
                                                <tr>
                                                    @php $partName = \App\Models\Part::find($up->part); @endphp
                                                    <td style="text-align:center;">{{ $partName->description }}</td>
                                                    <td style="text-align:center;">{{ $up->quantity }}</td>
                                                    <td style="text-align:center;">$ {{ $up->cost }}</td>
                                                    <td style="text-align:center;">$ {{ $up->cost * $up->quantity }}</td>
                                                    <td style="text-align:center;"><button type="button" class="btn btn-sm btn-primary btn-remove-used-part" data-part_row="{{ $usedPartsRow }}">Delete</button></td>
                                                    @php $usedPartsRow++; @endphp
                                                </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
            
                                    </table>
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
                                <input type="number" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" name="budget" value="{{ $order->budget }}" class="form-control">
                            </div>
                        </div>

                        @if($customer->email)
                        <div class="mt-3"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pre-form-texts-small" style="font-size:14px;">Would you like to send email to customer (<span style="color:rgb(163, 171, 207);">{{ $customer->email }}</span>) that the order is finished?</div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="email_send" value="yes" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault" style="padding-top: 4px;">Yes</label>
                                </div>
                            </div>
                        </div>
                        @endif

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
                            <button type="submit" name="action" value="save" style="float:right;" class="col-12 btn btn-primary btn-primary-second">Save <i class="fas fa-check"></i></button>
                        </div>
                        <div class="col-6">
                            <button type="submit" name="action" value="confirm" style="float:right;" class="col-12 btn btn-primary btn-primary-second">Confirm order <i class="fas fa-check"></i></button>
                        </div>
                    </div>
                </form>

                </div>
            </div>

            <div class="mt-3"></div>

            <a href="{{ url('/work/orders') }}" style="float:right;" class="btn btn-primary"><i class="fas fa-caret-square-left"></i> Back to orders list</a>

            @endif

        </div>
    </div>


    <div class="modal fade" id="addjob" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Add new job</h5>
                    <button type="button" class="close" data-dismiss="modal" data-toggle='tooltip' title='Close' aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/work/add-job/'.$order->id) }}" method="post" id="job_addition" class="">
                    @csrf
                    <div class="col-md-12">
                        <label for="">Mechanic</label>
                        <select name="mechanic" id="mechanic_select" class="form-control" required>
                            <option value="" selected="selected" disabled>Select a mechanic</option>
                            @foreach($mechanics as $mechanic)
                                @if($mechanic->hasRole('Mechanic'))
                                    <option value="{{ $mechanic->id }}">{{ $mechanic->name . " " . $mechanic->last_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2"></div>
                    <div class="col-md-12">
                        <label for="">Job</label>
                        <textarea name="job_desc" id="job_desc" class="form-control" cols="30" rows="4"></textarea>
                    </div>
                    <div class="mt-2"></div>
                    <div class="col-md-12">
                        <label for="">Hours worked</label>
                        <input type="number" name="hours_worked" id="hours_worked" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle" aria-hidden="true"></i> Add job</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addpart" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Add part</h5>
                    <button type="button" class="close" data-dismiss="modal" data-toggle='tooltip' title='Close' aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/work/add-part/'.$order->id) }}" method="post" id="part_addition" class="">
                    @csrf
                    <div class="col-md-12">
                        <label for="">Select a part</label>
                        <select name="part_id" class="form-control" id="part-selection" required>
                            @foreach($parts as $part)
                            <option value="{{ $part->id }}">
                                Description: <b>{{ $part->description }}</b>, @if($part->code)Code: <b>{{ $part->code }}</b>, @endif
                                @if($part->bar_code)Bar Code: <b>{{ $part->bar_code }}</b>.@endif </option>
                            @endforeach
                        </select>
                        {{-- <textarea name="job_desc" class="form-control" cols="30" rows="4"></textarea> --}}
                    </div>
                    <div class="mt-2"></div>
                    <div class="col-md-12">
                        <label for="">Quantity</label>
                        <input type="number" name="part_quantity" step="1.00" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle" aria-hidden="true"></i> Add part</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="removejob" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Remove job</h5>
                    <button type="button" class="close" data-dismiss="modal" data-toggle='tooltip' title='Close' aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/work/remove-job/'.$order->id) }}" method="post" id="job_removing" class="">
                    @csrf
                    <div class="col-md-12">
                        <input type="hidden" id="remove_job_row" name="remove_job_row" value="">
                        <span>Are you sure you want to delete this job?</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle" aria-hidden="true"></i> Yes</button>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary"><i class="fa fa-check-times" aria-hidden="true"></i> No</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="removepart" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Remove part</h5>
                    <button type="button" class="close" data-dismiss="modal" data-toggle='tooltip' title='Close' aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/work/remove-part/'.$order->id) }}" method="post" id="job_removing" class="">
                    @csrf
                    <div class="col-md-12">
                        <input type="hidden" id="remove_part_row" name="remove_part_row" value="">
                        <span>Are you sure you want to delete this part from the order?</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-check-circle" aria-hidden="true"></i> Yes</button>
                    <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-primary"><i class="fa fa-check-times" aria-hidden="true"></i> No</button>
                </div>
                </form>
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

    // var toDoCount = 0;

    // $('.add-to-do').on('click', function() {
    //     toDoCount++;
    //     $('#to_be_done_list').append('\
    //     <div class="row appended-to-do-row'+toDoCount+'">\
    //         <div class="col-7">\
    //             <input type="text" name="to_be_done[]" class="form-control mt-1" required>\
    //         </div>\
    //         <div class="col-3 mt-1">\
    //             <select name="mechanics[]" id="" class="form-control" required>\
    //                 @if($order->to_be_done == null)\
    //                     <option value="" selected="selected" disabled>Select a mechanic</option>\
    //                 @endif\
    //                 @foreach($mechanics as $mechanic)\
    //                     @if($mechanic->hasRole("Mechanic"))\
    //                         <option value="{{ $mechanic->id }}">{{ $mechanic->name . " " . $mechanic->last_name }}</option>\
    //                     @endif\
    //                 @endforeach\
    //             </select>\
    //         </div>\
    //         <div class="col-2">\
    //             <button type="button" class="btn btn-primary btn-sm mt-1 remove-to-do" style="float:right;" data-idt="'+toDoCount+'">Remove</button>\
    //         </div>\
    //     </div>\
    //     ');
    // });

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
                $(this).removeAttr('disabled');
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
                $(this).removeAttr('disabled');
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
                $(this).removeAttr('disabled');
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
            
        }

    });


</script>

@endsection