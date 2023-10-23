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
            <div class="card-body"><h5 class="card-title"> Edit User</h5>
                <form class="" action="{{URL::to('admin/user/'.$user->id)}}"  method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="position-relative form-group">
                        <label for="name" class="">Name</label>
                        <input name="name" type="text" class="form-control" value="{{ $user->name }}">
                    </div> 
                    <div class="position-relative form-group">
                        <label for="Email" class="">Phone</label>
                        <input name="phone" type="text" class="form-control" value="{{ $user->phone }}">
                    </div> 
                    <div class="position-relative form-group">
                        <label for="password" class="">Password</label>
                        <input name="password" type="text" class="form-control">
                    </div> 
                   
                    @include('admin.button_submit')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection