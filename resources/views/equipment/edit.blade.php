@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Work Related <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/equipment') }}" class="breadcrumb-style">Equipment</a>
        <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/equipment/edit/'.$equipment->id) }}" class="breadcrumb-style">Edit Equipment #{{ $equipment->id }}</a>
    </div>
@endsection

@section('content-d')

    <div style="margin-top: 20px;"></div>

    <div class="row pl-13 col-md-12 content-row">
        @if(Session::has('success'))
            <div class="alert alert-info text-center">{{ Session::get('success') }}</div>
        @endif
    </div>

    <div class="row">
        {{-- pl-13 pr-27 content-row  --}}
        <div class="col-md-12 pl-13 pr-27 content-row">

            <div class="card card-custom">
                <div class="card-header card-header-custom">
                    Edit equipment #{{ $equipment->id }}
                </div>
                <div class="card-body card-body-custom">

                    <div class="mt-3"></div>

                    <div class="row col-12">
                        <div class="col-12">
                            <button type="button" class="btn btn-primary col-12" data-toggle="modal" data-target=".bd-example-modal-lg-invoices">Invoices</button>
                        </div>
                    </div>

                    <div class="mt-2"></div>

                    <form action="{{ url('/work/equipment/edit/confirm/'.$equipment->id) }}" enctype="multipart/form-data" method="post">
                    @csrf
                        <div class="row">
                        <div class="col-md-4 form-group mt-3 mb-3">
                            <label for="">Title</label>
                            <input type="text" class="form-control" name="title" value="{{ $equipment->title }}">
                        </div>
                        <div class="col-md-4 form-group mt-3 mb-3">
                            <label for="">Description</label>
                            <input type="text" class="form-control" name="description" value="{{ $equipment->description }}">
                        </div>
                        <div class="col-md-4 form-group mt-3 mb-3">
                            <label for="">Type</label>
                            <input type="text" class="form-control" name="type" value="{{ $equipment->type }}">
                        </div>
                        <div class="col-md-4 form-group mt-3 mb-3">
                            <label for="">Location</label>
                            <input type="text" class="form-control" name="location" value="{{ $equipment->location }}">
                        </div>
                        <div class="col-md-4 form-group mt-3 mb-3">
                            <label for="">Price</label>
                            <input type="number" class="form-control" name="price" value="{{ $equipment->price }}" step="0.01" onchange="(function(el){el.value=parseFloat(el.value).toFixed(2);})(this)">
                        </div>
                        <div class="col-md-4 form-group mt-3 mb-3">
                            <label for="">Quantity</label>
                            <input type="number" class="form-control" name="quantity" value="{{ $equipment->quantity }}">
                        </div>
                        <div class="col-md-4 form-group mt-3 mb-3">
                            <label for="">Manufacturer creation date</label>
                            <input type="date" placeholder="dd/mm/yyyy" name="creation_date" class="form-control" value="{{ $equipment->creation_date }}" pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)" required>
                        </div>
                        <div class="col-md-4 form-group mt-3 mb-3">
                            <label for="">Warranty until</label>
                            <input type="date" placeholder="dd/mm/yyyy" name="warranty_time" class="form-control" value="{{ $equipment->warranty_time }}" pattern="(^(((0[1-9]|1[0-9]|2[0-8])[\/](0[1-9]|1[012]))|((29|30|31)[\/](0[13578]|1[02]))|((29|30)[\/](0[4,6,9]|11)))[\/](19|[2-9][0-9])\d\d$)|(^29[\/]02[\/](19|[2-9][0-9])(00|04|08|12|16|20|24|28|32|36|40|44|48|52|56|60|64|68|72|76|80|84|88|92|96)$)" required>
                        </div>
                        @if($equipment->picture)
                        <div class="col-12 mt-3 mb-3">
                            <label for="">Added picture</label><br>
                            <a href="#" class="pic-view" data-toggle="modal" data-target=".bd-example-modal-lg-pic">
                                <img src="{{ url('/temporary/equipment/'.$equipment->id.'/'.$equipment->picture) }}" data-pic="{{ $equipment->picture }}" class="thumbnail" style="height:100px;width:100px;" alt="">
                            </a>
                        </div>
                        @endif
                        <div class="col-12 mt-3">
                            <label for="">Should all administrators be informed about warranty time ending?</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="warranty_inform" value="1" id="flexCheckDefault" @if($equipment->warranty_inform == 1) checked @endif>
                                <label class="form-check-label" for="flexCheckDefault" style="padding-top: 4px;">Yes</label>
                            </div>
                        </div>
                        <div class="custom-file mt-3 mb-3">
                            <label for="">Select picture to upload</label>
                            <input type="file" name="file" class="custom-file-input form-control">
                        </div>
                    </div>

                    <div class="mt-3"></div>

                        <div class="row">
                            <div class="col-md-12">
                                <button type="submit" style="float:right;" class="col-md-12 btn btn-primary btn-primary-second mt-3">Confirm <i class="fas fa-check"></i></button>
                            </div>
                        </div>

                    <div class="mt-3"></div>

                </form>

                </div>
            </div>

        </div>
    </div>

    <div class="modal fade bd-example-modal-lg-invoices" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding: 12px;">

                <div class="mt-3"></div>
                
                @if($equipment->invoices != null)
                <div class="table-responsive mt-2" style="overflow: scroll;">
                    <table id="parts_table" class="table display table-hover table-striped" style="width:100%;font-family: Roboto;">

                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Upload date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        @php $i = 0; 
                            $invs = json_decode($equipment->invoices); @endphp
                        <tbody>
                            @foreach($invs as $inv)
                            @php $invoice = \App\Models\Invoice::find($inv); @endphp
                            <tr>
                                @php $i++; @endphp
                                <td> {{ $i }} </td>
                                <td> {{ $invoice->created_at }} </td>
                                <td> <a href="{{ url('/temporary/invoices/'.$invoice->invoice_url) }}" download> Download </a> </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
                @else
                There are no invoices added.
                @endif

                <form action="{{ url('/work/order/equipment/confirm/invoices/'.$equipment->id) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    
                    @csrf

                    <div class="mt-3"></div>
                    
                    <div class="custom-file">
                        <label for="">Select invoice(-s) to upload</label>
                        <input type="file" name="invoice[]" class="custom-file-input form-control" multiple required>
                    </div>

                    <div class="mt-3"></div>

                    <button type="submit" class="btn btn-primary col-12">Upload Invoice(-s)</button>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg-pic" tabindex="-1" role="dialog" aria-labelledby="bb" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="padding: 12px;">
                <img src="{{ url('/temporary/equipment/'.$equipment->id.'/'.$equipment->picture) }}" alt="" style="width: 100%; max-height: 600px; border-radius: 3px;">
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
    $('#equipment-garage').addClass("active");

</script>

@endsection