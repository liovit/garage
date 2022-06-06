@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Work Related <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/orders-index/equipment') }}" class="breadcrumb-style">Equipment orders</a> <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/order/equipment/edit/'.$equipment->order_id) }}" class="breadcrumb-style">Edit equipment order #{{ $equipment->order_id }}</a>
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
                    Edit equipment order
                </div>
                <div class="card-body card-body-custom">

                    {{-- <div class="mt-3"></div>

                    <div class="row col-12">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary col-12" data-toggle="modal" data-target=".bd-example-modal-lg-invoices">Invoices</button>
                        </div>
                    </div> --}}

                    <div class="mt-2"></div>
                    <form action="{{ url('/work/order/equipment/confirm/'.$equipment->order_id) }}" enctype="multipart/form-data" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="mt-3"></div>
                            <div class="pre-form-texts">Supplier information</div>
                            <div class="col-md-12 form-group mt-3 mb-3">
                                <div class="mt-2"></div>
                                <select name="supplier" style="line-height:18px;border-radius:2px;" id="supplier-select" class="form-control">
                                    <option value="" hidden>Select a supplier</option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}" @if($supplier->id == $equipment->supplier_id) selected @endif>{{ $supplier->supplier_company }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mt-3"></div>

                        <div class="card card-custom">
                    
                            <div class="card-body" style="background-color:rgb(241, 240, 240); padding: 8px;">
                                <div class="table-responsive" style="overflow: scroll;">
                                    <table id="parts_table" class="table display table-hover table-striped" style="width:100%;">
            
                                        <thead>
                                            <tr>
                                                <th>Code</th>
                                                <th>Bar Code</th>
                                                <th>Description</th>
                                                <th>Order Qty</th>
                                                <th>Unit/Cost</th>
                                                <th>Status</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
            
                                        <tbody>
                                            @foreach ( $alleq as $p )
                                                <tr>
                                                    <td>{{ $p->code }}</td>
                                                    <td>{{ $p->bar_code }}</td>
                                                    <td>{{ $p->description }}</td>
                                                    <td>{{ $p->quantity }}</td>
                                                    <td>{{ $p->price }}</td>
                                                    @if($p->status == 1)
                                                    <td> <span class="status_bubble_wait">Created</span> </td>
                                                    @endif
                                                    @if($p->status == 2)
                                                    <td> <span class="status_bubble_success">Received</span> </td>
                                                    @endif
                                                    @if($p->status == 3)
                                                    <td> <span class="status_bubble_progress">Processing</span> </td>
                                                    @endif
                                                    @if($p->status == 4)
                                                    <td> <span class="status_bubble_wait">Return</span> </td>
                                                    @endif
                                                    @if($p->status == 5)
                                                    <td> <span class="status_bubble_success">Returned</span> </td>
                                                    @endif
                                                    <td>
                                                        @canany(['parts.edit', 'everything'])
                                                        <a href="#" class="action-btn ml-2" @if($p->status != 2) data-toggle="tooltip" title="Edit" @endif>
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg{{ $p->id }}" @if($p->status == 2) disabled @endif><i class="fas fa-user-edit"></i></button>
                                                        </a> 
                                                        @endcanany
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
            
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3"></div>

                        <div class="row add_more_parts_rows">
                        </div>

                        <div class="row">
                            <div class="mt-3"></div>
                            <div class="pre-form-texts">Other options</div>
                            <div class="col-md-12 form-group mt-3 mb-3">
                                <label for="">Order status</label>
                                <div class="mt-2"></div>
                                <select name="order_status" style="line-height:18px;border-radius:2px;" id="order_status" class="form-control">
                                    <option value="1" @if($equipment->order_status == 1) selected @endif>Created</option>
                                    <option value="3" @if($equipment->order_status == 3) selected @endif>In Progress</option>
                                    <option value="2" @if($equipment->order_status == 2) selected @endif>Received</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-3"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" style="float:right;" class="col-12 btn btn-primary btn-primary-second">Confirm <i class="fas fa-check"></i></button>
                            </div>
                        </div>

                        <div class="mt-3"></div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    @foreach($alleq as $p)

    <div class="modal fade bd-example-modal-lg{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding: 12px;">

                <form action="{{ url('/work/order/equipment/item/'.$p->id) }}" method="post">
                @csrf
                <div class="row initial-parts-row">
                    <div class="mt-3"></div>
                    <div class="pre-form-texts">Equipment information</div>
                    <div class="col-md-12 form-group mt-2">
                        <label for="">Description</label>
                        <div class="mt-2"></div>
                        <input type="text" name="description" class="form-control similar_product" value="{{ $p->description }}" placeholder="" required>
                    </div>
                    <div class="col-md-12 form-group mt-2">
                        <label for="">Item status</label>
                        <div class="mt-2"></div>
                        <select name="status" style="line-height:18px;border-radius:2px;" id="" class="form-control">
                            <option value="1" @if($p->status == 1) selected @endif>Created</option>
                            <option value="3" @if($p->status == 3) selected @endif>In Progress</option>
                            <option value="2" @if($p->status == 2) selected @endif>Received</option>
                        </select>
                    </div>
                    <div class="col-md-2 form-group mt-3">
                        <label for="">Code</label>
                        <div class="mt-2"></div>
                        <input type="text" name="code" class="form-control code-autofill" placeholder="" value="{{ $p->code }}" required>
                    </div>
                    <div class="col-md-2 form-group mt-3">
                        <label for="">Bar Code</label>
                        <div class="mt-2"></div>
                        <input type="text" name="bar_code" class="form-control" value="{{ $p->bar_code }}" placeholder="">
                    </div>
                    <div class="col-md-2 form-group mt-3">
                        <label for="">Order Qty</label>
                        <div class="mt-2"></div>
                        <input type="number" step="1" name="quantity" class="form-control" value="{{ $p->quantity }}" placeholder="" required>
                    </div>
                    <div class="col-md-2 form-group mt-3">
                        <label for="">Unit/Cost</label>
                        <div class="mt-2"></div>
                        <input type="number" value="{{ $p->price }}" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" step="0.01" name="price" class="form-control" placeholder="">
                    </div>
                    <div class="col-md-4 form-group mt-3">
                        <label for="">Type</label>
                        <div class="mt-2"></div>
                        <input type="text" name="type" class="form-control" value="{{ $p->type }}" placeholder="">
                    </div>
                    <div class="col-md-12 form-group mt-2">
                        <label for="">Instructions</label>
                        <div class="mt-2"></div>
                        <input type="text" name="instructions" value="{{ $p->instructions }}" class="form-control" placeholder="">
                    </div>

                    </form>

                    <div class="col-md-12 mt-3 mb-3" style="margin-bottom:-12px;">
                        <button type="submit" class="btn btn-primary col-md-12">Confirm <i class="fas fa-check"></i></button>
                    </div>

                    <div class="col-md-12 similar_product_show"></div>

                </div>

            </div>
        </div>
    </div>

    @endforeach

@endsection

@section('scripts')

<script>

    $('.components > li').each(function() {
        $(this).removeClass("active");
    });

    $('#equipmentSubmenu').addClass("show");
    $('#pizdanx').addClass("active");

    function checkForNull($string) {
        if($string == null) {
            return '';
        } else {
            return $string;
        }
    }

    $(document).ready(function() {
        $('.email-select').select2();
        $('#bought-parts').select2();

    });

</script>

@endsection
