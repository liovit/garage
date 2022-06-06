@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        User Management <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> Users <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/management/roles') }}" class="breadcrumb-style">Roles</a> <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/management/roles/create') }}" class="breadcrumb-style">Create new role</a>
    </div>
@endsection

@section('content-d')

    <div style="margin-top: 20px;"></div>

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
                  Create new role
                </div>
                <div class="card-body card-body-custom">
                    <div class="mt-2"></div>
                    <form action="{{ url('/management/roles/confirm-creation') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 form-group mt-3">
                                <label for="">Role name</label>
                                <div class="mt-2"></div>
                                <input type="text" name="n" class="form-control" placeholder="VIP / Worker / Supplier">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group mt-3">
                                <label for="">Select permissions for new role</label>
                                <div class="mt-2"></div>
                                <select class="permissions-select form-control" name="permissions[]" multiple="multiple">
                                    @foreach($permissions as $ap)
                                        <option value="{{ $ap->name }}">{{ $ap->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mt-3"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" style="float:right;" class="col-md-12 btn btn-primary btn-primary-second">Confirm <i class="fas fa-check"></i></button>
                            </div>
                        </div>
                    </form>
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
    $('#roles-link').addClass("active");
    $('#homeSubmenu').addClass("show");

    $(document).ready(function() {
        $('.permissions-select').select2();
    });

</script>

@endsection