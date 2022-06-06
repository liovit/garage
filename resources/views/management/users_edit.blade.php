@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        User Management <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> Users <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/management/users') }}" class="breadcrumb-style">Users List</a> <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/management/users/edit/'.$user->id) }}" class="breadcrumb-style">Edit User #{{ $user->id }}</a>
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

    <div class="row">
        {{-- pl-13 pr-27 content-row  --}}
        <div class="col-md-12 pl-13 pr-27 content-row">

            <div class="card card-custom">
                <div class="card-header card-header-custom">
                  Edit user {{ $user->name . " " . $user->last_name }}
                </div>
                <div class="card-body card-body-custom">
                    <div class="mt-2"></div>
                    <form action="{{ url('/management/users/edit/confirm/'.$user->id) }}" method="post" autocomplete="off">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="row">
                            <div class="col-md-4 form-group mt-3">
                                <input type="text" name="f" class="form-control" data-toggle="tooltip" title="Enter first name here" value="{{ $user->name }}">
                            </div>
                            <div class="col-md-4 form-group mt-3">
                                <input type="text" name="l" class="form-control" data-toggle="tooltip" title="Enter last name here" value="{{ $user->last_name }}">
                            </div>
                            <div class="col-md-4 form-group mt-3">
                                <input type="text" name="d" class="form-control" data-toggle="tooltip" title="Enter date of birth here" value="{{ $user->date_of_birth }}">
                            </div>
                        </div>
                        {{-- <div class="mt-3"></div> --}}
                        <div class="row">
                            <div class="col-md-6 form-group mt-3">
                                <input type="email" name="e" class="form-control" value="{{ $user->email }}" autocomplete="off" data-toggle="tooltip" title="Enter email here">
                            </div>
                            <div class="col-md-6 form-group mt-3">
                                <input type="password" name="p" class="form-control" placeholder="Password" autocomplete="new-password" data-toggle="tooltip" title="Enter password here">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group mt-3">
                                <label for="">Select role for the user</label>
                                <div class="mt-2"></div>
                                <select class="role-select form-control" name="role">

                                    @if($user->getRoleNames())

                                    @php
                                        $arr = [];
                                        $userRoles = $user->getRoleNames();
                                        foreach($userRoles as $r) { array_push($arr, $r); }
                                    @endphp
                                    
                                    @foreach($roles as $ar)
                                        @foreach($arr as $r)
                                            @if($r == $ar->name)
                                                <option value="{{ $ar->name }}" selected>{{ $ar->name }}</option>
                                            @endif
                                        @endforeach
                                    @endforeach

                                    @foreach($roles as $ar)
                                        @if(!in_array($ar->name, $arr))
                                            <option value="{{ $ar->name }}">{{ $ar->name }}</option>
                                        @endif
                                    @endforeach

                                    @else
                                        @foreach($roles as $ar)
                                            <option value="{{ $ar->name }}">{{ $ar->name }}</option>
                                        @endforeach    
                                    @endif

                                </select>
                            </div>
                        </div>
                        <div class="mt-3"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" style="float:right;" class="col-12 btn btn-primary btn-primary-second">Confirm <i class="fas fa-check"></i></button>
                            </div>
                        </div>
                    </form>
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

    $(document).ready( function () {
        $('#users_table').DataTable({
            "autoWidth": false
        });
        $('.role-select').select2();
    } );

    $('#user_create').click(function() {
        window.location.href = "{{ url('/management/users/create') }}";
    });

</script>

@endsection