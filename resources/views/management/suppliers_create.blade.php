@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Supplier Management <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/management/suppliers') }}" class="breadcrumb-style">Suppliers List</a> <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/management/suppliers/create') }}" class="breadcrumb-style">Add new supplier</a>
    </div>
@endsection

@section('content-d')

    <div style="margin-top: 20px;"></div>

    {{-- <div class="row pl-13 col-md-12 content-row">
        <button id="user_create" class="mb-4 btn btn-primary"><i class="fas fa-plus-square"></i> Add new entry</button>
    </div> --}}

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
                  Add new supplier
                </div>
                <div class="card-body card-body-custom">
                    <div class="mt-2"></div>
                    <form action="{{ url('/management/suppliers/confirm-creation') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="pre-form-texts">Supplier information</div>
                        <div class="row">
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Company</label>
                                <div class="mt-1"></div>
                                <input type="text" name="supplier_company" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Name</label>
                                <div class="mt-1"></div>
                                <input type="text" name="supplier_name" class="form-control" placeholder="" required>
                            </div>
                        </div>
                        {{-- <div class="mt-3"></div> --}}
                        <div class="row">
                            <div class="col-md-2 form-group mt-2">
                                <label for="">City</label>
                                <div class="mt-1"></div>
                                <input type="text" name="supplier_city" id="city" class="form-control" placeholder="" autocomplete="off" required>
                            </div>
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Address</label>
                                <div class="mt-1"></div>
                                <input type="text" name="supplier_address" id="address" class="form-control" placeholder="" autocomplete="new-password" required>
                            </div>
                            <div class="col-md-3 form-group mt-2">
                                <label for="">Postal Code</label>
                                <div class="mt-1"></div>
                                <input type="text" name="supplier_post" id="zip" class="form-control" placeholder="" autocomplete="new-password" required>
                            </div>
                            <div class="col-md-3 form-group mt-2">
                                <label for="">State</label>
                                <div class="mt-1"></div>
                                <input type="text" name="supplier_state" id="state" class="form-control" placeholder="" autocomplete="new-password" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Email</label>
                                <div class="mt-1"></div>
                                <input type="email" name="supplier_email" class="form-control" placeholder="" autocomplete="off">
                            </div>
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Telephone</label>
                                <div class="mt-2"></div>
                                <input type="text" name="supplier_telephone" class="form-control" placeholder="" autocomplete="off">
                            </div>
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Fax</label>
                                <div class="mt-1"></div>
                                <input type="text" name="supplier_fax" class="form-control" placeholder="" autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Toll fee</label>
                                <div class="mt-1"></div>
                                <input type="text" name="supplier_toll" class="form-control" placeholder="" autocomplete="off">
                            </div>
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Telephone</label>
                                <div class="mt-1"></div>
                                <input type="text" name="supplier_alt_phone" class="form-control" placeholder="" autocomplete="off">
                            </div>
                        </div>

                        <div class="mt-3"></div>
                        <div class="pre-form-texts">Billing company</div>

                        <div class="row">
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Company</label>
                                <div class="mt-1"></div>
                                <input type="text" name="billing_company" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Name</label>
                                <div class="mt-1"></div>
                                <input type="text" name="billing_name" class="form-control" placeholder="" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2 form-group mt-2">
                                <label for="">City</label>
                                <div class="mt-1"></div>
                                <input type="text" name="billing_city" id="b_city" class="form-control" placeholder="" autocomplete="off">
                            </div>
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Address</label>
                                <div class="mt-1"></div>
                                <input type="text" name="billing_address" id="b_address" class="form-control" placeholder="" autocomplete="new-password">
                            </div>
                            <div class="col-md-3 form-group mt-2">
                                <label for="">Postal Code</label>
                                <div class="mt-1"></div>
                                <input type="text" name="billing_post" id="b_zip" class="form-control" placeholder="" autocomplete="new-password">
                            </div>
                            <div class="col-md-3 form-group mt-2">
                                <label for="">State</label>
                                <div class="mt-1"></div>
                                <input type="text" name="billing_state" id="b_state" class="form-control" placeholder="" autocomplete="new-password">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Email</label>
                                <div class="mt-1"></div>
                                <input type="email" name="billing_email" class="form-control" placeholder="" autocomplete="off">
                            </div>
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Telephone</label>
                                <div class="mt-1"></div>
                                <input type="text" name="billing_telephone" class="form-control" placeholder="" autocomplete="off">
                            </div>
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Fax</label>
                                <div class="mt-1"></div>
                                <input type="text" name="billing_fax" class="form-control" placeholder="" autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Toll fee</label>
                                <div class="mt-1"></div>
                                <input type="text" name="billing_toll" class="form-control" placeholder="" autocomplete="off">
                            </div>
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Telephone</label>
                                <div class="mt-1"></div>
                                <input type="text" name="billing_alt_phone" class="form-control" placeholder="" autocomplete="off">
                            </div>
                        </div>

                        <div class="add_more_contacts_rows">
                        </div>

                        <div class="row">
                            <div class="mt-3"></div>
                            <div class="pre-form-texts">Comments</div>
                            <div class="col-md-12 form-group mt-2">
                                <div class="mt-2"></div>
                                <textarea name="comments" id="" class="form-control" cols="30" rows="7"></textarea>
                            </div>
                        </div>

                        <div class="mt-3"></div>
                        <button type="button" class="btn btn-primary btn-primary-second col-12" id="add_more_contacts"><i class="fas fa-plus-square"></i> Add more contacts</button>
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

    $('#suppliers-link').addClass("active");

    $('#add_more_contacts').on('click', function() {

        $('.add_more_contacts_rows').append('<div class="appended_contact"><div class="mt-3"></div>\
        <div class="pre-form-texts">Add more contacts <button type="button" data-toggle="tooltip" title="Remove this contact" class="cancel_contact"><i class="fa fa-times-circle" aria-hidden="true"></i></button></div>\
        <div class="row">\
            <div class="col-md-4 form-group mt-3">\
                <label for="">Name</label>\
                <div class="mt-2"></div>\
                <input type="text" name="alt_contacts_names[]" class="form-control" placeholder="" autocomplete="off">\
            </div>\
        </div>\
        <div class="row">\
            <div class="col-md-4 form-group mt-3">\
                <label for="">Email</label>\
                <div class="mt-2"></div>\
                <input type="text" name="alt_contacts_emails[]" class="form-control" placeholder="" autocomplete="off">\
            </div>\
            <div class="col-md-4 form-group mt-3">\
                <label for="">Telephone</label>\
                <div class="mt-2"></div>\
                <input type="text" name="alt_contacts_phones[]" class="form-control" placeholder="" autocomplete="off">\
            </div>\
            <div class="col-md-4 form-group mt-3">\
                <label for="">Fax</label>\
                <div class="mt-2"></div>\
                <input type="text" name="alt_contacts_faxes[]" class="form-control" placeholder="" autocomplete="off">\
            </div>\
        </div></div>').slideDown('slow');

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

    $('#b_zip').on('keyup', function(e) {

        var zip = $(this).val();
        getAddressInfoByZipB(zip);

    });

    function getAddressInfoByZipB(zip) {

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
                        $('#b_city').val( addr.city );
                        $('#b_state').val( addr.state );
                        $('#b_address').val( addr.route );

                    } else {
                        addr.success = false;
                    }

                } else {
                    addr.success = false;
                }
            });
        }
    }

    $(document).on('click', '.cancel_contact', function() {
        $(this).parents('.appended_contact').remove();
    });

</script>

@endsection