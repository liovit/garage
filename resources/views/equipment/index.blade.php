@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Work Related <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/equipment') }}" class="breadcrumb-style">Equipment</a>
    </div>
@endsection

@section('content-d')

    <div style="margin-top: 20px;"></div>

    <div class="row pl-13 col-md-12 content-row">
        @if(Session::has('success'))
            <div class="alert alert-info text-center">{{ Session::get('success') }}</div>
        @endif
    </div>

    <div class="row pl-13 col-12 content-row">
        <button id="equipment_create" class="mb-4 btn btn-primary"><i class="fas fa-plus-square"></i> Add new entry</button>
    </div>

    <div class="row">
        {{-- pl-13 pr-27 content-row  --}}
        <div class="col-md-12 pl-13 pr-27 content-row">

            <div class="table-responsive">

                <table id="equipment_table" class="table display" style="width:100%;">

                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Description</th>
                            <th>Qty</th>
                            <th>Warranty till</th>
                            <th>Location</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($equipment as $e)    
                        @if($e->picture != null)
                        <img src="{{ url('/temporary/equipment/'.$e->id.'/'.$e->picture) }}" class="not-thumbnail" style="display:none; width: 400px; height: 400px; border-radius: 3px; position:absolute;z-index:999;top:130px;left:440px;" alt="">
                        @endif
                        <tr>
                            @if($e->picture != null)
                            <td> 
                                <img src="{{ url('/temporary/equipment/'.$e->id.'/'.$e->picture) }}" class="thumbnail" style="width: 50px; height: 50px; border-radius: 3px;" alt="">
                            </td>
                            @else
                            <td> - </td>
                            @endif
                            <td> {{ $e->description }} </td>
                            <td> {{ $e->quantity }} </td>
                            <td> {{ $e->warranty_time }} </td>
                            @php $createdAt = Carbon\Carbon::parse($e->created_at) @endphp
                            <td> {{ $e->location }} </td>
                            <td> {{ $createdAt->format('Y-m-d') }} </td>
                            @php $updatedAt = Carbon\Carbon::parse($e->updated_at) @endphp
                            <td>{{ $updatedAt->format('Y-m-d H:i') }}</td>
                            <td> 
                                @canany(['equipment.view', 'everything'])<a href="{{ url('/work/equipment/'.$e->id) }}" class="action-btn" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a>@endcanany
                                @canany(['equipment.edit', 'everything'])<a href="{{ url('/work/equipment/edit/'.$e->id) }}" class="action-btn ml-2" data-toggle="tooltip" title="Edit"><i class="fas fa-user-edit"></i></a> @endcanany
                                @canany(['equipment.delete', 'everything'])<a href="{{ url('/work/equipment/pre-delete/'.$e->id) }}" class="action-btn ml-2" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>@endcanany
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
    $('#equipment-garage').addClass("active");

    $(document).ready( function () {
        $('#equipment_table').DataTable({
            dom: '<"top"<"left-col"l><"center-col"B><"right-col"f>>rtip',
            "autoWidth": false,
            "order": [[ 6, "desc" ]],
            colReorder: true,
            stateSave: true,
            buttons: [
                'colvis',
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ]
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

    $('#equipment_create').click(function() {
        window.location.href = "{{ url('/work/equipment/create') }}";
    });

</script>

@endsection