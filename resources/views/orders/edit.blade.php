@extends('home')

<title>{{ __('Garage | Edit Order ') }} {{ $order->id }}</title>

@section('toolbar-content')

    @section('breadcrumbs')
        {{ __('Orders') }}
    @endsection

    @section('description')
        {{ __('Edit Work Order') }}
    @endsection

    @section('back-button')
        <div class="m-0">
            {{-- <a href="{{ url()->previous() }}" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder"> --}}
            <a href="{{ url()->previous() }}" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder">
            <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo4/dist/../src/media/svg/icons/Navigation/Angle-double-left.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <polygon points="0 0 24 0 24 24 0 24"/>
                    <path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) "/>
                    <path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) "/>
                </g>
            </svg></span>
            {{ __('Back') }}</a>
        </div>
    @endsection

    @section('create-button')
        <a href="{{ request()->fullUrl() }}" class="btn btn-sm btn-primary">
            <span class="svg-icon svg-icon-2"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo4/dist/../src/media/svg/icons/General/Update.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <path d="M8.43296491,7.17429118 L9.40782327,7.85689436 C9.49616631,7.91875282 9.56214077,8.00751728 9.5959027,8.10994332 C9.68235021,8.37220548 9.53982427,8.65489052 9.27756211,8.74133803 L5.89079566,9.85769242 C5.84469033,9.87288977 5.79661753,9.8812917 5.74809064,9.88263369 C5.4720538,9.8902674 5.24209339,9.67268366 5.23445968,9.39664682 L5.13610134,5.83998177 C5.13313425,5.73269078 5.16477113,5.62729274 5.22633424,5.53937151 C5.384723,5.31316892 5.69649589,5.25819495 5.92269848,5.4165837 L6.72910242,5.98123382 C8.16546398,4.72182424 10.0239806,4 12,4 C16.418278,4 20,7.581722 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 L6,12 C6,15.3137085 8.6862915,18 12,18 C15.3137085,18 18,15.3137085 18,12 C18,8.6862915 15.3137085,6 12,6 C10.6885336,6 9.44767246,6.42282109 8.43296491,7.17429118 Z" fill="#000000" fill-rule="nonzero"/>
                </g>
            </svg><!--end::Svg Icon--></span>
        {{ __('Refresh') }}</a>
    @endsection

@endsection

