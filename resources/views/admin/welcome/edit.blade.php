@extends('admin.layouts.app')
@section('content')
<div class="row">
<div class="col-md-12">
    <div class="main-card mb-3 card">
        @include('admin/card_head',[
            'title'=>'Edit Text',
            'info'=>'Edit your Welcome Text from this page',
            'links'=>[
                0=>['text'=>'Welcome Text Management','link'=>'/admin/welcome'],
                1=>['text'=>'Create New Welcome Text','link'=>'/admin/welcome/create'],
                ]  
            ])
    <div class="card-body"><h5 class="card-title">Welcome Text</h5>
        <form class="" action="{{URL::to('admin/welcome/'.$welcome->id)}}"  method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
            <div class="position-relative form-group">
                @include('admin.form_ckeditor',['label'=>'First Text','name'=>'text_one','value'=>$welcome->text_one])
            </div>
            <div class="position-relative form-group">
                @include('admin.form_ckeditor',['label'=>'Second Text','name'=>'text_two','value'=>$welcome->text_two])
            </div>
            <div class="position-relative form-group">
                <label for="exampleEmail">Welcome Ticker</label><br>
                <textarea name="welcome_ticker" class="form-control" rows="5">{!!$welcome->welcome_ticker!!}
                </textarea>
            </div>
            @include('admin.form_status',['value'=>$welcome->status])
            @include('admin.button_submit')
        </form>
    </div>
    </div>
</div>
</div>
@endsection