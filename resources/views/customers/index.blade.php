@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Management <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/customers') }}" class="breadcrumb-style">Customers</a>
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
        <button id="customer_create" class="mb-4 btn btn-primary"><i class="fas fa-plus-square"></i> Create | Add new Customer</button>
    </div>

    <div class="row">
        {{-- pl-13 pr-27 content-row  --}}
        <div class="col-md-12 pl-13 pr-27 content-row">

            <div class="table-responsive">

                <table id="customers_table" class="table display" style="width:100%;">

                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Company</th>
                            <th>Telephone</th>
                            <th>City</th>
                            <th>Province</th>
                            <th>Name</th>
                            <th>Address</th>
                            <th>Toll Free</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($customers as $customer)
                        <tr>
                            <td> {{ $customer->id }} </td>
                            <td> {{ $customer->company }} </td>
                            <td> {{ $customer->telephone }} </td>
                            <td> {{ $customer->city }} </td>
                            <td> {{ $customer->province }} </td>
                            <td> {{ $customer->name }} </td>
                            <td> {{ $customer->address }} </td>
                            <td> {{ $customer->toll_free }} </td>
                            <td>
                                @canany(['customers.view', 'everything'])<a href="{{ url('/customers/'.$customer->id) }}" class="action-btn" data-toggle="tooltip" title="View"><i class="fas fa-eye"></i></a>@endcanany
                                @canany(['customers.edit', 'everything'])<a href="{{ url('/customers/edit/'.$customer->id) }}" class="action-btn ml-2" data-toggle="tooltip" title="Edit"><i class="fas fa-user-edit"></i></a> @endcanany
                                @canany(['customers.delete', 'everything'])<a href="{{ url('/customers/pre-delete/'.$customer->id) }}" class="action-btn ml-2" data-toggle="tooltip" title="Delete"><i class="fas fa-trash"></i></a>@endcanany
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

    $('#customers-link').addClass("active");

    $(document).ready( function () {
        $('#customers_table').DataTable({
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

    $('#customer_create').click(function() {
        window.location.href = "{{ url('/customers/create') }}";
    });

</script>

@endsection
