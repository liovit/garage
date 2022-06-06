@extends('home')

@php header('Content-Type: application/pdf; charset=UTF-8', true); @endphp

@section('content-f')
    <div class="breadcrumb-box">
        Work Related <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/orders') }}" class="breadcrumb-style">Orders</a>
        <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/pdf/order/'.$order->id) }}" class="breadcrumb-style">Generate PDF order #{{ $order->id }}</a>
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
                    Generate invoice
                </div>
                
                <div class="card-body" style="">

                    <div class="pre-form-texts">Success!</div>

                    <div class="mt-3"></div>


                    <div class="mt-3 mb-3"></div>
                    <div class="row">
                        <div class="col-6">
                            <a href="{{ $invoice->invoice_url }}" download style="float:right;" class="col-12 btn btn-primary btn-primary-second">Download invoice <i class="fas fa-check"></i></a>
                        </div>
                        <div class="col-6">
                            <a href="{{ url('/work/orders') }}" style="float:right;" class="col-12 btn btn-primary btn-primary-second">Go back to orders list <i class="fas fa-check"></i></a>
                        </div>
                    </div>

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

    $('#workSubmenu').addClass("show");
    $('#orders-link-1').addClass("active");

    // $('#order_create').click(function() {
    //     window.location.href = "{{ url('/work/orders/create') }}";
    // });

</script>

@endsection
