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
                'title'=>'Create User',
                'info'=>'Editing this section will change social share data and SEO information.',
                'links'=>[
                    0=>['text'=>'List User','link'=>'/admin/user']
                  ]  
              ])
            <div class="card-body"><h5 class="card-title"> Add User</h5>
                <form class="" action="{{URL::to('admin/user')}}"  method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="position-relative form-group">
                        <label for="name" class="">Name</label>
                        <input name="name" type="text" class="form-control">
                    </div> 
                    <div class="position-relative form-group">
                        <label for="Email" class="">Email</label>
                        <input name="email" type="email" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label for="Email" class="">phone</label>
                        <input name="phone" type="text" class="form-control" required >
                    </div> 
                    <div class="position-relative form-group">
                        <label for="password" class="">Password</label>
                        <input name="password" type="text" class="form-control" >
                    </div> 
                    <div class="position-relative form-group">
                        <label for="exampleEmail" class="">Role</label>
                        <select class="form-select" aria-label="Default select example" name="role_id">
                            <option value="1">CMS Admin</option>
                            <option value="2">Super Admin</option>
                            <option value="3">Editor</option>
                            <option value="4">Content Writter</option>
                            <option value="7">Members</option>
                        </select>
                    </div>
                    @include('admin.form_status')
                    @include('admin.button_submit')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection