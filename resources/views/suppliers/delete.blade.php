@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Management <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/management/suppliers') }}" class="breadcrumb-style">Suppliers</a> <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/management/supplier/'.$supplier->id) }}" class="breadcrumb-style">Delete supplier #{{ $supplier->id }}</a>
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
                    Delete supplier {{ $supplier->supplier_name }}
                </div>
        
                <div class="card-body" style="margin:0;padding:0;">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                                <div class="mt-2"></div>
                                <span class="table-title">Supplier information</span>
                                <tr>
                                    <th style="width:200px;">Name</th>
                                    <td field-key='name'>{{ $supplier->supplier_name }}</td>
                                </tr>
                                <tr>
                                    <th>Company</th>
                                    <td>{{ $supplier->supplier_company }}</td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td>{{ $supplier->supplier_city }}</td>
                                </tr>
                                <tr>
                                    <th>State</th>
                                    <td>{{ $supplier->supplier_state }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $supplier->supplier_address }}</td>
                                </tr>
                                <tr>
                                    <th>Post Code</th>
                                    <td>{{ $supplier->supplier_post }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $supplier->supplier_email }}</td>
                                </tr>
                                <tr>
                                    <th>Telephone</th>
                                    <td>{{ $supplier->supplier_telephone }}</td>
                                </tr>
                                <tr>
                                    <th>Fax</th>
                                    <td>{{ $supplier->supplier_fax }}</td>
                                </tr>
                                <tr>
                                    <th>Toll fee</th>
                                    <td>{{ $supplier->supplier_toll }}</td>
                                </tr>
                                <tr>
                                    <th>Alt Phone</th>
                                    <td>{{ $supplier->supplier_alt_phone }}</td>
                                </tr>
                                <tr>
                                    @php $created_at = Carbon\Carbon::parse($supplier->created_at); @endphp
                                    <th>Created at</th>
                                    <td>{{ $created_at->format('Y-m-d H:m:s') }}</td>
                                </tr>
                                <tr>
                                    @php $updated_at = Carbon\Carbon::parse($supplier->updated_at); @endphp
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
                <div class="alert alert-danger col-12 p-custom text-center">Are you sure you want to permanently delete this supplier?</div>
            </div>

            <div class="row">
                <div class="col-6 form-group">
                    <form action="{{ url('/management/suppliers/delete/supplier/'.$supplier->id) }}" method="post">
                        {{ method_field('DELETE') }}
                        @csrf
                        <button type="submit" class="col-12 btn btn-primary"><i class="fas fa-check-circle"></i> Yes</button>
                    </form>
                </div>
                <div class="col-6 form-group">
                    <a href="{{ url('/management/suppliers') }}" class="col-12 btn btn-primary"><i class="fas fa-times-circle"></i> No</a>
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
    $('#suppliers-link').addClass("active");

</script>

@endsection