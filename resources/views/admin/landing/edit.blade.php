@extends('admin.layouts.app')
@section('content')
<div class="row">
<div class="col-md-6">
    <div class="main-card mb-3 card">
    <div class="card-body"><h5 class="card-title"> Edit Slider</h5>
    <form class="" action="{{URL::to('admin/slider/'.$contents->id)}}"  method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
    <div class="position-relative form-group">
        <label for="exampleEmail" class="">Name</label>
        <input name="name" id="text"  type="text" class="form-control" value="{{ $contents->name }}">
    </div>
    <div class="position-relative form-group">
        <label for="exampleEmail" class="">slug</label>
        <input name="slug" id="text"  type="text" class="form-control" value="{{ $contents->name }}">
    </div>
    <div class="position-relative form-group">
        <label for="exampleEmail" class="">Upload Name</label>
        <input name="upload_name" id="text"  type="text" class="form-control" value="{{ $contents->upload->name }}">
    </div>
    <div class="position-relative form-group">
        <label for="exampleEmail" class="">Upload Url</label>
        <input name="url" id="text"  type="text" class="form-control" value="{{ $contents->upload->url }}">
    </div>
    
    <div class="position-relative form-group"><label for="exampleSelect" class="">Status</label>
        @if ($contents->status ==1)
        Status : <b>Active</b>
        @else
        Status :<b>Inactive</b> 
        @endif
        <select name="status" id="exampleSelect" class="form-control">
        <option value="1">Active</option>
        <option value="0">Inactive</option>
        </select>
    </div>
    </div>
    <button class="mt-1 btn btn-primary" type="submit">Submit</button>
    </form>
    </div>
    </div>
</div>
</div>
@endsection