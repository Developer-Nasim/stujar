
@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            <div class="card-body">
                @include('admin/card_head',[
                    'title'=>'Edit employee',
                    'info'=>'Please edit this form carefully',
                    'links'=>[
                        0=>['text'=>'Show all Members','link'=>'/admin/member'],
                        1=>['text'=>'Show company details','link'=>'/admin/member/company/'.$employee->user_id]

                    ]  
                ])
                <form class="" action="{{URL::to('admin/employee/'.$employee->id)}}"  method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <input name="user_id" required="required" type="hidden" class="form-control" value="{{$employee->user_id}}">
                    <div class="position-relative form-group">
                        <label class="">Name</label>
                        <input name="name" required="required" type="text" class="form-control" value="{{$employee->name}}">
                    </div>
                    @include('admin/form_slug_edit',['slug'=>$employee->slug])
                    <div class="position-relative form-group">
                        <label class="">Designation</label>
                        <input name="designation" required="required" type="text" class="form-control" value="{{$employee->designation}}">
                    </div>
                    <div class="position-relative form-group">
                        <label class="">Profile Photo</label>
                        <input name="profilePhoto" type="text" class="form-control" value="{{$employee->profilePhoto}}">
                    </div>
                    <div class="position-relative form-group">
                        <label class="">Contact</label>
                        <input name="contact" required="required" type="text" class="form-control" value="{{$employee->contact}}">
                    </div>
                    <div class="position-relative form-group">
                        <label class="">Email</label>
                        <input name="email" type="email" class="form-control" value="{{$employee->email}}">
                    </div>
                    <div class="position-relative form-group">
                        <label class="">Website</label>
                        <input name="website" type="text" class="form-control" value="{{$employee->website}}">
                    </div>
                    <div class="position-relative form-group">
                        @include('admin.form_ckeditor',['name'=>'about','label'=>'About me','value'=>$employee->about])
                    </div>
                    <div class="position-relative form-group">
                        @include('admin.form_bloodgroup',['value'=>$employee->bloodGroup])
                    </div>
                    @include('admin/form_status',['value'=>$employee->status])
                    @include('admin/button_submit')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection