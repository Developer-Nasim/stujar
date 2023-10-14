@php

@endphp
@extends('admin.layouts.app')
@section('content')
<div class="main-card mb-3 card">
  @include('admin/card_head',[
      'title'=>'Company Offer Management',
      'info'=>'Offer',
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
        <h5 class="card-title"> Edit Offer</h5>
        <form class="" action="{{URL::to('admin/offercompany/'.$offer->id)}}"  method="post" enctype="multipart/form-data">
            @csrf
            

            <input name="editing_redirection" type="hidden" class="form-control" value="company">

            <div class="row">
                <div class="col-md-12">
                    <div class="position-relative form-group">
                        <label for="exampleEmail" class="">Offer Title</label>
                        <input name="name" type="text" class="form-control" value=" {{ $offer->name }}">
                    </div>
                </div>
            </div>

            @if(!empty($offer->upload[0]['id']))   
                @foreach($offer->upload as $galleryImage)          
                <div class="border mb-2">
                    <div class="row">
                        <div class="col-3"><img src="{{ asset($galleryImage->file ?? '') }}" class="img-fluid"></div>
                        <div class="col-9 pt-2"><h6><b>{{$galleryImage->name  }}</b></h6>
                            {{$galleryImage->caption  }}</div>
                    </div>
                </div>
                @endforeach
            @else
                <div class="row doplicated-fields">
                    <div class="col-md-12">
                        <div class="border p-2 form-group bg-light">
                            <input name="file[]" type="file" class="form-control mb-2">
                            <input name="name[]" type="text" placeholder="Offer Name" class="form-control mb-2">
                            <textarea name="caption[]" placeholder="Offer Caption" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
            @endif
            <div id="duplicated">

            </div>
            @if(count($gallery->upload) < $websettings['cms_plan_gic'])
            <span id="more-image-button" class="btn btn-success mt-3 mb-3" onclick="duplicate()">Add Another Offer</span>
            @endif
            @include('admin.button_submit')
        </form>
    </div>
    @endif
  </div>
</div>
@include('admin.image_upload_duplicator')

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