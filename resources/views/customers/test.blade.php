@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Work Related <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/parts') }}" class="breadcrumb-style">Parts</a> <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/parts/create') }}" class="breadcrumb-style">Order parts</a>
    </div>
@endsection

@section('content-d')

    <div style="margin-top: 20px;"></div>

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
                    Order new part(-s)
                </div>
                <div class="card-body card-body-custom">
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <button class="address-window-btn col-md-12 btn btn-info">Address</button>
                        </div>
                        <div class="col-md-3">
                            <button class="accounting-window-btn col-md-12 btn btn-info">Accounting</button>
                        </div>
                        <div class="col-md-3">
                            <button class="billing-window-btn col-md-12 btn btn-info">Billing</button>
                        </div>
                        <div class="col-md-3">
                            <button class="comments-window-btn col-md-12 btn btn-info">Comments</button>
                        </div>
                    </div>
                    <div class="mt-2"></div>
                    <form action="{{ url('/customers/post') }}" method="post" autocomplete="off">
                        <div class="address-window">
                            @csrf
                            <div class="mt-3"></div>
                            <div class="pre-form-texts">Part information</div>
                            <div class="row">
                                <div class="col-md-6 form-group mt-3">
                                    <label for="">Code</label>
                                    <div class="mt-2"></div>
                                    <input type="text" name="code" class="form-control" placeholder="">
                                </div>
                                <div class="col-md-6 form-group mt-3">
                                    <label for="">Bar Code</label>
                                    <div class="mt-2"></div>
                                    <input type="text" name="bar_code" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group mt-3">
                                    <label for="">Category</label>
                                    <div class="mt-2"></div>
                                    <select name="category" id="" class="form-control">
                                        <option value="1">Category 1</option>
                                        <option value="2">Category 2</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group mt-3">
                                    <label for="">Type</label>
                                    <div class="mt-2"></div>
                                    <select name="type" id="" class="form-control">
                                        <option value="1">Type 1</option>
                                        <option value="2">Type 2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group mt-3">
                                    <label for="">Model</label>
                                    <div class="mt-2"></div>
                                    <input type="text" name="model" class="form-control" placeholder="">
                                </div>
                                <div class="col-md-3 form-group mt-3">
                                    <label for="">Make</label>
                                    <div class="mt-2"></div>
                                    <input type="text" name="make" class="form-control" placeholder="">
                                </div>
                                <div class="col-md-3 form-group mt-3">
                                    <label for="">Style</label>
                                    <div class="mt-2"></div>
                                    <input type="text" name="style" class="form-control" placeholder="">
                                </div>
                                <div class="col-md-2 form-group mt-3">
                                    <label for="">Qty</label>
                                    <div class="mt-2"></div>
                                    <input type="text" name="qty" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group mt-3">
                                    <label for="">Description</label>
                                    <div class="mt-2"></div>
                                    <textarea type="text" name="desc" class="form-control" rows="6" > </textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group mt-3">
                                    <label for="">Pictures</label>
                                    <div class="mt-2"></div>
                                    <input type="file" class="form-control" name="pictures[]" multiple id="customFile" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group mt-3">
                                    <label for="">Invoices</label>
                                    <div class="mt-2"></div>
                                    <input type="file" class="form-control" name="invoices[]" multiple id="customFile" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 form-group mt-3">
                                    <label for="">Garage Location</label>
                                    <div class="mt-2"></div>
                                    <input type="text" name="garage_location" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="mt-3"></div>
                            <div class="pre-form-texts">Warranty</div>
                            <div class="row">
                                <div class="col-md-6 form-group mt-3">
                                    <label for="">Time</label>
                                    <div class="mt-2"></div>
                                    <input type="text" name="time" class="form-control" placeholder="">
                                </div>
                                <div class="col-md-6 form-group mt-3">
                                    <label for="">Interval</label>
                                    <div class="mt-2"></div>
                                    <input type="text" name="interval" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="accounting-window">
                            <div class="mt-3"></div>
                            <div class="pre-form-texts">Accounting information</div>
                            <div class="row">
                                <div class="col-md-6 form-group mt-3">
                                    <label for="">Bybis</label>
                                    <div class="mt-2"></div>
                                    <input type="text" name="bybis" class="form-control" placeholder="">
                                </div>
                                <div class="col-md-6 form-group mt-3">
                                    <label for="">Pyzda</label>
                                    <div class="mt-2"></div>
                                    <input type="text" name="pyzda" class="form-control" placeholder="">
                                </div>
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
    $('#customers-link').addClass("active");

    // $(document).ready(function() {
    //     $('.permissions-select').select2();
    // });

    $('.address-window-btn').on('click', function(e) {
        $('.accounting-window').css('display', 'none');
        $('.address-window').css('display', 'block');
    });

    $('.accounting-window-btn').on('click', function() {
        $('.address-window').css('display', 'none');
        $('.accounting-window').css('display', 'block');
    });

</script>

@endsection
