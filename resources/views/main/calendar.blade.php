@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Calendar
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
        <div class="col-12 pl-13 pr-27 content-row">

            <div class="card card-custom">
                <div class="card-header card-header-custom">
                    <button style="float:left;" class="btn btn-primary" type="button">Events Calendar</button>
                  <button style="float:right;" class="btn btn-primary add_new_event" type="button"><i class="fas fa-plus-square"></i> Add new event</button>
                </div>
                <div class="card-body card-body-custom">
                    <div class="mt-2"></div>

                    <div id="calendar"></div>

                    <div class="mt-2"></div>
                    
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

    $('.add_new_event').click(function() {
        window.location.href = "{{ url('/calendar/event/new') }}";
    });

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          headerToolbar: { center: 'dayGridMonth,timeGridWeek'},
          events: [
            @foreach($events as $event)
                {
                    id: '{{ $event->id }}',
                    title: '{{ $event->description }}',
                    @if($event->time_from)
                        start: '{{ $event->date . " " . $event->time_from }}',
                    @else
                        start: '{{ $event->date }}',
                    @endif

                    @if($event->time_to)
                        end: '{{ $event->date . " " . $event->time_to }}',
                    @else
                        end: '{{ $event->date }}',
                    @endif
                },
            @endforeach
          ],
          eventClick: function(info) {
              window.location.href = "/calendar/event/"+info.event.id;
          },
        });
        calendar.render();
    });

</script>

@endsection