@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title text-center"> Profile Photo</h5>
            </div>
            <div class="image_profile text-center pb-4">
                @if (!empty($user->profile_photo))
                <img src="{{ $user->profile_photo }}" alt="{{ $user->name }}">
                @else
                <img src="https://i.ibb.co/3dDLhpZ/149071.png" alt="" height="150px"> 
                @endif             
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="main-card mb-3 card">
            <div class="card-body">
                <h5 class="card-title text-center"> Update Your Profile</h5>
                <form action="{{URL::to('admin/profile/update/'.$user->id)}}"  method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <label for="exampleEmail">Name</label>
                                <input name="name" type="text" class="form-control" value="{{ $user->name }}">
                            </div>
                        </div>                                
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">Email</label>
                                <input name="email" type="text" class="form-control" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <label for="exampleEmail" class="">Image URL</label>
                                <input name="profile_photo" type="text" class="form-control" value="{{ $user->profile_photo }}">
                            </div>
                        </div>                       
                    </div>
                @include('admin.form_status',['value'=>$user->status])
                @include('admin.button_submit')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection