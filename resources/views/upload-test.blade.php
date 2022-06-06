@extends('home')

@section('content-d')
    <div id="dropzone">

        <form action="/test-upload" class="dropzone" id="file-upload" enctype="multipart/form-data">
            @csrf
            <div class="dz-message">
                Drag and drop or click to upload file(-s)<br>
            </div>
            <input type="button" id='uploadfiles' value='Upload Files'>
        </form>
    </div>
@endsection

@section('scripts')
<script>

    Dropzone.autoDiscover = false;

        var myDropzone = new Dropzone(".dropzone", {
            autoProcessQueue: false,
            parallelUploads: 6, // Number of files process at a time (default 2)
            addRemoveLinks: true,
        });

        $('#uploadfiles').click(function(){
            myDropzone.processQueue();
        });

</script>
@endsection
