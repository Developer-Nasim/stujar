@extends('admin.layouts.app')
@section('content')
<div class="row">
<div class="col-md-12">
    <div class="main-card mb-3 card">
        @include('admin/card_head',[
            'title'=>'Create Welcome Text',
            'info'=>'Create your welcome text from this page',
            'links'=>[
                0=>['text'=>'Welcome Text','link'=>'/admin/welcome'],

                ]  
            ])
    <div class="card-body"><h5 class="card-title">Welcome Text</h5>
    <form class="" action="{{URL::to('admin/welcome')}}"  method="post" enctype="multipart/form-data">
        @csrf
    <div class="position-relative form-group">
        @include('admin.form_ckeditor',['label'=>'First Text','name'=>'text_one'])
    </div>
    <div class="position-relative form-group">
        @include('admin.form_ckeditor',['label'=>'Second Text','name'=>'text_two'])
    </div>
    <div class="position-relative form-group">
        <label for="exampleEmail" class="">Welcome Ticker</label><br>
        <textarea name="welcome_ticker" class="form-control" rows="5"></textarea>
    </div>
    @include('admin.form_status')
    @include('admin.button_submit')
    </form>
    </div>
    </div>
</div>
</div>
@endsection