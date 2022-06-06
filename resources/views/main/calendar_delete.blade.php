@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Calendar <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/calendar/event/pre-delete/'.$event->id) }}" class="breadcrumb-style">Delete Event #{{ $event->id }}</a>
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
                    {{ $event->description }}
                </div>
        
                <div class="card-body" style="margin:0;padding:0;">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                                <tr>
                                    <th style="width:200px;">Id</th>
                                    <td field-key='name'>{{ $event->id }}</td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td>{{ $event->description }}</td>
                                </tr>
                                @php $created_at = Carbon\Carbon::parse($event->created_at);
                                    $date = Carbon\Carbon::parse($event->date);
                                @endphp
                                <tr>
                                    <th>Event Date</th>
                                    <td>{{ $date->format('Y-m-d') }}</td>
                                </tr>
                                @if($event->time_from)
                                <tr>
                                    <th>Start hour</th>
                                    <td>{{ $event->time_from }}</td>
                                </tr>
                                @endif
                                @if($event->time_to)
                                <tr>
                                    <th>End hour</th>
                                    <td>{{ $event->time_to }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <th>Created at</th>
                                    <td>{{ $created_at->format('Y-m-d') }}</td>
                                </tr>
                                <tr>
                                    @php $updated_at = Carbon\Carbon::parse($event->updated_at); @endphp
                                    <th>Last updated at</th>
                                    <td>{{ $updated_at->format('Y-m-d H:m:s') }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3"></div>

            <div class="d-flex text-center align-content-center align-items-center">
                <div class="alert alert-danger col-md-12 p-custom text-center">Are you sure you want to permanently delete this event?</div>
            </div>

            <div class="row">
                <div class="col-md-6 form-group">
                    <form action="{{ url('/calendar/event/delete/'.$event->id) }}" method="post">
                        {{ method_field('DELETE') }}
                        @csrf
                        <button type="submit" class="col-md-12 btn btn-primary"><i class="fas fa-check-circle"></i> Yes</button>
                    </form>
                </div>
                <div class="col-md-6 form-group">
                    <a href="{{ url('/calendar') }}" class="col-md-12 btn btn-primary"><i class="fas fa-times-circle"></i> No</a>
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
    $('#calendar-link').addClass("active");

</script>

@endsection