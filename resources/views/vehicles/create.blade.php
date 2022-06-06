@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Work <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/vehicles') }}" class="breadcrumb-style">Vehicles</a> <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/vehicles/create') }}" class="breadcrumb-style">Create new vehicle</a>
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
                  Create new vehicle
                </div>
                <div class="card-body card-body-custom">
                    <div class="mt-2"></div>
                    <form action="{{ url('/work/vehicles/confirm-creation') }}" enctype="multipart/form-data" method="post" autocomplete="off">
                        @csrf

                            <div class="pre-form-texts">Vehicle information</div>

                            <div class="row">
                                <div class="col-md-12 form-group mt-3">
                                    <label for="">Type</label>
                                    <select name="type" class="form-control" id="select_type" required>
                                        <option value="none" selected disabled>Select type</option>
                                        <option value="car">Car</option>
                                        <option value="truck">Truck</option>
                                        <option value="trailer">Trailer</option>
                                    </select>
                                </div>
                            </div>

                            <div class="truck-window" style="display:none;">
                                <div class="row mt-3 mb-3">
                                    <div class="col-md-4 form-group mt-3">
                                        <label for="">VIN</label>
                                        <input type="text" name="vin_code" class="form-control" required>
                                    
                                    </div>
                                    <div class="col-md-4 form-group mt-3">
                                        <label for="">Model</label>
                                        <input type="text" name="model" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 form-group mt-3">
                                        <label for="">Make</label>
                                        <input type="text" name="make" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 form-group mt-1">
                                        <label for="">Engine</label>
                                        <input type="text" name="engine" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 form-group mt-1">
                                        <label for="">Engine Number</label>
                                        <input type="text" name="engine_number" class="form-control">
                                    </div>
                                    <div class="col-md-4 form-group mt-1">
                                        <label for="">Gas Type</label>
                                        <input type="text" name="gas_type" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 form-group mt-1">
                                        <label for="">Year</label>
                                        <input type="text" name="year" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 form-group mt-1">
                                        <label for="">Truck number (company)</label>
                                        <input type="text" name="company_vehicle_number" class="form-control">
                                    </div>
                                    <div class="col-md-4 form-group mt-1">
                                        <label for="">Number plate</label>
                                        <input type="text" name="number_plate" class="form-control"required>
                                    </div>
                                    <div class="col-md-4 form-group mt-1">
                                        <label for="">Color</label>
                                        <input type="text" name="color" class="form-control" >
                                    </div>
                                    <div class="col-md-4 form-group mt-1">
                                        <label for="">Odometer</label>
                                        <input type="text" name="odometer_now" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="car-window" style="display:none;">
                                <div class="row mt-3 mb-3">
                                    <div class="col-md-4 form-group mt-3">
                                        <label for="">VIN</label>
                                        <input type="text" name="vin_code" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 form-group mt-3">
                                        <label for="">Model</label>
                                        <input type="text" name="model" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 form-group mt-3">
                                        <label for="">Make</label>
                                        <input type="text" name="make" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 form-group mt-1">
                                        <label for="">Engine</label>
                                        <input type="text" name="engine" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 form-group mt-1">
                                        <label for="">Engine Number</label>
                                        <input type="text" name="engine_number" class="form-control">
                                    </div>
                                    <div class="col-md-4 form-group mt-1">
                                        <label for="">Gas Type</label>
                                        <input type="text" name="gas_type" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 form-group mt-1">
                                        <label for="">Year</label>
                                        <input type="text" name="year" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 form-group mt-1">
                                        <label for="">Car number (company)</label>
                                        <input type="text" name="company_vehicle_number" class="form-control">
                                    </div>
                                    <div class="col-md-4 form-group mt-1">
                                        <label for="">Number plate</label>
                                        <input type="text" name="number_plate" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 form-group mt-1">
                                        <label for="">Color</label>
                                        <input type="text" name="color" class="form-control">
                                    </div>
                                    <div class="col-md-4 form-group mt-1">
                                        <label for="">Odometer</label>
                                        <input type="text" name="odometer_now" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="trailer-window" style="display:none;">
                                <div class="row mt-3 mb-3">
                                    <div class="col-md-4 form-group mt-3">
                                        <label for="">VIN</label>
                                        <input type="text" name="vin_code" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 form-group mt-3">
                                        <label for="">Model</label>
                                        <input type="text" name="model" class="form-control">
                                    </div>
                                    <div class="col-md-4 form-group mt-3">
                                        <label for="">Make</label>
                                        <input type="text" name="make" class="form-control">
                                    </div>
                                    <div class="col-md-4 form-group mt-1">
                                        <label for="">Year</label>
                                        <input type="text" name="year" class="form-control">
                                    </div>
                                    <div class="col-md-4 form-group mt-1">
                                        <label for="">Trailer number (company)</label>
                                        <input type="text" name="company_vehicle_number" class="form-control">
                                    </div>
                                    <div class="col-md-4 form-group mt-1">
                                        <label for="">Number plate</label>
                                        <input type="text" name="number_plate" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 form-group mt-1">
                                        <label for="">Color</label>
                                        <input type="text" name="color" class="form-control">
                                    </div>
                                </div>
                            </div>

                        <div class="row mb-3">
                            <div class="custom-file">
                                <label for="">Select picture(-s) to upload</label>
                                <input type="file" name="file[]" class="custom-file-input form-control" multiple required>
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

        </div>
    </div>

@endsection

@section('scripts')

<script>
    
    $('.components > li').each(function() {
        $(this).removeClass("active");
    });
    $('#vehicles-link').addClass("active");

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