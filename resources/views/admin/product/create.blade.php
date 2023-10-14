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
                'title'=>'Create Product',
                'info'=>'Create your Product from this page, image size should be 900x600px',
                'links'=>[
                    0=>['text'=>'product Management','link'=>'/admin/product'],

                    ]  
                ])
            <div class="card-body">
                <form class="" action="{{URL::to('admin/product')}}"  method="post" enctype="multipart/form-data">
                    @csrf
                    @include('admin.form_name') 
                    @include('admin.form_slug')
                    @include('admin.form_category',['categories'=>$tags_category])
                    @include('admin.form_ckeditor',['label'=>'product Details','name'=>'description'])
                    <div id="prevTags"></div>
                    @include('admin.form_tags')
                    @include('admin.form_image_upload_single')
                    @include('admin.form_meta')
                    @include('admin.form_status')
                    @include('admin.button_submit')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page_script')
    @include('admin.script_image_edit')
    @include('admin.script_tag_edit')
@endsection
