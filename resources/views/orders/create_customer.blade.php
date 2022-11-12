@extends('home')

<title>{{ __('Garage | Create New Customer') }}</title>

@section('toolbar-content')

    @section('breadcrumbs')
        {{ __('Customers') }}
    @endsection

    @section('description')
        {{ __('Create New Customer') }}
    @endsection

    @section('back-button')
        <div class="m-0">
            {{-- <a href="{{ url()->previous() }}" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder"> --}}
            <a href="{{ url('/management/customers') }}" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder">
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
        <a href="{{ url('/management/customers/create') }}" class="btn btn-sm btn-primary">
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

            <!--begin:::Tabs-->
            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-1">
                <!--begin:::Tab item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_overview_tab">{{ __('Overview') }}</a>
                </li>
                <!--end:::Tab item-->
                <!--begin:::Tab item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_accounting_tab">{{ __('Accounting') }}</a>
                </li>
                <!--end:::Tab item-->
                <!--begin:::Tab item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_billing_tab">{{ __('Billing') }}</a>
                </li>
                <!--end:::Tab item-->
            </ul>
            <!--end:::Tabs-->

            <form id="kt_modal_add_user_form" class="form" action="{{ url('/management/customers/store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

            @csrf

            <!--begin:::Tab content-->
            <div class="tab-content" id="myTabContent">
                <!--begin:::Tab pane-->
                <div class="tab-pane fade show active" id="kt_overview_tab" role="tabpanel">
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
                            <!--begin::Input group-->
                            <div class="fv-row mb-7">
                                <!--begin::Label-->
                                <label class="d-block fw-bold fs-6 mb-5">{{ __('Avatar') }}</label>
                                <!--end::Label-->
                                <!--begin::Image input-->
                                <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url('/media/svg/avatars/blank.svg')">
                                    <!--begin::Preview existing avatar-->
                                    <div class="image-input-wrapper w-125px h-125px" style="background-image: url('/media/svg/avatars/blank.svg');"></div>
                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="{{ __('Change avatar') }}">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="avatar_remove" />
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="{{ __('Cancel avatar') }}">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                </div>
                                <!--end::Image input-->
                                <!--begin::Hint-->
                                <div class="form-text">{{ __('Allowed file types: png, jpg, jpeg.') }}</div>
                                <!--end::Hint-->
                            </div>

                            <div class="form-group row">

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 col-md-6 col-xs-12">
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2 ">{{ __('Company') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="company" value="{{ old('company') }}" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="Express Inc."/>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 col-md-6 col-xs-12">
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2 ">{{ __('Name') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="John Doe"/>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                            </div>

                            <div class="form-group row">

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 col-md-6 col-xs-12">
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2">{{ __('Email') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="smith@domain.com" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 col-md-6 col-xs-12">
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2">{{ __('Phone Number') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="telephone" value="{{ old('telephone') }}" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="+37062222345" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                            </div>

                            <div class="form-group row">

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 col-md-3 col-xs-12">
                                    <!--begin::Label-->
                                    <label class="fw-bold fs-6 mb-2">{{ __('Fax') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="fax" value="{{ old('fax') }}" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="555-444-7741" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 col-md-3 col-xs-12">
                                    <!--begin::Label-->
                                    <label class="fw-bold fs-6 mb-2">{{ __('Alt. Phone') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="alt_telephone" value="{{ old('alt_telephone') }}" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="555-444-7741" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 col-md-6 col-xs-12">
                                    <!--begin::Label-->
                                    <label class="fw-bold fs-6 mb-2">{{ __('License') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="license" value="{{ old('license') }}" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="License" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                            </div>

                            <div class="form-group row">

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 col-md-2 col-xs-12">
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2">{{ __('City') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="city" value="{{ old('city') }}" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="New York" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 col-md-4 col-xs-12">
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2">{{ __('Address') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="address" value="{{ old('address') }}" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="20 Water Street" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 col-md-3 col-xs-12">
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2">{{ __('Post Code') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="postal_code" value="{{ old('postal_code') }}" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="NY 10023" />
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 col-md-3 col-xs-12">
                                    <!--begin::Label-->
                                    <label class="required fw-bold fs-6 mb-2">{{ __('State') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="state" value="{{ old('state') }}" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="New York" />
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
                                <h2 class="fw-bolder mb-0">{{ __('Preferences') }}</h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body py-4 pb-10">

                            <div class="form-group row mb-3">

                                <div class="col-md-4 mt-3">
                                    <div class="form-check form-switch form-check-custom form-check-solid">
                                        <input class="form-check-input" type="checkbox" name="credit_customer" value="yes" id="flexSwitchDefault"/>
                                        <label class="form-check-label" for="flexSwitchDefault">
                                            {{ __('Credit Customer') }}
                                        </label>
                                    </div>
                                </div>

                                <div class="col-md-4 mt-3">

                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" name="customer_type" value="0" id="flexRadioDefault"/>
                                        <label class="form-check-label" for="flexRadioDefault">
                                            {{ __('Commercial Type Customer') }}
                                        </label>
                                    </div>

                                    <div class="form-check form-check-custom form-check-solid mt-3">
                                        <input class="form-check-input" type="radio" name="customer_type" value="1" id="flexRadioDefault"/>
                                        <label class="form-check-label" for="flexRadioDefault">
                                            {{ __('Private Type Customer') }}
                                        </label>
                                    </div>

                                </div>

                                <div class="col-md-4 mt-3">

                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input" type="radio" name="contact_preference" value="0" id="flexRadioDefault2"/>
                                        <label class="form-check-label" for="flexRadioDefault">
                                            {{ __('Contact Via Phone') }}
                                        </label>
                                    </div>

                                    <div class="form-check form-check-custom form-check-solid mt-3">
                                        <input class="form-check-input" type="radio" name="contact_preference" value="1" id="flexRadioDefault2"/>
                                        <label class="form-check-label" for="flexRadioDefault">
                                            {{ __('Contact Via Fax') }}
                                        </label>
                                    </div>

                                    <div class="form-check form-check-custom form-check-solid mt-3">
                                        <input class="form-check-input" type="radio" name="contact_preference" value="2" id="flexRadioDefault2"/>
                                        <label class="form-check-label" for="flexRadioDefault">
                                            {{ __('Contact Via Email') }}
                                        </label>
                                    </div>

                                </div>

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
                                <h2 class="fw-bolder mb-0">{{ __('Comments') }}</h2>
                            </div>
                            <!--end::Card title-->
                            <!--begin::Card toolbar-->
                            <div class="card-toolbar">
                            </div>
                            <!--end::Card toolbar-->
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body py-4 pb-10">

                            <div class="form-group row">

                                <div class="col-md-6 form-group mt-3">
                                    <label class="fw-bold fs-6 mb-2">{{ __('Language') }}</label>
                                    <select name="comments_language" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" id="">
                                        <option value="1">{{ __('English') }}</option>
                                        <option value="2">{{ __('Lithuanian') }}</option>
                                    </select>
                                </div>

                                <div class="col-md-6 form-group">
                                    <div class="mt-3">
                                        <label class="fw-bold fs-6 mb-2">{{ __('Instructions') }}</label>
                                        <textarea style="width: 100% !important;" name="comments_instructions" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" id="" cols="30" rows="10">{{ old('comments_instructions') }}</textarea>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->

                </div>
                <!--end:::Tab pane-->

                <!--begin:::Tab pane-->
                <div class="tab-pane fade show" id="kt_accounting_tab" role="tabpanel">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header border-0 pt-2" style="min-height: 10px !important;">
                            <!--begin::Card title-->
                            <div class="card-title mt-8 mb-4">
                                <h2 class="fw-bolder mb-0">{{ __('Accounting Information') }}</h2>
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
                                <div class="fv-row mb-7 col-md-4 col-xs-12">
                                    <!--begin::Label-->
                                    <label class="fw-bold fs-6 mb-2 ">{{ __('Tax Code') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="tax_code" value="{{ old('tax_code') }}" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder=""/>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 col-md-4 col-xs-12">
                                    <!--begin::Label-->
                                    <label class="fw-bold fs-6 mb-2 ">{{ __('Tax ID') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="tax_id" value="{{ old('tax_id') }}" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder=""/>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                 <!--begin::Input group-->
                                 <div class="fv-row mb-7 col-md-4 col-xs-12">
                                    <!--begin::Label-->
                                    <label class="fw-bold fs-6 mb-2 ">{{ __('Accounting ID') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="accounting_id" value="{{ old('accounting_id') }}" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder=""/>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                            </div>

                            <div class="form-group row">

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 col-md-4 col-xs-12">
                                    <!--begin::Label-->
                                    <label class="fw-bold fs-6 mb-2 ">{{ __('Credit Limit') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" name="credit_limit" value="{{ old('credit_limit') }}" step="100.00" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder=""/>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 col-md-4 col-xs-12">
                                    <!--begin::Label-->
                                    <label class="fw-bold fs-6 mb-2 ">{{ __('Interest Charge %') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" name="interest_charge" value="{{ old('interest_charge') }}" step="1.00" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder=""/>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 col-md-4 col-xs-12">
                                    <label class="fw-bold fs-6 mb-2">{{ __('Charge Every') }}</label>
                                    <select name="interest_charge_time" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" id="">
                                        <option value="0" disabled selected>{{ __('Select time') }}</option>
                                        <option value="1">{{ __('Day') }}</option>
                                        <option value="7">{{ __('Week') }}</option>
                                        <option value="30">{{ __('Month') }}</option>
                                    </select>
                                </div>
                                <!--end::Input group-->

                            </div>

                            <div class="form-group row">

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 col-xs-12">
                                    <!--begin::Label-->
                                    <label class="fw-bold fs-6 mb-2 ">{{ __('Terms - Balance') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="terms_balance" value="{{ old('terms_balance') }}" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder=""/>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                            </div>

                            <div class="form-group row">

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 col-xs-12">
                                    <!--begin::Label-->
                                    <label class="fw-bold fs-6 mb-2 ">{{ __('Terms - Payment') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="text" name="terms_payment" value="{{ old('terms_payment') }}" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder=""/>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                            </div>

                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end:::Tab pane-->

                <!--begin:::Tab pane-->
                <div class="tab-pane fade show" id="kt_billing_tab" role="tabpanel">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card header-->
                        <div class="card-header border-0 pt-2" style="min-height: 10px !important;">
                            <!--begin::Card title-->
                            <div class="card-title mt-8 mb-4">
                                <h2 class="fw-bolder mb-0">{{ __('Billing Information') }}</h2>
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

                            <div class="form-check form-switch form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" name="default_calculation" value="yes" id="defaultcalculation" checked />
                                <label class="form-check-label fw-bold fs-6" for="defaultcalculation">
                                    {{ __('Use default calculation') }}
                                </label>
                            </div>

                            <h4 class="fw-bolder mt-8">{{ __('Part Charge Base') }}</h4>

                            <div class="row mt-8" id="billing1">

                                <div class="form-group col-md-4">

                                    <div class="form-check form-check-custom form-check-solid ">
                                        <input class="form-check-input" type="radio" name="part_charge_base" value="0" id="flexRadioDefault3" checked/>
                                        <label class="form-check-label" for="flexRadioDefault">
                                            {{ __('Product Default') }}
                                        </label>
                                    </div>

                                    <div class="form-check form-check-custom form-check-solid mt-3 ">
                                        <input class="form-check-input" type="radio" name="part_charge_base" value="1" id="flexRadioDefault3"/>
                                        <label class="form-check-label" for="flexRadioDefault">
                                            {{ __('List') }}
                                        </label>
                                    </div>

                                    <div class="form-check form-check-custom form-check-solid mt-3 ">
                                        <input class="form-check-input" type="radio" name="part_charge_base" value="2" id="flexRadioDefault3"/>
                                        <label class="form-check-label" for="flexRadioDefault">
                                            {{ __('Cost +%') }}
                                        </label>
                                    </div>

                                </div>

                                <div class="form-group col-md-4">

                                    <div class="form-check form-check-custom form-check-solid ">
                                        <input class="form-check-input" type="radio" name="part_charge_base" value="3" id="flexRadioDefault3"/>
                                        <label class="form-check-label" for="flexRadioDefault">
                                            {{ __('List -%') }}
                                        </label>
                                    </div>

                                    <div class="form-check form-check-custom form-check-solid mt-3">
                                        <input class="form-check-input" type="radio" name="part_charge_base" value="4" id="flexRadioDefault3"/>
                                        <label class="form-check-label" for="flexRadioDefault">
                                            {{ __('Price A') }}
                                        </label>
                                    </div>

                                    <div class="form-check form-check-custom form-check-solid mt-3 ">
                                        <input class="form-check-input" type="radio" name="part_charge_base" value="5" id="flexRadioDefault3"/>
                                        <label class="form-check-label" for="flexRadioDefault">
                                            {{ __('Price B') }}
                                        </label>
                                    </div>

                                </div>

                                <div class="form-group col-md-4">

                                    <div class="form-check form-check-custom form-check-solid ">
                                        <input class="form-check-input" type="radio" name="part_charge_base" value="6" id="flexRadioDefault3"/>
                                        <label class="form-check-label" for="flexRadioDefault">
                                            {{ __('Price C') }}
                                        </label>
                                    </div>

                                    <div class="form-check form-check-custom form-check-solid mt-3 ">
                                        <input class="form-check-input" type="radio" name="part_charge_base" value="7" id="flexRadioDefault3"/>
                                        <label class="form-check-label" for="flexRadioDefault">
                                            {{ __('Price D') }}
                                        </label>
                                    </div>

                                    <div class="form-check form-check-custom form-check-solid mt-3 ">
                                        <input class="form-check-input" type="radio" name="part_charge_base" value="8" id="flexRadioDefault3"/>
                                        <label class="form-check-label" for="flexRadioDefault">
                                            {{ __('Price E') }}
                                        </label>
                                    </div>

                                </div>

                                <div class="form-group col-xs-12 mt-8">

                                     <!--begin::Input group-->
                                    <div class="fv-row mb-7 col-xs-12">
                                        <!--begin::Label-->
                                        <label class="fw-bold fs-6 mb-2 ">{{ __('Unit') }}</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="number" name="part_product_default" value="{{ old('part_product_default') }}" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" min="0.00" step="0.01" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0 radioinputs" placeholder="10"/>
                                        <input type="hidden" name="part_list_percentage" value="{{ old('part_list_percentage') }}" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" min="0.00" step="0.01" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0 radioinputs" placeholder="10"/>
                                        <input type="hidden" name="part_cost_percentage" value="{{ old('part_cost_percentage') }}" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" min="0.00" step="0.01" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0 radioinputs" placeholder="10"/>
                                        <input type="hidden" name="part_list_minus_percentage" value="{{ old('part_list_minus_percentage') }}" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" min="0.00" step="0.01" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0 radioinputs" placeholder="10"/>
                                        <input type="hidden" name="part_a_percentage" value="{{ old('part_a_percentage') }}" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" min="0.00" step="0.01" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0 radioinputs" placeholder="10"/>
                                        <input type="hidden" name="part_b_percentage" value="{{ old('part_b_percentage') }}" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" min="0.00" step="0.01" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0 radioinputs" placeholder="10"/>
                                        <input type="hidden" name="part_c_percentage" value="{{ old('part_c_percentage') }}" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" min="0.00" step="0.01" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0 radioinputs" placeholder="10"/>
                                        <input type="hidden" name="part_d_percentage" value="{{ old('part_d_percentage') }}" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" min="0.00" step="0.01" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0 radioinputs" placeholder="10"/>
                                        <input type="hidden" name="part_e_percentage" value="{{ old('part_e_percentage') }}" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" min="0.00" step="0.01" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0 radioinputs" placeholder="10"/>
                                        <!--end::Input-->
                                    </div>
                                    <!--end::Input group-->

                                </div>

                            </div>

                            <h4 class="fw-bolder mt-6">{{ __('Task Charge Base') }}</h4>

                            <div class="form-group row mt-6">

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 col-md-3 col-xs-12">
                                    <!--begin::Label-->
                                    <label class="fw-bold fs-6 mb-2 ">{{ __('Labor Rate') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" name="task_labor_rate" value="{{ old('task_labor_rate') }}" step="1.00" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="10"/>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 col-md-3 col-xs-12">
                                    <!--begin::Label-->
                                    <label class="fw-bold fs-6 mb-2 ">{{ __('PO Markup (%)') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" name="task_po_markup_percentage" value="{{ old('task_po_markup_percentage') }}" step="1.00" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="10"/>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 col-md-3 col-xs-12">
                                    <!--begin::Label-->
                                    <label class="fw-bold fs-6 mb-2 ">{{ __('Shop Charge (%)') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" name="shop_charge_percentage" value="{{ old('shop_charge_percentage') }}" step="1.00" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="10"/>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-7 col-md-3 col-xs-12">
                                    <!--begin::Label-->
                                    <label class="fw-bold fs-6 mb-2 ">{{ __('Shop Cost (%)') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <input type="number" name="shop_cost_percentage" value="{{ old('shop_cost_percentage') }}" step="1.00" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" class="form-control form-control-sm form-control-solid mb-3 mb-lg-0" placeholder="10"/>
                                    <!--end::Input-->
                                </div>
                                <!--end::Input group-->

                            </div>

                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end:::Tab pane-->

            </div>
            <!--end:::Tab content-->

            <!--begin::Actions-->
            <div class="mt-8" style="float:right;">
                <a href="{{ url('/management/customers/create') }}" class="btn btn-danger me-3">{{ __('Discard') }}</a>
                <button type="submit" class="btn btn-primary">
                    <span class="indicator-label">{{ __('Submit') }}</span>
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
            $('.menu-customers-list').addClass('show');

            $('input[name="part_charge_base"]').on('change', function() {

                $('.radioinputs').each(function() {
                    $(this).attr('type', 'hidden');
                });

                if(this.value == 0) {
                    $('input[name="part_product_default"]').attr('type', 'number');
                } else if (this.value == 1) {
                    $('input[name="part_list_percentage"]').attr('type', 'number');
                } else if (this.value == 2) {
                    $('input[name="part_cost_percentage"]').attr('type', 'number');
                } else if (this.value == 3) {
                    $('input[name="part_list_minus_percentage"]').attr('type', 'number');
                } else if (this.value == 4) {
                    $('input[name="part_a_percentage"]').attr('type', 'number');
                } else if (this.value == 5) {
                    $('input[name="part_b_percentage"]').attr('type', 'number');
                } else if (this.value == 6) {
                    $('input[name="part_c_percentage"]').attr('type', 'number');
                } else if (this.value == 7) {
                    $('input[name="part_d_percentage"]').attr('type', 'number');
                } else if (this.value == 8) {
                    $('input[name="part_e_percentage"]').attr('type', 'number');
                }

            });

            $('#defaultcalculation').on('change', function() {

                if($('#defaultcalculation').is(':checked')) {

                    $('input[name="part_charge_base"]').attr('disabled', true);
                    $('input[name="part_product_default"]').attr('disabled', true);
                    $('input[name="part_list_percentage"]').attr('disabled', true);
                    $('input[name="part_cost_percentage"]').attr('disabled', true);
                    $('input[name="part_list_minus_percentage"]').attr('disabled', true);
                    $('input[name="part_a_percentage"]').attr('disabled', true);
                    $('input[name="part_b_percentage"]').attr('disabled', true);
                    $('input[name="part_c_percentage"]').attr('disabled', true);
                    $('input[name="part_d_percentage"]').attr('disabled', true);
                    $('input[name="part_e_percentage"]').attr('disabled', true);
                    $('input[name="task_labor_rate"]').attr('disabled', true);
                    $('input[name="task_po_markup_percentage"]').attr('disabled', true);
                    $('input[name="shop_charge_percentage"]').attr('disabled', true);
                    $('input[name="shop_cost_percentage"]').attr('disabled', true);

                } else {
                    
                    $('input[name="part_charge_base"]').attr('disabled', false);
                    $('input[name="part_product_default"]').attr('disabled', false);
                    $('input[name="part_list_percentage"]').attr('disabled', false);
                    $('input[name="part_cost_percentage"]').attr('disabled', false);
                    $('input[name="part_list_minus_percentage"]').attr('disabled', false);
                    $('input[name="part_a_percentage"]').attr('disabled', false);
                    $('input[name="part_b_percentage"]').attr('disabled', false);
                    $('input[name="part_c_percentage"]').attr('disabled', false);
                    $('input[name="part_d_percentage"]').attr('disabled', false);
                    $('input[name="part_e_percentage"]').attr('disabled', false);
                    $('input[name="task_labor_rate"]').attr('disabled', false);
                    $('input[name="task_po_markup_percentage"]').attr('disabled', false);
                    $('input[name="shop_charge_percentage"]').attr('disabled', false);
                    $('input[name="shop_cost_percentage"]').attr('disabled', false);

                }

            });

            if($('#defaultcalculation').is(':checked')) {

                $('input[name="part_charge_base"]').attr('disabled', true);
                $('input[name="part_product_default"]').attr('disabled', true);
                $('input[name="part_list_percentage"]').attr('disabled', true);
                $('input[name="part_cost_percentage"]').attr('disabled', true);
                $('input[name="part_list_minus_percentage"]').attr('disabled', true);
                $('input[name="part_a_percentage"]').attr('disabled', true);
                $('input[name="part_b_percentage"]').attr('disabled', true);
                $('input[name="part_c_percentage"]').attr('disabled', true);
                $('input[name="part_d_percentage"]').attr('disabled', true);
                $('input[name="part_e_percentage"]').attr('disabled', true);
                $('input[name="task_labor_rate"]').attr('disabled', true);
                $('input[name="task_po_markup_percentage"]').attr('disabled', true);
                $('input[name="shop_charge_percentage"]').attr('disabled', true);
                $('input[name="shop_cost_percentage"]').attr('disabled', true);

            }


        });

    </script>