@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Calendar <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/calendar/event/edit/'.$event->id) }}" class="breadcrumb-style">Edit event #{{ $event->id }}</a> 
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
                  Edit event #{{ $event->id }}
                </div>
                <div class="card-body card-body-custom">
                    <div class="mt-2"></div>
                    <form action="{{ url('/calendar/event/edit/confirm/'.$event->id) }}" method="post" autocomplete="off">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="row">
                            <div class="mt-1"></div>
                            <div class="important-message">
                                <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                                <span class="important-text">If you do not select time FROM - TO, the event will take place for all day.</span>
                            </div>
                            <div class="col-md-12 form-group mt-3">
                                <label for="">Description</label>
                                <div class="mt-2"></div>
                                <input type="text" name="description" class="form-control" placeholder="Christmas" required value="{{ $event->description }}">
                            </div>
                            <div class="col-md-12 form-group mt-3">
                                <label for="">Date</label>
                                <input type="date" name="date" class="form-control" required value="{{ $event->date }}">
                            </div>
                            <div class="col-md-6 form-group mt-3">
                                <label for="">Time from</label>
                                <input type="time" name="time_from" class="form-control" value="{{ $event->time_from }}">
                            </div>
                            <div class="col-md-6 form-group mt-3">
                                <label for="">Time to</label>
                                <input type="time" name="time_to" class="form-control" value="{{ $event->time_to }}">
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
    $('#calendar-link').addClass("active");

</script>

@endsection