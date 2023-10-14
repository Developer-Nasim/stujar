@extends('admin.layouts.app')
@section('content')
{{-- @php
    dd($contents->id)
@endphp --}}
<div class="row">
<div class="col-md-6">
    <div class="main-card mb-3 card">
    <div class="card-body"><h5 class="card-title"> Edit Blog</h5>
    <form class="" action="{{URL::to('admin/blog/'.$contents->id)}}"  method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <div class="position-relative form-group">
        <label for="exampleEmail" class="">Name</label>
        <input name="name" type="text" class="form-control" value="{{ $contents->name }}">
    </div>
    @include('admin/form_slug_edit',['slug'=>$contents->slug])
    
    <div class="position-relative form-group">
        <label for="exampleEmail" class="">Upload Url</label>
        <input name="url" type="text" class="form-control" value="{{ $contents->upload[0]['url'] }}">
    </div>
    <img class="mb-3" src="{{ $contents->upload[0]['url'] }}" alt="" height="50"><br>
    <div class="position-relative form-group">
        @include('admin.form_ckeditor',['label'=>'News Description','name'=>'description','value'=>  $contents->description])
    </div>

    {{-- @php
       @dd($contents); 
    @endphp --}}

    @include('admin.form_meta',[
    'heading'=>$contents->meta_heading,
    'keyword'=>$contents->meta_keywords,
    'meta_title'=>$contents->meta_title,
    'meta_description'=>$contents->meta_description,
    'meta_robots'=>$contents->meta_robots,
    'meta_canonical'=>$contents->meta_canonical,
    'meta_image'=>$contents->meta_image,
    ])
    @include('admin/form_status',['value'=>$contents->status])
    @include('admin/button_submit')
    </div>
  
    </form>
    </div>
    </div>
</div>
</div>

@endsection