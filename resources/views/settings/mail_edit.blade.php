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

            <div class="card card-custom">
                <div class="card-header card-header-custom">
                    {{ $email->type }} edit
                </div>
                <div class="card-body card-body-custom">
                    <div class="mt-2"></div>
                    <form action="{{ url('/settings/emails/edit/confirm/'.$email->id) }}" method="post" autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 form-group mt-2">
                                <label for="">Title</label>
                                <textarea name="title" class="form-control" id="">{{ $email->title }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group mt-2">
                                <label for="">Paragraph</label>
                                <textarea name="paragraph" class="form-control" id="">{{ $email->paragraph }}</textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 form-group mt-2">
                                <label for="">Footer</label>
                                <textarea name="footer" class="form-control" id="">{{ $email->footer }}</textarea>
                            </div>
                        </div>

                        <div class="mt-3"></div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary col-12 btn-primary-second mt-2"><i class="fas fa-check"></i> Confirm</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

            <div class="mt-3"></div>

            <a href="{{ url('/settings/emails') }}" style="float:right;" class="btn btn-primary"><i class="fas fa-caret-square-left"></i> Back to emails list</a>

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