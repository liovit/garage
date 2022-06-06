@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        User Management <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> Users <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/management/permissions') }}" class="breadcrumb-style">PERMISSIONS</a> <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/management/permissions/create') }}" class="breadcrumb-style">Create new permission</a>
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
                  Create new permission
                </div>
                <div class="card-body card-body-custom">
                    <div class="mt-2"></div>
                    <form action="{{ url('/management/permissions/confirm-creation') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 form-group mt-3">
                                <label for="">Permission name</label>
                                <div class="mt-2"></div>
                                <input type="text" name="n" class="form-control" placeholder="posts">
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
    $('#permissions-link').addClass("active");
    $('#homeSubmenu').addClass("show");

</script>

@endsection