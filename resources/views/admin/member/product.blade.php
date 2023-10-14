@php

@endphp
@extends('admin.layouts.app')
@section('content')
<div class="main-card mb-3 card">
  @include('admin/card_head',[
      'title'=>'Company Gallery Management',
      'info'=>'Gallery',
      'links'=>[
          0=>['text'=>'Show all Members','link'=>'/admin/member'],
          1=>['text'=>'Show company details','link'=>'/admin/member/company/'.$member->user_id]

      ]  
  ])
  <div class="card-body">
    @if(!empty($member))
@php
$gallery = $product;
@endphp
    <div class="card-body">
        <h5 class="card-title"> Edit Product</h5>
        <form class="" action="{{URL::to('admin/productcompany/'.$gallery->id)}}"  method="post" enctype="multipart/form-data">
            @csrf
            <input name="editing_redirection" type="hidden" class="form-control" value="company">
            <div class="d-none" id="imageRemoveRequest"></div>
            <div class="row">
                <div class="col-md-12">
                    <div class="position-relative form-group">
                        <label for="exampleEmail" class="">Product Title</label>
                        <input name="name" type="text" class="form-control" value=" {{ $gallery->name }}">
                    </div>
                </div>
            </div>    
            @if(!empty($gallery->upload[0]['id']))   
                <div id="prevUploads">      
                    @foreach($gallery->upload as $galleryImage)  
                        @include('admin.form_image_display_multiple',['file'=>$galleryImage])
                    @endforeach
                </div>
            @else             
            @endif  
            <div id="duplicated">

            </div>
            @if(count($gallery->upload) < $websettings['cms_plan_gic'])
            <span id="more-image-button" class="btn btn-success mt-3 mb-3" onclick="duplicate()">Add Another Image</span>
            @endif
            @include('admin.button_submit')
        </form>
    </div>
    @endif
  </div>
</div>
{{-- @include('admin.image_upload_duplicator') --}}
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