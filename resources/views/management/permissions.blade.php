@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        User Management <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> Permissions <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/management/permissions') }}" class="breadcrumb-style">Permissions List</a>
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
        <button id="role_create" class="mb-4 btn btn-primary"><i class="fas fa-plus-square"></i> Add new entry</button>
    </div>

    <div class="row">
        {{-- pl-13 pr-27 content-row  --}}
        <div class="col-md-12 pl-13 pr-27 content-row">

            <div class="table-responsive">

                <table id="permissions_table" class="table display" style="width:100%;">

                    <thead>
                        <tr>
                            <th>Permission id</th>
                            <th>Permission name</th>
                            <th>Created at</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($permissions as $p)    
                        <tr>
                            <td> {{ $p->id }} </td>
                            <td> {{ $p->name }} </td>
                            @php $createdAt = Carbon\Carbon::parse($p->created_at) @endphp
                            <td> {{ $createdAt->format('Y-m-d') }} </td>    
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
    $('#permissions-link').addClass("active");

    $(document).ready( function () {
        $('#homeSubmenu').addClass("show");
        $('#permissions_table').DataTable({
            paging: false,
            colReorder: true,
            stateSave: true,
            dom: '<"top"<"left-col"l><"center-col"B><"right-col"f>>rtip',
            "order" : [[0, "desc"]],
            "autoWidth": true,
            buttons: [
                'colvis',
            ]
        });
    } );

    $('#role_create').click(function() {
        window.location.href = "{{ url('/management/permissions/create') }}";
    });

</script>

@endsection