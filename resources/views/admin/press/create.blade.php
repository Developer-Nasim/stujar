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
                'title'=>'Add Press Releases',
                'info'=>'',
                'links'=>[
                    0=>['text'=>'Show press release','link'=>'/admin/press'],
                    1=>['text'=>'Add a press release','link'=>'/admin/press/create']
                ]  
            ])
            <div class="card-body">
                <form class="" action="{{URL::to('admin/press')}}"  method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="position-relative form-group">
                        <label for="name" class="">Name</label>
                        <input name="name" value="{{ old('name') }}" type="text" class="form-control" required="required" id="name">
                    </div>
                    @include('admin/form_slug',['slug'=>''])
                    
                    <div class="row">
                        <div class="col-md-3">
                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">PDF</label>
                                <input name="file[]" type="file" class="form-control">
                            </div>
                        </div>
                    </div>
                    @include('admin/form_status')
                    @include('admin/button_submit')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection