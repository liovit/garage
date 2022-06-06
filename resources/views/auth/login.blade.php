@extends('layouts.app')

{{-- @section('content') --}}
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card card-custom-2">
                <div class="card-header card-header-custom-2">{{ __('Welcome back, user!') }}</div>

                <div class="card-body card-body-custom-2">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="mt-2"></div>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mt-2"></div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-2"></div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="mt-1"></div>
                                <div class="form-check" style="float:right;">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <div class="mt-1"></div>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="mt-2"></div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12">
                                <button type="submit" style="float:right;" class="btn btn-primary btn-login">
                                    {{ __('SIGN IN') }} <i class="fa fa-check-circle" aria-hidden="true"></i>
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>

                    <div class="mb-minus-2"></div>

                </div>
            </div>
        </div>
    </div>
</div> --}}
<!--begin::Body-->
<body id="kt_body" class="bg-body">
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Aside-->
            <div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative" style="background-image:url(/media/patterns/pattern-1.jpg)">
                <!--begin::Wrapper-->
                <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                    <!--begin::Content-->
                    <div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
                        <!--begin::Logo-->
                        <a href="#" class="py-15 mb-5">
                            {{-- <img alt="Logo" src="{{ url('media/logos/logo-2.svg') }}" class="h-60px" /> --}}
                            <i class="fonticon-settings fs-5x" style="color:#fcfcfc;"></i>
                        </a>
                        <!--end::Logo-->
                        <!--begin::Title-->
                        <h1 class="fw-bolder fs-2qx pb-5 pb-md-10" style="color: #ebebeb;">{{ __('Welcome to Garage') }}</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <p class="fw-bold fs-2" style="color: #e9e9e9;">{{ __('Easily handle your service') }}
                        <br />{{ __('with great managing tools') }}</p>
                        <!--end::Description-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Aside-->
            <!--begin::Body-->
            <div class="d-flex flex-column flex-lg-row-fluid py-10">
                <!--begin::Content-->
                <div class="d-flex flex-center flex-column flex-column-fluid">
                    <!--begin::Wrapper-->
                    <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                        <!--begin::Form-->
                        <form method="POST" action="{{ route('login') }}" class="form w-100">
                            @csrf

                            @error('email')
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
                                    <span>{{ $message }}</span>
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
                            @enderror

                            <!--begin::Heading-->
                            <div class="text-center mb-10">
                                <!--begin::Title-->
                                <h1 class="text-dark mb-3">{{ __('Sign In') }}</h1>
                                <!--end::Title-->
                                <!--begin::Link-->
                                <div class="text-gray-400 fw-bold fs-4">{{ __('New Here?') }}
                                <a href="{{ url('contact') }}" class="link-primary fw-bolder">{{ __('Contact Us') }}</a></div>
                                <!--end::Link-->
                            </div>
                            <!--begin::Heading-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <!--begin::Label-->
                                <label class="form-label fs-6 fw-bolder text-dark">{{ __('Email') }}</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control form-control-lg form-control-solid" type="text" name="email" value="{{ old('email') }}" autocomplete="off" />
                                <!--end::Input-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div class="fv-row mb-10">
                                <!--begin::Wrapper-->
                                <div class="d-flex flex-stack mb-2">
                                    <!--begin::Label-->
                                    <label class="form-label fw-bolder text-dark fs-6 mb-0">{{ __('Password') }}</label>
                                    <!--end::Label-->
                                    <!--begin::Link-->
                                    <a href="{{ route('password.request') }}" class="link-primary fs-6 fw-bolder">{{ __('Forgot Password ?') }}</a>
                                    <!--end::Link-->
                                </div>
                                <!--end::Wrapper-->
                                <!--begin::Input-->
                                <input class="form-control form-control-lg form-control-solid" type="password" name="password" autocomplete="off" />
                                <!--end::Input-->
                            </div>
                            <div class="fv-row mb-10">
                                <div class="form-check form-check-custom form-check-solid">
                                    <input class="form-check-input" type="checkbox" name="remember" id="flexCheckDefault" {{ old('remember') ? 'checked' : '' }}/>
                                    <label class="form-check-label fw-bold text-gray-700 fs-6" for="flexCheckDefault">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>                                    
                            </div>                          
                            <!--end::Input group-->
                            <!--begin::Actions-->
                            <div class="text-center">
                                <!--begin::Submit button-->
                                <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                                    <span class="indicator-label">{{ __('Continue') }}</span>
                                    <span class="indicator-progress">{{ __('Please wait...') }}
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Submit button-->
                                {{-- <!--begin::Separator-->
                                <div class="text-center text-muted text-uppercase fw-bolder mb-5">or</div>
                                <!--end::Separator-->
                                <!--begin::Google link-->
                                <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                                <img alt="Logo" src="assets/media/svg/brand-logos/google-icon.svg" class="h-20px me-3" />Continue with Google</a>
                                <!--end::Google link-->
                                <!--begin::Google link-->
                                <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                                <img alt="Logo" src="assets/media/svg/brand-logos/facebook-4.svg" class="h-20px me-3" />Continue with Facebook</a>
                                <!--end::Google link-->
                                <!--begin::Google link-->
                                <a href="#" class="btn btn-flex flex-center btn-light btn-lg w-100">
                                <img alt="Logo" src="assets/media/svg/brand-logos/apple-black.svg" class="h-20px me-3" />Continue with Apple</a>
                                <!--end::Google link--> --}}
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
                    <!--begin::Links-->
                    <div class="d-flex flex-center fw-bold fs-6">
                        <a href="{{ url('about') }}" class="text-muted text-hover-primary px-2" target="_blank">{{ __('About') }}</a>
                        <a href="{{ url('purchase') }}" class="text-muted text-hover-primary px-2" target="_blank">{{ __('Purchase') }}</a>
                    </div>
                    <!--end::Links-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
{{-- @endsection --}}
