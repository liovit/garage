@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Management <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/my-settings') }}" class="breadcrumb-style">My Settings</a>
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
                    Password
                </div>
                <div class="card-body card-body-custom">
                    <div class="mt-2"></div>
                    <form action="{{ url('/my-settings/change-password') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 form-group mt-2">
                                <label for="">Current password</label>
                                <div class="mt-2"></div>
                                <input type="password" name="current_password" class="form-control col-6" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group mt-2">
                                <label for="">New password</label>
                                <div class="mt-2"></div>
                                <input type="password" name="new_password" class="form-control col-6" step="0.01" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group mt-2">
                                <label for="">Repeat new password</label>
                                <div class="mt-2"></div>
                                <input type="password" name="new_password_confirm" class="form-control col-6" required>
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

            <div class="card card-custom mt-4">
                <div class="card-header card-header-custom">
                    Notifications
                </div>
                <div class="card-body card-body-custom">
                    <div class="mt-2"></div>
                    <form action="{{ url('/my-settings/set-notifications') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row mt-2 mb-2">
                            <span>Select which notifications you want to receive in email</span>
                        </div>
                        <div class="row">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio1" name="notifications" value="1" class="custom-control-input" @if($user->notifications == 1) checked @endif>
                                <label class="custom-control-label" for="customRadio1">All</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="notifications" value="2" class="custom-control-input" @if($user->notifications == 2) checked @endif>
                                <label class="custom-control-label" for="customRadio2">Events only</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="notifications" value="3" class="custom-control-input" @if($user->notifications == 3) checked @endif>
                                <label class="custom-control-label" for="customRadio2">Equipment warranty only</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="customRadio2" name="notifications" value="4" class="custom-control-input" @if($user->notifications == 4) checked @endif>
                                <label class="custom-control-label" for="customRadio2">Parts running out only</label>
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

        </div>
    </div>

@endsection

@section('scripts')

<script>
    $('.components > li').each(function() {
        $(this).removeClass("active");
    });
    $('#homeSubmenu').addClass("show");
    $('#my-settings-link').addClass("active");

</script>

@endsection