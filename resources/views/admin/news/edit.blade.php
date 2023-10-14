@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            @include('admin/card_head',[
                'title'=>'Edit news',
                'info'=>'Edit your news from this page, image size should be 900x600px',
                'links'=>[
                    0=>['text'=>'News Management','link'=>'/admin/news'],
                    1=>['text'=>'Create New News','link'=>'/admin/news/create'],
                    ]  
                ])
            <div class="card-body">
                <h5 class="card-title"> Edit News</h5>
                <form class="" action="{{URL::to('admin/news/'.$content->id)}}"  method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="position-relative form-group">
                        <label for="exampleEmail" class="">Name</label>
                        <input name="name" type="text" class="form-control" value="{{ $content->name }}">
                    </div>
                    @include('admin/form_slug_edit',['slug'=>$content->slug])  
                    @if(!empty($content['upload'][0]))
                        @include('admin.form_image_display_single',['file'=>$content['upload'][0]])
                        <div style="display:none" id="image_upload_single">@include('admin.form_image_upload_single')</div>
                    @else
                        <div class="border mb-2 p-2">@include('admin.icon_image') No image uploaded yet</div>
                        <div id="image_upload_single">@include('admin.form_image_upload_single')</div>
                    @endif
                    <div class="position-relative form-group">
                        @include('admin.form_ckeditor',['label'=>'News Description','name'=>'description','value'=>  $content->description])
                    </div>
                    @include('admin.form_meta',[
                        'heading'=>$content->meta_heading,
                        'keyword'=>$content->meta_keywords,
                        'meta_title'=>$content->meta_title,
                        'meta_description'=>$content->meta_description,
                        'meta_robots'=>$content->meta_robots,
                        'meta_canonical'=>$content->meta_canonical,
                        'meta_image'=>$content->meta_image,
                        ])
                    @include('admin/form_status',['value'=>$content->status])
                    @include('admin/button_submit')             
                </form>
            </div>
        </div>
    </div>
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
@section('page_script')
    @include('admin.script_image_edit')
    @include('admin.script_tag_edit')
@endsection 