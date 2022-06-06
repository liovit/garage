@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        User Management <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> Users <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/management/users') }}" class="breadcrumb-style">Users List</a> <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/management/users/'.$user->id) }}" class="breadcrumb-style">Delete user #{{ $user->id }}</a>
    </div>
@endsection

@section('content-d')

    <div style="margin-top: 20px;"></div>

    {{-- <div class="row pl-13 col-md-12 content-row">
        <button id="user_create" class="mb-4 btn btn-primary"><i class="fas fa-plus-square"></i> Add new entry</button>
    </div> --}}

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
                    Delete user {{ $user->name . " " . $user->last_name }}
                </div>
        
                <div class="card-body" style="margin:0;padding:0;">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                                <tr>
                                    <th style="width:200px;">Name</th>
                                    <td field-key='name'>{{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td field-key='email'>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Age</th>
                                    <td>{{ $user->age }} years old</td>
                                </tr>
                                <tr>
                                    <th>Date of birth</th>
                                    <td>{{ $user->date_of_birth }}</td>
                                </tr>
                                <tr>
                                    @php $created_at = Carbon\Carbon::parse($user->created_at); @endphp
                                    <th>Created at</th>
                                    <td>{{ $created_at->format('Y-m-d') }}</td>
                                </tr>
                                <tr>
                                    @php $updated_at = Carbon\Carbon::parse($user->updated_at); @endphp
                                    <th>Last updated at</th>
                                    <td>{{ $updated_at->format('Y-m-d H:m:s') }}</td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td field-key='role'>
                                        {{-- @foreach ($user->role as $singleRole)
                                            <span class="label label-info label-many">{{ $singleRole->title }}</span>
                                        @endforeach --}}
                                        Admin
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3"></div>

            <div class="d-flex text-center align-content-center align-items-center">
                <div class="alert alert-danger col-12 p-custom text-center">Are you sure you want to permanently delete this user?</div>
            </div>

            <div class="row">
                <div class="col-6 form-group">
                    <form action="{{ url('/management/users/delete/user/'.$user->id) }}" method="post">
                        {{ method_field('DELETE') }}
                        @csrf
                        <button type="submit" class="col-12 btn btn-primary"><i class="fas fa-check-circle"></i> Yes</button>
                    </form>
                </div>
                <div class="col-6 form-group">
                    <a href="{{ url('/management/users') }}" class="col-12 btn btn-primary"><i class="fas fa-times-circle"></i> No</a>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('scripts')

<script>

    $('.components > li').each(function() {
        $(this).removeClass("active");
    });
    $('#users-link').addClass("active");
    $('#homeSubmenu').addClass("show");

</script>

@endsection