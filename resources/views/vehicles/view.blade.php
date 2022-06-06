@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Work Related <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/vehicles') }}" class="breadcrumb-style">Vehicles</a> 
        <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/vehicles/'.$vehicle->id) }}" class="breadcrumb-style">View vehicle #{{ $vehicle->id }}</a>
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
                    Viewing vehicle # {{ $vehicle->id }}
                </div>
        
                <div class="card-body" style="margin:0;padding:0;">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                                <tr>
                                    <th style="width:200px;">Vehicle ID</th>
                                    <td field-key='name'>{{ $vehicle->id }}</td>
                                </tr>
                                @if($vehicle->pictures != null)
                                @php $vPics = json_decode($vehicle->pictures); @endphp
                                <tr>
                                    <th>Pictures</th>
                                    <td>
                                        <div class="row">
                                            @foreach($vPics as $pic)
                                                <div class="col-1">
                                                    <img src="{{ url('/temporary/vehicles/'.$vehicle->id.'/'.$pic) }}" data-img-url="{{ url('/temporary/vehicles/'.$vehicle->id.'/'.$pic) }}" class="thumbnail" style="width: 50px; height: 50px; border-radius: 3px;" alt="">
                                                </div>
                                            @endforeach
                                        </div>
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <th>Model</th>
                                    <td>{{ $vehicle->model }}</td>
                                </tr>
                                <tr>
                                    <th>Make</th>
                                    <td>{{ $vehicle->make }}</td>
                                </tr>
                                <tr>
                                    <th>Type</th>
                                    <td>{{ $vehicle->type }}</td>
                                </tr>
                                <tr>
                                    <th>Gas Type</th>
                                    <td>{{ $vehicle->gas_type }}</td>
                                </tr>
                                <tr>
                                    <th>Engine</th>
                                    <td>{{ $vehicle->engine }}</td>
                                </tr>
                                <tr>
                                    <th>Engine Number</th>
                                    <td>{{ $vehicle->engine_number }}</td>
                                </tr>
                                <tr>
                                    <th>Color</th>
                                    <td>{{ $vehicle->color }}</td>
                                </tr>
                                <tr>
                                    <th>Number Plate</th>
                                    <td>{{ $vehicle->number_plate }}</td>
                                </tr>
                                <tr>
                                    <th>Vin Code</th>
                                    <td>{{ $vehicle->vin_code }}</td>
                                </tr>
                                <tr>
                                    <th>Year</th>
                                    <td>{{ $vehicle->year }}</td>
                                </tr>
                                <tr>
                                    <th>Company Number</th>
                                    <td>{{ $vehicle->company_number }}</td>
                                </tr>
                                <tr>
                                    <th>Odometer Now</th>
                                    @if($vehicle->odometer_now)
                                    <td>{{ $vehicle->odometer_now }} miles</td>
                                    @else
                                    <td> - </td>
                                    @endif
                                </tr>
                                <tr>
                                    @php $created_at = Carbon\Carbon::parse($vehicle->created_at); @endphp
                                    <th>Created at</th>
                                    <td>{{ $created_at->format('Y-m-d') }}</td>
                                </tr>
                                <tr>
                                    @php $updated_at = Carbon\Carbon::parse($vehicle->updated_at); @endphp
                                    <th>Last updated at</th>
                                    <td>{{ $updated_at->format('Y-m-d H:m:s') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

            
            <div class="mt-3"></div>

            <div class="card card-custom">
                <div class="card-header card-header-custom">
                    Orders History
                </div>
        
                <div class="card-body" style="margin:2px;padding:2px;">
                    <div class="row">
                        <div class="col-md-12">
                            @if(count($history) != 0)
                            <table class="table table-bordered table-striped text-center" style="margin-bottom: 0;">
                                
                                <thead>
                                    <tr>
                                        <th>Order id</th>
                                        @if($vehicle->odometer_now)<th>Odometer</th>@endif
                                        <th>Action</th>
                                    </tr>
                                </thead>
            
                                <tbody>
            
                                    @foreach($history as $h)    
                                    <tr>
                                        <td> {{ $h->id }} </td>
                                        @if($vehicle->odometer_now)<td> {{ $h->order_end_odometer }} miles </td>@endif
                                        <td>
                                            <button type="button" data-ide="{{ $h->id }}" class="history-details add-to-do btn btn-info btn-sm">View detailed</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>

                            </table>
                            @else
                                <div style="padding: 10px;"><b style="letter-spacing: 0.3px;color:rgb(187, 65, 65);">No completed orders associated with this vehicle have been found</b></div>
                            @endif
                        </div>
                    </div>

                </div>
            </div>

            <div class="modal fade" id="viewdetails" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title order-md-title" id="modalLabel">Order</h5>
                            <button type="button" class="close" data-dismiss="modal" data-toggle='tooltip' title='Close' aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="col-12 history-box">

                            </div>
                            
                        </div>
                        <div class="modal-footer">
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade bd-example-modal-lg-pictures" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="padding: 12px;">
        
                        <div class="mt-2"></div>
        
                        <div class="col-12">
                            <img src="" id="not-thumbnail" style="width:100%;" alt="">
                        </div>
        
                    </div>
                </div>
            </div>

            <div class="mt-3"></div>

            <a href="{{ url('/work/vehicles') }}" style="float:right;" class="btn btn-primary"><i class="fas fa-caret-square-left"></i> Back to vehicles list</a>

        </div>
    </div>

@endsection

@section('scripts')

<script>
    $('.components > li').each(function() {
        $(this).removeClass("active");
    });

    $('.thumbnail').on('click', function(e) {

        var imgUrl = $(this).attr('data-img-url');
        $('#not-thumbnail').attr('src', imgUrl);

        $('.bd-example-modal-lg-pictures').modal('show');

    });
    
    $('.history-details').on('click', function(e) {
        
        var id = $(this).attr('data-ide');

        $('.order-md-title').html('Order #'+id);

        if(id) {

            $.ajax({

                type:'POST',
                url: '/work/vehicles/get-history',
                data: {id: id},
                beforeSend: function() {

                },
                success:function(data) {

                    var obj = JSON.parse(data);

                    var partObjects = JSON.parse(obj['invoice_data_parts']);
                    var jobObjects = JSON.parse(obj['invoice_data_jobs']);

                    $('.history-box').empty();

                    $('.history-box').append('<div class="row mb-2"><span style="color:rgba(36,54,103,1);font-size:17px;letter-spacing:0.4px;"><b>Parts information</b></span></div>');

                    partObjects.forEach(function(i, v) {

                        $('.history-box').append('<div class="d-flex row mb-1 mt-1"><div class="col-md-12 bought-part-hover">\
                        Part: <b>'+i['part_title']+'</b>, Quantity Used: <b>'+i['quantity']+'</b>, \
                        Unit Cost: <b>$ '+i['unit_cost']+'</b>, Discount: <b>'+i['discount']+' %</b>, \
                        Tax: <b>'+i['taxes']+' %</b>, Tax Cost: <b>$ '+i['tax_cost']+'</b>, Total Cost: <b>$ '+i['total_cost']+'</b>, \
                        Part Added By: <b>'+i['human_who_clicked_save']+'</b>, Part Added At: <b>'+i['date_saved']+'</b>.\
                        </div></div>');

                    });

                    $('.history-box').append('<div class="row mt-2 mb-2"><span style="color:rgba(36,54,103,1);font-size:17px;letter-spacing:0.4px;"><b>Jobs information</b></span></div>');

                    jobObjects.forEach(function(i, v) {

                        $('.history-box').append('<div class="d-flex row mb-1 mt-1"><div class="col-md-12 bought-part-hover">\
                        Job: <b>'+i['job']+'</b>, Worked: <b>'+i['job_hours']+'</b> hours, \
                        Hour Cost: <b>$ '+i['hour_cost']+'</b>, Discount: <b>'+i['discount']+' %</b>, \
                        Tax: <b>'+i['taxes']+' %</b>, Tax Cost: <b>$ '+i['tax_cost']+'</b>, Total Cost: <b>$ '+i['total_cost']+'</b>, \
                        Job Added By: <b>'+i['human_who_clicked_save']+'</b>, Job Added At: <b>'+i['date_saved']+'</b>.\
                        </div></div>');

                    });

                },

            });

        }

        $('#viewdetails').modal('show');

    });
    
    $('#vehicles-link').addClass("active");

</script>

@endsection