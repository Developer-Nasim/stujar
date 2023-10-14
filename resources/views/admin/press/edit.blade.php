@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="main-card mb-3 card">
            @include('admin/card_head',[
                'title'=>'Edit Press Releases',
                'info'=>'',
                'links'=>[
                    0=>['text'=>'Show press release','link'=>'/admin/press'],
                    1=>['text'=>'Add a press release','link'=>'/admin/press/create']
                ]  
            ])
            <div class="card-body">
                <form class="" action="{{URL::to('admin/press/'.$content->id)}}"  method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="position-relative form-group">
                        <label for="name" class="">Name</label>
                        <input name="name" value="{{ $content->name }}" type="text" class="form-control" required="required">
                    </div>
                    @include('admin/form_slug_edit',['slug'=>$content->slug])
                    
                    <div class="row mb-4">
                        <div class="col-md-6 d-none">
                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">PDF</label>
                                <input name="file[]" type="file" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                        @if(!empty($content->upload[0]['file']))
                        <a class="btn btn-info" href="{{'http://127.0.0.1:8000/'.$content->upload[0]['file']}}" download>Download File</a> 
                        <a class="btn btn-info" href="{{'http://127.0.0.1:8000/'.$content->upload[0]['file']}}" target="_blank">View File</a>       
                        @endif
                        </div>
                    </div>
                    @include('admin/form_status',['value'=>$content->status])
                    @include('admin/button_submit')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection