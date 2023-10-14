@extends('admin.layouts.app')
@section('content')
<div class="row">
<div class="col-md-12">
    <div class="main-card mb-3 card">
        @include('admin/card_head',[
            'title'=>'Edit blog',
            'info'=>'Edit your blogs from this page, image size should be 900x600px',
            'links'=>[
                0=>['text'=>'Blog Management','link'=>'/admin/blog'],
                1=>['text'=>'Create New Blog','link'=>'/admin/blog/create'],
                ]  
            ])
    <div class="card-body">
    <form class="" action="{{URL::to('admin/blog/'.$content->id)}}"  method="post" enctype="multipart/form-data">    
    @csrf
    @method('PATCH')
    <div class="position-relative form-group">
        <label for="exampleEmail" class="">Name</label>
        <input name="name" required="required" type="text" class="form-control" value="{{ $content->name }}">
    </div>
    @include('admin.form_slug_edit',['slug'=>$content->slug])
    @php
    $arr_selected = [];
    foreach($content->tag as $tag){
        array_push($arr_selected,$tag->id);
    }
    @endphp
    <div id="tagRemoveRequest"></div>
    @foreach($tags_category as $tag)
        @if($tag->tag_type == 3)
            @if(in_array($tag->id,$arr_selected))
                <div title="Set tag {{$tag->title}}" class="d-inline-block mb-2 mr-2">
                    <label class="catcontainer">{{$tag->title}}
                        <input onclick="setRemoveTags({{$tag['id']}});" name="tag[]" checked="checked" value='{{$tag->id}}' type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </div>
            @else
                <div title="Set tag {{$tag->title}}" class="d-inline-block mb-2 mr-2">
                    <label class="catcontainer">{{$tag->title}}
                        <input name="tag[]" value='{{$tag->id}}' type="checkbox">
                        <span class="checkmark"></span>
                    </label>
                </div>
            @endif      
        @endif
    @endforeach   
    @if(!empty($content->upload[0]['url']))
        <img class="mb-3" src="{{ $content->upload[0]['url'] }}" alt="" height="50"><br>
    @endif
    
    <div class="position-relative form-group">
        @include('admin.form_ckeditor',['label'=>'News Description','name'=>'description','value'=>  $content->description])
    </div>
    <div class="mb-2">
        
        Selected Tags: 
        <div id="prevTags">
            @if(!empty($content->tag[0]))
                @foreach($content->tag as $tag)
                    @if($tag->tag_type == 4)
                    <div id="oldTag{{$tag['id']}}" class="badge badge-info mr-2 mb-2">
                        {{$tag->title}} 
                        <a onclick="setRemoveTags({{$tag['id']}});" href="javascript:void(0);"> x </a>
                    </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
    @include('admin.form_tags')
    @if(!empty($content['upload'][0]))
        @include('admin.form_image_display_single',['file'=>$content['upload'][0]])
        <div style="display:none" id="image_upload_single">@include('admin.form_image_upload_single')</div>
    @else
        <div class="border mb-2 p-2">@include('admin.icon_image') No image uploaded yet</div>
        <div id="image_upload_single">@include('admin.form_image_upload_single')</div>
    @endif
    
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
    </div>
  
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