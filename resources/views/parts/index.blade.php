@extends('home')

@section('content-f')
    {{-- <div class="breadcrumb-box">
        Work Related <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/parts') }}" class="breadcrumb-style">Parts</a>
    </div> --}}

    @section('content-h')
    Users
    @endsection

    @section('content-g')
    List
    @endsection

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
        <button id="parts_create" class="mb-4 btn btn-primary"><i class="fas fa-plus-square"></i> Order new part(-s)</button>
    </div>

    <div class="row">
        {{-- pl-13 pr-27 content-row  --}}
        <div class="col-md-12 pl-13 pr-27 content-row">

            <div class="table-responsive">

                <table id="parts_table" class="table display" style="width:100%;">

                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Photo</th>
                            <th>Supplier</th>
                            <th>Reference</th>
                            <th>Expected Date</th>
                            <th>Unit</th>
                            <th>Date</th>
                            <th>Garage</th>
                            <th>Accounting Ref.</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($parts->unique('order_id') as $part)
                        <tr style="padding: 4px;">
                            <td> {{ $part->id }} </td>
                            <td> - </td>
                            @php
                                $supplier = App\Models\Supplier::find($part->supplier_id);
                            @endphp
                            <td> {{ $supplier->supplier_company }} </td>
                            <td> - </td>
                            <td> - </td>
                            <td> - </td>
                            <td> {{ $part->created_at }} </td>
                            <td> {{ $part->garage_location }} </td>
                            <td> - </td>
                            <td> - </td>
                            @if($part->order_status == 1)
                            <td> <span class="status_bubble_wait">Created</span> </td>
                            @endif
                            @if($part->order_status == 2)
                            <td> <span class="status_bubble_success">Received</span> </td>
                            @endif
                            @if($part->order_status == 3)
                            <td> <span class="status_bubble_progress">Processing</span> </td>
                            @endif
                            @if($part->order_status == 4)
                            <td> <span class="status_bubble_wait">Return</span> </td>
                            @endif
                            @if($part->order_status == 5)
                            <td> <span class="status_bubble_success">Returned</span> </td>
                            @endif
                            <td>
                                @canany(['parts.view', 'everything'])<a href="{{ url('/work/parts/order/'.$part->order_id) }}" class="action-btn" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a>@endcanany
                                @canany(['parts.edit', 'everything'])<a href="{{ url('/work/parts/edit/'.$part->order_id) }}" class="action-btn ml-2" data-toggle="tooltip" title="Edit"><i class="fas fa-user-edit"></i></a> @endcanany
                                @canany(['parts.delete', 'everything'])<a href="{{ url('/work/parts/order/pre-delete/'.$part->order_id) }}" class="action-btn ml-2" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>@endcanany
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

    $('#partSubmenu').addClass("show");
    $('#parts-orders').addClass("active");

    $(document).ready( function () {
        $('#parts_table').DataTable({
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

    $('#parts_create').click(function() {
        window.location.href = "{{ url('/work/parts/order') }}";
    });

</script>

@endsection
