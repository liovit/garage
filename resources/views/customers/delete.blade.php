@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Management <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/customers') }}" class="breadcrumb-style">Customers</a> <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/customers/edit/'.$customer->id) }}" class="breadcrumb-style">Delete customer #{{ $customer->id }}</a>
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
                    Delete customer {{ $customer->name }}
                </div>

                <div class="card-body" style="margin:0;padding:0;">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                                <div class="mt-2"></div>
                                <span class="table-title">Customer information</span>
                                <tr>
                                    <th style="width:200px;">Name</th>
                                    <td field-key='name'>{{ $customer->name }}</td>
                                </tr>
                                <tr>
                                    <th>Company</th>
                                    <td>{{ $customer->company }}</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>{{ $customer->city }}</td>
                                </tr>
                                <tr>
                                    <th>Province</th>
                                    <td>{{ $customer->province }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $customer->address }}</td>
                                </tr>
                                <tr>
                                    <th>Post Code</th>
                                    <td>{{ $customer->postal_code }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $customer->email }}</td>
                                </tr>
                                <tr>
                                    <th>Telephone</th>
                                    <td>{{ $customer->telephone }}</td>
                                </tr>
                                <tr>
                                    <th>Fax</th>
                                    <td>{{ $customer->fax }}</td>
                                </tr>
                                <tr>
                                    <th>Toll free</th>
                                    <td>{{ $customer->toll_free }}</td>
                                </tr>
                                <tr>
                                    <th>Alt Phone</th>
                                    <td>{{ $customer->alt_telephone }}</td>
                                </tr>
                                <tr>
                                    @php $created_at = Carbon\Carbon::parse($customer->created_at); @endphp
                                    <th>Created at</th>
                                    <td>{{ $created_at->format('Y-m-d H:m:s') }}</td>
                                </tr>
                                <tr>
                                    @php $updated_at = Carbon\Carbon::parse($customer->updated_at); @endphp
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
                <div class="alert alert-danger col-12 p-custom text-center">Are you sure you want to permanently delete this customer?</div>
            </div>

            <div class="row">
                <div class="col-6 form-group">
                    <form action="{{ url('/customers/delete/'.$customer->id) }}" method="post">
                        {{ method_field('DELETE') }}
                        @csrf
                        <button type="submit" class="col-12 btn btn-primary"><i class="fas fa-check-circle"></i> Yes</button>
                    </form>
                </div>
                <div class="col-6 form-group">
                    <a href="{{ url('/customers') }}" class="col-12 btn btn-primary"><i class="fas fa-times-circle"></i> No</a>
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
    $('#customers-link').addClass("active");

</script>

@endsection
