@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        User Management <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> Roles <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/management/roles') }}" class="breadcrumb-style">Roles List</a>
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

                <table id="roles_table" class="table display" style="width:100%;">

                    <thead>
                        <tr>
                            <th>Role id</th>
                            <th>Role name</th>
                            <th>Created at</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($roles as $role)    
                        <tr>
                            <td> {{ $role->id }} </td>
                            <td> {{ $role->name }} </td>
                            @php $createdAt = Carbon\Carbon::parse($role->created_at) @endphp
                            <td> {{ $createdAt->format('Y-m-d') }} </td>
                            <td> 
                                @canany(['roles.management.view', 'everything'])<a href="{{ url('/management/roles/'.$role->id) }}" class="action-btn" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a>@endcanany
                                @canany(['roles.management.edit', 'everything'])<a href="{{ url('/management/roles/edit/'.$role->id) }}" class="action-btn ml-2" data-toggle="tooltip" title="Edit"><i class="fas fa-user-edit"></i></a>@endcanany
                                @canany(['roles.management.delete', 'everything'])<a href="{{ url('/management/roles/pre-delete/'.$role->id) }}" class="action-btn ml-2" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>@endcanany
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
    $('#roles-link').addClass("active");

    $(document).ready( function () {
        $('#homeSubmenu').addClass("show");
        $('#roles_table').DataTable({
            dom: '<"top"<"left-col"l><"center-col"B><"right-col"f>>rtip',
            colReorder: true,
            stateSave: true,
            buttons: [
                'colvis',
            ]
        });
    } );

    $('#role_create').click(function() {
        window.location.href = "{{ url('/management/roles/create') }}";
    });

</script>

@endsection