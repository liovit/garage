@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        <a href="{{ url('/work/parts/garage') }}" class="breadcrumb-style">Parts List</a> <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/parts/pre-delete/'.$p->id) }}" class="breadcrumb-style">Delete part #{{ $p->id }}</a>
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
                    Delete Part ID : {{ $p->id }}
                </div>
        
                <div class="card-body" style="margin:0;padding:0;">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                                <tr>
                                    <th style="width:200px;">Part Id</th>
                                    <td field-key='name'>{{ $p->id }}</td>
                                </tr>
                                <tr>
                                    <th>Supplier Company</th>
                                    @if($p->supplier_id)
                                    <td>{{ $supplier->supplier_company }}</td>
                                    @else
                                    <td> - </td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Supplier Name</th>
                                    @if($p->supplier_id)
                                    <td>{{ $supplier->supplier_name }}</td>
                                    @else
                                    <td> - </td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Supplier Email</th>
                                    @if($p->supplier_id)
                                    <td>{{ $supplier->supplier_email }}</td>
                                    @else
                                    <td> - </td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Supplier Phone</th>
                                    @if($p->supplier_id)
                                    <td>{{ $supplier->supplier_telephone }}</td>
                                    @else
                                    <td> - </td>
                                    @endif
                                </tr>
                                <tr>
                                    @php $created_at = Carbon\Carbon::parse($p->created_at); @endphp
                                    <th>Created at</th>
                                    <td>{{ $created_at->format('Y-m-d') }}</td>
                                </tr>
                                <tr>
                                    @php $updated_at = Carbon\Carbon::parse($p->updated_at); @endphp
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
                    Part information
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
                                    <th>Product No.</th>
                                    <th>Order Qty</th>
                                    <th>Unit/Cost</th>
                                    <th>Unit Cost Today</th>
                                    <th>Cost</th>
                                    <th>Qty Rec.</th>
                                    <th>Qty Rec. Today</th>
                                    <th>Date Rec.</th>
                                    <th>Qty Return</th>
                                    <th>Instructions</th>
                                    <th>Type</th>
                                    <th>Model</th>
                                    <th>Make</th>
                                    <th>Style</th>
                                    <th>Category</th>

                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>{{ $p->id }}</td>
                                    <td>{{ $p->code }}</td>
                                    <td>{{ $p->bar_code }}</td>
                                    <td>{{ $p->description }}</td>
                                    <td>{{ $p->product_no }}</td>
                                    <td>{{ $p->order_qty }}</td>
                                    <td>{{ $p->unit_cost }}</td>
                                    <td>{{ $p->unit_cost_today }}</td>
                                    <td>{{ $p->cost }}</td>
                                    <td>{{ $p->qty_rec }}</td>
                                    <td>{{ $p->qty_rec_today }}</td>
                                    <td>{{ $p->date_rec }}</td>
                                    <td>{{ $p->qty_return }}</td>
                                    <td>{{ $p->instructions }}</td>
                                    <td>{{ $p->type }}</td>
                                    <td>{{ $p->model }}</td>
                                    <td>{{ $p->make }}</td>
                                    <td>{{ $p->style }}</td>
                                    <td>{{ $p->category }}</td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

            <div class="mt-3"></div>

            <div class="d-flex text-center align-content-center align-items-center">
                <div class="alert alert-danger col-12 p-custom text-center">Are you sure you want to delete this part?</div>
            </div>

            <div class="row">
                <div class="col-6 form-group">
                    <form action="{{ url('/work/parts/delete/'.$p->id) }}" method="post">
                        @csrf
                        <button type="submit" class="col-12 btn btn-primary"><i class="fas fa-check-circle"></i> Yes</button>
                    </form>
                </div>
                <div class="col-6 form-group">
                    <a href="{{ url('/work/parts/garage') }}" class="col-12 btn btn-primary"><i class="fas fa-times-circle"></i> No</a>
                </div>
            </div>

            <div class="mt-3"></div>

            <a href="{{ url('/work/parts/garage') }}" style="float:right;" class="btn btn-primary"><i class="fas fa-caret-square-left"></i> Back to parts list</a>

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

</script>

@endsection