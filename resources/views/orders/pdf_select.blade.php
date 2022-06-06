@extends('home')

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

                    <div class="pre-form-texts">Select invoice template</div>

                    <div class="mt-3"></div>

                    <form action="{{ url('/work/pdf/complete/'.$order->id) }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row text-center">

                        <div class="col-4">

                            <input 
                            type="radio" name="pdf_template" value="1" 
                            id="sad" class="input-hidden" />
                            <label for="sad">
                                <img src="{{ url('/temporary/invoice-1.png') }}"/>
                            </label>

                        </div>

                        {{-- <div class="col-4">

                            <input 
                            type="radio" name="pdf_template" value="2"
                            id="happy" class="input-hidden" />

                            <label for="happy">
                                <img src="{{ url('/temporary/invoice-1.png') }}"/>
                            </label>

                        </div>

                        <div class="col-4">

                            <input 
                            type="radio" name="pdf_template" value="3"
                            id="unhappy" class="input-hidden"/>

                            <label for="unhappy">
                                <img src="{{ url('/temporary/invoice-1.png') }}"/>
                            </label>

                        </div> --}}

                    </div>

                    <div class="mt-3"></div>

                    <div class="pre-form-texts">Other options</div>

                    <div class="mt-3"></div>

                    <div class="row">
                        <div class="col-12">
                            <label for="">Would you like to send invoice to the customer ({{ $customer->email }})?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="email_send" value="yes" id="flexCheckDefault" checked>
                                <label class="form-check-label" for="flexCheckDefault" style="padding-top: 4px;">Yes</label>
                                {{-- <button type="button" class="btn btn-primary btn-sm mt-1 remove-to-do" style="float:right;" data-idt="{{ $toDoCount }}">Remove</button> --}}
                            </div>
                        </div>
                    </div>

                    <div class="mt-3 mb-3"></div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" style="float:right;" class="col-12 btn btn-primary btn-primary-second">Confirm <i class="fas fa-check"></i></button>
                        </div>
                    </div>
                    {{-- <div class="mt-3"></div> --}}

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

    $('#workSubmenu').addClass("show");
    $('#orders-link-1').addClass("active");

    // $('#order_create').click(function() {
    //     window.location.href = "{{ url('/work/orders/create') }}";
    // });

</script>

@endsection
