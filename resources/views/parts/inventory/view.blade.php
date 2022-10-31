@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Work Related <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/parts/garage') }}" class="breadcrumb-style">Parts Garage</a> <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/parts/'.$part->id) }}" class="breadcrumb-style">View part #{{ $part->id }}</a>
    </div>
@endsection

@section('content-d')

    <div style="margin-top: 20px;"></div>

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
                    View part #{{ $part->id }}
                </div>
                <div class="card-body card-body-custom">
                    <div class="mt-2"></div>

                        <div class="row col-md-12">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary col-12" data-toggle="modal" data-target=".bd-example-modal-lg-pictures">Pictures</button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" class="btn btn-primary col-12 mt-1 mt-md-0" data-toggle="modal" data-target=".bd-example-modal-lg-invoices">Invoices</button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 form-group mt-3 mb-3">
                                <label for="">Code</label>
                                <input type="text" class="form-control" name="code" value="{{ $part->code }}">
                            </div>
                            <div class="col-md-4 form-group mt-3 mb-3">
                                <label for="">UOM</label>
                                <input type="text" class="form-control" name="uom">
                            </div>
                            <div class="col-md-4 form-group mt-3 mb-3">
                                <label for="">Bar Code</label>
                                <input type="text" class="form-control" name="bar_code" value="{{ $part->bar_code }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group mt-1 mb-3">
                                <label for="">Description</label>
                                <input type="text" class="form-control" name="description" value="{{ $part->description }}">
                            </div>
                            <div class="col-md-4 form-group mt-1 mb-3">
                                <label for="">Model</label>
                                <input type="text" class="form-control" name="model" value="{{ $part->model }}">
                            </div>
                            <div class="col-md-4 form-group mt-1 mb-3">
                                <label for="">Category</label>
                                <input type="text" class="form-control" name="category" value="{{ $part->category }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group mt-1 mb-3">
                                <label for="">Make</label>
                                <input type="text" class="form-control" name="make" value="{{ $part->make }}">
                            </div>
                            <div class="col-md-4 form-group mt-1 mb-3">
                                <label for="">Type</label>
                                <input type="text" class="form-control" name="type" value="{{ $part->type }}">
                            </div>
                            <div class="col-md-4 form-group mt-1 mb-3">
                                <label for="">Style</label>
                                <input type="text" class="form-control" name="style" value="{{ $part->style }}">
                            </div>
                        </div>

                        <div class="row">

                            <div class="mt-3"></div>
                            
                            <div class="col-md-12 form-group mt-1">

                                <a href="#" class="inventory-btn pre-form-texts atexts">Inventory</a>
                                <a href="#" class="purchasing-btn pre-form-texts atexts ml-4">Purchasing</a>
                                <a href="#" class="accounting-btn pre-form-texts atexts ml-4">Accounting</a>

                                <div class="card card-custom inventory-window mt-1">
                
                                    <div class="card-body" style="background-color:rgb(241, 240, 240); padding: 12px;">

                                        <div class="row mb-3 mt-2">
                                            <div class="col-md-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="inventory" value="1" id="flexCheckDefault" @if($part->inventory == 1) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-top: 4px;">Inventory?</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="tire" value="1" id="flexCheckDefault" @if($part->tire == 1) checked @endif>
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-top: 4px;">Tire?</label>
                                                </div>
                                            </div>
                                            <div class="col-md-1">
                                                <span style="font-size: 14px;font-weight:500;">On Hand</span>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" class="form-control" name="on_hand" value="{{ $part->on_hand }}" step="1.00" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)">
                                            </div>
                                            <div class="col-md-1">
                                                <span style="font-size: 14px;font-weight:500;">Returns</span>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="number" class="form-control" name="returns" value="{{ $part->returns }}" step="1.00" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)">
                                            </div>
                                        </div>

                                        <div class="row mb-2 mt-2">

                                            <div class="col-md-2 form-group">
                                                <label for="">Min. on hand</label>
                                                <input type="number" class="form-control" name="min_on_hand" value="{{ $part->min_on_hand }}" step="1.00" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)">
                                            </div>

                                            <div class="col-md-2 form-group">
                                                <label for="">Min. order</label>
                                                <input type="number" class="form-control" name="min_order" step="1.00" value="{{ $part->min_order }}" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)">
                                            </div>

                                            <div class="col-md-2 form-group">
                                                <label for="">On order</label>
                                                <input type="number" class="form-control" name="on_order" step="1.00" value="{{ $part->on_order }}" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)">
                                            </div>

                                            <div class="col-md-2 form-group">
                                                <label for="">Mounted</label>
                                                <input type="number" class="form-control" name="mounted" step="1.00" value="{{ $part->mounted }}" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)">
                                            </div>

                                            <div class="col-md-2 form-group">
                                                <label for="">Scrapped</label>
                                                <input type="number" class="form-control" name="scrapped" step="1.00" value="{{ $part->scrapped }}" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)">
                                            </div>

                                        </div>

                                        <div class="table-responsive mt-2" style="overflow: scroll;">
                                            <table id="parts_table" class="table display table-hover table-striped" style="width:100%;">
                    
                                                <thead>
                                                    <tr>
                                                        <th>Garage</th>
                                                        <th>Stocked in</th>
                                                        <th>On Hand</th>
                                                        <th>Min. On Hand</th>
                                                        <th>On Order</th>
                                                        <th>Return</th>
                                                        <th>Mounted</th>
                                                        <th>Scrapped</th>
                                                    </tr>
                                                </thead>
                    
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $part->garage_location }}</td>
                                                        <td> - </td>
                                                        <td>{{ $part->on_hand }}</td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                        <td> - </td>
                                                    </tr>
                                                </tbody>
                    
                                            </table>
                                        </div>

                                    </div>
                                </div>

                                <div class="card card-custom purchasing-window mt-1">
                
                                    <div class="card-body" style="background-color:rgb(241, 240, 240); padding: 12px;">

                                        <span class="pre-form-texts" style="font-size:16px;">Supplier</span>

                                        <div class="table-responsive mt-2" style="overflow: scroll;">
                                            <table id="parts_table" class="table display table-hover table-striped" style="width:100%;">
                    
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Company</th>
                                                        <th>Last Cost</th>
                                                        <th>Product #</th>
                                                    </tr>
                                                </thead>
                    
                                                <tbody>
                                                    <tr>
                                                        @if($part->supplier_id)
                                                        <td> {{ $supplier->id }} </td>
                                                        @else
                                                        <td> - </td>
                                                        @endif
                                                        @if($part->supplier_id)
                                                        <td> {{ $supplier->supplier_company }} </td>
                                                        @else
                                                        <td> - </td>
                                                        @endif
                                                        <td> {{ $part->prices }} </td>
                                                        <td> {{ $part->product_no }} </td>
                                                    </tr>
                                                </tbody>
                    
                                            </table>
                                        </div>

                                        <div class="mt-2"></div>

                                        <span class="pre-form-texts" style="font-size:16px;">Warranty</span>

                                        <div class="mt-2"></div>

                                        <div class="row">

                                            <div class="col-md-1">
                                                <label for="">Interval</label>
                                            </div>

                                            <div class="col-md-2">
                                                <input type="number" class="form-control" name="warranty_interval" value="{{ $part->warranty_interval }}" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)">
                                            </div>

                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio2" name="warranty_interval_type"  value="1" class="custom-control-input" @if($part->warranty_interval_type == 1) checked @endif>
                                                    <label class="custom-control-label" for="customRadio2">KM</label>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio3" name="warranty_interval_type" value="2" class="custom-control-input" @if($part->warranty_interval_type == 2) checked @endif>
                                                    <label class="custom-control-label" for="customRadio3">Miles</label>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio4" name="warranty_interval_type" value="3" class="custom-control-input" @if($part->warranty_interval_type == 3) checked @endif>
                                                    <label class="custom-control-label" for="customRadio4">Hours</label>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio5" name="warranty_interval_type" value="0" class="custom-control-input" @if($part->warranty_interval_type == 0) checked @endif>
                                                    <label class="custom-control-label" for="customRadio5">N/A</label>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mt-2">

                                            <div class="col-md-1">
                                                <label for="">Default</label>
                                            </div>

                                            <div class="col-md-2">
                                                <input type="number" class="form-control" name="warranty_interval_default" value="{{ $part->warranty_interval_default }}" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)">
                                            </div>

                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio6" name="warranty_interval_default_type" value="1" @if($part->warranty_interval_default_type == 1) checked @endif class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio6">Days</label>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio7" name="warranty_interval_default_type" value="2" @if($part->warranty_interval_default_type == 2) checked @endif class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio7">Week</label>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio8" name="warranty_interval_default_type" value="3" @if($part->warranty_interval_default_type == 3) checked @endif class="custom-control-input">
                                                    <label class="custom-control-label" for="customRadio8">Month</label>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <div class="card card-custom accounting-window mt-1">
                
                                    <div class="card-body" style="background-color:rgb(241, 240, 240); padding: 12px;">

                                        <span class="pre-form-texts" style="font-size:16px;">Cost</span>

                                        <div class="row form-group mt-2">
                                            <div class="col-md-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio9" name="costing_method" value="1" class="custom-control-input" @if($part->costing_method == 1) checked @endif>
                                                    <label class="custom-control-label" for="customRadio9">Last / Recent</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="">Last cost</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" class="form-control" name="last_cost" value="{{ $part->last_cost }}" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)">
                                            </div>
                                        </div>

                                        <div class="row form-group mt-2">
                                            <div class="col-md-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio10" name="costing_method" value="2" class="custom-control-input" @if($part->costing_method == 2) checked @endif>
                                                    <label class="custom-control-label" for="customRadio10">Standard</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="">Standard cost</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" class="form-control" name="standard_cost" value="{{ $part->standard_cost }}" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)">
                                            </div>
                                        </div>

                                        <div class="row form-group mt-2">
                                            <div class="col-md-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio11" name="costing_method" value="3" class="custom-control-input" @if($part->costing_method == 3) checked @endif>
                                                    <label class="custom-control-label" for="customRadio11">Average</label>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="">Average cost</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" class="form-control" name="average_cost" value="{{ $part->average_cost }}" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)">
                                            </div>
                                        </div>

                                        <div class="mt-2"></div>

                                        <span class="pre-form-texts" style="font-size:16px;">Charge base</span>

                                        <div class="row form-group mt-2">
                                            <div class="col-md-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio12" name="charge_base" value="1" class="custom-control-input" @if($part->charge_base == 1) checked @endif>
                                                    <label class="custom-control-label" for="customRadio12">List</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" class="form-control" name="charge_base_list" value="{{ $part->charge_base_list }}" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)">
                                            </div>
                                        </div>

                                        <div class="row form-group mt-2">
                                            <div class="col-md-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio13" name="charge_base" value="2" class="custom-control-input" @if($part->charge_base == 2) checked @endif>
                                                    <label class="custom-control-label" for="customRadio13">Cost +%</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" class="form-control" name="charge_base_cost" value="{{ $part->charge_base_cost }}" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)">
                                            </div>
                                        </div>

                                        <div class="row form-group mt-2">
                                            <div class="col-md-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio14" name="charge_base" value="3" class="custom-control-input" @if($part->charge_base == 3) checked @endif>
                                                    <label class="custom-control-label" for="customRadio14">List -%</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" class="form-control" name="charge_base_list_minus" value="{{ $part->charge_base_list_minus }}" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)">
                                            </div>
                                        </div>

                                        <div class="row form-group mt-2">
                                            <div class="col-md-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio15" name="charge_base" value="4" class="custom-control-input" @if($part->charge_base == 4) checked @endif>
                                                    <label class="custom-control-label" for="customRadio15">Price A</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" class="form-control" name="charge_base_price_a" value="{{ $part->charge_base_price_a }}" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)">
                                            </div>
                                        </div>

                                        <div class="row form-group mt-2">
                                            <div class="col-md-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio16" name="charge_base" value="5" class="custom-control-input" @if($part->charge_base == 5) checked @endif>
                                                    <label class="custom-control-label" for="customRadio16">Price B</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" class="form-control" name="charge_base_price_b" value="{{ $part->charge_base_price_b }}" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)">
                                            </div>
                                        </div>

                                        <div class="row form-group mt-2">
                                            <div class="col-md-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio17" name="charge_base" value="6" class="custom-control-input" @if($part->charge_base == 6) checked @endif>
                                                    <label class="custom-control-label" for="customRadio17">Price C</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" class="form-control" name="charge_base_price_c" value="{{ $part->charge_base_price_c }}" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)">
                                            </div>
                                        </div>

                                        <div class="row form-group mt-2">
                                            <div class="col-md-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio18" name="charge_base" value="7" class="custom-control-input" @if($part->charge_base == 7) checked @endif>
                                                    <label class="custom-control-label" for="customRadio18">Price D</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" class="form-control" name="charge_base_price_d" value="{{ $part->charge_base_price_d }}" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)">
                                            </div>
                                        </div>

                                        <div class="row form-group mt-2">
                                            <div class="col-md-3">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="customRadio19" name="charge_base" value="8" class="custom-control-input" @if($part->charge_base == 8) checked @endif>
                                                    <label class="custom-control-label" for="customRadio19">Price E</label>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="number" class="form-control" name="charge_base_price_e" value="{{ $part->charge_base_e }}" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)">
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="mt-3 mb-2"></div>

                </div>
                
            </div>

            <div class="row mt-3">
                <div class="col-md-12">
                    {{-- <button type="button" style="float:right;" class="col-md-12 btn btn-primary btn-primary-second"><i class="fas fa-caret-square-left"></i> Go back to customers list</button> --}}
                    <a href="{{ url('/work/parts/garage') }}" style="float:right;" class="btn btn-primary"><i class="fas fa-caret-square-left"></i> Back to parts list</a>
                </div>
            </div>

        </div>
    </div>

    @if($part->pictures != null)
        @php $pics = json_decode($part->pictures); @endphp
        @php $bnumber = 0; @endphp
        @foreach($pics as $pic)

        @php $bnumber++; @endphp

        <div class="modal fade bd-example-modal-lg-pic{{ $bnumber }}" tabindex="-1" role="dialog" aria-labelledby="bb" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content" style="padding: 12px;">
                    <img src="{{ url('/temporary/parts/'.$part->id.'/'.$pic) }}" alt="" style="width: 100%; max-height: 600px; border-radius: 3px;">
                </div>
            </div>
        </div>

        @endforeach
    @endif

    <div class="modal fade bd-example-modal-lg-pictures" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding: 12px;">

                <div class="mt-2"></div>

                @if($part->pictures != null)
                <div class="row">
                    @php $rnumber = 0; @endphp
                    @foreach($pics as $pic)
                    @php $rnumber++; @endphp
                        <div class="col-md-2 text-center">
                            <a href="#" class="pic-view" data-toggle="modal" data-target=".bd-example-modal-lg-pic{{ $rnumber }}">
                                <img src="{{ url('/temporary/parts/'.$part->id.'/'.$pic) }}" alt="" style="width: 120px; height: 120px; border-radius: 3px;">
                            </a>
                        </div>
                    @endforeach
                </div>
                @else
                    There are no pictures added.
                @endif

                <div class="mt-2"></div>

            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg-invoices" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding: 12px;">

                <div class="mt-3"></div>
                
                @if($part->invoices != null)
                <div class="table-responsive mt-2" style="overflow: scroll;">
                    <table id="parts_table" class="table display table-hover table-striped" style="width:100%;font-family: Roboto;">

                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Upload date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @php $i = 0; 
                            $invs = json_decode($part->invoices); @endphp
                        <tbody>
                            @foreach($invs as $inv)
                            @php $invoice = \App\Models\Invoice::find($inv); @endphp
                            <tr>
                                @php $i++; @endphp
                                <td> {{ $i }} </td>
                                <td> {{ $invoice->created_at }} </td>
                                <td> <a href="{{ url('/temporary/parts/'.$part->id.'/'.$invoice->invoice_url) }}" download> Download </a> </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                @else
                There are no invoices added.
                @endif

                <div class="mt-2"></div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')

