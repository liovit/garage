@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Work Related <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/orders') }}" class="breadcrumb-style">Orders</a>
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
        <form action="{{ url('/work/orders/create') }}" method="post" style="padding: 0;">
            @csrf
            <button type="submit" id="order_create" class="mb-2 btn btn-primary" style="width:100%;"><i class="fas fa-plus-square"></i> Create new order</button>
        </form>
    </div>

    <div class="mt-2"></div>

    <div class="row">
        {{-- pl-13 pr-27 content-row  --}}
        <div class="col-md-12 pl-13 pr-27 content-row">

            <div class="table-responsive">

                <table id="orders_table" class="table display" style="width:100%;">

                    <thead>
                        <tr>
                            {{-- <th>#</th> --}}
                            <th>Id</th>
                            <th>Customer</th>
                            <th>Vehicle VIN</th>
                            <th>Vehicle type</th>
                            <th>Order budget</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($orders as $order)
                        @if($order->order_fill_status >= 1)
                        {{-- <tr style="padding: 4px;">
                            @if($order->parts_ids)
                                @php $partIds = json_decode($order->parts_ids); @endphp
                                @foreach($partIds as $p)
                                    @php $part = \App\Models\Part::find($p); @endphp
                                    @if($part->qty == null || $part->qty <= 0)
                                        <td data-toggle="tooltip" 
                                            title="You do not have enough parts in this order. Please check in edit page.">
                                            <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                        </td>
                                        @break
                                    @else
                                        <td data-toggle="tooltip" title="Everything is okay with this order."><i class="fa fa-check" aria-hidden="true"></i></td>
                                        @break
                                    @endif
                                @endforeach
                            @else
                            <td>-</td>
                            @endif --}}
                            <td> {{ $order->id }} </td>
                            @if($order->customer_id)
                                @php $cust = \App\Models\Customer::find($order->customer_id); @endphp
                                <td>{{ $cust->name . " " . $cust->last_name }}</td>
                            @else
                            <td>-</td>
                            @endif
                            @if($order->vehicle_id)
                                @foreach($vehicles as $v)
                                    @if($v->id == $order->vehicle_id)
                                        <td> {{ $v->vin_code }} </td>
                                    @endif
                                @endforeach
                            @else
                            <td> - </td>
                            @endif
                            @if($order->vehicle_id)
                                @foreach($vehicles as $v)
                                    @if($v->id == $order->vehicle_id)
                                        <td style="text-transform: uppercase;"> {{ $v->type }} </td>
                                    @endif
                                @endforeach
                            @else
                            <td> - </td>
                            @endif
                            @if($order->budget)
                            <td>$ {{ $order->budget }}</td>
                            @else
                            <td>-</td>
                            @endif
                            @if($order->order_fill_status == 1)
                            <td>Created</td>
                            @elseif($order->order_fill_status == 2)
                            <td>Accounting</td>
                            @elseif($order->order_fill_status == 3)
                            <td>Accounting</td>
                            @elseif($order->order_fill_status == 4)
                            <td>Accounting</td>
                            @elseif($order->order_fill_status == 5)
                            <td>Accounting</td>
                            @elseif($order->order_fill_status == 6)
                            <td>Billing</td>
                            @elseif($order->order_fill_status == 7)
                            <td>Completed</td>
                            @else
                            <td>-</td>
                            @endif
                            <td>

                                @if($order->order_fill_status >= 6)
                                    @php $findInvoice = \App\Models\Invoice::where([['model_type', '=', 'App\Models\Order'], ['model_id', '=', $order->id]])->first(); $invoice = $findInvoice; 
                                        // var_dump( $findInvoice->invoice_url );
                                    @endphp
                                    @canany(['orders.finish', 'everything'])<a href="{{ $invoice->invoice_url }}" download class="action-btn ml-2" data-toggle="tooltip" title="Download invoice"><i class="fa fa-certificate" aria-hidden="true"></i></a>@endcanany
                                    @canany(['orders.edit', 'everything'])<a href="{{ url('/work/orders/edit/'.$order->id) }}" class="action-btn ml-2" data-toggle="tooltip" title="Edit"><i class="fas fa-user-edit"></i></a> @endcanany
                                    @canany(['orders.delete', 'everything'])<a href="{{ url('/work/orders/pre-delete/'.$order->id) }}" class="action-btn ml-2" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>@endcanany
                                @else
                                    @canany(['orders.view', 'everything'])<a href="{{ url('/work/orders/'.$order->id) }}" class="action-btn" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a>@endcanany
                                    @canany(['orders.edit', 'everything'])<a href="{{ url('/work/orders/edit/'.$order->id) }}" class="action-btn ml-2" data-toggle="tooltip" title="Edit"><i class="fas fa-user-edit"></i></a> @endcanany
                                    @canany(['orders.delete', 'everything'])<a href="{{ url('/work/orders/pre-delete/'.$order->id) }}" class="action-btn ml-2" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>@endcanany
                                @endif

                            </td>
                        </tr>
                        @endif
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

    $('#workSubmenu').addClass("show");
    $('#orders-link-1').addClass("active");

    $(document).ready( function () {
        $('#orders_table').DataTable({
            dom: '<"top"<"left-col"l><"center-col"B><"right-col"f>>rtip',
            "order" : [[1, "desc"]],
            "autoWidth": false,
            colReorder: true,
            stateSave: true,
            buttons: [
                'colvis',
            ]
        });
    } );

    // $('#order_create').click(function() {
    //     window.location.href = "{{ url('/work/orders/create') }}";
    // });

</script>

@endsection
