@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Work Related <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/equipment') }}" class="breadcrumb-style">Equipment</a>
        <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/equipment/pre-delete/'.$equipment->id) }}" class="breadcrumb-style">Delete Equipment #{{ $equipment->id }}</a>
    </div>
@endsection

@section('content-d')

    <div style="margin-top: 20px;"></div>

    {{-- <div class="row pl-13 col-md-12 content-row">
        <button id="user_create" class="mb-4 btn btn-primary"><i class="fas fa-plus-square"></i> Add new entry</button>
    </div> --}}

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
                    Delete equipment #{{ $equipment->id }}
                </div>

                <div class="card-body" style="margin:0;padding:0;">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                                <div class="mt-2"></div>
                                <span class="table-title">Equipment information</span>
                                <tr>
                                    <th style="width:200px;">ID</th>
                                    <td field-key='name'>{{ $equipment->id }}</td>
                                </tr>
                                <tr>
                                    <th>Title</th>
                                    <td>{{ $equipment->title }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $equipment->description }}</td>
                                </tr>
                                <tr>
                                    <th>Type</th>
                                    <td>{{ $equipment->type }}</td>
                                </tr>
                                <tr>
                                    <th>Manufacturer creation date</th>
                                    <td>{{ $equipment->creation_date }}</td>
                                </tr>
                                <tr>
                                    <th>Warranty until</th>
                                    <td>{{ $equipment->warranty_time }}</td>
                                </tr>
                                <tr>
                                    <th>Price</th>
                                    <td>{{ $equipment->price }}</td>
                                </tr>
                                <tr>
                                    <th>Quantity</th>
                                    <td>{{ $equipment->quantity }}</td>
                                </tr>
                                <tr>
                                    <th>Location</th>
                                    <td>{{ $equipment->location }}</td>
                                </tr>
                                <tr>
                                    @php $created_at = Carbon\Carbon::parse($equipment->created_at); @endphp
                                    <th>Created at</th>
                                    <td>{{ $created_at->format('Y-m-d H:m:s') }}</td>
                                </tr>
                                <tr>
                                    @php $updated_at = Carbon\Carbon::parse($equipment->updated_at); @endphp
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
                <div class="alert alert-danger col-12 p-custom text-center">Are you sure you want to permanently delete this equipment?</div>
            </div>

            <div class="row">
                <div class="col-6 form-group">
                    <form action="{{ url('/work/equipment/delete/'.$equipment->id) }}" method="post">
                        {{-- {{ method_field('DELETE') }} --}}
                        @csrf
                        <button type="submit" class="col-12 btn btn-primary"><i class="fas fa-check-circle"></i> Yes</button>
                    </form>
                </div>
                <div class="col-6 form-group">
                    <a href="{{ url('/work/equipment') }}" class="col-12 btn btn-primary"><i class="fas fa-times-circle"></i> No</a>
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
    $('#equipmentSubmenu').addClass("show");
    $('#equipment-garage').addClass("active");

</script>

@endsection
