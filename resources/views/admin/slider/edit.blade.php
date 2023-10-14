@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <div class="d-flex justify-content-between bd-highlight mb-2 border-bottom pb-2">
                    <h5 class="card-title">Edit Slider</h5>
                    <div>
                        <a class="btn btn-info" href="{{URL::to('admin/slider')}}">Manage Slider</a>
                        <a class="btn btn-info" href="{{URL::to('admin/slider/create')}}">Create Slider</a>
                        @include('admin/button_back')
                    </div>
                </div>
                <form class="" action="{{URL::to('admin/slider/'.$content->id)}}"  method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="position-relative form-group">
                        <label for="exampleEmail" class="">Name</label>
                        <input name="name" type="text" class="form-control" value="{{ $content->name }}" required="required">
                    </div>
                    @include('admin/form_slug_edit',['slug'=>$content->slug])
                    <div class="position-relative form-group">
                        <label for="summary" class="">Summary</label>
                        <input name="summary" value="{{ $content->summary }}" type="text" class="form-control" required="required" id="summary">
                    </div> 
                    <div class="mb-2">
                        <div class="d-none" id="tagRemoveRequest"></div>
                        Selected Tags: 
                        <div id="prevTags">
                            @if(!empty($content->tag[0]))
                                @foreach($content->tag as $tag)
                                    @if($tag->tag_type == 4)
                                    <div id="oldTag{{$tag['id']}}" class="badge badge-info mr-2 mb-2">
                                        {{$tag->title}} 
                                        <a onclick="setRemoveTags({{$tag['id']}});" href="javascript:void(0);"> x </a>
                                    </div>
                                    @endif
                                @endforeach
                            @endif
                        </div>
                    </div>
                    @if(!empty($content->upload[0]))   
                    <div id="prevUploads">      
                        @foreach($content->upload as $galleryImage)  
                            @include('admin.form_image_display_multiple',['file'=>$galleryImage])
                        @endforeach
                    </div>
                    @else               
                    @endif      
                    <div id="duplicated">
                    </div>
                    <span id="more-image-button" class="btn btn-success mt-3 mb-3" onclick="duplicate()">Add Another Image</span>      
                    <br>                
                    @include('admin/form_status',['value'=>$content->status])
                    @include('admin/button_submit')
                </form>
            </div>
        </div>
    </div>
</div>
<div id="duplicator" style="display: none">
    @include('admin.form_image_upload_multiple',['image_size' =>'Image Size 1920px X 954px'])
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