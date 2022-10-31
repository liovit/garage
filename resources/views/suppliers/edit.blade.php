@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Suppliers Management <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/management/suppliers') }}" class="breadcrumb-style">Suppliers List</a> <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/management/suppliers/edit/'.$supplier->id) }}" class="breadcrumb-style">Edit Supplier #{{ $supplier->id }}</a>
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
                  Edit supplier {{ $supplier->supplier_name }}
                </div>
                <div class="card-body card-body-custom">
                    <div class="mt-2"></div>
                    @if(Session::has('success'))
                        <div class="alert alert-info text-center">{{ Session::get('success') }}</div>
                    @endif
                    <form action="{{ url('/management/suppliers/edit/confirm/'.$supplier->id) }}" method="post" autocomplete="off">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="pre-form-texts">Supplier information</div>
                        <div class="row">
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Company</label>
                                <div class="mt-1"></div>
                                <input type="text" name="supplier_company" class="form-control" value="{{ $supplier->supplier_company }}" required>
                            </div>
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Name</label>
                                <div class="mt-1"></div>
                                <input type="text" name="supplier_name" class="form-control" value="{{ $supplier->supplier_name }}" required>
                            </div>
                        </div>
                        {{-- <div class="mt-3"></div> --}}
                        <div class="row">
                            <div class="col-md-2 form-group mt-2">
                                <label for="">City</label>
                                <div class="mt-1"></div>
                                <input type="text" name="supplier_city" id="city" class="form-control" value="{{ $supplier->supplier_city }}" autocomplete="off" required>
                            </div>
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Address</label>
                                <div class="mt-1"></div>
                                <input type="text" name="supplier_address" id="address" class="form-control" value="{{ $supplier->supplier_address }}" autocomplete="new-password" required>
                            </div>
                            <div class="col-md-3 form-group mt-2">
                                <label for="">Postal Code</label>
                                <div class="mt-1"></div>
                                <input type="text" name="supplier_post" id="zip" class="form-control" value="{{ $supplier->supplier_post }}" autocomplete="new-password" required>
                            </div>
                            <div class="col-md-3 form-group mt-2">
                                <label for="">State</label>
                                <div class="mt-1"></div>
                                <input type="text" name="supplier_state" id="state" class="form-control" value="{{ $supplier->supplier_state }}" autocomplete="new-password" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Email</label>
                                <div class="mt-1"></div>
                                <input type="email" name="supplier_email" class="form-control" value="{{ $supplier->supplier_email }}" autocomplete="off">
                            </div>
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Telephone</label>
                                <div class="mt-2"></div>
                                <input type="text" name="supplier_telephone" class="form-control" value="{{ $supplier->supplier_telephone }}" autocomplete="off">
                            </div>
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Fax</label>
                                <div class="mt-1"></div>
                                <input type="text" name="supplier_fax" class="form-control" value="{{ $supplier->supplier_fax }}" autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Toll fee</label>
                                <div class="mt-1"></div>
                                <input type="text" name="supplier_toll" class="form-control" value="{{ $supplier->supplier_toll }}" autocomplete="off">
                            </div>
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Telephone</label>
                                <div class="mt-1"></div>
                                <input type="text" name="supplier_alt_phone" class="form-control" value="{{ $supplier->supplier_alt_phone }}" autocomplete="off">
                            </div>
                        </div>

                        <div class="mt-3"></div>
                        <div class="pre-form-texts">Billing company</div>

                        <div class="row">
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Company</label>
                                <div class="mt-1"></div>
                                <input type="text" name="billing_company" class="form-control" value="{{ $supplier->billing_company }}" required>
                            </div>
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Name</label>
                                <div class="mt-1"></div>
                                <input type="text" name="billing_name" class="form-control" value="{{ $supplier->billing_name }}" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2 form-group mt-2">
                                <label for="">City</label>
                                <div class="mt-1"></div>
                                <input type="text" name="billing_city" id="b_city" class="form-control" value="{{ $supplier->billing_city }}" autocomplete="off">
                            </div>
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Address</label>
                                <div class="mt-1"></div>
                                <input type="text" name="billing_address" id="b_address" class="form-control" value="{{ $supplier->billing_address }}" autocomplete="new-password">
                            </div>
                            <div class="col-md-3 form-group mt-2">
                                <label for="">Postal Code</label>
                                <div class="mt-1"></div>
                                <input type="text" name="billing_post" id="b_zip" class="form-control" value="{{ $supplier->billing_post }}" autocomplete="new-password">
                            </div>
                            <div class="col-md-3 form-group mt-2">
                                <label for="">State</label>
                                <div class="mt-1"></div>
                                <input type="text" name="billing_state" id="b_state" class="form-control" value="{{ $supplier->billing_state }}" autocomplete="new-password">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Email</label>
                                <div class="mt-1"></div>
                                <input type="email" name="billing_email" class="form-control" value="{{ $supplier->billing_email }}" autocomplete="off">
                            </div>
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Telephone</label>
                                <div class="mt-1"></div>
                                <input type="text" name="billing_telephone" class="form-control" value="{{ $supplier->billing_telephone }}" autocomplete="off">
                            </div>
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Fax</label>
                                <div class="mt-1"></div>
                                <input type="text" name="billing_fax" class="form-control" value="{{ $supplier->billing_fax }}" autocomplete="off">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Toll fee</label>
                                <div class="mt-1"></div>
                                <input type="text" name="billing_toll" class="form-control" value="{{ $supplier->billing_toll }}" autocomplete="off">
                            </div>
                            <div class="col-md-4 form-group mt-2">
                                <label for="">Alt Telephone</label>
                                <div class="mt-1"></div>
                                <input type="text" name="billing_alt_phone" class="form-control" value="{{ $supplier->billing_alt_phone }}" autocomplete="off">
                            </div>
                        </div>

                        <div class="add_more_contacts_rows">
                        </div>

                        <div class="row">
                            <div class="mt-3"></div>
                            <div class="pre-form-texts">Comments</div>
                            <div class="col-md-12 form-group mt-2">
                                <div class="mt-2"></div>
                                <textarea name="comments" id="" class="form-control" cols="30" rows="7">{{ $supplier->comments }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="mt-3"></div>
                            <div class="col-12">

                                @php

                                    $allContactsNames = json_decode($supplier->alt_contacts_names);
                                    $allContactsPhones = json_decode($supplier->alt_contacts_phones);
                                    $allContactsFaxes = json_decode($supplier->alt_contacts_faxes);
                                    $allContactsEmails = json_decode($supplier->alt_contacts_emails);

                                    $contactsCount = count($allContactsNames);

                                @endphp

                                @if(!empty($allContactsNames))

                                <div class="pre-form-texts">Alt contacts</div>

                                <table class="table table-hover" style="table-layout: fixed;width:100%; overflow-y: scroll;">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Fax</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        
                                            @for($i = 0; $i < $contactsCount; $i++)
                                            <tr id="tableRow{{ $i }}">
                                                <td id="tableName{{ $i }}">{{ $allContactsNames[$i] }}</td>
                                                <td id="tableEmail{{ $i }}">{{ $allContactsEmails[$i] }}</td>
                                                <td id="tablePhone{{ $i }}">{{ $allContactsPhones[$i] }}</td>
                                                <td id="tableFax{{ $i }}">{{ $allContactsFaxes[$i] }}</td>
                                                <td><button type="button" style="padding:6px;line-height:8px;font-size:14px;" class="btn btn-primary" data-toggle="modal" data-target="#contact{{ $i }}">Edit</button></td>
                                            </tr>
                                            @endfor

                                    </tbody>
                                </table>

                                @endif

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

            <div class="mt-3"></div>

            <a href="{{ url('/management/suppliers') }}" style="float:right;" class="btn btn-primary"><i class="fas fa-caret-square-left"></i> Back to suppliers list</a>

        </div>
    </div>

    @for($i = 0; $i < $contactsCount; $i++)
    <div class="modal fade" id="contact{{ $i }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Alt Contact {{ $allContactsNames[$i] }}</h5>
                    <button type="button" class="close" data-dismiss="modal" data-toggle='tooltip' title='Close' aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" class="contactChanges">
                    <div class="col-md-12">
                        <label for="">Name</label>
                        <input type="text" class="form-control cName" value="{{ $allContactsNames[$i] }}" required>
                    </div>
                    <div class="mt-2"></div>
                    <div class="col-md-12">
                        <label for="">Email</label>
                        <input type="text" class="form-control cEmail" value="{{ $allContactsEmails[$i] }}" required>
                    </div>
                    <div class="mt-2"></div>
                    <div class="col-md-12">
                        <label for="">Phone</label>
                        <input type="text" class="form-control cPhone" value="{{ $allContactsPhones[$i] }}" required>
                    </div>
                    <input type="hidden" class="supplierId" value={{ $supplier->id }}>
                    <input type="hidden" class="hiddenValue" value={{ $i }}>
                    <div class="mt-2"></div>
                    <div class="col-md-12">
                        <label for="">Fax</label>
                        <input type="text" class="form-control cFax" value="{{ $allContactsFaxes[$i] }}" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="supplierId2" value={{ $supplier->id }}>
                    <input type="hidden" class="hiddenValue2" value={{ $i }}>
                    <button type="button" class="btn btn-danger deleteButton"><i class="fa fa-minus-circle" aria-hidden="true"></i> Delete</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    @endfor

@endsection

@section('scripts')

<script>

    $('.components > li').each(function() {
        $(this).removeClass("active");
    });
    $('#suppliers-link').addClass("active");

    $('#add_more_contacts').on('click', function() {

    $('.add_more_contacts_rows').append('<div class="appended_contact"><div class="mt-3"></div>\
        <div class="pre-form-texts">Add more contacts</div>\
        <div class="row">\
            <div class="col-md-4 form-group mt-3">\
                <label for="">Name</label>\
                <div class="mt-2"></div>\
                <input type="text" name="alt_contacts_names[]" class="form-control" placeholder="" required autocomplete="off">\
            </div>\
        </div>\
        <div class="row">\
            <div class="col-md-4 form-group mt-3">\
                <label for="">Email</label>\
                <div class="mt-2"></div>\
                <input type="text" name="alt_contacts_emails[]" class="form-control" placeholder="" required autocomplete="off">\
            </div>\
            <div class="col-md-4 form-group mt-3">\
                <label for="">Telephone</label>\
                <div class="mt-2"></div>\
                <input type="text" name="alt_contacts_phones[]" class="form-control" placeholder="" required autocomplete="off">\
            </div>\
            <div class="col-md-4 form-group mt-3">\
                <label for="">Fax</label>\
                <div class="mt-2"></div>\
                <input type="text" name="alt_contacts_faxes[]" class="form-control" placeholder="" required autocomplete="off">\
            </div>\
        </div><button type="button" data-toggle="tooltip" title="Remove this contact" class="cancel_contact"><i class="fa fa-times-circle" aria-hidden="true"></i></button></div>').slideDown('slow');
    });

    $(document).on('click', '.cancel_contact', function() {
        $(this).parent('.appended_contact').remove();
    });

    $('.deleteButton').on('click', function(e) {

        e.preventDefault();
        var id = $(this).siblings('.hiddenValue2').val();
        var supplierId = $(this).siblings('.supplierId2').val();
        
        $.ajax({
            type:'POST',
            url: '/management/suppliers/delete/altcontact',
            data: {id: id, supplierId: supplierId},
            beforeSend: function() {
                // $('#cover-spin').show();
                // $("#myRange").prop('disabled', true);
            },
            success:function(data) {
                console.log(data);
                $('#tableRow'+id).remove();
                $('#contact'+id).modal('toggle');
            }
        });

    });

    $('.contactChanges').on('submit', function(e) {

        e.preventDefault();

        var id = $(this).find('.hiddenValue').val();
        var supplierId = {{ $supplier->id }};
        var fax = $(this).find('.cFax').val();
        var phone = $(this).find('.cPhone').val();
        var email = $(this).find('.cEmail').val();
        var name = $(this).find('.cName').val();

        $.ajax({
            type:'POST',
            url: '/management/suppliers/update/altcontact',
            data: {id: id, supplierId: supplierId, fax: fax, phone: phone, email: email, name: name},
            beforeSend: function() {

            },
            success:function(data) {
            
                $('#contact'+id).modal('toggle');
                $('#tableName'+id).html(data['name']);
                $('#tableEmail'+id).html(data['email']);
                $('#tablePhone'+id).html(data['phone']);
                $('#tableFax'+id).html(data['fax']);

            },
            // error: (error) => {
            //     console.log(JSON.stringify(error));
            // }
        });

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

</script>

@endsection