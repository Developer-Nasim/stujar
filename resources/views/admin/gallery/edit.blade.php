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
        <form action="{{URL::to('admin/gallery/'.$contents->id)}}"  method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-md-6">
                    <div class="position-relative form-group">
                        <label for="exampleEmail" class="">Title</label>
                        <input name="name" type="text" class="form-control" value=" {{ $contents->name }}">
                    </div>
                </div>
                <div class="col-md-6">
                    @include('admin/form_slug_edit',['slug'=>$contents->slug])
                </div>
                {{-- @if(count($galleryImages) > 0)   
                    @foreach($galleryImages as $galleryImage)          
                    <div class="col-md-12" id="duplicater">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="position-relative form-group">
                                    <label for="exampleEmail" class="">Image</label>
                                    <input name="file[]" type="file" class="form-control">
                                </div>
                                <img src="{{ asset($galleryImage->file ?? '') }}" style="width: 10%">
                                <input type="hidden" name="old_product_image[]" value="{{$galleryImage->file }}">
                            </div>
                            <div class="col-md-3" >
                                <div class="position-relative form-group">
                                    <label for="exampleEmail" class="">Image Caption</label>
                                    <input name="caption" type="text" class="form-control" value="{{$galleryImage->caption  }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif --}}

        <div class="col-md-12">     
            @if(!empty($galleryImages[0]))   
            <div id="prevUploads">      
                @foreach($galleryImages as $galleryImage)  
                    @include('admin.form_image_display_multiple',['file'=>$galleryImage])
                @endforeach
            </div>
            @else               
            @endif      
            <div id="duplicated">
            </div>
        </div>
         </div>
         <span id="more-image-button" class="btn btn-success mt-3 mb-3" onclick="duplicate()">Add Another Image</span>      
            @include('admin.form_ckeditor',['label'=>'Description','name'=>'description','value'=>$contents->description])
            @include('admin.form_meta',[
                'heading'=>$contents->meta_heading,
                'keyword'=>$contents->meta_keywords,
                'meta_title'=>$contents->meta_title,
                'meta_description'=>$contents->meta_description,
                'meta_robots'=>$contents->meta_robots,
                'meta_canonical'=>$contents->meta_canonical,
                'meta_image'=>$contents->meta_image,
                ])
            @include('admin.form_status',['value'=>$contents->status])
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