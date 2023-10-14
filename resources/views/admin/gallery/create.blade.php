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
        'title'=>'Create Gallery',
        'info'=>'Create your gallery from this page, image size should be 900x600px',
        'links'=>[
            0=>['text'=>'Image Gallery Management','link'=>'/admin/gallery'],
            ]  
        ])
    <div class="card-body"><h5 class="card-title"> Add Gallery</h5>
        <form action="{{URL::to('admin/gallery')}}"  method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="exampleEmail" class="">Title</label>
                        <input name="name" id="name" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    @include('admin/form_slug')
                </div>             
                {{-- <div class="col-md-12" id="duplicater">
                    @include('admin.form_image_upload_multiple')
                </div> --}}
            </div>
            <div id="duplicated">

            </div>
            <span id="more-image-button" class="btn btn-success mt-3 mb-3" onclick="duplicate()">Add Another Image</span>
            @include('admin.form_ckeditor',['label'=>'Description','name'=>'description'])
            @include('admin/form_meta')
            @include('admin.form_status')
            @include('admin.button_submit')
        </form>
    </div>
</div>
<div id="duplicator" style="display: none">
    @include('admin.form_image_upload_multiple')
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