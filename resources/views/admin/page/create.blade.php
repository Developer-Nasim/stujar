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
                'title'=>'BCS Committee Management: Create New Page',
                'info'=>'Create and manage Pages of BCS Computer City',
                'links'=>[
                    0=>['text'=>'Page Management','link'=>'/admin/page'],
                    ]  
                ])
                <div class="card-body">
                <form class="" action="{{URL::to('admin/page')}}"  method="post" enctype="multipart/form-data">
                    @csrf
                    @include('admin.form_name')
                    @include('admin.form_slug')
                    <div class="position-relative form-group">
                        <label for="summary" class="">Page Summary</label>
                        <input name="summary" id="summary" type="text" class="form-control">
                    </div>                   
                    @include('admin.form_ckeditor',['name'=>'details','label'=>'About the new Page'])                  
                    <div class="position-relative form-group">
                        <label for="url" class="">Upload Url</label>
                        <input name="url" id="url"  type="text" class="form-control">
                    </div>               
                    @include('admin.form_meta')
                    @include('admin.form_status')
                    @include('admin.button_submit')
                </form>
            </div>
        </div>
    </div>
</div>
    
    </div>
    </div>
</div>
</div>
@endsection