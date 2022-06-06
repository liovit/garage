@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Work Related <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/orders-index/equipment') }}" class="breadcrumb-style">Equipment orders</a>
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
        <button type="submit" id="equipment_create" class="mb-4 col-12 btn btn-primary"><i class="fas fa-plus-square"></i> Order new equipment</button>
    </div>

    <div class="row">
        {{-- pl-13 pr-27 content-row  --}}
        <div class="col-md-12 pl-13 pr-27 content-row">

            <div class="table-responsive">

                <table id="equipment_table" class="table display" style="width:100%;">

                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Description</th>
                            <th>Cost Total</th>
                            <th>Quantity</th>
                            <th>Supplier</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $randomcount = 1; @endphp
                        @foreach($equipment->unique('order_id') as $e)
                        <tr style="padding: 4px;">
                            <td> {{ $randomcount++ }} </td>
                            <td> {{ $e->description }} </td>
                            @php
                                $supplier = App\Models\Supplier::find($e->supplier_id);
                            @endphp

                            @php $alleq = App\Models\Equipment_Order::where('order_id', '=', $e->order_id)->get(); 
                                $pricesum = 0;
                                foreach($alleq as $eq) {
                                    $calc = $eq->price * $eq->quantity;
                                    $pricesum += $calc;
                                }
                            @endphp
                            <td> $ {{ $pricesum }} </td>
                            @php
                                $sum = 0;
                                foreach($alleq as $eq) {
                                    $sum += $eq->quantity;
                                }
                            @endphp
                            <td> {{ $sum }} </td>
                            <td> {{ $supplier->supplier_company }} </td>
                            @if($e->order_status == 1)
                            <td> <span class="status_bubble_wait">Created</span> </td>
                            @endif
                            @if($e->order_status == 2)
                            <td> <span class="status_bubble_success">Received</span> </td>
                            @endif
                            @if($e->order_status == 3)
                            <td> <span class="status_bubble_progress">Processing</span> </td>
                            @endif
                            @if($e->order_status == 4)
                            <td> <span class="status_bubble_wait">Return</span> </td>
                            @endif
                            @if($e->order_status == 5)
                            <td> <span class="status_bubble_success">Returned</span> </td>
                            @endif
                            <td>
                                @canany(['equipment.orders.view', 'everything'])<a href="{{ url('/work/order/equipment/'.$e->order_id) }}" class="action-btn" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a>@endcanany
                                @canany(['equipment.orders.edit', 'everything'])<a href="{{ url('/work/order/equipment/edit/'.$e->order_id) }}" class="action-btn ml-2" data-toggle="tooltip" title="Edit"><i class="fas fa-user-edit"></i></a> @endcanany
                                @canany(['equipment.orders.delete', 'everything'])<a href="{{ url('/work/order/equipment/pre-delete/'.$e->order_id) }}" class="action-btn ml-2" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>@endcanany
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

    $('#equipmentSubmenu').addClass("show");
    $('#pizdanx').addClass("active");

    $(document).ready( function () {
        $('#equipment_table').DataTable({
            dom: '<"top"<"left-col"l><"center-col"B><"right-col"f>>rtip',
            "order" : [[0, "desc"]],
            "autoWidth": false,
            colReorder: true,
            stateSave: true,
            buttons: [
                'colvis',
            ]
        });
    } );

    $('#equipment_create').click(function() {
        window.location.href = "{{ url('/work/order/equipment') }}";
    });

</script>

@endsection