<script>

    $('.components > li').each(function() {
        $(this).removeClass("active");
    });

    $('#partSubmenu').addClass("show");
    $('#parts-garage').addClass("active");

    function checkForNull($string) {
        if($string == null) {
            return '';
        } else {
            return $string;
        }
    }

    $('.pic-view').on('click', function(e) {
        $('.bd-example-modal-lg-pictures').modal('hide');
    });

    $('.inventory-btn').on('click', function(e) {
        e.preventDefault();
        $('.inventory-window').css('display', 'block');
        $('.purchasing-window').css('display', 'none');
        $('.accounting-window').css('display', 'none');
        $('.inventory-btn').css('color', '#000');
        $('.purchasing-btn').css('color', 'rgb(92, 92, 92)');
        $('.accounting-btn').css('color', 'rgb(92, 92, 92)');
    });

    $('.purchasing-btn').on('click', function(e) {
        e.preventDefault();
        $('.purchasing-window').css('display', 'block');
        $('.accounting-window').css('display', 'none');
        $('.inventory-window').css('display', 'none');
        $('.inventory-btn').css('color', 'rgb(92, 92, 92)');
        $('.purchasing-btn').css('color', '#000');
        $('.accounting-btn').css('color', 'rgb(92, 92, 92)');
    });

    $('.accounting-btn').on('click', function(e) {
        e.preventDefault();
        $('.purchasing-window').css('display', 'none');
        $('.accounting-window').css('display', 'block');
        $('.inventory-window').css('display', 'none');
        $('.inventory-btn').css('color', 'rgb(92, 92, 92)');
        $('.purchasing-btn').css('color', 'rgb(92, 92, 92)');
        $('.accounting-btn').css('color', '#000');
    });

    $(document).ready(function() {
        $('.email-select').select2();
        $('#bought-parts').select2();
        $('.inventory-btn').css('color', '#000');
        $('.purchasing-window').css('display', 'none');
        $('.accounting-window').css('display', 'none');

        $('input').each(function() {
            $(this).attr('disabled', 'disabled');
        });

        $('textarea').attr('disabled', 'disabled');

        $('.rrinputs').each(function() {
            $(this).removeAttr('disabled');
        });

    });

</script>

@endsection
