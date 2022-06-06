@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Work Related <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/orders-index/equipment') }}" class="breadcrumb-style">Equipment orders</a> <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/order/equipment') }}" class="breadcrumb-style">Order new equipment</a>
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
                    Order new equipment
                </div>
                <div class="card-body card-body-custom">
                    <div class="mt-2"></div>
                    <form action="{{ url('/work/confirm-order/equipment') }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="mt-3"></div>
                            <div class="pre-form-texts">Supplier information</div>
                            <div class="col-md-12 form-group mt-3 mb-3">
                                <div class="mt-2"></div>
                                <select name="supplier" style="line-height:18px;border-radius:2px;" id="supplier-select" class="form-control">
                                    <option value="" hidden>Select a supplier</option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->supplier_company }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row bought-parts-row">
                            <div class="mt-3"></div>
                            <div class="pre-form-texts">Bought equipment</div>
                            <div class="col-md-12 form-group mt-3 mb-3">
                                <div class="mt-2"></div>
                                <label for="">Search for equipment that you have bought before</label>
                                <input type="text" class="form-control search-bought-equipment" placeholder="&#xF002; Search" style="font-family:Arial, FontAwesome; font-size: 14px;">
                                <div class="mt-2"></div>
                                {{-- <select name="boughtparts" class="form-control" multiple="multiple" style="line-height:18px;border-radius:1px;" id="bought-parts">

                                </select> --}}
                                <div id="bought-parts">
                                    
                                </div>
                            </div>
                        </div>

                        <div class="row initial-parts-row">
                            <div class="mt-3"></div>
                            <div class="pre-form-texts">Equipment information</div>
                            <div class="col-md-2 form-group mt-3">
                                <label for="">Code</label>
                                <div class="mt-2"></div>
                                <input type="text" name="code[]" class="form-control code-autofill" placeholder="" required>
                            </div>
                            <div class="col-md-2 form-group mt-3">
                                <label for="">Bar Code</label>
                                <div class="mt-2"></div>
                                <input type="text" name="bar_code[]" class="form-control" placeholder="">
                            </div>
                            <div class="col-md-2 form-group mt-3">
                                <label for="">Description</label>
                                <div class="mt-2"></div>
                                <input type="text" name="description[]" class="form-control similar_product" placeholder="" required>
                            </div>
                            <div class="col-md-2 form-group mt-3">
                                <label for="">Order Qty</label>
                                <div class="mt-2"></div>
                                <input type="number" step="1" name="order_qty[]" class="form-control" placeholder="" required>
                            </div>
                            <div class="col-md-2 form-group mt-3">
                                <label for="">Unit/Cost</label>
                                <div class="mt-2"></div>
                                <input type="number" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" step="0.01" name="unit_cost[]" class="form-control" placeholder="">
                            </div>
                            <div class="col-md-2 form-group mt-3">
                                <label for="">Type</label>
                                <div class="mt-2"></div>
                                <input type="text" name="type[]" class="form-control" placeholder="">
                            </div>

                            <div class="col-md-12 form-group mt-3">
                                <label for="">Instructions</label>
                                <div class="mt-2"></div>
                                <input type="text" name="instructions[]" class="form-control" placeholder="">
                            </div>

                            <div class="col-md-12 similar_product_show"></div>

                        </div>

                        <div class="row add_more_parts_rows">
                        </div>

                        <div class="row">
                            <div class="mt-3"></div>
                            <div class="pre-form-texts">Other options</div>
                            <div class="col-md-12 mt-3">
                                <label for="">Send email with equipment list to</label>
                                <select class="email-select form-control" name="emails[]" multiple="multiple">
                                </select>
                            </div>
                            <div class="col-md-12 form-group mt-3 mb-3">
                                <label for="">Status</label>
                                <div class="mt-2"></div>
                                <select name="status" style="line-height:18px;border-radius:2px;" id="" class="form-control">
                                    <option value="1">Created</option>
                                    <option value="3">In Progress</option>
                                    <option value="2">Received</option>
                                </select>
                            </div>
                        </div>

                        <div class="mt-3"></div>
                        <button type="button" class="btn btn-primary btn-primary-second col-12" id="add_more_parts"><i class="fas fa-plus-square"></i> Add more equipment</button>
                        <div class="mt-3"></div>
                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" style="float:right;" class="col-12 btn btn-primary btn-primary-second">Confirm <i class="fas fa-check"></i></button>
                            </div>
                        </div>
                        <div class="mt-3"></div>
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

    $('#equipmentSubmenu').addClass("show");
    $('#pizdanx').addClass("active");

    function checkForNull($string) {
        if($string == null) {
            return '';
        } else {
            return $string;
        }
    }

    $(document).on('click', '.b-parts-btn', function(e) {

        e.preventDefault();

        var id = $(this).attr('data-ide');

        if(id) {

            $.ajax({

                type:'POST',
                url: '/parts/get-existing-part',
                data: {id: id},
                beforeSend: function() {

                },
                success:function(data) {

                    var obj = JSON.parse(data);

                    $('.initial-parts-row').remove();

                    $('.add_more_parts_rows').append('<div class="appended_part">\
                    <div class="mt-3"></div>\
                    <div class="pre-form-texts">Equipment information <button type="button" data-toggle="tooltip" title="Remove equipment" class="cancel_part"><i class="fa fa-times-circle" aria-hidden="true"></i></button></div>\
                    <div class="row parts-row">\
                        <div class="col-md-2 form-group mt-3">\
                            <label for="">Code</label>\
                            <div class="mt-2"></div>\
                            <input type="text" name="code[]" class="form-control code-autofill" placeholder="" value="'+checkForNull(obj['code'])+'" required>\
                        </div>\
                        <div class="col-md-2 form-group mt-3">\
                            <label for="">Bar Code</label>\
                            <div class="mt-2"></div>\
                            <input type="text" name="bar_code[]" class="form-control" placeholder="" value="'+checkForNull(obj['bar_code'])+'">\
                        </div>\
                        <div class="col-md-2 form-group mt-3">\
                            <label for="">Description</label>\
                            <div class="mt-2"></div>\
                            <input type="text" name="description[]" class="form-control similar_product" placeholder="" value="'+checkForNull(obj['description'])+'" required>\
                        </div>\
                        <div class="col-md-2 form-group mt-3">\
                            <label for="">Order Qty</label>\
                            <div class="mt-2"></div>\
                            <input type="number" step="1" name="order_qty[]" class="form-control" placeholder="" value="'+checkForNull(obj['order_qty'])+'" required>\
                        </div>\
                        <div class="col-md-2 form-group mt-3">\
                            <label for="">Unit/Cost</label>\
                            <div class="mt-2"></div>\
                            <input type="number" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" step="0.01" name="unit_cost[]" class="form-control" value="'+checkForNull(obj['unit_cost'])+'" placeholder="">\
                        </div>\
                        <div class="col-md-2 form-group mt-3">\
                            <label for="">Type</label>\
                            <div class="mt-2"></div>\
                            <input type="text" name="type[]" class="form-control" value="'+checkForNull(obj['type'])+'" placeholder="">\
                        </div>\
                        <div class="col-md-12 form-group mt-3">\
                            <label for="">Instructions</label>\
                            <div class="mt-2"></div>\
                            <input type="text" name="instructions[]" class="form-control" value="'+checkForNull(obj['instructions'])+'" placeholder="">\
                        </div><div class="col-md-12 similar_product_show"></div>\
                    </div></div>');

                },

            });

        }

    });

    $('#add_more_parts').on('click', function() {

    $('.add_more_parts_rows').append('<div class="appended_part">\
        <div class="mt-3"></div>\
        <div class="pre-form-texts">Equipment information <button type="button" data-toggle="tooltip" title="Remove equipment" class="cancel_part"><i class="fa fa-times-circle" aria-hidden="true"></i></button></div>\
        <div class="row parts-row">\
            <div class="col-md-2 form-group mt-3">\
                <label for="">Code</label>\
                <div class="mt-2"></div>\
                <input type="text" name="code[]" class="form-control code-autofill" placeholder="" required>\
            </div>\
            <div class="col-md-2 form-group mt-3">\
                <label for="">Bar Code</label>\
                <div class="mt-2"></div>\
                <input type="text" name="bar_code[]" class="form-control" placeholder="">\
            </div>\
            <div class="col-md-2 form-group mt-3">\
                <label for="">Description</label>\
                <div class="mt-2"></div>\
                <input type="text" name="description[]" class="form-control similar_product" placeholder="" required>\
            </div>\
            <div class="col-md-2 form-group mt-3">\
                <label for="">Order Qty</label>\
                <div class="mt-2"></div>\
                <input type="number" step="1" name="order_qty[]" class="form-control" placeholder="" required>\
            </div>\
            <div class="col-md-2 form-group mt-3">\
                <label for="">Unit/Cost</label>\
                <div class="mt-2"></div>\
                <input type="number" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)" step="0.01" name="unit_cost[]" class="form-control" placeholder="">\
            </div>\
            <div class="col-md-2 form-group mt-3">\
                <label for="">Type</label>\
                <div class="mt-2"></div>\
                <input type="text" name="type[]" class="form-control" placeholder="">\
            </div>\
            <div class="col-md-12 form-group mt-3">\
                <label for="">Instructions</label>\
                <div class="mt-2"></div>\
                <input type="text" name="instructions[]" class="form-control" placeholder="">\
            </div><div class="col-md-12 similar_product_show"></div>\
        </div></div>');
    });

    $(document).on('click', '.cancel_part', function() {
        $(this).parents('.appended_part').remove();
    });

    $(document).ready(function() {
        $('.email-select').select2();
    });

    // supplier email getting

    $('#supplier-select').on('change', function(){

        var supplier = $('#supplier-select option:selected').val();

        $.ajax({

            type:'POST',
            url: '/parts/get-supplier-emails',
            data: {supplier: supplier},
            beforeSend: function() {

            },
            success:function(data) {

                var obj = JSON.parse(data);

                $('.bought-parts-row').show();

                $('.email-select').find('option').remove();

                $('.email-select').append('<option value="'+obj['supplier_email']+'">'+obj['supplier_email']+'</option>');

                var alt_obj = JSON.parse(obj['alt_contacts_emails']);

                alt_obj.forEach(function(i, v) {
                    $('.email-select').append('<option value="'+i+'">'+i+'</option>');
                });

            },

        });

    });

    // looking for parts

    $('.search-bought-equipment').on('keyup', function(e) {

        var product = $('.search-bought-equipment').val();
        var supplier = $('#supplier-select option:selected').val();

        $.ajax({
            type: 'POST',
            url: '/equipment/get-similar-product',
            data: {product: product, supplier: supplier},
            beforeSend: function() {

            },
            success: function(data) {

                // if(product.length < 1) {
                $('#bought-parts').empty();
                // }

                if(data) {

                    var objects = JSON.parse(data);
                    // console.log(objects);

                    objects.forEach(function(i, v) {

                        // console.log(i, v);

                        var id = i['id'];

                        if(i['picture'] != null) {
                            // var firstPic = JSON.parse(i.pictures);
                            // console.log(i['pictures'].shift());
                            var picture = "{{ url('/temporary/equipment/') }}" + "/" + id + "/" + i['picture'];
                        } else {
                            var picture = "{{ url('/temporary/part-placeholder.jpg') }}";
                        }
                        

                        if(!$('.boughtpart'+id+'').length) {
                            $('#bought-parts').append('<div class="d-flex row boughtpart'+id+'"><div class="col-md-12 bought-part-hover" style="height:50px;"> <img src="'+picture+'" style="width:50px;height:50px;">\
                            Description: <b>'+i['description']+'</b>, Code: <b>'+i['code']+'</b>, \
                            Bar Code: <b>'+i['bar_code']+'</b>. \
                            <button class="b-parts-btn btn btn-sm btn-primary" style="float:right;vertical-align:middle;" data-ide="'+id+'">Add this part</button></div></div>')
                        }

                    });

                }

            }
        });

    });

</script>

@endsection
