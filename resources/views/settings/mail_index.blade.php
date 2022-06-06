@extends('home')

@section('content-f')
    <div class="breadcrumb-box">
        Management <i class="ml-4 arrow-style fas fa-chevron-right"></i> <i class="arrow-style fas fa-chevron-right mr-4"></i> <a href="{{ url('/settings/emails') }}" class="breadcrumb-style">Mail</a>
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

            <div class="table-responsive">

                @foreach($emails as $email)
                <div class="row">
                    <a href="{{ url('/settings/emails/edit/'.$email->id) }}">
                        <div class="col-12">
                            <div class="alert alert-dark"><i class="fa fa-envelope" aria-hidden="true"></i>  {{ $email->type }}
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>

        </div>
    </div>

@endsection

@section('scripts')

<script>
    $('.components > li').each(function() {
        $(this).removeClass("active");
    });
    $('#homeSubmenu').addClass("show");
    $('#mail-settings-link').addClass("active");

</script>

@endsection