@section('container-content')

    <div style="margin-top: 30px;"></div>

    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl pb-8">

            @if (Session::has('success'))
            <!--begin::Alert-->
            <div class="alert alert-dismissible bg-light-success d-flex flex-column flex-sm-row p-5 mb-10">
                <!--begin::Icon-->
                <span class="svg-icon svg-icon-2hx svg-icon-success me-4 mb-5 mb-sm-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z" fill="black"></path>
                        <path d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z" fill="black"></path>
                    </svg>
                </span>
                <!--end::Icon-->

                <!--begin::Wrapper-->
                <div class="d-flex flex-column pe-0 pe-sm-10">
                    <!--begin::Title-->
                    <h4 class="fw-bold">{{ __('Success') }}</h4>
                    <!--end::Title-->
                    <!--begin::Content-->
                    <span>{{ Session::get('success') }}</span>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->

                <!--begin::Close-->
                <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                    <span class="svg-icon svg-icon-1 svg-icon-success">
                        <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr011.svg-->
                        <span class="svg-icon svg-icon-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" d="M6 19.7C5.7 19.7 5.5 19.6 5.3 19.4C4.9 19 4.9 18.4 5.3 18L18 5.3C18.4 4.9 19 4.9 19.4 5.3C19.8 5.7 19.8 6.29999 19.4 6.69999L6.7 19.4C6.5 19.6 6.3 19.7 6 19.7Z" fill="black"/>
                        <path d="M18.8 19.7C18.5 19.7 18.3 19.6 18.1 19.4L5.40001 6.69999C5.00001 6.29999 5.00001 5.7 5.40001 5.3C5.80001 4.9 6.40001 4.9 6.80001 5.3L19.5 18C19.9 18.4 19.9 19 19.5 19.4C19.3 19.6 19 19.7 18.8 19.7Z" fill="black"/>
                        </svg></span>
                        <!--end::Svg Icon-->
                    </span>
                </button>
                <!--end::Close-->
            </div>
            <!--end::Alert-->
            @endif

            @if($errors->any())
            <!--begin::Alert-->
            <div class="alert alert-dismissible bg-light-danger d-flex flex-column flex-sm-row p-5 mb-10">
                <!--begin::Icon-->
                <span class="svg-icon svg-icon-2hx svg-icon-danger me-4 mb-5 mb-sm-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" d="M2 4V16C2 16.6 2.4 17 3 17H13L16.6 20.6C17.1 21.1 18 20.8 18 20V17H21C21.6 17 22 16.6 22 16V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4Z" fill="black"></path>
                        <path d="M18 9H6C5.4 9 5 8.6 5 8C5 7.4 5.4 7 6 7H18C18.6 7 19 7.4 19 8C19 8.6 18.6 9 18 9ZM16 12C16 11.4 15.6 11 15 11H6C5.4 11 5 11.4 5 12C5 12.6 5.4 13 6 13H15C15.6 13 16 12.6 16 12Z" fill="black"></path>
                    </svg>
                </span>
                <!--end::Icon-->

                <!--begin::Wrapper-->
                <div class="d-flex flex-column pe-0 pe-sm-10">
                    <!--begin::Title-->
                    <h4 class="fw-bold">{{ __('Something is wrong') }}</h4>
                    <!--end::Title-->
                    <!--begin::Content-->
                    {!! implode('', $errors->all('<span>• :message</span>')) !!}
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->

                <!--begin::Close-->
                <button type="button" class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto" data-bs-dismiss="alert">
                    <span class="svg-icon svg-icon-1 svg-icon-danger">
                        <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr011.svg-->
                        <span class="svg-icon svg-icon-1"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path opacity="0.3" d="M6 19.7C5.7 19.7 5.5 19.6 5.3 19.4C4.9 19 4.9 18.4 5.3 18L18 5.3C18.4 4.9 19 4.9 19.4 5.3C19.8 5.7 19.8 6.29999 19.4 6.69999L6.7 19.4C6.5 19.6 6.3 19.7 6 19.7Z" fill="black"/>
                        <path d="M18.8 19.7C18.5 19.7 18.3 19.6 18.1 19.4L5.40001 6.69999C5.00001 6.29999 5.00001 5.7 5.40001 5.3C5.80001 4.9 6.40001 4.9 6.80001 5.3L19.5 18C19.9 18.4 19.9 19 19.5 19.4C19.3 19.6 19 19.7 18.8 19.7Z" fill="black"/>
                        </svg></span>
                        <!--end::Svg Icon-->
                    </span>
                </button>
                <!--end::Close-->
            </div>
            <!--end::Alert-->
            @endif

            <form id="kt_modal_add_user_form" class="form" action="{{ url('/work/orders/update/'.$order->id) }}" method="post" enctype="multipart/form-data" autocomplete="off">
            @csrf

            <!--begin::Card-->
            <div class="card">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-2" style="min-height: 10px !important;">
                    <!--begin::Card title-->
                    <div class="card-title mt-8 mb-4">
                        <h2 class="fw-bolder mb-0">{{ __('Customer Information') }}</h2>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body py-4">

                    <div class="form-group row">

                        <!--begin::Input group-->
                        <div class="fv-row mb-8 col-md-12 col-xs-12">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2 ">{{ __('Customer') }}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="permissions-select form-control form-control-sm form-control-solid mb-3 mb-lg-0" name="customer_id">
                                <option value="" disabled selected>{{ __('Select a customer') }}</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}" @if($order->customer_id == $customer->id) selected @else disabled @endif>{{ $customer->name . ' || ' . $customer->company }}</option>
                                @endforeach
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                    </div>

                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->

            <!--begin::Card-->
            <div class="card mt-8">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-2" style="min-height: 10px !important;">
                    <!--begin::Card title-->
                    <div class="card-title mt-8 mb-4">
                        <h2 class="fw-bolder mb-0">{{ __('Vehicle Information') }}</h2>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body py-4">

                    <div class="form-group row">

                        <!--begin::Input group-->
                        <div class="fv-row mb-8 col-md-12 col-xs-12">
                            <!--begin::Label-->
                            <label class="required fw-bold fs-6 mb-2 ">{{ __('Type') }}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <select class="vehicle-type-select form-control form-control-sm form-control-solid mb-3 mb-lg-0" name="type" id="select_type">
                                <option value="" disabled selected>{{ __('Select type') }}</option>
                                <option value="car" @if($vehicle) @if($vehicle->type == 'car') selected @else disabled @endif @endif>{{ __('Car') }}</option>
                                <option value="truck" @if($vehicle) @if($vehicle->type == 'truck') selected @else disabled @endif @endif>{{ __('Truck') }}</option>
                                <option value="trailer" @if($vehicle) @if($vehicle->type == 'trailer') selected @else disabled @endif @endif>{{ __('Trailer') }}</option>
                            </select>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-8 col-md-12 col-xs-12 search-input-box" style="display:none;">
                            <!--begin::Label-->
                            <label class="fw-bold fs-6 mb-2 ">{{ __('Search') }}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="text" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0 search-input" placeholder="Quick search in database">
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Truck Window group-->
                        <div class="row truck-window" style="display:none;">

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2 ">{{ __('VIN') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="vin_code" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->vin_code }}" @endif required>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2 ">{{ __('Model') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="model" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->model }}" @endif required>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2 ">{{ __('Make') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="make" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->make }}" @endif required>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2 ">{{ __('Engine') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="engine" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->engine }}" @endif required>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2 ">{{ __('Engine Number') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="engine_number" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->engine_number }}" @endif required>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2 ">{{ __('Gas Type') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="gas_type" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->gas_type }}" @endif required>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="fw-bold fs-6 mb-2 ">{{ __('Year') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="year" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->year }}" @endif required>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="fw-bold fs-6 mb-2 ">{{ __('Vehicle Number') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="company_vehicle_number" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->company_vehicle_number }}" @endif>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2 ">{{ __('Number Plate') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="number_plate" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->number_plate }}" @endif required>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="fw-bold fs-6 mb-2 ">{{ __('Color') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="color" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->color }}" @endif>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2 ">{{ __('Odometer') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="odometer_now" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->odometer_now }}" @endif required>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                        </div>
                        <!--end::Truck Window group-->

                        <!--begin::Car Window group-->
                        <div class="row car-window" style="display:none;">

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2 ">{{ __('VIN') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="vin_code" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->vin_code }}" @endif required>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2 ">{{ __('Model') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="model" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->model }}" @endif required>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2 ">{{ __('Make') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="make" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->make }}" @endif required>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2 ">{{ __('Engine') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="engine" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->engine }}" @endif required>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2 ">{{ __('Engine Number') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="engine_number" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->engine_number }}" @endif required>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2 ">{{ __('Gas Type') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="gas_type" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->gas_type }}" @endif required>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="fw-bold fs-6 mb-2 ">{{ __('Year') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="year" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->year }}" @endif required>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="fw-bold fs-6 mb-2 ">{{ __('Vehicle Number') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="company_vehicle_number" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->company_vehicle_number }}" @endif>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2 ">{{ __('Number Plate') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="number_plate" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->number_plate }}" @endif required>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="fw-bold fs-6 mb-2 ">{{ __('Color') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="color" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->color }}" @endif>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2 ">{{ __('Odometer') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="odometer_now" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->odometer_now }}" @endif required>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                        </div>
                        <!--end::Trailer Window group-->

                        <!--begin::Car Window group-->
                        <div class="row trailer-window" style="display:none;">

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2 ">{{ __('VIN') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="vin_code" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->vin_code }}" @endif required>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2 ">{{ __('Model') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="model" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->model }}" @endif required>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2 ">{{ __('Make') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="make" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->make }}" @endif required>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="fw-bold fs-6 mb-2 ">{{ __('Year') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="year" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->year }}" @endif required>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="fw-bold fs-6 mb-2 ">{{ __('Trailer Number') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="company_vehicle_number" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->company_vehicle_number }}" @endif>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="required fw-bold fs-6 mb-2 ">{{ __('Number Plate') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="number_plate" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->number_plate }}" @endif required>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                            <!--begin::Input group-->
                            <div class="mb-8 col-md-3">
                                <!--begin::Label-->
                                <label class="fw-bold fs-6 mb-2 ">{{ __('Color') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="color" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" @if($vehicle) value="{{ $vehicle->color }}" @endif>
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->

                        </div>
                        <!--end::Trailer Window group-->

                    </div>

                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->

            <!--begin::Card-->
            <div class="card mt-8">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-2" style="min-height: 10px !important;">
                    <!--begin::Card title-->
                    <div class="card-title mt-8 mb-4">
                        <h2 class="fw-bolder mb-0">{{ __('Tasks Information') }}</h2>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body py-4 mb-8">

                    <div class="">

                        <span class="required fw-bold fs-6 mb-2">{{ __('List of tasks that must be done') }}</span>

                        <button type="button" style="float:right;" data-toggle="modal" data-target="#addtask" class="add-to-do btn btn-primary btn-sm">{{ __('Add Task') }}</button>

                    </div>

                    <div class="form-group row mt-8" id="to_be_done_list">

                        @if($order->to_be_done)

                            @php 
                                $tasks = json_decode($order->to_be_done); 
                                $taskCount = 0;
                            @endphp

                            @foreach($tasks as $task)

                                <div class="row appended-to-do-row{{ $taskCount }} mt-4">

                                    <div class="col-8">
                                        <input type="text" name="to_be_done[]" value="{{ $task->value }}" class="form-control form-control-sm form-control-solid mb-3" required>
                                    </div>

                                    <div class="col-2">
                                        <div class="col-md-4">
                                            <div class="form-check form-switch form-check-custom form-check-solid">
                                                <input class="form-check-input tbdinput{{ $taskCount }} tbdinputs" data-idts="{{ $taskCount }}" type="checkbox" name="to_be_done_status[]" value="true" @if($task->status == true) checked @endif/>
                                                <input class="tbdcondition{{ $taskCount }}" type="hidden" name="to_be_done_status_condition[]" value="none">
                                                <label class="form-check-label fw-bold fs-6">
                                                    {{ __('Status') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-2">
                                        <button type="button" class="btn btn-secondary btn-sm btn-remove-task" data-task_id="{{ $taskCount }}">{{ __('Remove') }}</button>
                                    </div>

                                </div>

                                @php $taskCount++; @endphp

                            @endforeach

                        @else 
                            <div class="row appended-to-do-row19999 mt-4">
                                <div class="col-10">
                                    <input type="text" name="to_be_done[]" class="form-control form-control-sm form-control-solid mb-3" required>
                                </div>
                                <div class="col-2"></div>
                            </div>
                        @endif

                    </div>

                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->

            <!--begin::Card-->
            <div class="card mt-8">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-2" style="min-height: 10px !important;">
                    <!--begin::Card title-->
                    <div class="card-title mt-8 mb-4">
                        <h2 class="fw-bolder mb-0">{{ __('Done Jobs') }}</h2>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body py-4 mb-8">

                    <div class="">

                        <span class="fw-bold fs-6 mb-2">{{ __('List of jobs that have been done') }}</span>

                        <button type="button" style="float:right;" data-toggle="modal" data-target="#addjob" class="btn btn-primary btn-sm">{{ __('Add Job') }}</button>

                    </div>

                    <div class="form-group row mt-10" id="to_be_done_list">

                        <table id="jobs_table" class="table display table-hover table-striped" style="width:100%;">
            
                            <thead>
                                <tr>
                                    <th style="text-align:center;" class="fw-bold fs-6">{{ __('Mechanic') }}</th>
                                    <th style="text-align:center;" class="fw-bold fs-6">{{ __('Job') }}</th>
                                    <th style="text-align:center;" class="fw-bold fs-6">{{ __('Hours') }}</th>
                                    <th style="text-align:center;" class="fw-bold fs-6">{{ __('Cost') }}</th>
                                    <th style="text-align:center;" class="fw-bold fs-6">{{ __('Action') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if($order->done_jobs)
                                @php $doneJobs = json_decode($order->done_jobs); $toBeCount = 20000; $doneJobRows = 0; @endphp

                                    @foreach($doneJobs as $dj)
                                    <tr>
                                        @php $mechanicName = \App\Models\User::find($dj->mechanic); @endphp
                                        <td style="text-align:center;">{{ $mechanicName->name . " " . $mechanicName->last_name }}</td>
                                        <td style="text-align:center;">{{ $dj->job }}</td>
                                        <td style="text-align:center;">{{ $dj->hours_worked }}</td>
                                        <td style="text-align:center;">$ {{ $dj->cost }}</td>
                                        <td style="text-align:center;"><button type="button" class="btn btn-sm btn-primary btn-remove-done-job" data-done_job_id="{{ $doneJobRows }}">{{ __('Delete') }}</button></td>
                                        @php $doneJobRows++; @endphp
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>

                        </table>

                    </div>

                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->

            <!--begin::Card-->
            <div class="card mt-8">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-2" style="min-height: 10px !important;">
                    <!--begin::Card title-->
                    <div class="card-title mt-8 mb-4">
                        <h2 class="fw-bolder mb-0">{{ __('Used Parts') }}</h2>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body py-4 mb-8">

                    <div class="">

                        <span class="fw-bold fs-6 mb-2">{{ __('List of parts that have been used') }}</span>

                        <button type="button" style="float:right;"  data-toggle="modal" data-target="#addpart" class="btn btn-primary btn-sm">{{ __('Add Part') }}</button>

                    </div>

                    <div class="form-group row mt-10" id="to_be_done_list">

                        <table id="jobs_table" class="table display table-hover table-striped" style="width:100%;">
            
                            <thead>
                                <tr>
                                    <th style="text-align:center;" class="fw-bold fs-6">{{ __('Part') }}</th>
                                    <th style="text-align:center;" class="fw-bold fs-6">{{ __('Quantity') }}</th>
                                    <th style="text-align:center;" class="fw-bold fs-6">{{ __('Unit Cost') }}</th>
                                    <th style="text-align:center;" class="fw-bold fs-6">{{ __('Total Cost') }}</th>
                                    <th style="text-align:center;" class="fw-bold fs-6">{{ __('Action') }}</th>
                                </tr>
                            </thead>

                            <tbody>
                                @if($order->used_parts)
                                @php $usedParts = json_decode($order->used_parts); $usedPartsRow = 0; @endphp

                                    @foreach($usedParts as $up)
                                    <tr>
                                        @php $partName = \App\Models\Part::find($up->part); @endphp
                                        <td style="text-align:center;">{{ $partName->description }}</td>
                                        <td style="text-align:center;">{{ $up->quantity }}</td>
                                        <td style="text-align:center;">$ {{ $up->cost }}</td>
                                        <td style="text-align:center;">$ {{ $up->cost * $up->quantity }}</td>
                                        <td style="text-align:center;"><button type="button" class="btn btn-sm btn-primary btn-remove-used-part" data-part_row="{{ $usedPartsRow }}">{{ __('Delete') }}</button></td>
                                        @php $usedPartsRow++; @endphp
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>

                        </table>

                    </div>

                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->

            <!--begin::Card-->
            <div class="card mt-8">
                <!--begin::Card header-->
                <div class="card-header border-0 pt-2" style="min-height: 10px !important;">
                    <!--begin::Card title-->
                    <div class="card-title mt-8 mb-4">
                        <h2 class="fw-bolder mb-0">{{ __('Other Information') }}</h2>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                    </div>
                    <!--end::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body py-4 mb-8">

                    <div class="row mt-1">

                        <!--begin::Input group-->
                        <div class="mb-8 col-md-4">
                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" name="priority" value="yes" @if($order->priority == "yes") checked @endif id="order_priority" />
                                <label class="form-check-label fw-bold fs-6" for="order_priority">
                                    {{ __('This order must be prioritized') }}
                                </label>
                            </div>
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="mb-8 col-md-3">
                            <!--begin::Label-->
                            <label class="fw-bold fs-6 mb-2 ">{{ __('Order Budget') }}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="number" step="100" name="budget" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" value="{{ $order->budget }}" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)">
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                    </div>

                    @if($order->comments != null)
                        
                        @php $cmts = json_decode($order->comments); @endphp
                        
                        @foreach($cmts as $key => $c)
                            <div class="row col-12 mt-3 mb-3 comment-box">
                                <div class="col-6">
                                    <label>{{ $c->owner }}</label> 
                                    @if($c->owner == $user->name . " " . $user->last_name)
                                        <button type="button" style="border:none;background:none;" data-toggle="tooltip" data-order-id="{{ $order->id }}" data-comment-id="{{ $key }}" title="Delete comment" class="delete_comment"><i class="fa fa-times-circle" aria-hidden="true"></i></button>
                                    @endif
                                </div>
                                <div class="col-6">
                                    <label style="float:right;">{{ $c->date }}</label>
                                </div>

                                <span>{{ $c->comment }}</span>

                                @if($c->pictures)
                                @php $pictureCount = 0; @endphp
                                    @foreach($c->pictures as $pic)
                                        @php $pictureCount++; @endphp
                                        <div class="col-2">
                                            <a class="attachment-text" href="{{ url('/temporary/orders/comments/'.$order->id."/".$pic) }}">{{ __('Attachment') }} {{ $pictureCount }}</a> 
                                        </div>
                                    @endforeach
                                @endif

                            </div>
                        @endforeach

                        @if(strlen($order->comments) > 4)

                            <div class="mt-8"></div>

                        @endif

                    @endif

                    <div class="row">

                        <!--begin::Input group-->
                        <div class="mb-8">
                            <!--begin::Label-->
                            <label class="fw-bold fs-6 mb-2 ">{{ __('Comment') }}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <textarea type="text" id="editor" name="comments" rows="6" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0"></textarea>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="mb-2">
                            <!--begin::Label-->
                            <label class="fw-bold fs-6 mb-2 ">{{ __('Attach picture(-s)') }}</label>
                            <!--end::Label-->
                            <!--begin::Input-->
                            <input type="file" name="pictures[]" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" multiple>
                            <!--end::Input-->
                        </div>
                        <!--end::Input group-->

                    </div>

                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->

            <!--begin::Actions-->
            <div class="mt-8" style="float:left;">
                <button type="submit" name="action" value="complete" class="btn btn-primary" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="{{ __('Once clicked, you will not be able to edit this order anymore.') }}">
                    <span class="indicator-label">{{ __('Complete Order') }}</span>
                    <span class="indicator-progress">{{ __('Please wait...') }}
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
            <div class="mt-8" style="float:right;">
                <a href="{{ request()->fullUrl() }}" class="btn btn-danger me-3">{{ __('Discard') }}</a>
                <button type="submit" name="action" value="save" class="btn btn-primary">
                    <span class="indicator-label">{{ __('Save') }}</span>
                    <span class="indicator-progress">{{ __('Please wait...') }}
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
            </div>
            <!--end::Actions-->

            </form>
            <!--end::Form-->

        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->

    <div class="modal fade" id="addjob" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">{{ __('Add Job') }}</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/work/add-job/'.$order->id) }}" method="post" id="job_addition" class="">
                    @csrf
                    <div class="col-md-12">
                        <label for="">{{ __('Mechanic') }}</label>
                        <select name="mechanic" id="mechanic_select" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" required>
                            <option value="" selected="selected" disabled>{{ __('Select a mechanic') }}</option>
                            @foreach($mechanics as $mechanic)
                                @if($mechanic->hasRole('Mechanic'))
                                    <option value="{{ $mechanic->id }}">{{ $mechanic->name . " " . $mechanic->last_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2"></div>
                    <div class="col-md-12">
                        <label for="">{{ __('Job Description') }}</label>
                        <textarea name="job_desc" id="job_desc" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" cols="30" rows="4"></textarea>
                    </div>
                    <div class="mt-2"></div>
                    <div class="col-md-12">
                        <label for="">{{ __('Hours worked') }}</label>
                        <input type="number" name="hours_worked" id="hours_worked" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-sm btn-secondary"><i class="fa fa-times-circle" aria-hidden="true"></i>{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-circle" aria-hidden="true"></i> {{ __('Add Job') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addpart" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">{{ __('Add Part') }}</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/work/add-part/'.$order->id) }}" method="post" id="part_addition" class="">
                    @csrf
                    <div class="col-md-12">
                        <label for="">{{ __('Select a part') }}</label>
                        <select name="part_id" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" id="part-selection" required>
                            @foreach($parts as $part)
                            <option value="{{ $part->id }}">
                                {{ __('Description') }}: <b>{{ $part->description }}</b>, @if($part->code){{ __('Code') }}: <b>{{ $part->code }}</b>, @endif
                                @if($part->bar_code){{ __('Bar Code') }}: <b>{{ $part->bar_code }}</b>.@endif </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-2"></div>
                    <div class="col-md-12">
                        <label for="">{{ __('Quantity') }}</label>
                        <input type="number" name="part_quantity" step="1.00" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-sm btn-secondary"><i class="fa fa-times-circle" aria-hidden="true"></i>{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-circle" aria-hidden="true"></i> {{ __('Add Part') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="addtask" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">{{ __('Add Task') }}</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/work/add-task/'.$order->id) }}" method="post" id="task_addition" class="">
                    @csrf
                    <div class="mt-2"></div>
                    <div class="col-md-12">
                        <label for="">{{ __('Task Description') }}</label>
                        <input type="text" name="value" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-sm btn-secondary"><i class="fa fa-times-circle" aria-hidden="true"></i>{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-check-circle" aria-hidden="true"></i> {{ __('Add Task') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="removejob" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">{{ __('Remove Job') }}</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/work/remove-job/'.$order->id) }}" method="post" id="job_removing" class="">
                    @csrf
                    <div class="col-md-12">
                        <input type="hidden" id="remove_job_row" name="remove_job_row" value="">
                        <span>{{ __('Are you sure you want to delete this job?') }}</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-sm btn-secondary btn-close-job-modal"><i class="fa fa-times-circle" aria-hidden="true"></i>{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check-circle" aria-hidden="true"></i> {{ __('Delete') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="removetask" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">{{ __('Remove Task') }}</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/work/remove-task/'.$order->id) }}" method="post" id="task_removing" class="">
                    @csrf
                    <div class="col-md-12">
                        <input type="hidden" id="remove_task_row" name="remove_task_row" value="">
                        <span>{{ __('Are you sure you want to delete this task?') }}</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-sm btn-secondary btn-close-task-modal"><i class="fa fa-times-circle" aria-hidden="true"></i>{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-check-circle" aria-hidden="true"></i> {{ __('Delete') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="removepart" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">{{ __('Remove Part') }}</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ url('/work/remove-part/'.$order->id) }}" method="post" id="job_removing" class="">
                    @csrf
                    <div class="col-md-12">
                        <input type="hidden" id="remove_part_row" name="remove_part_row" value="">
                        <span>{{ ('Are you sure you want to delete this part from the order?') }}</span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-sm btn-secondary btn-close-part-modal"><i class="fa fa-times-circle" aria-hidden="true"></i>{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-success btn-sm "><i class="fa fa-check-circle" aria-hidden="true"></i> {{ __('Delete') }}</button>
                </div>
                </form>
            </div>
        </div>
    </div>


@endsection

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.datatables.net/colreorder/1.3.2/js/dataTables.colReorder.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.colVis.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.1/js/buttons.html5.min.js"></script>

    <script>

        $(document).ready( function () {

            // remove active classes from sidebar
            $('.menu-item').each(function() {
                $(this).removeClass('here');
                $(this).removeClass('show');
            });

            // add active classes to sidebar (current page)
            $('.menu-orders-accordion').addClass('hover show');
            $('.menu-orders-list').addClass('show');

            $('.permissions-select').select2({
                minimumResultsForSearch: 1
            });

            $('.vehicle-type-select').select2({
                minimumResultsForSearch: 1
            });

            $('#part-selection').select2({
                minimumResultsForSearch: 1
            });

            $('#mechanic_select').select2({
                minimumResultsForSearch: 1
            });

            $('.btn-close-job-modal').on('click', function() {
                $('#removejob').modal('toggle');
            });

            $('.btn-close-part-modal').on('click', function() {
                $('#removepart').modal('toggle');
            });

            $('.btn-close-task-modal').on('click', function() {
                $('#removetask').modal('toggle');
            });

            $('.btn-remove-done-job').on('click', function() {

                var row = $(this).attr('data-done_task_id');
                $('#remove_job_row').val(row);
                $('#removejob').modal('toggle');

            });

            $('.btn-remove-task').on('click', function() {

                var row = $(this).attr('data-task_id');
                $('#remove_task_row').val(row);
                $('#removetask').modal('toggle');

            });

            $('.btn-remove-used-part').on('click', function() {

                var row = $(this).attr('data-part_row');
                $('#remove_part_row').val(row);
                $('#removepart').modal('toggle');

            });

            // add a task

            $('.tbdinputs').on('change', function() {

                var row = $(this).attr('data-idts');

                if($('.tbdinput'+row).is(':checked')) {
                    $('.tbdcondition'+row).val('true');
                } else {
                    $('.tbdcondition'+row).val('false');
                }

            });

            $('.delete_comment').on('click', function() {

                var id = $(this).attr('data-order-id');
                var comment_id = $(this).attr('data-comment-id');

                $.ajax({

                    type:'POST',
                    url: '/orders/delete-comment',
                    data: {comment_id: comment_id, id: id},
                    beforeSend: function() {

                    },
                    success:function(data) {
                        
                        location.reload();

                    },

                });

            });

            // var toDoCount = {{ $taskCount }};

            // $('.add-to-do').on('click', function() {

            //     toDoCount++;

            //     $('#to_be_done_list').append('\
            //     <div class="mt-4 row appended-to-do-row'+toDoCount+'">\
            //         <div class="col-8">\
            //             <input type="text" name="to_be_done_new[]" class="form-control form-control-sm form-control-solid mb-3" required>\
            //         </div>\
            //         <div class="col-2">\
            //             <div class="col-md-4">\
            //                 <div class="form-check form-switch form-check-custom form-check-solid">\
            //                     <input class="form-check-input tbdinput'+toDoCount+' tbdinputs" type="checkbox" data-idts="'+toDoCount+'" name="to_be_done_status[]" value="true"/>\
            //                     <input class="tbdcondition'+toDoCount+'" type="hidden" name="to_be_done_status_condition[]" value="none">\
            //                     <label class="form-check-label fw-bold fs-6">\
            //                         {{ __('Status') }}\
            //                     </label>\
            //                 </div>\
            //             </div>\
            //         </div>\
            //         <div class="col-2">\
            //             <button type="button" class="btn btn-secondary btn-sm mb-3 remove-to-do" data-idt="'+toDoCount+'">{{ __('Remove') }}</button>\
            //         </div>\
            //     </div>\
            //     ');

            // });

            

            // // remove a task

            // $(document).on('click', '.remove-to-do', function() {
            //     var row = $(this).attr('data-idt');
            //     // console.log(row);
            //     $('.appended-to-do-row'+row).remove();
            // });

            // looking for vehicles

            $('.search-input').on('keyup', function(e) {

                var searchInput = $('.search-input').val();
                var type = $('#select_type option:selected').val();

                $.ajax({
                    type: 'POST',
                    url: '/orders/get-similar-vehicle',
                    data: {searchInput: searchInput, type: type},
                    beforeSend: function() {

                    },
                    success: function(data) {

                        $('#search-results').empty();

                        if(data) {

                            var objects = JSON.parse(data);
                            // console.log(objects);

                            objects.forEach(function(i, v) {

                                // console.log(i, v);

                                var id = i['id'];

                                if(i['pictures'] != null) {
                                    var firstPic = JSON.parse(i.pictures);
                                    // console.log(i['pictures'].shift());
                                    var picture = "{{ url('/temporary/parts/') }}" + "/" + id + "/" + firstPic[0];
                                } else {
                                    var picture = "{{ url('/temporary/part-placeholder.jpg') }}";
                                }
                                

                                if(!$('.evehicle'+id+'').length) {
                                    $('#search-results').append('<div class="d-flex row evehicle'+id+'"><div class="col-md-12 bought-part-hover mt-1" style="height:50px;"> <img src="'+picture+'" style="width:50px;height:50px;">\
                                    Model: <b>'+i['model']+'</b>, Make: <b>'+i['make']+'</b>, \
                                    Vin Code: <b>'+i['vin_code']+'</b>. \
                                    <button class="add-vehicle-btn btn btn-sm btn-primary" style="float:right;vertical-align:middle;" data-ide="'+id+'">Select this vehicle</button></div></div>')
                                }

                            });

                        }

                    }
                });

            });

            var cType = $("#select_type option:selected").val();
        
            if(cType == 'car') {
                $('.car-window').css('display', 'flex');
                $('.truck-window').css('display', 'none');
                $('.trailer-window').css('display', 'none');

                $('.car-window input').each(function(){
                    $(this).removeAttr('disabled');
                });
                $('.truck-window input').each(function(){
                    $(this).attr('disabled', 'disabled');
                });
                $('.trailer-window input').each(function(){
                    $(this).attr('disabled', 'disabled');
                });

            } else if(cType == 'truck') {

                $('.car-window').css('display', 'none');
                $('.truck-window').css('display', 'flex');
                $('.trailer-window').css('display', 'none');
    
                $('.car-window input').each(function(){
                    $(this).attr('disabled', 'disabled');
                });
                $('.truck-window input').each(function(){
                    $(this).removeAttr('disabled');
                });
                $('.trailer-window input').each(function(){
                    $(this).attr('disabled', 'disabled');
                });

            } else if(cType == 'trailer') {

                $('.car-window').css('display', 'none');
                $('.truck-window').css('display', 'none');
                $('.trailer-window').css('display', 'flex');

                $('.truck-window input').each(function(){
                    $(this).attr('disabled', 'disabled');
                });
                $('.trailer-window input').each(function(){
                    $(this).removeAttr('disabled');
                });
                $('.car-window input').each(function(){
                    $(this).attr('disabled', 'disabled');
                });
                
            }

            $('#select_type').on('change', function() {

                if(this.value == 'car') {
                    $('.car-window').css('display', 'flex');
                    $('.truck-window').css('display', 'none');
                    $('.trailer-window').css('display', 'none');
                    $('.search-input-box').css('display', 'block');

                    $('.truck-window input').each(function(){
                        $(this).attr('disabled', 'disabled');
                    });
                    $('.car-window input').each(function(){
                        $(this).removeAttr('disabled');
                    });
                    $('.trailer-window input').each(function(){
                        $(this).attr('disabled', 'disabled');
                    });

                } else if(this.value == 'truck') {

                    $('.car-window').css('display', 'none');
                    $('.truck-window').css('display', 'flex');
                    $('.trailer-window').css('display', 'none');
                    $('.search-input-box').css('display', 'block');

                    $('.car-window input').each(function(){
                        $(this).attr('disabled', 'disabled');
                    });
                    $('.truck-window input').each(function(){
                        $(this).removeAttr('disabled');
                    });
                    $('.trailer-window input').each(function(){
                        $(this).attr('disabled', 'disabled');
                    });

                } else if(this.value == 'trailer') {

                    $('.car-window').css('display', 'none');
                    $('.truck-window').css('display', 'none');
                    $('.trailer-window').css('display', 'flex');
                    $('.search-input-box').css('display', 'block');

                    $('.truck-window input').each(function(){
                        $(this).attr('disabled', 'disabled');
                    });
                    $('.trailer-window input').each(function(){
                        $(this).removeAttr('disabled');
                    });
                    $('.car-window input').each(function(){
                        $(this).attr('disabled', 'disabled');
                    });
                    
                } else {
                    $('.car-window').css('display', 'none');
                    $('.truck-window').css('display', 'none');
                    $('.trailer-window').css('display', 'none');
                    $('.search-input-box').css('display', 'none');
                }

            });

        });

        $(document).on('click', '.add-vehicle-btn', function(e) {

            e.preventDefault();

            var id = $(this).attr('data-ide');

            if(id) {

                $.ajax({

                    type:'POST',
                    url: '/orders/add-this-vehicle',
                    data: {id: id},
                    beforeSend: function() {

                    },
                    success:function(data) {

                        var obj = JSON.parse(data);

                        if(obj['odometer_before']) {
                            var getOdo = JSON.parse(obj['odometer_before']);
                            var odometer = getOdo.pop();
                        } else {
                            var odometer = obj['odometer_now'];
                        }

                        $('input[name="vin_code"]').val(obj['vin_code']);
                        $('input[name="model"]').val(obj['model']);
                        $('input[name="make"]').val(obj['make']);
                        $('input[name="engine"]').val(obj['engine']);
                        $('input[name="gas_type"]').val(obj['gas_type']);
                        $('input[name="year"]').val(obj['year']);
                        $('input[name="engine_number"]').val(obj['engine_number']);
                        $('input[name="number_plate"]').val(obj['number_plate']);
                        $('input[name="color"]').val(obj['color']);
                        $('input[name="odometer_now"]').val(odometer);
                        $('input[name="company_vehicle_number"]').val(obj['company_vehicle_number']);

                    },

                });

            }

        });

    </script>