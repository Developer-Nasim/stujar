@php

@endphp
@extends('admin.layouts.app')
@section('content')
<div class="main-card mb-3 card">
  @include('admin/card_head',[
      'title'=>'Business Account Management',
      'info'=>'This page contains all information about selected compay',
      'links'=>[
          0=>['text'=>'Show all Members','link'=>'/admin/member'],
          1=>['text'=>'Show company details','link'=>'/admin/member/company/'.$member->user_id]

      ]  
  ])
  <div class="card-body">
    @if(!empty($member))
    <form class="" action="{{URL::to('admin/employee/')}}" method="post" enctype="multipart/form-data">
      @csrf
      <input name="formtype" value="employee" type="hidden">
      <input name="companyId" value="{{ $member->id}}" type="hidden">
      <input name="userId" value="{{ $member->user_id}}" type="hidden">
      <div class="row">
        <div class="col-md-6">
            <legend class="border-bottom pb-2 mb-2">Company Name: {{ $member->title}}</legend>
            <legend class="border-bottom pb-2 mb-2">Add new employee</legend>
            <div class="position-relative form-group">
                <label class="">Name</label>
                <input name="name" required="required" type="text" class="form-control">
            </div>
            @include('admin.form_slug',['slug'=>''])
            <div class="position-relative form-group">
                <label class="">Designation</label>
                <input name="designation" required="required" type="text" class="form-control" value="">
            </div>
            <div class="position-relative form-group">
                <label class="">Profile Photo</label>
                <input name="profilePhoto" type="text" class="form-control" value="">
            </div>
            <div class="position-relative form-group">
                <label class="">Contact</label>
                <input name="contact" required="required" type="text" class="form-control" value="">
            </div>
            <div class="position-relative form-group">
                <label class="">Email</label>
                <input name="email" type="email" class="form-control" value="">
            </div>
            <div class="position-relative form-group">
                <label class="">Website</label>
                <input name="website" type="text" class="form-control" value="">
            </div>
            <div class="position-relative form-group">
                @include('admin.form_ckeditor',['name'=>'about','label'=>'About me','value'=>''])
            </div>
            <div class="position-relative form-group">
                @include('admin.form_bloodgroup',['value'=>''])
            </div>
        </div>
        
        <div class="col-md-6">
            <legend class="border-bottom pb-2 mb-2">Representative</legend>
            <div class="border p-2 bg-light">
                @if(!empty($member->employee))
                    @foreach($member->employee as $employee)
                        <div class="row mb-2">
                            <div class="col-9">{{$employee->name}}</div>
                            <div class="col-3">
                                <a href="{{URL::to('admin/employee/'.$employee->id.'/edit')}}" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </a>&nbsp;&nbsp;
                                <a href="#" title="Edit">@include('admin.icon_tag')</a>
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