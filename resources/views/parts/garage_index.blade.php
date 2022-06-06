@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Work Related <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/parts') }}" class="breadcrumb-style">Parts</a>
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
                            <th>Description</th>
                            <th>Unit</th>
                            <th>Date</th>
                            <th>Last Updated At</th>
                            <th>Garage</th>
                            <th>Quantity</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($parts as $part)
                        @php $pics = json_decode($part->pictures); @endphp
                        @if($part->pictures != null)
                        <img src="{{ url('/temporary/parts/'.$part->id.'/'.$pics[0]) }}" class="not-thumbnail" style="display:none; width: 400px; height: 400px; border-radius: 3px; position:absolute;z-index:999;top:130px;left:440px;" alt="">
                        @endif
                        <tr style="padding: 4px;">
                            <td> {{ $part->id }} </td>
                            @if($part->pictures != null)
                            <td> 
                                <img src="{{ url('/temporary/parts/'.$part->id.'/'.$pics[0]) }}" class="thumbnail" style="width: 50px; height: 50px; border-radius: 3px;" alt="">
                            </td>
                            @else
                            <td> - </td>
                            @endif
                            @if($part->supplier_id)
                            @php
                                $supplier = App\Models\Supplier::find($part->supplier_id);
                            @endphp
                                <td> {{ $supplier->supplier_company }} </td>
                                @else
                                <td> - </td>
                            @endif
                            <td> {{ $part->description }} </td>
                            <td> - </td>
                            @php $createdAt = Carbon\Carbon::parse($part->created_at);
                                 $updatedAt = Carbon\Carbon::parse($part->updated_at); @endphp
                            <td> {{ $createdAt->format('Y-m-d H:m') }} </td>
                            <td> {{ $updatedAt->format('Y-m-d H:m') }} </td>
                            <td> {{ $part->garage_location }} </td>
                            @if($part->qty)
                            <td> {{ $part->qty }} </td>
                            @else
                            <td> - </td>
                            @endif
                            <td>
                                @canany(['parts.garage.view', 'everything'])<a href="{{ url('/work/parts/'.$part->id) }}" class="action-btn" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a>@endcanany
                                @canany(['parts.garage.edit', 'everything'])<a href="{{ url('/work/parts/edit/'.$part->id) }}" class="action-btn ml-2" data-toggle="tooltip" title="Edit"><i class="fas fa-user-edit"></i></a> @endcanany
                                @canany(['parts.garage.delete', 'everything'])<a href="{{ url('/work/parts/pre-delete/'.$part->id) }}" class="action-btn ml-2" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>@endcanany
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
    $('#parts-garage').addClass("active");

    $(document).ready( function () {
        var table = $('#parts_table').DataTable({
            dom: '<"top"<"left-col"l><"center-col"B><"right-col"f>>rtip',
            "order" : [[6, "desc"]],
            "autoWidth": false,
            colReorder: true,
            stateSave: true,
            buttons: [
                'colvis',
            ]
        });
        table.on('column-reorder', function(e, settings, details) {
            var headerCell = $(table.column(details.to).header());
            headerCell.addClass('reordered');
            setTimeout( function () {
                headerCell.removeClass('reordered');
            }, 2000);
        });

        $(".thumbnail").hover(function(){
            var source = $(this).attr('src');
            // console.log(source);
            $('.not-thumbnail').attr('src', source);
            $(".not-thumbnail").show()
        },
        function(){
            $(".not-thumbnail").hide();
        });

    } );

    $('#parts_create').click(function() {
        window.location.href = "{{ url('/work/parts/order') }}";
    });

</script>

@endsection
