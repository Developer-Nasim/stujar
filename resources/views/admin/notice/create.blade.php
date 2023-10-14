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
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            @include('admin/card_head',[
                'title'=>'Create Notice',
                'info'=>'Create your notice from this page',
                'links'=>[
                    0=>['text'=>'Notice','link'=>'/admin/notice'],
    
                    ]  
                ])
            <div class="card-body"><h5 class="card-title"> Add Notice</h5>
                <form class="" action="{{URL::to('admin/notice')}}"  method="post" enctype="multipart/form-data">
                    @csrf
                <div class="position-relative form-group">
                    <label for="exampleEmail" class="">Name</label>
                    <input name="name"  type="text" class="form-control" id="name">
                </div>                
                <div class="position-relative form-group">
                    @include('admin/form_slug')
                </div>
                @include('admin.form_ckeditor',['label'=>'Description','name'=>'description'])
                @include('admin.form_image_upload_single')     
                @include('admin/form_meta')
                @include('admin.form_status')
                @include('admin.button_submit')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection