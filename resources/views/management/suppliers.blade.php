@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Supplier Management <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/management/suppliers') }}" class="breadcrumb-style">Suppliers List</a>
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
        <button id="user_create" class="mb-4 btn btn-primary"><i class="fas fa-plus-square"></i> Add new entry</button>
    </div>

    <div class="row">
        {{-- pl-13 pr-27 content-row  --}}
        <div class="col-md-12 pl-13 pr-27 content-row">

            <div class="table-responsive">

                <table id="users_table" class="table display" style="width:100%;">

                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Company</th>
                            <th>Telephone</th>
                            <th>City</th>
                            <th>State</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($suppliers as $sup)    
                        <tr>
                            <td> {{ $sup->id }} </td>
                            <td> {{ $sup->supplier_company }} </td>
                            <td> {{ $sup->supplier_telephone }} </td>
                            <td> {{ $sup->supplier_city }} </td>
                            <td> {{ $sup->supplier_state }} </td>
                            <td> {{ $sup->supplier_name }} </td>
                            <td> 
                                @canany(['suppliers.management.view', 'everything'])<a href="{{ url('/management/suppliers/'.$sup->id) }}" class="action-btn" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a>@endcanany 
                                @canany(['suppliers.management.edit', 'everything'])<a href="{{ url('/management/suppliers/edit/'.$sup->id) }}" class="action-btn ml-2" data-toggle="tooltip" title="Edit"><i class="fas fa-user-edit"></i></a>@endcanany
                                @canany(['suppliers.management.delete', 'everything'])<a href="{{ url('/management/suppliers/pre-delete/'.$sup->id) }}" class="action-btn ml-2" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>@endcanany
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
    $('#suppliers-link').addClass("active");

    $(document).ready( function () {
        $('#users_table').DataTable({
            dom: '<"top"<"left-col"l><"center-col"B><"right-col"f>>rtip',
            "autoWidth": false,
            "order": [[ 0, "asc" ]],
            colReorder: true,
            stateSave: true,
            buttons: [
                'colvis',
            ]
        });
    } );

    $('#user_create').click(function() {
        window.location.href = "{{ url('/management/suppliers/create') }}";
    });

</script>

@endsection