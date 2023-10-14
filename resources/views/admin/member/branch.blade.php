@php

@endphp
@extends('admin.layouts.app')
@section('content')
<div class="main-card mb-3 card">
  @include('admin/card_head',[
      'title'=>'Business Account Management',
      'info'=>'Branch',
      'links'=>[
          0=>['text'=>'Show all Members','link'=>'/admin/member'],
          1=>['text'=>'Show company details','link'=>'/admin/member/company/'.$member->user_id]

      ]  
  ])
  <div class="card-body">
    @if(!empty($member))
    <form class="" action="{{URL::to('admin/branch/')}}" method="post" enctype="multipart/form-data">
      @csrf
      <input name="formtype" value="branch" type="hidden">
      <input name="companyId" value="{{ $member->id}}" type="hidden">
      <input name="userId" value="{{ $member->user_id}}" type="hidden">
      <legend class="border-bottom pb-2 mb-2">Company Name: {{ $member->title}}</legend>
      <legend class="border-bottom pb-2 mb-2">Add new branch</legend> 
      
      <div class="row">
        <div class="col-md-6">
            <div class="position-relative form-group">
                <label class="">Branch name</label>
                <input name="name" required="required" type="text" class="form-control">
            </div>
            <div class="position-relative form-group">
                <label class="">Open hours</label>
                <input name="openHours" type="text" class="form-control" value="">
            </div>
            <div class="position-relative form-group">
                @include('admin.form_textarea',['label'=>'Address','name'=>'address','value'=>''])
            </div>
            <div class="position-relative form-group">
                <label class="">Map link</label>
                <input name="mapLink" type="text" class="form-control" value="">
            </div>
            <legend class="border-bottom pb-2 mb-2">Contact Numbers</legend>
            <div class="row mb-2">
                <div class="col-6"><input name="contact[0][name]" placeholder="Name" type="text" class="form-control" value=""></div>
                <div class="col-6"><input name="contact[0][phone]" placeholder="Phone" type="text" class="form-control" value=""></div>
            </div>
            <div class="row mb-2">
                <div class="col-6"><input name="contact[1][name]" placeholder="Name" type="text" class="form-control" value=""></div>
                <div class="col-6"><input name="contact[1][phone]" placeholder="Phone" type="text" class="form-control" value=""></div>
            </div>
            <div class="row mb-2">
                <div class="col-6"><input name="contact[2][name]" placeholder="Name" type="text" class="form-control" value=""></div>
                <div class="col-6"><input name="contact[2][phone]" placeholder="Phone" type="text" class="form-control" value=""></div>
            </div>
        </div>
        <div class="col-md-6">
        <legend class="border-bottom pb-2 mb-2">Branches</legend>
            <div class="border p-2 bg-light">
                @if(!empty($member->branch))
                    @foreach($member->branch as $branch)
                        <div class="row mb-2">
                            <div class="col-9">{{$branch->name}}</div>
                            <div class="col-3">
                                <a href="{{URL::to('admin/branch/'.$branch->id.'/edit')}}" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
      </div>
      @include('admin.form_status',['value'=>$member->status])
      @include('admin/button_submit')
    </form>
    @endif
  </div>
</div>

@endsection