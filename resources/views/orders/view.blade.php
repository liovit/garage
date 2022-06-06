@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Work Related <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/orders') }}" class="breadcrumb-style">Orders</a> 
        <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/work/orders/'.$order->id) }}" class="breadcrumb-style">View order #{{ $order->id }}</a>
    </div>
@endsection

@section('content-d')

    <div style="margin-top: 20px;"></div>

    {{-- <div class="row pl-13 col-md-12 content-row">
        <button id="user_create" class="mb-4 btn btn-primary"><i class="fas fa-plus-square"></i> Add new entry</button>
    </div> --}}

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
                    Viewing order # {{ $order->id }}
                </div>
        
                <div class="card-body" style="margin:0;padding:0;">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                                <tr>
                                    <th style="width:200px;">Order ID</th>
                                    <td field-key='name'>{{ $order->id }}</td>
                                </tr>
                                <tr>
                                    <th>Customer information</th>
                                    @if($customer)
                                    <td>
                                        {{ $customer->name }} <a href="{{ url('/customers/'.$customer->id) }}" class="btn btn-sm btn-dark" target="_blank" style="float:right;">Open in a new tab</a>
                                    </td>
                                    @else
                                    <td> - </td>
                                    @endif
                                </tr>
                                {{-- <tr>
                                    <th>Assigned mechanic</th>
                                    @if($mechanic)
                                    <td> {{ $mechanic->name . " " . $mechanic->last_name }} <a href="{{ url('/management/users/'.$mechanic->id) }}" target="_blank" class="btn btn-sm btn-dark" style="float:right;">Open in a new page</a></td>
                                    @else 
                                    <td> - </td>
                                    @endif
                                </tr> --}}
                                <tr>
                                    <th>Vehicle information</th>
                                    @if($vehicle)
                                    <td>{{ $vehicle->vin_code }} <a href="{{ url('/work/vehicles/'.$vehicle->id) }}" target="_blank" class="btn btn-sm btn-dark" style="float:right;">Open in a new tab</a></td>
                                    @else 
                                    <td> - </td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>To do information</th>
                                    @if($order->to_be_done)
                                    @php $things = json_decode($order->to_be_done); @endphp
                                    <td>

                                        @foreach($things as $tbd)
                                        <div class="row">
                                            <div class="col-7">
                                                <span style="color:rgb(167, 167, 167);">{{ $tbd->value }}</span>
                                            </div>
                                            <div class="col-3 mt-1">
                                                <select name="mechanics[]" id="" class="form-control" required>
                                                    @if($tbd->mechanic == null)
                                                        <option value="" selected="selected" disabled>Select a mechanic</option>
                                                    @endif
                                                    @foreach($mechanics as $mechanic)
                                                        @if($mechanic->hasRole('Mechanic'))
                                                            <option value="{{ $mechanic->id }}" @if($tbd->mechanic == $mechanic->id) selected @endif>{{ $mechanic->name . " " . $mechanic->last_name }}</option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="to_be_done_status[]" value="yes" @if($tbd->status == true) checked @endif id="flexCheckDefault" disabled>
                                                    <label class="form-check-label" for="flexCheckDefault" style="padding-top: 4px;">Done</label>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach

                                    </td>
                                    @else
                                    <td>-</td>
                                    @endif
                                    
                                </tr>
                                <tr>
                                    @php $created_at = Carbon\Carbon::parse($order->created_at); @endphp
                                    <th>Created at</th>
                                    <td>{{ $created_at->format('Y-m-d') }}</td>
                                </tr>
                                <tr>
                                    @php $updated_at = Carbon\Carbon::parse($order->updated_at); @endphp
                                    <th>Last updated at</th>
                                    <td>{{ $updated_at->format('Y-m-d H:m:s') }}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-12 mb-3" style="padding-left: 10px;">
                        @if($order->comments != null)
                        <div class="mt-3"></div>
                        <div class="pre-form-texts" style="padding-left: 20px;">Additional comments</div>
                        
                            @php $cmts = json_decode($order->comments); @endphp
                            @php 
                            // function date_compare($a, $b)
                            // {
                            //     return strcmp($a->date,$b->date);
                            // }
                            // usort($cmts, 'date_compare');
                            @endphp
                            @foreach($cmts as $key => $c)
                                <div class="row col-12 mt-1 mb-1 comment-box" style="padding-left: 20px;">
                                    <div class="col-6">
                                        <label>{{ $c->owner }}</label>
                                    </div>
                                    <div class="col-6">
                                        <label style="float:right;">{{ $c->date }}</label>
                                    </div>

                                    <span>{{ $c->comment }}</span>

                                    @if($c->pictures)
                                    @php $pictureCount = 0; @endphp
                                        @foreach($c->pictures as $pic)
                                            @php $pictureCount++; @endphp
                                            <div class="col-2">
                                                <a class="attachment-text" href="{{ url('/temporary/orders/comments/'.$order->id."/".$pic) }}">Attachment {{ $pictureCount }}</a> 
                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                            @endforeach

                        @endif
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3"></div>

            <a href="{{ url('/work/orders') }}" style="float:right;" class="btn btn-primary"><i class="fas fa-caret-square-left"></i> Back to orders list</a>

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

    $(document).ready(function() {

        $('select').select2({
            minimumResultsForSearch: 1
        });

        $('select').each(function() {
            $('select').attr('disabled', 'disabled');
        });

    });

</script>

@endsection