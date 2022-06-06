@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Management <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/settings/billing') }}" class="breadcrumb-style">Billing Settings</a>
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
                  Billing settings
                </div>
                <div class="card-body card-body-custom">
                    <div class="mt-2"></div>
                    <form action="{{ url('/settings/billing/edit/confirm/') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 form-group mt-2">
                                <label for="">Hourly labor rate ($)</label>
                                <div class="mt-2"></div>
                                <input type="number" name="work_hourly_cost" class="form-control col-6" value="{{ $bill->work_hourly_cost }}" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group mt-2">
                                <label for="">Part price +% (this percentage will be applied to each parts last price and then add to total)</label>
                                <div class="mt-2"></div>
                                <input type="number" name="part_percentage" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" class="form-control col-6" value="{{ $bill->part_percentage }}" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group mt-2">
                                <label for="">Equipment price +% (this percentage will be applied to the total cost of order)</label>
                                <div class="mt-2"></div>
                                <input type="number" name="equipment_percentage" class="form-control col-6" value="{{ $bill->equipment_percentage }}" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" required>
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

        </div>
    </div>

@endsection

@section('scripts')

<script>
    $('.components > li').each(function() {
        $(this).removeClass("active");
    });
    $('#billing-settings-link').addClass("active");
    $('#homeSubmenu').addClass("show");

    $(document).ready(function() {
        $('.permissions-select').select2();
    });

</script>

@endsection