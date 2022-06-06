@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Work <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/vehicles') }}" class="breadcrumb-style">Vehicles</a> <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/vehicles/edit/'.$vehicle->id) }}" class="breadcrumb-style">Edit vehicle #{{ $vehicle->id }}</a>
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

    <div class="row">
        {{-- pl-13 pr-27 content-row  --}}
        <div class="col-md-12 pl-13 pr-27 content-row">

            <div class="card card-custom">
                <div class="card-header card-header-custom">
                  Edit vehicle #{{ $vehicle->id }}
                </div>
                <div class="card-body card-body-custom">
                    <div class="mt-2"></div>
                    <form action="{{ url('/work/vehicles/update/'.$vehicle->id) }}" enctype="multipart/form-data" method="post" autocomplete="off">
                        @csrf

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
                                        {{-- @if($vehicle->odometer_before != null)
                                            <div class="col-md-4 form-group mt-1">
                                                <label for="">Odometer</label>
                                                <input type="text" name="odometer_now" class="form-control" @if($vehicle) value="{{ $vehicle->odometer_before }}" @endif>
                                            </div>
                                        @else
                                        <div class="col-md-4 form-group mt-1">
                                            <label for="">Odometer</label>
                                            <input type="text" name="odometer_now" class="form-control" @if($vehicle) value="{{ $vehicle->odometer_now }}" @endif>
                                        </div>
                                        @endif --}}
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

                        @if($vehicle->pictures != null)
                        @php $vPics = json_decode($vehicle->pictures); @endphp
                            <div class="row mt-3 mb-3">
                                <div class="pre-form-texts">Pictures</div>
                                @foreach($vPics as $pic)
                                <div class="col-2">
                                    <img src="{{ url('/temporary/vehicles/'.$vehicle->id.'/'.$pic) }}" data-img-id="{{ $pic }}" data-img-url="{{ url('/temporary/vehicles/'.$vehicle->id.'/'.$pic) }}" class="thumbnail" style="width: 100px; height: 100px; border-radius: 3px;" alt="">
                                </div>
                                @endforeach
                            </div>
                        @endif

                        <div class="row mb-3">
                            <div class="custom-file">
                                <label for="">Select picture(-s) to upload</label>
                                <input type="file" name="file[]" class="custom-file-input form-control" multiple>
                            </div>
                        </div>

                        <div class="mt-3"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" style="float:right;" class="col-md-12 btn btn-primary btn-primary-second">Confirm <i class="fas fa-check"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal fade bd-example-modal-lg-pictures" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="padding: 12px;">
        
                        <div class="mt-2"></div>

                        <form action="{{ url('/work/vehicles/edit/'.$vehicle->id.'/delete-picture') }}" method="post">
                            @csrf
                            <div class="col-12">
                                <img src="" id="not-thumbnail" style="width:100%;" alt="">
                                <input type="hidden" id="picture_id" name="picture">
                            </div>
                            <div class="row mt-2">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-danger col-12">Delete</button>
                                </div>
                                <div class="col-6">
                                    <button type="button" class="btn btn-dark col-12 close-pics-modal">Close</button>
                                </div>
                            </div>
                        </form>
        
                    </div>
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
    $('#vehicles-link').addClass("active");

    $('.thumbnail').on('click', function(e) {

        var imgUrl = $(this).attr('data-img-url');
        var imgId = $(this).attr('data-img-id');
        $('#not-thumbnail').attr('src', imgUrl);

        $('#picture_id').val(imgId);

        $('.bd-example-modal-lg-pictures').modal('show');

    });

    $('.close-pics-modal').on('click', function() {
        $('.bd-example-modal-lg-pictures').modal('hide');
    });

    $(document).ready(function() {

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
            $('.car-window').css('display', 'block'); $('.truck-window').css('display', 'none'); $('.trailer-window').css('display', 'none');

            $('.truck-window input').each(function(){ $(this).attr('disabled', 'disabled'); });
            $('.car-window input').each(function(){ $(this).removeAttr('disabled'); });
            $('.trailer-window input').each(function(){ $(this).attr('disabled', 'disabled'); });

        } else if(this.value == 'truck') {

            $('.car-window').css('display', 'none'); $('.truck-window').css('display', 'block'); $('.trailer-window').css('display', 'none'); 

            $('.car-window input').each(function(){ $(this).attr('disabled', 'disabled'); });
            $('.truck-window input').each(function(){ $(this).removeAttr('disabled'); });
            $('.trailer-window input').each(function(){ $(this).attr('disabled', 'disabled'); });

        } else if(this.value == 'trailer') {

            $('.car-window').css('display', 'none'); $('.truck-window').css('display', 'none'); $('.trailer-window').css('display', 'block');

            $('.truck-window input').each(function(){ $(this).attr('disabled', 'disabled'); });
            $('.trailer-window input').each(function(){ $(this).removeAttr('disabled'); });
            $('.car-window input').each(function(){ $(this).attr('disabled', 'disabled'); });
            
        } else {
            $('.car-window').css('display', 'none'); $('.truck-window').css('display', 'none'); $('.trailer-window').css('display', 'none');
        }

    });

</script>

@endsection