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
<div class="main-card mb-3 card">
    @include('admin/card_head',[
        'title'=>'Create Video Gallery',
        'info'=>'Create your  Video gallery from this page',
        'links'=>[
            0=>['text'=>'Video Gallery Management','link'=>'/admin/gallery'],
            ]  
        ])
    <div class="card-body"><h5 class="card-title"> Add Video Gallery</h5>
        <form class="" action="{{URL::to('admin/video')}}"  method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="exampleEmail" class="">Title</label>
                        <input name="name"  type="text" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    @include('admin/form_slug')
                </div> 
            </div>
            <div class="border p-2 mb-2 bg-light">
                <legend>Video Thumbnail Image</legend>
                <div class="row">
                    <div class="col-md-6" >
                        <div class="position-relative form-group">
                            <input placeholder="Image Name" name="file[0][name]"  type="text" class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <input name="file[0][caption]" placeholder="Image Caption"  type="text" class="form-control">
                        </div>
                        <div class="position-relative form-group">
                        <textarea name="file[0][description]" class="form-control">Description...</textarea>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <div class="position-relative form-group">
                            <input name="file[0][item]" id="" type="file" class="form-control pb-2">
                        </div>
                    </div>
                </div>
            </div>
            <div id="duplicated">

            </div>
            <span id="more-image-button" class="btn btn-success mt-3 mb-3" onclick="duplicate()">Add Video Details</span>
            @include('admin.form_ckeditor',['label'=>'Description','name'=>'description'])
            @include('admin/form_meta')
            @include('admin.form_status')
            @include('admin.button_submit')
        </form>
    </div>
</div>
<div id="duplicator" style="display: none">
    @include('admin.form_video_upload_multiple')
</div>
<style>
    .close{
        line-height: 0.3;
        font-weight: normal;
        color: black;
        opacity: 1;
        margin-left: 10px;
    }
    .disabled{color:#ddd}
    .disabled.badge-info{background:#eee}
</style>
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