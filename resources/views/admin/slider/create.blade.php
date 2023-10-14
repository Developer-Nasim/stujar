@extends('admin.layouts.app')
@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="d-flex justify-content-between bd-highlight mb-2 border-bottom pb-2">
                    <h5 class="card-title"> Add Slider</h5>
                    <div>
                        <a class="btn btn-info" href="{{URL::to('admin/slider')}}">Manage Slider</a>
                        @include('admin/button_back')
                    </div>
                </div>
                <form class="" action="{{URL::to('admin/slider')}}"  method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="position-relative form-group">
                        <label for="name" class="">Name</label>
                        <input name="name" value="{{ old('name') }}" type="text" class="form-control" required="required" id="name">
                    </div>
                    @include('admin/form_slug',['slug'=>'']) 
                    <div class="position-relative form-group">
                        <label for="summary" class="">Summary</label>
                        <input name="summary" value="{{ old('summary') }}" type="text" class="form-control" required="required" id="summary">
                    </div>                
                    <div id="duplicated">

                    </div>
                    <span id="more-image-button" class="btn btn-success mt-3 mb-3" onclick="duplicate()">Add Another Image</span><br>
                    @include('admin/form_status')
                    @include('admin/button_submit')
                </form>
            </div>
        </div>
    </div>
</div>
<div id="duplicator" style="display: none">
    @include('admin.form_image_upload_multiple',['image_size' =>'Image Size 1920px X 954px'])
</div>
@endsection

@section('script_footer')
<!-- This section will be added to js file generated name="file[0]-->
<script>
    var imgCount = 0
    function duplicate() {
        var numItems = $('.doplicated-fields').length
        if(numItems<10){
            var text = $("#duplicator").html();
            let html = text.replaceAll("file[0]", "file["+imgCount+"]");
            $("#duplicated").append(html)
        }else{
            $("#more-image-button").hide()
        }
        imgCount++
    }
</script>
@endsection
@section('page_script')
@include('admin.script_image_edit')
@include('admin.script_image_edit_multiple')
@endsection