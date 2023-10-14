@extends('admin.layouts.app')
@section('content')
<div class="main-card mb-3 card">
  @include('admin/card_head',[
      'title'=>'Business Account Management',
      'info'=>'This page contains all information about selected compay',
      'links'=>[
          0=>['text'=>'All Members','link'=>'/admin/member'],
          1=>['text'=>'Employee','link'=>'/admin/member/employee/'.$member->user_id],
          2=>['text'=>'Branch','link'=>'/admin/member/branch/'.$member->user_id],
          3=>['text'=>'Gallery','link'=>'/admin/member/gallery/'.$member->user_id],
          4=>['text'=>'Offer','link'=>'/admin/member/offer/'.$member->user_id],
          5=>['text'=>'Product','link'=>'/admin/member/product/'.$member->user_id],
          6=>['text'=>'Service','link'=>'/admin/member/service/'.$member->user_id]
      ]  
  ])
  <div class="card-body">
    <div class="row">
        <div class="col-md-6">
            @if(!empty($member))
            <form class="" action="{{URL::to('admin/member/'.$member->id)}}" method="post" enctype="multipart/form-data">
              @csrf
              @method('PATCH')
              <input name="formtype" value="shop" type="hidden">
              <div class="row">
                <div class="col-md-12">
                    <legend class="border-bottom pb-2 mb-2">Company Details Information</legend>
                    <div class="position-relative form-group">
                        <label class="">Company Title</label>
                        <input name="title" type="text" required="required" class="form-control" value="{{ $member->title}}">
                    </div>                  
                    @include('admin.form_slug_edit',['slug'=>$member->slug])
                    <div class="position-relative form-group">
                        <label class="">Company Slogan</label>
                        <input name="subtitle" type="text" class="form-control" value="{{ $member->subtitle}}">
                    </div>
                    <div class="position-relative form-group">
                        <label class="">BCS Member Id</label>
                        <input name="bcsMemberId" type="text" class="form-control" value="{{ $member->bcsMemberId}}">
                    </div>
                    <div class="position-relative form-group">
                        <label class="">Member Since</label>
                        <input name="memberSince" type="date" class="form-control" value="{{ $member->memberSince}}">
                    </div>
                    <div class="position-relative form-group">
                        <label class="">Valid Till</label>
                        <input name="validTill" type="date" class="form-control" value="{{ $member->validTill}}">
                    </div>
                    <div class="position-relative form-group">
                        @include('admin.form_companytype',['value'=>$member->companyType])
                    </div>
                    <div class="position-relative form-group">
                        <label class="">Business Nature</label>
                        <input name="businessNature" type="text" class="form-control" value="{{ $member->businessNature}}">
                    </div>
                </div>
              </div>
              <div class="position-relative form-group">
                  <label class="">Logo Link</label>
                  <input name="logo" type="text" class="form-control" value="{{ $member->logo}}">
              </div>
              <div class="position-relative form-group">
                @include('admin.form_textarea',['label'=>'Company Info','name'=>'companyInfo','value'=>$member->companyInfo])
              </div>
              <div class="position-relative form-group">
                  <label class="">Business Address</label>
                  <input name="businessAddress" type="text" class="form-control" value="{{ $member->businessAddress}}">
              </div>
              <div class="position-relative form-group">
                @include('admin.form_textarea',['label'=>'Business Address Map Link','name'=>'googleMap','value'=>$member->googleMap])
              </div>
              <div class="position-relative form-group">
                  <label class="">Establish Year</label>
                  <input name="establishYear" type="text" class="form-control" value="{{ $member->establishYear}}">
              </div>
              <div class="position-relative form-group">
                  @include('admin.form_floor',['value'=>$member->floorCentral])
              </div>
              <div class="position-relative form-group">
                  <label class="">Telephone</label>
                  <input name="telephone" type="text" class="form-control" value="{{ $member->telephone}}">
              </div>
              <div class="position-relative form-group">
                  <label class="">Mobile</label>
                  <input name="mobile" type="text" class="form-control" value="{{ $member->mobile}}">
              </div>
              <div class="position-relative form-group">
                  <label class="">Email</label>
                  <input name="email" type="email" class="form-control" value="{{ $member->email}}">
              </div>
              <div class="position-relative form-group">
                  <label class="">Company Website</label>
                  <input name="companyWebsite" type="text" class="form-control" value="{{ $member->companyWebsite}}">
              </div>
              @include('admin.form_ckeditor',['label'=>'About Company','name'=>'aboutCompany','value'=>$member->aboutCompany])
                
              <div class="border p-2 mb-4">
              <legend class="border-bottom pb-2 mb-2">Social Media</legend>
                @php 
                   $socialMedia = json_decode($member->socialMedia,true);
                @endphp
                @if(!empty($socialMedia))
                    @foreach($socialMedia as $key => $value)
                        <div class="row mb-2">
                            <div class="col-4"><input name="socialMedia[{{$key}}][name]" placeholder="Name" type="text" class="form-control" value="{{$value['name']}}"></div>
                            <div class="col-8"><input name="socialMedia[{{$key}}][link]" placeholder="Link" type="text" class="form-control" value="{{$value['link']}}"></div>
                        </div>
                    @endforeach
                    @if(sizeof($socialMedia)<3)
                        @for($i=sizeof($socialMedia);$i<3;$i++)
                        <div class="row mb-2">
                            <div class="col-4"><input name="socialMedia[{{$i}}][name]" placeholder="Name" type="text" class="form-control"></div>
                                <div class="col-8"><input name="socialMedia[{{$i}}][link]" placeholder="Link" type="text" class="form-control"></div>
                            </div>
                        @endfor
                    @endif
                @else
                    @for($i=0;$i<3;$i++)
                        <div class="row mb-2">
                            <div class="col-4"><input name="socialMedia[{{$i}}][name]" placeholder="Name" type="text" class="form-control"></div>
                            <div class="col-8"><input name="socialMedia[{{$i}}][link]" placeholder="Link" type="text" class="form-control"></div>
                        </div>
                    @endfor
                @endif
              </div>
              <div class="position-relative form-group">
                  <label class="">Share Image</label>
                  <input name="shareImage" type="text" class="form-control" value="{{ $member->shareImage}}">
              </div>
              <div class="position-relative form-group">
                  <label class="">Meta Title</label>
                  <input name="metaTitle" type="text" class="form-control" value="{{ $member->metaTitle}}">
              </div>
              <div class="position-relative form-group">
                  <label class="">Meta Keywords</label>
                  <input name="metaKeywords" type="text" class="form-control" value="{{ $member->metaKeywords}}">
              </div>
              <div class="position-relative form-group">
                  <label class="">Meta Description</label>
                  <input name="metaDescription" type="text" class="form-control" value="{{ $member->metaDescription}}">
              </div>
              @include('admin.form_status',['value'=>$member->status])
              @include('admin/button_submit')
          </form>
            @endif
        </div><!-- end of member edit -->
        <div class="col-md-6">
            <h6 class="border p-2 border-bottom-0 mb-0 ">Company Image Gallery</h6>
            <div class="border p-2 mb-4">
                <div class="border-left mb-2 px-2">{{$gallery->name}}</div>
                @if(!empty($gallery->upload[0]['id'])) 
                <div class="row">
                    @foreach($gallery->upload as $galleryImage)          
                        <div class="col-md-3 mb-2">
                            <a href="#">
                                @include('admin.image_display_dynamic',['item'=>$galleryImage,'folder_path'=>'thumb','height'=>50])
                            </a>
                        </div>
                    @endforeach
                </div>  
                @else
                    <div class="alert alert-warning mt-2">
                        No Image Uploaded
                    </div>
                @endif
                <a href="{{URL::to('admin/member/gallery/'.$member->user_id)}}">Edit Gallery</a>
            </div>
            <h6 class="border-bottom pb-2 mb-2">Company Offers</h6>
            <div class="border p-2 mb-4">
                <div class="border-left mb-2 px-2">{{$offer->name}}</div>
                @if(!empty($offer->upload[0]['id'])) 
                <div class="row">
                    @foreach($offer->upload as $galleryImage)          
                    <div class="col-md-3 mb-2">
                        <a href="#">
                            @include('admin.image_display_dynamic',['item'=>$galleryImage,'folder_path'=>'thumb','height'=>50])
                        </a>
                    </div>
                    @endforeach
                </div>  
                @else
                    <div class="alert alert-warning mt-2">
                        No offer updoaded
                    </div>
                @endif
                <a href="{{URL::to('admin/member/offer/'.$member->user_id)}}">Edit Offer</a>
            </div>
        </div><!-- end of other information -->
    </div>
  </div>
</div>
@endsection