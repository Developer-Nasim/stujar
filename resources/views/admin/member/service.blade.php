@php

@endphp
@extends('admin.layouts.app')
@section('content')
<div class="main-card mb-3 card">
  @include('admin/card_head',[
      'title'=>'Company Service Management',
      'info'=>'Service',
      'links'=>[
          0=>['text'=>'Show all Members','link'=>'/admin/member'],
          1=>['text'=>'Show company details','link'=>'/admin/member/company/'.$member->user_id]

      ]  
  ])
  <div class="card-body">
    @if(!empty($member))
@php
//dd($gallery);
@endphp
    <div class="card-body">
        <h5 class="card-title"> Manage Services</h5>
        <form class="" action="{{URL::to('admin/servicecompany/'.$service->id)}}"  method="post" enctype="multipart/form-data">
            @csrf
            

            <input name="editing_redirection" type="hidden" class="form-control" value="service">

            <div class="row">
                <div class="col-md-12">
                    <div class="position-relative form-group">
                        <label for="exampleEmail" class="">Service Gallery Name</label>
                        <input name="name" type="text" class="form-control" value=" {{ $service->name }}">
                    </div>
                </div>
            </div>

            @if(!empty($service->upload[0]['id']))   
                @foreach($service->upload as $galleryImage)          
                    @include('admin.image_display',['galleryImage'=>$galleryImage])
                @endforeach
            @else
                <div class="row doplicated-fields">
                    <div class="col-md-12">
                        <div class="border border-info p-2 form-group bg-light">
                            <input name="file[]" type="file" class="form-control mb-2">
                            <input name="name[]" type="text" placeholder="Service Name" class="form-control mb-2">
                            <textarea name="caption[]" placeholder="Service Link" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            @endif
            <div id="duplicated">

            </div>
            @if(count($service->upload) < $websettings['cms_plan_pic'])
            <span id="more-image-button" class="btn btn-success mt-3 mb-3" onclick="duplicate()">Add Another Service</span>
            @endif
            @include('admin.button_submit')
        </form>
    </div>
    @endif
  </div>
</div>
@include('admin.image_upload_duplicator',['name'=>'Service Name','caption'=>'Service Link'])
@endsection

@section('script_footer')
<!-- This section will be added to js file generated -->
<script>
function duplicate() {
    
    var numItems = $('.doplicated-fields').length
    if(numItems<10){
        $("#duplicated").append($("#duplicator").html())
    }else{
        $("#more-image-button").hide()
    }
    
}
</script>
@endsection