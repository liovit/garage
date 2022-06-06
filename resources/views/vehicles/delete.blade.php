@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Work <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/vehicles') }}" class="breadcrumb-style">Vehicles List</a> <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/vehicles/pre-delete/'.$vehicle->id) }}" class="breadcrumb-style">Delete vehicle #{{ $vehicle->id }}</a>
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
                    Delete vehicle {{ $vehicle->id }}
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

            <div class="d-flex text-center align-content-center align-items-center">
                <div class="alert alert-danger col-12 p-custom text-center">Are you sure you want to permanently delete this vehicle?</div>
            </div>

            <div class="row">
                <div class="col-6 form-group">
                    <form action="{{ url('/work/vehicles/delete/'.$vehicle->id) }}" method="post">
                        @csrf
                        <button type="submit" class="col-12 btn btn-primary"><i class="fas fa-check-circle"></i> Yes</button>
                    </form>
                </div>
                <div class="col-6 form-group">
                    <a href="{{ url('/work/vehicles') }}" class="col-12 btn btn-primary"><i class="fas fa-times-circle"></i> No</a>
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
    $('#roles-link').addClass("active");
    $('#homeSubmenu').addClass("show");

</script>

@endsection