@extends('home')

<title>{{ __('Garage | Viewing Customer') }} {{ $customer->name }}</title>

@section('toolbar-content')

    @section('breadcrumbs')
        {{ __('Customers') }}
    @endsection

    @section('description')
        {{ __('List') }}
    @endsection

    @section('back-button')
        <div class="m-0">
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
        <a href="{{ url('/management/suppliers/create') }}" class="btn btn-sm btn-primary">{{ __('Create') }}</a>
    @endsection

@endsection

@section('container-content')

<div style="margin-top: 30px;"></div>

<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">

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

        <!--begin::Layout-->
        <div class="d-flex flex-column flex-lg-row">
            <!--begin::Sidebar-->
            <div class="flex-column flex-lg-row-auto w-lg-250px w-xl-350px mb-10">
                <!--begin::Card-->
                <div class="card mb-5 mb-xl-8">
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Summary-->
                        <!--begin::User Info-->
                        <div class="d-flex flex-center flex-column py-5">
                            <!--begin::Avatar-->
                            <div class="symbol symbol-100px symbol-circle mb-7">
                                @if($customer->avatar)
                                    <img src="{{ url($customer->avatar) }}" alt="image" />
                                @else
                                    <img src="{{ url('/media/svg/avatars/blank.svg') }}" alt="image">
                                @endif
                            </div>
                            <!--end::Avatar-->
                            <!--begin::Name-->
                            <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-3">{{ $customer->name }}</a>
                            <!--end::Name-->
                            <!--begin::Position-->
                            <div class="mb-9">
                                <!--begin::Badge-->
                                    <div class="badge badge-lg badge-light-primary d-inline">{{ __('Customer') }}</div>
                                <!--begin::Badge-->
                            </div>
                            <!--end::Position-->
                            <!--begin::Info-->
                            <!--begin::Info heading-->
                            <div class="fw-bolder mb-3">{{ __('Assigned Orders') }}
                            <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-html="true" data-bs-content="{{ __('Number of orders assigned, closed and pending.') }}"></i></div>
                            <!--end::Info heading-->
                            <div class="d-flex flex-wrap flex-center">
                                <!--begin::Stats-->
                                <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                    <div class="fs-4 fw-bolder text-gray-700">
                                        <span class="w-75px">0</span>
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                        <span class="svg-icon svg-icon-3 svg-icon-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
                                                <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <div class="fw-bold text-muted">{{ __('Total') }}</div>
                                </div>
                                <!--end::Stats-->
                                <!--begin::Stats-->
                                <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
                                    <div class="fs-4 fw-bolder text-gray-700">
                                        <span class="w-50px">0</span>
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
                                        <span class="svg-icon svg-icon-3 svg-icon-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="black" />
                                                <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <div class="fw-bold text-muted">{{ __('Solved') }}</div>
                                </div>
                                <!--end::Stats-->
                                <!--begin::Stats-->
                                <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
                                    <div class="fs-4 fw-bolder text-gray-700">
                                        <span class="w-50px">0</span>
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
                                        <span class="svg-icon svg-icon-3 svg-icon-success">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="black" />
                                                <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="black" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </div>
                                    <div class="fw-bold text-muted">{{ __('Open') }}</div>
                                </div>
                                <!--end::Stats-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::User Info-->
                        <!--end::Summary-->
                        <!--begin::Details toggle-->
                        <div class="d-flex flex-stack fs-4 py-3">
                            <div class="fw-bolder rotate collapsible" data-bs-toggle="collapse" href="#kt_user_view_details" role="button" aria-expanded="false" aria-controls="kt_user_view_details">{{ __('Details') }}
                            <span class="ms-2 rotate-180">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                <span class="svg-icon svg-icon-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </span></div>
                        </div>
                        <!--end::Details toggle-->
                        <div class="separator"></div>
                        <!--begin::Details content-->
                        <div id="kt_user_view_details" class="collapse show">
                            <div class="pb-5 fs-6">
                                <!--begin::Details item-->
                                <div class="fw-bolder mt-5">{{ __('Supplier ID') }}</div>
                                <div class="text-gray-600">{{ $customer->id }}</div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bolder mt-5">{{ __('Company') }}</div>
                                <div class="text-gray-600">{{ $customer->company }}</div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                <div class="fw-bolder mt-5">{{ __('Email') }}</div>
                                <div class="text-gray-600">
                                    <a href="#" class="text-gray-600 text-hover-primary">{{ $customer->email }}</a>
                                </div>
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                @if($customer->telephone)
                                    <div class="fw-bolder mt-5">{{ __('Phone') }}</div>
                                    <div class="text-gray-600">{{ $customer->telephone }}</div>
                                @endif
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                @if($customer->alt_telephone)
                                    <div class="fw-bolder mt-5">{{ __('Alt. Phone') }}</div>
                                    <div class="text-gray-600">{{ $customer->alt_telephone }}</div>
                                @endif
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                @if($customer->fax)
                                    <div class="fw-bolder mt-5">{{ __('Fax') }}</div>
                                    <div class="text-gray-600">{{ $customer->fax }}</div>
                                @endif
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                @if($customer->address || $customer->city || $customer->postal_code || $customer->state || $customer->country)
                                    <div class="fw-bolder mt-5">{{ __('Address') }}</div>
                                @endif
                                @if($customer->addresss)
                                    <div class="text-gray-600">{{ $customer->address }},</div>
                                @endif
                                @if($customer->postal_code)
                                    <div class="text-gray-600">{{ $customer->postal_code }},</div>
                                @endif
                                @if($customer->city)
                                    <div class="text-gray-600">{{ $customer->city }},</div>
                                @endif
                                @if($customer->state)
                                    <div class="text-gray-600">{{ $customer->state }},</div>
                                @endif
                                @if($customer->country)
                                    <div class="text-gray-600">{{ $customer->country }}</div>
                                @endif
                                <!--begin::Details item-->
                                <!--begin::Details item-->
                                @if($customer->toll_free)
                                    <div class="fw-bolder mt-5">{{ __('Toll') }}</div>
                                    <div class="text-gray-600">{{ $customer->toll_free }}</div>
                                @endif
                                <!--begin::Details item-->
                            </div>
                        </div>
                        <!--end::Details content-->
                    </div>
                    <!--end::Card body-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Sidebar-->
            <!--begin::Content-->
            <div class="flex-lg-row-fluid ms-lg-15">
                <!--begin:::Tabs-->
                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_user_view_overview_tab">{{ __('Overview') }}</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_customer_view_accounting_tab">{{ __('Accounting') }}</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary pb-4" data-bs-toggle="tab" href="#kt_customer_view_billing_tab">{{ __('Billing') }}</a>
                    </li>
                    <!--end:::Tab item-->
                    <!--begin:::Tab item-->
                    <li class="nav-item ms-auto">
                        <!--begin::Action menu-->
                        <a href="#" class="btn btn-primary ps-7" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">{{ __('Actions') }}
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                        <span class="svg-icon svg-icon-2 me-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon--></a>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold py-4 w-250px fs-6" data-kt-menu="true">
                            <!--begin::Menu item-->
                            @canany(['customers.edit', 'everything'])
                                <div class="menu-item px-5 my-1">
                                    <a href="{{ url('/management/customers/edit/'.$customer->id) }}" class="menu-link px-5">{{ __('Edit Customer') }}</a>
                                </div>
                            @endcanany
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            @canany(['customers.delete', 'everything'])
                                <div class="menu-item px-5">
                                    <a href="{{ url('/management/customers/pre-delete/'.$customer->id) }}" class="menu-link text-danger px-5">{{ __('Delete Customer') }}</a>
                                </div>
                            @endcanany
                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                        <!--end::Menu-->
                    </li>
                    <!--end:::Tab item-->
                </ul>
                <!--end:::Tabs-->
                <!--begin:::Tab content-->
                <div class="tab-content" id="myTabContent">
                    <!--begin:::Tab pane-->
                    <div class="tab-pane fade show active" id="kt_user_view_overview_tab" role="tabpanel">
                        <!--begin::Card-->
                        <div class="card pt-4 mb-6 mb-xl-9">
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2 class="fw-bolder mb-0">{{ __('Preferences') }}</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div id="kt_customer_view_payment_method" class="card-body pt-0">
                                <!--begin::Option-->
                                <div class="py-0" data-kt-customer-payment-method="row">
                                    <!--begin::Body-->
                                    <div id="kt_customer_view_payment_method_1" class="collapse show fs-6 ps-10" data-bs-parent="#kt_customer_view_payment_method">
                                        <!--begin::Details-->
                                        <div class="d-flex flex-wrap py-5 pt-2">
                                            <div class="flex-equal me-5">
                                                <div class="row">

                                                    @if($customer->credit_customer == "yes")
                                                        <div class="d-flex align-items-center py-2">
                                                        <span class="bullet bg-primary me-3"></span><b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 0.95rem;">{{ __('This is a credit customer.') }}</div></b></div>
                                                    @else
                                                        <div class="d-flex align-items-center py-2">
                                                        <span class="bullet bg-primary me-3"></span><b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 0.95rem;">{{ __('This is not a credit customer.') }}</div></b></div>
                                                    @endif
                                                    
                                                    @if($customer->customer_type == 0)
                                                        <div class="d-flex align-items-center py-2">
                                                        <span class="bullet bg-primary me-3"></span><b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 0.95rem;">{{ __('This customer is a commercial type.') }}</div></b></div>
                                                    @endif

                                                    @if($customer->customer_type == 1)
                                                        <div class="d-flex align-items-center py-2">
                                                        <span class="bullet bg-primary me-3"></span><b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 0.95rem;">{{ __('This customer is a private type.') }}</div></b></div>
                                                    @endif

                                                    @if($customer->contact_preference == 0)
                                                        <div class="d-flex align-items-center py-2">
                                                        <span class="bullet bg-primary me-3"></span><b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 0.95rem;">{{ __('This customer prefers to be contacted via phone.') }}</div></b></div>
                                                    @endif

                                                    @if($customer->contact_preference == 1)
                                                        <div class="d-flex align-items-center py-2">
                                                        <span class="bullet bg-primary me-3"></span><b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 0.95rem;">{{ __('This customer prefers to be contacted via fax.') }}</div></b></div>
                                                    @endif

                                                    @if($customer->contact_preference == 2)
                                                        <div class="d-flex align-items-center py-2">
                                                        <span class="bullet bg-primary me-3"></span><b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 0.95rem;">{{ __('This customer prefers to be contacted via email.') }}</div></b></div>
                                                    @endif

                                                </div>
                                            </div>
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Option-->
                            </div>
                            <!--end::Card body-->
                        </div>
						<!--end::Card-->

                        @if($customer->comments_instructions)
                        <!--begin::Card-->
                        <div class="card pt-4 mb-6 mb-xl-9">
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2 class="fw-bolder mb-0">{{ __('Comments') }}</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->

                            <!--begin::Card body-->
                            <div id="kt_customer_view_payment_method" class="card-body pt-0">
                                <!--begin::Option-->
                                <div class="py-0" data-kt-customer-payment-method="row">
                                    <!--begin::Body-->
                                    <div id="kt_customer_view_payment_method_1" class="collapse show fs-6 ps-10" data-bs-parent="#kt_customer_view_payment_method">
                                        <!--begin::Details-->
                                        <div class="d-flex flex-wrap py-5 pt-2">
                                            <!--begin::Col-->
                                            <div class="flex-equal me-5">

                                                @if($customer->comments_language == 1)
                                                    <div class="d-flex align-items-center py-2">
                                                        <span class="bullet bg-primary me-3"></span>
                                                        <b class="px-2">
                                                            <div class="badge badge-light fw-bolder" style="font-size: 0.95rem;">
                                                                {{ __('Comments language is set to English.') }}
                                                            </div>
                                                        </b>
                                                    </div>
                                                @endif

                                                @if($customer->comments_language == 2)
                                                    <div class="d-flex align-items-center py-2">
                                                        <span class="bullet bg-primary me-3"></span>
                                                        <b class="px-2">
                                                            <div class="badge badge-light fw-bolder" style="font-size: 0.95rem;">
                                                                {{ __('Comments language is set to Lithuanian.') }}
                                                            </div>
                                                        </b>
                                                    </div>
                                                @endif

                                                <div class="d-flex align-items-center py-2">
                                                    <span class="bullet bg-primary me-3"></span>
                                                    <b class="px-2">
                                                        <div class="badge badge-light fw-bolder" style="font-size: 0.95rem;">
                                                            {{ __('Instructions') }}:
                                                        </div>
                                                    </b>
                                                </div>

                                                <div class="mt-4 badge badge-light fw-bolder" style="font-size: 1rem;">{{ $customer->comments_instructions }}</div>

                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Details-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::Option-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        @endif

                    </div>
                    <!--end:::Tab pane-->
                    <!--end:::Begin pane-->
                    <div class="tab-pane fade" id="kt_customer_view_accounting_tab" role="tabpanel">
                        @if($customer->tax_id || $customer->tax_code || $customer->accounting_id || $customer->credit_limit || $customer->terms_balance || $customer->terms_disc_due || $customer->terms_payment || $customer->monthly_charge || $customer->discount_percentage)
                        <!--begin::Card-->
                        <div class="card pt-4 mb-6 mb-xl-9">
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>{{ __('Information') }}</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body py-0">
                                <!--begin::Table wrapper-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed fw-bold text-gray-600 fs-6 gy-5" id="kt_table_customers_logs">
                                        <!--begin::Table body-->
                                        <tbody>
                                            <!--begin::Table row-->
                                            @if($customer->tax_code)
                                                <tr>
                                                    <!--begin::Badge=-->
                                                    <td class="min-w-70px">
                                                        <div class="text-gray-800">{{ __('Tax Code') }}</div>
                                                    </td>
                                                    <!--end::Badge=-->
                                                    <!--begin::Status=-->
                                                    <td class="pe-0 text-end min-w-200px">{{ $customer->tax_code }}</td>
                                                    <!--end::Status=-->
                                                </tr>
                                            @endif
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            @if($customer->tax_id)
                                                <tr>
                                                    <!--begin::Badge=-->
                                                    <td class="min-w-70px">
                                                        <div class="text-gray-800">{{ __('Tax ID') }}</div>
                                                    </td>
                                                    <!--end::Badge=-->
                                                    <!--begin::Status=-->
                                                    <td class="pe-0 text-end min-w-200px">{{ $customer->tax_id }}</td>
                                                    <!--end::Status=-->
                                                </tr>
                                            @endif
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            @if($customer->accounting_id)
                                                <tr>
                                                    <!--begin::Badge=-->
                                                    <td class="min-w-70px">
                                                        <div class="text-gray-800">{{ __('Accounting ID') }}</div>
                                                    </td>
                                                    <!--end::Badge=-->
                                                    <!--begin::Status=-->
                                                    <td class="pe-0 text-end min-w-200px">{{ $customer->accounting_id }}</td>
                                                    <!--end::Status=-->
                                                </tr>
                                            @endif
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            @if($customer->credit_limit)
                                                <tr>
                                                    <!--begin::Badge=-->
                                                    <td class="min-w-70px">
                                                        <div class="text-gray-800">{{ __('Credit Limit') }}</div>
                                                    </td>
                                                    <!--end::Badge=-->
                                                    <!--begin::Status=-->
                                                    <td class="pe-0 text-end min-w-200px">{{ $customer->credit_limit }}</td>
                                                    <!--end::Status=-->
                                                </tr>
                                            @endif
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            @if($customer->terms_balance)
                                                <tr>
                                                    <!--begin::Badge=-->
                                                    <td class="min-w-70px">
                                                        <div class="text-gray-800">{{ __('Terms - Balance') }}</div>
                                                    </td>
                                                    <!--end::Badge=-->
                                                    <!--begin::Status=-->
                                                    <td class="pe-0 text-end min-w-200px">{{ $customer->terms_balance }}</td>
                                                    <!--end::Status=-->
                                                </tr>
                                            @endif
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            @if($customer->terms_disc_due)
                                                <tr>
                                                    <!--begin::Badge=-->
                                                    <td class="min-w-70px">
                                                        <div class="text-gray-800">{{ __('Terms - Disc Due') }}</div>
                                                    </td>
                                                    <!--end::Badge=-->
                                                    <!--begin::Status=-->
                                                    <td class="pe-0 text-end min-w-200px">{{ $customer->terms_disc_due }}</td>
                                                    <!--end::Status=-->
                                                </tr>
                                            @endif
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            @if($customer->terms_payment)
                                                <tr>
                                                    <!--begin::Badge=-->
                                                    <td class="min-w-70px">
                                                        <div class="text-gray-800">{{ __('Terms - Payment') }}</div>
                                                    </td>
                                                    <!--end::Badge=-->
                                                    <!--begin::Status=-->
                                                    <td class="pe-0 text-end min-w-200px">{{ $customer->terms_payment }}</td>
                                                    <!--end::Status=-->
                                                </tr>
                                            @endif
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            @if($customer->discount_percentage)
                                                <tr>
                                                    <!--begin::Badge=-->
                                                    <td class="min-w-70px">
                                                        <div class="text-gray-800">{{ __('Discount') }}</div>
                                                    </td>
                                                    <!--end::Badge=-->
                                                    <!--begin::Status=-->
                                                    <td class="pe-0 text-end min-w-200px">{{ $customer->discount_percentage }} %</td>
                                                    <!--end::Status=-->
                                                </tr>
                                            @endif()
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            @if($customer->monthly_charge)
                                                <tr>
                                                    <!--begin::Badge=-->
                                                    <td class="min-w-70px">
                                                        <div class="text-gray-800">{{ __('Monthly Charge') }}</div>
                                                    </td>
                                                    <!--end::Badge=-->
                                                    <!--begin::Status=-->
                                                    <td class="pe-0 text-end min-w-200px">{{ $customer->monthly_charge }} %</td>
                                                    <!--end::Status=-->
                                                </tr>
                                            @endif
                                            <!--end::Table row-->
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table wrapper-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->

                        @else

                        <!--begin::Alert-->
                        <div class="alert alert-dismissible bg-light-danger d-flex flex-center flex-column py-10 px-10 px-lg-20 mb-10">

                            <!--begin::Icon-->
                            <span class="svg-icon svg-icon-5tx svg-icon-danger mb-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                                    <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black"></rect>
                                    <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black"></rect>
                                </svg>
                            </span>
                            <!--end::Icon-->

                            <!--begin::Wrapper-->
                            <div class="text-center">
                                <!--begin::Title-->
                                <h1 class="fw-bolder mb-5">{{ __('Nothing displayed?') }}</h1>
                                <!--end::Title-->

                                <!--begin::Separator-->
                                <div class="separator separator-dashed border-danger opacity-25 mb-5"></div>
                                <!--end::Separator-->

                                <!--begin::Content-->
                                <div class="mb-9 text-dark">
                                    {{ __('This customer has no') }} <strong>{{ __('accounting information') }}</strong> {{ __('provided') }}.<br/>
                                    {{ __('To add customers accounting information, use') }} <a href="{{ url('/management/customers/edit/'.$customer->id) }}" class="fw-bolder">{{ __('edit customer') }}</a> {{ __('action') }}.
                                </div>
                                <!--end::Content-->

                                <!--begin::Buttons-->
                                <div class="d-flex flex-center flex-wrap">
                                    <a href="{{ url('/management/customers/edit/'.$customer->id) }}" class="btn btn-danger m-2">{{ __('Edit Customer') }}</a>
                                </div>
                                <!--end::Buttons-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Alert-->

                        @endif

                    </div>
                    <!--end:::Tab pane-->
                    <!--end:::Begin pane-->
                    <div class="tab-pane fade" id="kt_customer_view_billing_tab" role="tabpanel">

                        @if($customer->default_calculation == "yes")

                        <!--begin::Alert-->
                        <div class="alert alert-dismissible bg-light-danger d-flex flex-center flex-column py-10 px-10 px-lg-20 mb-10">

                            <!--begin::Icon-->
                            <span class="svg-icon svg-icon-5tx svg-icon-danger mb-5">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <rect opacity="0.3" x="2" y="2" width="20" height="20" rx="10" fill="black"></rect>
                                    <rect x="11" y="14" width="7" height="2" rx="1" transform="rotate(-90 11 14)" fill="black"></rect>
                                    <rect x="11" y="17" width="2" height="2" rx="1" transform="rotate(-90 11 17)" fill="black"></rect>
                                </svg>
                            </span>
                            <!--end::Icon-->

                            <!--begin::Wrapper-->
                            <div class="text-center">
                                <!--begin::Title-->
                                <h1 class="fw-bolder mb-5">{{ __('Nothing displayed?') }}</h1>
                                <!--end::Title-->

                                <!--begin::Separator-->
                                <div class="separator separator-dashed border-danger opacity-25 mb-5"></div>
                                <!--end::Separator-->

                                <!--begin::Content-->
                                <div class="mb-9 text-dark">
                                    {{ __('This customer is set to use') }} <strong>{{ __('default calculation method') }}</strong>.<br/>
                                    {{ __('Check and configure default calculation prices') }} <a href="{{ url('/settings/billing') }}" class="fw-bolder">{{ __('in overall billing settings menu') }}</a>.<br/>
                                    {{ __('To change customers calculation method, use') }} <a href="{{ url('/management/customers/edit/'.$customer->id) }}" class="fw-bolder">{{ __('edit customer') }}</a> {{ __('action') }}.
                                </div>
                                <!--end::Content-->

                                <!--begin::Buttons-->
                                <div class="d-flex flex-center flex-wrap">
                                    <a href="{{ url('/settings/billing') }}" class="btn btn-danger m-2">{{ __('Billing Settings') }}</a>
                                </div>
                                <!--end::Buttons-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Alert-->

                        @else
                        <!--begin::Card-->
                        <div class="card pt-4 mb-6 mb-xl-9">
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>{{ __('Part - Charge Base') }}</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body py-0">
                                <!--begin::Table wrapper-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed fw-bold text-gray-600 fs-6 gy-5" id="kt_table_customers_logs">
                                        <!--begin::Table body-->
                                        <tbody>
                                            <!--begin::Table row-->
                                            @if($customer->part_charge_base == 0)
                                                <tr>
                                                    <!--begin::Badge=-->
                                                    <td class="min-w-70px">
                                                        <div class="text-gray-800">{{ __('Product Default') }}</div>
                                                    </td>
                                                    <!--end::Badge=-->
                                                    <!--begin::Status=-->
                                                    <td class="pe-0 text-end min-w-200px">{{ $customer->part_product_default }} %</td>
                                                    <!--end::Status=-->
                                                </tr>
                                            @endif
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            @if($customer->part_charge_base == 1)
                                                <tr>
                                                    <!--begin::Badge=-->
                                                    <td class="min-w-70px">
                                                        <div class="text-gray-800">{{ __('List') }}</div>
                                                    </td>
                                                    <!--end::Badge=-->
                                                    <!--begin::Status=-->
                                                    <td class="pe-0 text-end min-w-200px">{{ $customer->part_list_percentage }} %</td>
                                                    <!--end::Status=-->
                                                </tr>
                                            @endif
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            @if($customer->part_charge_base == 2)
                                                <tr>
                                                    <!--begin::Badge=-->
                                                    <td class="min-w-70px">
                                                        <div class="text-gray-800">{{ __('Cost') }} + %</div>
                                                    </td>
                                                    <!--end::Badge=-->
                                                    <!--begin::Status=-->
                                                    <td class="pe-0 text-end min-w-200px">{{ $customer->part_cost_percentage }} %</td>
                                                    <!--end::Status=-->
                                                </tr>
                                            @endif
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            @if($customer->part_charge_base == 3)
                                                <tr>
                                                    <!--begin::Badge=-->
                                                    <td class="min-w-70px">
                                                        <div class="text-gray-800">{{ __('List') }} - %</div>
                                                    </td>
                                                    <!--end::Badge=-->
                                                    <!--begin::Status=-->
                                                    <td class="pe-0 text-end min-w-200px">{{ $customer->part_list_minus_percentage }} %</td>
                                                    <!--end::Status=-->
                                                </tr>
                                            @endif
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            @if($customer->part_charge_base == 4)
                                                <tr>
                                                    <!--begin::Badge=-->
                                                    <td class="min-w-70px">
                                                        <div class="text-gray-800">{{ __('Price A') }}</div>
                                                    </td>
                                                    <!--end::Badge=-->
                                                    <!--begin::Status=-->
                                                    <td class="pe-0 text-end min-w-200px">{{ $customer->part_a_percentage }} %</td>
                                                    <!--end::Status=-->
                                                </tr>
                                            @endif
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            @if($customer->part_charge_base == 5)
                                                <tr>
                                                    <!--begin::Badge=-->
                                                    <td class="min-w-70px">
                                                        <div class="text-gray-800">{{ __('Price B') }}</div>
                                                    </td>
                                                    <!--end::Badge=-->
                                                    <!--begin::Status=-->
                                                    <td class="pe-0 text-end min-w-200px">{{ $customer->part_b_percentage }} %</td>
                                                    <!--end::Status=-->
                                                </tr>
                                            @endif
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            @if($customer->part_charge_base == 6)
                                                <tr>
                                                    <!--begin::Badge=-->
                                                    <td class="min-w-70px">
                                                        <div class="text-gray-800">{{ __('Price C') }}</div>
                                                    </td>
                                                    <!--end::Badge=-->
                                                    <!--begin::Status=-->
                                                    <td class="pe-0 text-end min-w-200px">{{ $customer->part_c_percentage }} %</td>
                                                    <!--end::Status=-->
                                                </tr>
                                            @endif
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            @if($customer->part_charge_base == 7)
                                                <tr>
                                                    <!--begin::Badge=-->
                                                    <td class="min-w-70px">
                                                        <div class="text-gray-800">{{ __('Price D') }}</div>
                                                    </td>
                                                    <!--end::Badge=-->
                                                    <!--begin::Status=-->
                                                    <td class="pe-0 text-end min-w-200px">{{ $customer->part_d_percentage }} %</td>
                                                    <!--end::Status=-->
                                                </tr>
                                            @endif
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            @if($customer->part_charge_base == 8)
                                                <tr>
                                                    <!--begin::Badge=-->
                                                    <td class="min-w-70px">
                                                        <div class="text-gray-800">{{ __('Price E') }}</div>
                                                    </td>
                                                    <!--end::Badge=-->
                                                    <!--begin::Status=-->
                                                    <td class="pe-0 text-end min-w-200px">{{ $customer->part_e_percentage }} %</td>
                                                    <!--end::Status=-->
                                                </tr>
                                            @endif
                                            <!--end::Table row-->
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table wrapper-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                        <!--begin::Card-->
                        <div class="card pt-4 mb-6 mb-xl-9">
                            <!--begin::Card header-->
                            <div class="card-header border-0">
                                <!--begin::Card title-->
                                <div class="card-title">
                                    <h2>{{ __('Task - Charge Base') }}</h2>
                                </div>
                                <!--end::Card title-->
                            </div>
                            <!--end::Card header-->
                            <!--begin::Card body-->
                            <div class="card-body py-0">
                                <!--begin::Table wrapper-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table align-middle table-row-dashed fw-bold text-gray-600 fs-6 gy-5" id="kt_table_customers_logs">
                                        <!--begin::Table body-->
                                        <tbody>
                                            <!--begin::Table row-->
                                            @if($customer->task_labor_rate)
                                                <tr>
                                                    <!--begin::Badge=-->
                                                    <td class="min-w-70px">
                                                        <div class="text-gray-800">{{ __('Hourly Labor Rate') }}</div>
                                                    </td>
                                                    <!--end::Badge=-->
                                                    <!--begin::Status=-->
                                                    <td class="pe-0 text-end min-w-200px">{{ $customer->task_labor_rate }} {{ __('$') }}</td>
                                                    <!--end::Status=-->
                                                </tr>
                                            @endif
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            @if($customer->task_po_markup_percentage)
                                                <tr>
                                                    <!--begin::Badge=-->
                                                    <td class="min-w-70px">
                                                        <div class="text-gray-800">{{ __('PO Markup') }}</div>
                                                    </td>
                                                    <!--end::Badge=-->
                                                    <!--begin::Status=-->
                                                    <td class="pe-0 text-end min-w-200px">{{ $customer->task_po_markup_percentage }} %</td>
                                                    <!--end::Status=-->
                                                </tr>
                                            @endif
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            @if($customer->shop_charge_percentage)
                                                <tr>
                                                    <!--begin::Badge=-->
                                                    <td class="min-w-70px">
                                                        <div class="text-gray-800">{{ __('Shop Charge') }}</div>
                                                    </td>
                                                    <!--end::Badge=-->
                                                    <!--begin::Status=-->
                                                    <td class="pe-0 text-end min-w-200px">{{ $customer->shop_charge_percentage }} %</td>
                                                    <!--end::Status=-->
                                                </tr>
                                            @endif
                                            <!--end::Table row-->
                                            <!--begin::Table row-->
                                            @if($customer->shop_cost_percentage)
                                                <tr>
                                                    <!--begin::Badge=-->
                                                    <td class="min-w-70px">
                                                        <div class="text-gray-800">{{ __('Shop Cost') }}</div>
                                                    </td>
                                                    <!--end::Badge=-->
                                                    <!--begin::Status=-->
                                                    <td class="pe-0 text-end min-w-200px">{{ $customer->shop_cost_percentage }} %</td>
                                                    <!--end::Status=-->
                                                </tr>
                                            @endif
                                            <!--end::Table row-->
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table wrapper-->
                            </div>
                            <!--end::Card body-->
                        </div>
                        <!--end::Card-->
                        @endif
                    </div>
                    <!--end:::Tab pane-->
                </div>
                <!--end:::Tab content-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Layout-->

    </div>
</div>
@endsection

    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>


<script>

    $(document).ready( function () {

        // remove active classes from sidebar
        $('.menu-item').each(function() {
            $(this).removeClass('here');
            $(this).removeClass('show');
        });

        // add active classes to sidebar (current page)
        // $('.menu-users-accordion').addClass('hover show');
        $('.menu-customers-list').addClass('show');


    });

</script>