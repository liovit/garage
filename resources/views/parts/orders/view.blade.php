@extends('home')

<title>{{ __('Garage | Viewing Parts Order') }} {{ $part->order_id }}</title>

@section('toolbar-content')

    @section('breadcrumbs')
        {{ __('Parts') }}
    @endsection

    @section('description')
        {{ __('Order') }} {{ __('ID') }} {{ $part->order_id }}
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
        <a href="{{ url('/work/parts/edit/'.$part->order_id) }}" class="btn btn-sm btn-primary">{{ __('Edit') }}</a>
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
           
            <!--begin::Card-->
            <div class="card card-flush col-md-12">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2 class="mb-0 pt-4">{{ __('General') }}</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Permissions-->
                    <div class="d-flex flex-column text-gray-600">

                        <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>{{ __('ID') }}: <b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 0.95rem;">{{ $part->order_id }}</div></b></div>

                        @php $created_at = Carbon\Carbon::parse($part->created_at); @endphp
                        <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>{{ __('Creation Date') }}: <b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 0.95rem;">{{ $created_at->format('Y-m-d H:m') }}</div></b></div>
                            
                        @php $updated_at = Carbon\Carbon::parse($part->updated_at); @endphp
                        <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>{{ __('Last Updated') }}: <b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 0.95rem;">{{ $updated_at->format('Y-m-d H:m') }}</div></b></div>
                    
                    </div>
                    <!--end::Permissions-->
                </div>
                <!--end::Card body-->
                <!--begin::Card footer-->
                <!--end::Card footer-->
            </div>
            <!--end::Card-->
            
        </div>
        <!--end::Layout-->

        <!--begin::Layout-->
        <div class="d-flex flex-column flex-lg-row pt-8">
           
            <!--begin::Card-->
            <div class="card card-flush col-md-12">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2 class="mb-0 pt-4">{{ __('Supplier') }}</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Permissions-->
                    <div class="d-flex flex-column text-gray-600">

                        <div class="d-flex align-items-center py-2">
                            <span class="bullet bg-primary me-3"></span>
                            {{ __('ID') }}: 
                            <b class="px-2">
                                <div class="badge badge-light fw-bolder" style="font-size: 0.95rem;">
                                    <a href="{{ url('/management/suppliers/'.$supplier->id) }}">{{ $supplier->id }}</a>
                                </div>
                            </b>
                        </div>

                        <div class="d-flex align-items-center py-2">
                            <span class="bullet bg-primary me-3"></span>
                            {{ __('Company') }}: 
                            <b class="px-2">
                                <div class="badge badge-light fw-bolder" style="font-size: 0.95rem;">
                                    <a href="{{ url('/management/suppliers/'.$supplier->id) }}">{{ $supplier->supplier_company }}</a>
                                </div>
                            </b>
                        </div>
                            
                        <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>{{ __('Name') }}: <b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 0.95rem;">{{ $supplier->supplier_name }}</div></b></div>

                        <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>{{ __('Email') }}: <b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 0.95rem;">{{ $supplier->supplier_email }}</div></b></div>

                        <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>{{ __('Phone') }}: <b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 0.95rem;">{{ $supplier->supplier_telephone }}</div></b></div>
                    
                    </div>
                    <!--end::Permissions-->
                </div>
                <!--end::Card body-->
                <!--begin::Card footer-->
                <!--end::Card footer-->
            </div>
            <!--end::Card-->
            
        </div>
        <!--end::Layout-->

        <!--begin::Layout-->
        <div class="d-flex flex-column flex-lg-row pt-8 pb-8">
        
            <!--begin::Card-->
            <div class="card card-flush col-md-12">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2 class="mb-0 pt-4">{{ __('Order Contains') }}</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Permissions-->
                    <div class="d-flex flex-column text-gray-600">

                        <div class="py-4 pb-1">
                            <div class="table-responsive">
                                <table class="table table-row-dashed table-row-gray-300 gy-7">
                                    <thead>
                                        <tr class="fw-bolder fs-6 text-gray-800">
                                            <th>{{ __('ID') }}</th>
                                            <th>{{ __('Code') }}</th>
                                            <th>{{ __('Bar Code') }}</th>
                                            <th>{{ __('Description') }}</th>
                                            <th>{{ __('Product No.') }}</th>
                                            <th>{{ __('Quantity') }}</th>
                                            <th>{{ __('Unit Cost') }}</th>
                                            <th>{{ __('Total Cost') }}</th>
                                            <th>{{ __('Status') }}</th>
                                            <th>{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-700">
                                        @foreach($parts as $item)
                                            @php $total_cost = $item->order_qty * $item->unit_cost; @endphp
                                            <tr>
                                                <td>{{ $item->id }}</td>
                                                <td>{{ $item->code }}</td>
                                                <td>{{ $item->bar_code }}</td>
                                                <td>{{ $item->description }}</td>
                                                <td>{{ $item->product_no }}</td>
                                                <td>{{ $item->order_qty }}</td>
                                                <td>{{ __('$') }} {{ $item->unit_cost }}</td>
                                                <td>{{ __('$') }} {{ $total_cost }}</td>
                                                <td>
                                                    @if($item->status == 1)
                                                        <b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 0.95rem;">{{ __('Created') }}</div></b>
                                                    @endif
                                                    @if($item->status == 2)
                                                        <b class="px-2"><div class="badge badge-success fw-bolder" style="font-size: 0.95rem;">{{ __('Received') }}</div></b>
                                                    @endif
                                                    @if($item->status == 3)
                                                        <b class="px-2"><div class="badge badge-warning fw-bolder" style="font-size: 0.95rem;">{{ __('Processing') }}</div></b>
                                                    @endif
                                                    @if($item->status == 4)
                                                        <b class="px-2"><div class="badge badge-primary fw-bolder" style="font-size: 0.95rem;">{{ __('Return') }}</div></b>
                                                    @endif
                                                    @if($item->status == 5)
                                                        <b class="px-2"><div class="badge badge-success fw-bolder" style="font-size: 0.95rem;">{{ __('Returned') }}</div></b>
                                                    @endif
                                                </td>
                                                <td><button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_{{ $item->id }}">
                                                    {{ __('More Details') }}
                                                </button></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                    <!--end::Permissions-->
                </div>
                <!--end::Card body-->
                <!--begin::Card footer-->
                <!--end::Card footer-->
            </div>
            <!--end::Card-->
            
        </div>
        <!--end::Layout-->

        @foreach($parts as $item)

        <div class="modal fade" tabindex="-1" id="kt_modal_{{ $item->id }}">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Item ID') }} {{ $item->id }}</h5>
        
                        <!--begin::Close-->
                        <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                            <span class="svg-icon svg-icon-2x"></span>
                        </div>
                        <!--end::Close-->
                    </div>
        
                    <div class="modal-body">

                        @php $total_cost = $item->order_qty * $item->unit_cost; @endphp

                        <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>{{ __('Code') }}: <b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 1rem;">{{ $item->code }}</div></b></div>

                        <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>{{ __('Bar Code') }}: <b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 1rem;">{{ $item->bar_code }}</div></b></div>

                        <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>{{ __('Description') }}: <b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 1rem;">{{ $item->description }}</div></b></div>

                        <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>{{ __('Product Number') }}: <b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 1rem;">{{ $item->product_no }}</div></b></div>

                        <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>{{ __('Unit Cost') }}: <b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 1rem;">{{ __('$') }} {{ $item->unit_cost }}</div></b></div>

                        <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>{{ __('Unit Cost Today') }}: <b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 1rem;">@if($item->unit_cost_today) {{ __('$') }} @endif {{ $item->unit_cost_today }}</div></b></div>

                        <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>{{ __('Total Cost') }}: <b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 1rem;">{{ __('$') }} {{ $total_cost }}</div></b></div>

                        <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>{{ __('Quantity Rec.') }}: <b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 1rem;">{{ $item->qty_rec }}</div></b></div>

                        <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>{{ __('Quantity Rec. Today') }}: <b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 1rem;">{{ $item->qty_rec_today }}</div></b></div>

                        <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>{{ __('Date Rec.') }}: <b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 1rem;">{{ $item->date_rec }}</div></b></div>

                        <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>{{ __('Quantity Return') }}: <b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 1rem;">{{ $item->qty_return }}</div></b></div>

                        <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>{{ __('Instructions') }}: <b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 1rem;">{{ $item->instructions }}</div></b></div>

                        <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>{{ __('Type') }}: <b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 1rem;">{{ $item->type }}</div></b></div>

                        <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>{{ __('Model') }}: <b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 1rem;">{{ $item->model }}</div></b></div>

                        <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>{{ __('Make') }}: <b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 1rem;">{{ $item->make }}</div></b></div>

                        <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>{{ __('Style') }}: <b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 1rem;">{{ $item->style }}</div></b></div>

                        <div class="d-flex align-items-center py-2">
                        <span class="bullet bg-primary me-3"></span>{{ __('Category') }}: <b class="px-2"><div class="badge badge-light fw-bolder" style="font-size: 1rem;">{{ $item->category }}</div></b></div>

                    </div>
        
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">{{ __('Close') }}</button>
                    </div>
                </div>
            </div>
        </div>

        @endforeach

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
        $('.menu-parts-accordion').addClass('hover show');
        $('.menu-parts-orders-list').addClass('show');


    });

</script>