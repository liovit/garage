@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Work <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/vehicles') }}" class="breadcrumb-style">Vehicles List</a>
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
    
    <div class="row pl-13 col-12 content-row">
        <button id="vehicle_create" class="mb-4 btn btn-primary"><i class="fas fa-plus-square"></i> Add new car</button>
    </div>

    <div class="row">
        {{-- pl-13 pr-27 content-row  --}}
        <div class="col-md-12 pl-13 pr-27 content-row">

            <div class="table-responsive">

                <table id="vehicles_table" class="table display" style="width:100%;">

                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Model</th>
                            <th>Make</th>
                            <th>Type</th>
                            <th>Number plate</th>
                            <th>Vin</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($vehicles as $vehicle)    
                        <tr>
                            <td> {{ $vehicle->id }} </td>
                            <td> {{ $vehicle->model }} </td>
                            <td> {{ $vehicle->make }} </td>
                            <td style="text-transform: uppercase;"> {{ $vehicle->type }} </td>
                            <td> {{ $vehicle->number_plate }} </td>
                            <td> {{ $vehicle->vin_code }} </td>
                            <td> 
                                @canany(['vehicles.view', 'everything'])<a href="{{ url('/work/vehicles/'.$vehicle->id) }}" class="action-btn" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a>@endcanany
                                @canany(['vehicles.edit', 'everything'])<a href="{{ url('/work/vehicles/edit/'.$vehicle->id) }}" class="action-btn ml-2" data-toggle="tooltip" title="Edit"><i class="fas fa-user-edit"></i></a>@endcanany
                                @canany(['vehicles.delete', 'everything'])<a href="{{ url('/work/vehicles/pre-delete/'.$vehicle->id) }}" class="action-btn ml-2" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>@endcanany
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>

                </table>
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

    $(document).ready( function () {
        // $('#homeSubmenu').addClass("show");
        $('#vehicles_table').DataTable({
            dom: '<"top"<"left-col"l><"center-col"B><"right-col"f>>rtip',
            colReorder: true,
            stateSave: true,
            buttons: [
                'colvis',
            ]
        });
    } );

    $('#vehicle_create').click(function() {
        window.location.href = "{{ url('/work/vehicles/create') }}";
    });

</script>

@endsection