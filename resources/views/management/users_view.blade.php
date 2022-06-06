@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        User Management <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> Users <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/management/users') }}" class="breadcrumb-style">Users List</a> <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/management/users/'.$user->id) }}" class="breadcrumb-style">View user #{{ $user->id }}</a>
    </div>
@endsection

@section('content-d')

    <div style="margin-top: 20px;"></div>

    {{-- <div class="row pl-13 col-md-12 content-row">
        <button id="user_create" class="mb-4 btn btn-primary"><i class="fas fa-plus-square"></i> Add new entry</button>
    </div> --}}

    <div class="row pl-13 col-md-12 content-row">
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
                    Viewing user {{ $user->name . " " . $user->last_name }}
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
                                    <th>Role</th>
                                    <td field-key='role'>
                                        @php $roles = $user->getRoleNames(); @endphp
                                        @foreach($roles as $r)
                                            {{ $r }}
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>Phone number</th>
                                    <td> {{ $user->phone }} </td>
                                </tr>
                                <tr>
                                    @php 
                                        $uDob = $user->date_of_birth;
                                        $dob = new \DateTime($uDob);
                                        $now = new \DateTime();
                                        $diff = $now->diff($dob);
                                        $age = $diff->y;
                                    @endphp
                                    <th>Age</th>
                                    <td>{{ $age }} years old</td>
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
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3"></div>

            <a href="{{ url('/management/users') }}" style="float:right;" class="btn btn-primary"><i class="fas fa-caret-square-left"></i> Back to users list</a>

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