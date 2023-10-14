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
    <div class="card-body">
        @include('admin/card_head',[
            'title'=>'Edit Gallery',
            'info'=>'Edit your gallery from this page, image size should be 900x600px',
            'links'=>[
                0=>['text'=>'Gallery Management','link'=>'/admin/gallery'],
                1=>['text'=>'Create New Gallery','link'=>'/admin/gallery/create'],
                ]  
            ])
        <form action="{{URL::to('admin/video/'.$content->id)}}"  method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="exampleEmail" class="">Title</label>
                        <input name="name" type="text" class="form-control" value=" {{ $content->name }}">
                    </div>
                </div>
                <div class="col-md-6">
                    @include('admin/form_slug_edit',['slug'=>$content->slug])
                </div>
                <div class="col-md-12">     
                    @if(!empty($videos[0]))   
                        <div id="prevUploads">      
                            @foreach($videos as $video)
                                @if(!empty($video->file))
                                    @include('admin.form_video_display_multiple',['file'=>$video])
                                @endif 
                                @if(!empty($video->video))
                                    <div class="border p-2 mb-2 bg-light">
                                        <legend>Video URL</legend>
                                        <div class="row">
                                            <div class="col-md-6" >
                                                <div class="position-relative form-group">
                                                    <input placeholder="Video Link" name="file[0][video]"  type="text" class="form-control" value="{{ $video->video }}">
                                                </div>
                                                <div class="position-relative form-group">
                                                    <input name="file[0][caption]" placeholder="Video Caption" type="text" class="form-control"
                                                    value="{{ $video->caption }}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>      
                                @endif                                            
                            @endforeach
                        </div>
                    @else        
                    @endif      
                    <div id="duplicated">
                    </div>
                </div>
         </div>
         <span id="more-image-button" class="btn btn-success mt-3 mb-3" onclick="duplicate()">Add Video Details</span>      
            @include('admin.form_ckeditor',['label'=>'Description','name'=>'description','value'=>$content->description])
            @include('admin.form_meta',[
                'heading'=>$content->meta_heading,
                'keyword'=>$content->meta_keywords,
                'meta_title'=>$content->meta_title,
                'meta_description'=>$content->meta_description,
                'meta_robots'=>$content->meta_robots,
                'meta_canonical'=>$content->meta_canonical,
                'meta_image'=>$content->meta_image,
                ])
            @include('admin.form_status',['value'=>$content->status])
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