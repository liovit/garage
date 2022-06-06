@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Supplier Management <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/management/suppliers') }}" class="breadcrumb-style">Suppliers List</a> <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/management/suppliers/'.$supplier->id) }}" class="breadcrumb-style">View supplier #{{ $supplier->id }}</a>
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
                    Viewing supplier {{ $supplier->supplier_name }}
                </div>
        
                <div class="card-body" style="margin:0;padding:0;">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                                <tr>
                                    <th style="width:200px;">Supplier name</th>
                                    <td field-key='name'>{{ $supplier->supplier_name }}</td>
                                </tr>
                                <tr>
                                    <th>Supplier company</th>
                                    <td>{{ $supplier->supplier_company }}</td>
                                </tr>
                                <tr>
                                    <th>Supplier city</th>
                                    <td>{{ $supplier->supplier_city }}</td>
                                </tr>
                                <tr>
                                    <th>Supplier state</th>
                                    <td>{{ $supplier->supplier_state }}</td>
                                </tr>
                                <tr>
                                    <th>Supplier address</th>
                                    <td>{{ $supplier->supplier_address }}</td>
                                </tr>
                                <tr>
                                    <th>Supplier post code</th>
                                    <td>{{ $supplier->supplier_post }}</td>
                                </tr>
                                <tr>
                                    <th>Supplier email</th>
                                    <td>{{ $supplier->supplier_email }}</td>
                                </tr>
                                <tr>
                                    <th>Supplier phone</th>
                                    <td>{{ $supplier->supplier_telephone }}</td>
                                </tr>
                                <tr>
                                    <th>Supplier fax</th>
                                    <td>{{ $supplier->supplier_fax }}</td>
                                </tr>
                                <tr>
                                    <th>Supplier toll</th>
                                    <td>{{ $supplier->supplier_toll }}</td>
                                </tr>
                                <tr>
                                    <th>Supplier alt phone</th>
                                    <td>{{ $supplier->supplier_alt_phone }}</td>
                                </tr>
                                <tr>
                                    <th>Billing city</th>
                                    <td>{{ $supplier->billing_city }}</td>
                                </tr>
                                <tr>
                                    <th>Billing state</th>
                                    <td>{{ $supplier->billing_state }}</td>
                                </tr>
                                <tr>
                                    <th>Billing address</th>
                                    <td>{{ $supplier->billing_address }}</td>
                                </tr>
                                <tr>
                                    <th>Billing post code</th>
                                    <td>{{ $supplier->billing_post }}</td>
                                </tr>
                                <tr>
                                    <th>Billing email</th>
                                    <td>{{ $supplier->billing_email }}</td>
                                </tr>
                                <tr>
                                    <th>Billing phone</th>
                                    <td>{{ $supplier->billing_telephone }}</td>
                                </tr>
                                <tr>
                                    <th>Billing fax</th>
                                    <td>{{ $supplier->billing_fax }}</td>
                                </tr>
                                <tr>
                                    <th>Billing toll fee</th>
                                    <td>{{ $supplier->billing_toll }}</td>
                                </tr>
                                <tr>
                                    <th>Billing alt phone</th>
                                    <td>{{ $supplier->billing_alt_phone }}</td>
                                </tr>
                                @if($supplier->alt_contacts_names)
                                @php
                                    $nArr = json_decode($supplier->alt_contacts_names);
                                    $eArr = json_decode($supplier->alt_contacts_emails);
                                    $pArr = json_decode($supplier->alt_contacts_phones);
                                    $fArr = json_decode($supplier->alt_contacts_faxes);
                                    $n = count($nArr);
                                @endphp
                                <tr>
                                    <th>Alt contacts information</th>
                                    <td>
                                        @for($i = 0; $i < $n; $i++)
                                            name: <b>{{ $nArr[$i] }}</b>, email: <b>{{ $eArr[$i] }}</b>, phone: <b>{{ $pArr[$i] }}</b>, fax: <b>{{ $fArr[$i] }}</b> </br>
                                        @endfor
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    @php $created_at = Carbon\Carbon::parse($supplier->created_at); @endphp
                                    <th>Created at</th>
                                    <td>{{ $created_at->format('Y-m-d') }}</td>
                                </tr>
                                <tr>
                                    @php $updated_at = Carbon\Carbon::parse($supplier->updated_at); @endphp
                                    <th>Last updated at</th>
                                    <td>{{ $updated_at->format('Y-m-d H:m:s') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3"></div>

            <a href="{{ url('/management/suppliers') }}" style="float:right;" class="btn btn-primary"><i class="fas fa-caret-square-left"></i> Back to suppliers list</a>

        </div>
    </div>

@endsection

@section('scripts')

<script>
    
    $('.components > li').each(function() {
        $(this).removeClass("active");
    });
    $('#suppliers-link').addClass("active");

</script>

@endsection