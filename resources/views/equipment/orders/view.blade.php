@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Work Related <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/orders-index/equipment') }}" class="breadcrumb-style">Equipment orders</a> <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/order/equipment/'.$eq->order_id) }}" class="breadcrumb-style">View equipment order #{{ $eq->order_id }}</a>
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
                    Order ID : {{ $eq->order_id }}
                </div>
        
                <div class="card-body" style="margin:0;padding:0;">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                                <tr>
                                    <th style="width:200px;">Order Id</th>
                                    <td field-key='name'>{{ $eq->order_id }}</td>
                                </tr>
                                <tr>
                                    <th>Supplier Company</th>
                                    <td>{{ $supplier->supplier_company }}</td>
                                </tr>
                                <tr>
                                    <th>Supplier Name</th>
                                    <td>{{ $supplier->supplier_name }}</td>
                                </tr>
                                <tr>
                                    <th>Supplier Email</th>
                                    <td>{{ $supplier->supplier_email }}</td>
                                </tr>
                                <tr>
                                    <th>Supplier Phone</th>
                                    <td>{{ $supplier->supplier_telephone }}</td>
                                </tr>
                                <tr>
                                    @php $created_at = Carbon\Carbon::parse($eq->created_at); @endphp
                                    <th>Created at</th>
                                    <td>{{ $created_at->format('Y-m-d') }}</td>
                                </tr>
                                <tr>
                                    @php $updated_at = Carbon\Carbon::parse($eq->updated_at); @endphp
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
                    Equipment in the order :
                </div>
        
                <div class="card-body" style="background-color:rgb(241, 240, 240); padding: 8px;">
                    <div class="table-responsive" style="overflow: scroll;">
                        <table id="parts_table" class="table display table-hover table-striped" style="width:100%;">

                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Code</th>
                                    <th>Bar Code</th>
                                    <th>Description</th>
                                    <th>Order Qty</th>
                                    <th>Unit/Cost</th>
                                    <th>Instructions</th>
                                    <th>Type</th>

                                </tr>
                            </thead>

                            <tbody>
                                @foreach ( $eqs as $p )
                                    <tr>
                                        <td>{{ $p->id }}</td>
                                        <td>{{ $p->code }}</td>
                                        <td>{{ $p->bar_code }}</td>
                                        <td>{{ $p->description }}</td>
                                        <td>{{ $p->order_qty }}</td>
                                        <td>{{ $p->unit_cost }}</td>
                                        <td>{{ $p->instructions }}</td>
                                        <td>{{ $p->type }}</td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

            <div class="mt-3"></div>

            <a href="{{ url('/work/orders-index/equipment') }}" style="float:right;" class="btn btn-primary"><i class="fas fa-caret-square-left"></i> Back to orders list</a>

        </div>
    </div>

@endsection

@section('scripts')

<script>
    
    $('.components > li').each(function() {
        $(this).removeClass("active");
    });

    $('#equipmentSubmenu').addClass("show");
    $('#pizdanx').addClass("active");

</script>

@endsection