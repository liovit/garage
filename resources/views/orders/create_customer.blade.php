@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Management <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/customers') }}" class="breadcrumb-style">Customers</a> <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/customers/create') }}" class="breadcrumb-style">Add new customer</a>
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
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class="row">
        {{-- pl-13 pr-27 content-row  --}}
        <div class="col-md-12 pl-13 pr-27 content-row">

            <div class="card card-custom">
                <div class="card-header card-header-custom">
                    Add new customer
                </div>
                <div class="card-body card-body-custom">
                    <div class="row mt-2">
                        <div class="col-md-3">
                            <button class="address-window-btn col-12 btn btn-info">Address</button>
                        </div>
                        <div class="col-md-3">
                            <button class="accounting-window-btn col-12 mt-1 mt-md-0 btn btn-info">Accounting</button>
                        </div>
                        <div class="col-md-3">
                            <button class="billing-window-btn col-12 mt-1 mt-md-0 btn btn-info">Billing</button>
                        </div>
                        <div class="col-md-3">
                            <button class="comments-window-btn col-12 mt-1 mt-md-0 btn btn-info">Comments</button>
                        </div>
                    </div>
                    <div class="mt-2"></div>
                    <form action="{{ url('/work/orders/confirm-customer/'.$order->id) }}" method="post" autocomplete="off">
                        <div class="address-window">
                            @csrf
                            <div class="mt-3"></div>
                            <div class="pre-form-texts">Customer information</div>
                            <div class="row">
                                <div class="col-md-4 form-group mt-3">
                                    <label for="">Company</label>
                                    <div class="mt-2"></div>
                                    <input type="text" name="company" value="{{ old('company') }}" class="form-control" placeholder="" data-plus-as-tab="true">
                                </div>
                                <div class="col-md-4 form-group mt-3">
                                    <label for="">Name</label>
                                    <div class="mt-2"></div>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="" data-plus-as-tab="true">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 form-group mt-3">
                                    <label for="">City</label>
                                    <div class="mt-2"></div>
                                    <input type="text" name="city" value="{{ old('city') }}" class="form-control" id="city" placeholder="">
                                </div>
                                <div class="col-md-3 form-group mt-3">
                                    <label for="">Address</label>
                                    <div class="mt-2"></div>
                                    <input type="text" name="address" value="{{ old('address') }}" class="form-control" id="address" placeholder="">
                                </div>
                                <div class="col-md-3 form-group mt-3">
                                    <label for="">Zip / Postal Code</label>
                                    <div class="mt-2"></div>
                                    <input type="text" name="postal_code" value="{{ old('postal_code') }}" class="form-control" id="zip" placeholder="">
                                </div>
                                <div class="col-md-3 form-group mt-3">
                                    <label for="">State</label>
                                    <div class="mt-2"></div>
                                    <input type="text" name="state" value="{{ old('state') }}" class="form-control" id="state" placeholder="">
                                </div>
                            </div>
                            <div id="address-rows"></div>
                            <div class="row">
                                <div class="col-md-4 form-group mt-3">
                                    <label for="">Email</label>
                                    <div class="mt-2"></div>
                                    <input type="text" name="email" class="form-control" value="{{ old('email') }}" placeholder="">
                                </div>
                                <div class="col-md-3 form-group mt-3">
                                    <label for="">Telephone</label>
                                    <div class="mt-2"></div>
                                    <input type="text" name="telephone" class="form-control" value="{{ old('telephone') }}" placeholder="">
                                </div>
                                <div class="col-md-3 form-group mt-3">
                                    <label for="">Extension</label>
                                    <div class="mt-2"></div>
                                    <input type="text" name="extension" class="form-control" value="{{ old('extension') }}" placeholder="">
                                </div>
                                <div class="col-md-2 form-group mt-3">
                                    <label for="">Toll Free</label>
                                    <div class="mt-2"></div>
                                    <input type="text" name="toll_free" class="form-control" value="{{ old('toll_free') }}" placeholder="">
                                </div>
                            </div>
                            {{-- <div class="row">
                                <div class="col-md-12 form-group mt-3">
                                    <label for="">Description</label>
                                    <div class="mt-2"></div>
                                    <textarea type="text" name="desc" class="form-control" rows="6" > </textarea>
                                </div>
                            </div> --}}
                            {{-- <div class="row">
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
                            </div> --}}
                            <div class="row">
                                <div class="col-md-4 form-group mt-3">
                                    <label for="">Fax</label>
                                    <div class="mt-2"></div>
                                    <input type="text" name="fax" class="form-control" value="{{ old('fax') }}" placeholder="">
                                </div>
                                <div class="col-md-4 form-group mt-3">
                                    <label for="">Alt Telephone</label>
                                    <div class="mt-2"></div>
                                    <input type="text" name="alt_telephone" class="form-control" value="{{ old('alt_telephone') }}" placeholder="">
                                </div>
                                <div class="col-md-4 form-group mt-3">
                                    <label for="">Extension</label>
                                    <div class="mt-2"></div>
                                    <input type="text" name="alt_extension" class="form-control" value="{{ old('alt_extension') }}" placeholder="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group mt-3">
                                    <label for="">License</label>
                                    <div class="mt-2"></div>
                                    <input type="text" name="license" class="form-control" value="{{ old('license') }}" placeholder="">
                                </div>
                            </div>
                            <div class="mt-3"></div>
                            <div class="pre-form-texts">Preferences</div>
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <div class="pre-form-texts-small">Credit Customer</div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="credit_customer" value="yes" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault" style="padding-top: 4px;">Yes</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mt-3"></div>
                                    <div class="pre-form-texts-small">Customer Type</div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio1" name="customer_type" value="0" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio1">Commercial</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio2" name="customer_type" value="1" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio2">Private</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mt-3"></div>
                                    <div class="pre-form-texts-small">Contact via</div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio3" name="contact_preference" value="0" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio3">Phone</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio4" name="contact_preference" value="1" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio4">Fax</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio5" name="contact_preference" value="2" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio5">Email</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="accounting-window" style="display:none;">
                            <div class="mt-3"></div>
                            <div class="pre-form-texts">Accounting information</div>
                            <div class="row">
                                <div class="col-md-6 form-group mt-3">
                                    <label for="">Tax Code</label>
                                    <input type="text" name="tax_code" class="form-control" value="{{ old('tax_code') }}" placeholder="">
                                </div>
                                <div class="col-md-6 form-group mt-3">
                                    <label for="">Tax ID</label>
                                    <input type="text" name="tax_id" class="form-control" value="{{ old('tax_id') }}" placeholder="">
                                </div>
                                <div class="col-md-4 form-group mt-3">
                                    <label for="">Credit Limit</label>
                                    <input type="number" name="credit_limit" class="form-control" value="{{ old('credit_limit') }}" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" placeholder="">
                                </div>
                                <div class="col-md-4 form-group mt-3">
                                    <label for="">% Interest Charge</label>
                                    <input type="number" name="interest_charge" class="form-control" value="{{ old('interest_charge') }}" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" placeholder="">
                                </div>
                                <div class="col-md-4 form-group mt-3">
                                    <label for="">Charge Every</label>
                                    <select name="interest_charge_time" class="form-control" id="">
                                        <option value="0" disabled selected>Select time</option>
                                        <option value="1">Day</option>
                                        <option value="7">Week</option>
                                        <option value="30">Month</option>
                                    </select>
                                </div>
                                <div class="col-md-12 form-group mt-3">
                                    <label for="">Terms - Balance</label>
                                    <input type="text" name="terms_balance" class="form-control" value="{{ old('terms_balance') }}" placeholder="">
                                </div>
                                <div class="col-md-12 form-group mt-3">
                                    <label for="">Terms - Payment</label>
                                    <input type="text" name="terms_payment" class="form-control" value="{{ old('terms_payment') }}" placeholder="">
                                </div>
                                <div class="col-md-12 form-group mt-3">
                                    <label for="">Accounting ID</label>
                                    <input type="text" name="accounting_id" class="form-control" value="{{ old('accounting_id') }}" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="billing-window" style="display:none;">
                            <div class="mt-3"></div>
                            <div class="pre-form-texts">Billing information</div>
                            <div class="row">
                                <div class="mt-3"></div>
                                <div class="pre-form-texts-small">Part - Charge base</div>
                                <div class="col-md-4">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio7" name="part_charge_base" value="0" checked class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio7">Product Default</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio8" name="part_charge_base" value="1" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio8">List</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="customRadio9" name="part_charge_base" value="2" class="custom-control-input">
                                        <label class="custom-control-label" for="customRadio9">Cost +%</label>
                                    </div>
                                    {{--  --}}
                                </div>
                                <div class="col-md-4">

                                </div>
                                    {{--  --}}
                                <div class="col-md-4">
                                    {{--  --}}
                                </div>

                                <div class="col-md-4 form-group mt-2">
                                    <label for="">Percentage</label>
                                    <div class="mt-2"></div>
                                    <input type="number" name="part_product_default" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" min="0.00" step="0.01" value="{{ old('part_product_default') }}" class="form-control radioinputs" placeholder="">
                                    <input type="hidden" name="part_list_percentage" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" min="0.00" step="0.01" value="{{ old('part_list_percentage') }}" class="form-control radioinputs" placeholder="">
                                    <input type="hidden" name="part_cost_percentage" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" min="0.00" step="0.01" value="{{ old('part_cost_percentage') }}" class="form-control radioinputs" placeholder="">
                                </div>

                                {{--  --}}
                                <div class="mt-3"></div>
                                <div class="pre-form-texts-small">Task - Charge base</div>

                                {{-- <div class="col-md-4">

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="customer_pricing_by_task" value="yes" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault" style="padding-top: 4px;">Customer Pricing by Task</label>
                                    </div>

                                </div> --}}

                                <div class="col-md-4 mt-1">
                                    <label for="">Labor Rate</label>
                                    <input type="number" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" style="max-width:200px;" name="task_labor_rate" value="{{ old('task_labor_rate') }}" class="form-control">
                                </div>

                                <div class="col-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="default_calculation" value="yes" id="flexCheckDefault" checked>
                                        <label class="form-check-label" for="flexCheckDefault" style="padding-top: 4px;">Use a default calculation</label>
                                    </div>
                                    <span style="font-size: 12px; color: red;">Warning! If default calculation is selected, none of the prices here will be applied work orders.</span>
                                </div>
                                {{-- 
                                <div class="col-md-6 form-group mt-3">
                                    <label for="">Calculation Type</label>
                                    <select name="calculation_type" class="form-control" id="">
                                        <option value="1">Labor Rate</option>
                                        <option value="2">Option 2</option>
                                    </select>
                                </div> --}}

                                {{-- <div class="col-md-6 form-group mt-3">
                                    <label for="">% PO Markup</label>
                                    <input type="number" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" name="task_po_markup_percentage" step="0.01" class="form-control" placeholder="">
                                </div> --}}

                            </div>

                            <div class="row">
                                <div class="col-md-6 form-group mt-3">
                                    <label for="">Shop % (charge)</label>
                                    <input type="number" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" name="shop_charge_percentage" value="{{ old('shop_charge_percentage') }}" step="0.01" class="form-control" placeholder="">
                                </div>
                                <div class="col-md-6 form-group mt-3">
                                    <label for="">Base</label>
                                    <select name="base_shop_charge" class="form-control" id="">
                                        <option value="1">Sub-total</option>
                                        <option value="2">Labor</option>
                                        <option value="3">Part</option>
                                        <option value="4">Direct</option>
                                    </select>
                                </div>
                            </div>
                            {{-- 
                            <div class="row">
                                <div class="col-md-6 form-group mt-1">
                                    <label for="">Shop % (cost)</label>
                                    <input type="number" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" name="shop_cost_percentage" step="0.01" class="form-control" placeholder="">
                                </div>
                            </div> --}}

                        </div>
                        <div class="comments-window" style="display:none;">
                            <div class="mt-3"></div>
                            <div class="pre-form-texts">Comments</div>
                            <div class="row">
                                <div class="col-md-12 form-group mt-3">
                                    <label for="">Language</label>
                                    <select name="comments_language" class="form-control" id="">
                                        <option value="1">English</option>
                                        <option value="2">Lithuanian</option>
                                        <option value="3">Japanese</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group mt-3">
                                    <label for="">Instructions</label>
                                    <textarea name="comments_instructions" class="form-control" id="" cols="30" rows="10">{{ old('comments_instructions') }}</textarea>
                                </div>
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
    $('#customers-link').addClass("active");

    // $(document).ready(function() {
    //     $('.permissions-select').select2();
    // });

    $(document).ready(function() {

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
            }

        });

    });

    $('.address-window-btn').on('click', function(e) {
        $('.accounting-window').css('display', 'none');
        $('.billing-window').css('display', 'none');
        $('.comments-window').css('display', 'none');
        $('.address-window').css('display', 'block');
    });

    $('.accounting-window-btn').on('click', function() {
        $('.address-window').css('display', 'none');
        $('.billing-window').css('display', 'none');
        $('.comments-window').css('display', 'none');
        $('.accounting-window').css('display', 'block');
    });

    $('.billing-window-btn').on('click', function() {
        $('.address-window').css('display', 'none');
        $('.billing-window').css('display', 'block');
        $('.comments-window').css('display', 'none');
        $('.accounting-window').css('display', 'none');
    });

    $('.comments-window-btn').on('click', function() {
        $('.address-window').css('display', 'none');
        $('.billing-window').css('display', 'none');
        $('.comments-window').css('display', 'block');
        $('.accounting-window').css('display', 'none');
    });

    $('#zip').on('keyup', function(e) {

        var zip = $(this).val();
        getAddressInfoByZip(zip);

    });

    function getAddressInfoByZip(zip) {
        
        if(zip.length >= 5 && typeof google != 'undefined') {

            var addr = {};
            var geocoder = new google.maps.Geocoder();

            geocoder.geocode({ 'address': zip }, function(results, status){

                if (status == google.maps.GeocoderStatus.OK){

                    if (results.length >= 0) {

                        console.log(results);

                        for (var i = 0; i < results[0].address_components.length; i++){
                            var street_number = route = street = city = state = zipcode = country = formatted_address = '';
                            var types = results[0].address_components[i].types.join(",");
                            if (types == "street_address"){
                                street = results[0].address_components[i].long_name;}
                            if (types == "route") {
                                addr.route = results[0].address_components[i].long_name;}
                            if (types == "sublocality,political" || types == "locality,political" || types == "neighborhood,political" || types == "administrative_area_level_3,political"){
                                addr.city = (city == '' || types == "locality,political") ? results[0].address_components[i].long_name : city;}
                            if (types == "administrative_area_level_1,political"){
                                addr.state = results[0].address_components[i].short_name;}

                        }

                        addr.success = true;
                        $('#city').val( addr.city );
                        $('#state').val( addr.state );
                        $('#address').val( addr.route );

                    } else {
                        addr.success = false;
                    }

                } else {
                    addr.success = false;
                }
            });
        }
    }

</script>

@endsection
