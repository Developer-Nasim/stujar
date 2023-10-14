@extends('admin.layouts.app')
@section('content')
<div class="row">
<div class="col-md-12">
    <div class="main-card mb-3 card">
        <div class="card-body">
            <h5 class="card-title">Add a new setting</h5>
            <form class="" action="{{URL::to('admin/pagesetting/')}}" method="post">
                @csrf
                <div class="position-relative form-group">
                    <label class="">Page Slug</label>
                    <input name="meta_slug" type="text" required="required" class="form-control">
                </div>
                @include('admin.form_meta')
                @include('admin.form_ckeditor',['label'=>'Page Details','name'=>'page_description'])
                @include('admin/button_submit')
            </form>
        </div>
    </div>
</div>
</div>
@endsection