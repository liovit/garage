@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        User Management <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> Users <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/management/roles') }}" class="breadcrumb-style">Roles List</a> <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/management/roles/edit/'.$role->id) }}" class="breadcrumb-style">Edit Role #{{ $role->id }}</a>
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
                  Edit role {{ $role->name }}
                </div>
                <div class="card-body card-body-custom">
                    <div class="mt-2"></div>
                    @if(Session::has('success'))
                        <div class="alert alert-info text-center">{{ Session::get('success') }}</div>
                    @endif
                    <form action="{{ url('/management/roles/edit/confirm/'.$role->id) }}" method="post" autocomplete="off">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="row">
                            <div class="col-md-12 form-group mt-2">
                                <label for="">Role name</label>
                                <div class="mt-2"></div>
                                <input type="text" name="n" class="form-control" data-toggle="tooltip" title="Enter role name here" value="{{ $role->name }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group mt-3">
                                <label for="">Select permissions for {{ $role->name }} role</label>
                                <div class="mt-2"></div>
                                <select class="permissions-select form-control" name="permissions[]" multiple="multiple">

                                    @if($role->permissions)

                                    @php
                                        $arr = [];
                                        foreach($role->permissions as $p) { array_push($arr, $p->id); }
                                    @endphp
                                    
                                    @foreach($permissions as $ap)
                                        @foreach($arr as $p)
                                            @if($p == $ap->id)
                                                <option value="{{ $ap->name }}" selected>{{ $ap->name }}</option>
                                            @endif
                                        @endforeach
                                    @endforeach

                                    @foreach($permissions as $ap)
                                        @if(!in_array($ap->id, $arr))
                                            <option value="{{ $ap->name }}">{{ $ap->name }}</option>
                                        @endif
                                    @endforeach

                                    @else
                                        @foreach($permissions as $ap)
                                            <option value="{{ $ap->name }}">{{ $ap->name }}</option>
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

            <a href="{{ url('/management/roles') }}" style="float:right;" class="btn btn-primary"><i class="fas fa-caret-square-left"></i> Back to roles list</a>

        </div>
    </div>

@endsection

@section('scripts')

<script>
    $('.components > li').each(function() {
        $(this).removeClass("active");
    });
    $('#roles-link').addClass("active");
    $('#homeSubmenu').addClass("show");

    $(document).ready(function() {
        $('.permissions-select').select2();
    });

</script>

@endsection