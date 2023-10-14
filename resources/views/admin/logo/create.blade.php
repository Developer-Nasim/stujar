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
            <div class="card-body">
                <div class="d-flex justify-content-between bd-highlight mb-2 border-bottom pb-2">
                    <h5 class="card-title"> Add Logo</h5>
                    <div>
                        <a class="btn btn-info" href="{{URL::to('admin/logo')}}">Manage Logo</a>
                        @include('admin/button_back')
                    </div>
                </div>
                <form action="{{URL::to('admin/logo')}}"  method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="position-relative form-group">
                        <label for="name" class="">Name</label>
                        <input name="name" value="{{ old('name') }}" type="text" class="form-control" required="required" id="name">
                    </div>
                    @include('admin/form_slug',['slug'=>''])                 
                    @include('admin.form_image_upload_single')                    
                    @include('admin/form_status')
                    @include('admin/button_submit')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection