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
                        <label for="Email" class="">Email</label>
                        <input name="email" type="email" class="form-control" value="{{ $user->email }}">
                    </div> 
                    <div class="position-relative form-group">
                        <label for="password" class="">Password</label>
                        <input name="password" type="text" class="form-control">
                    </div> 
                    <div class="position-relative form-group">
                        <label for="exampleEmail" class="">Role</label>
                        <select class="form-select" aria-label="Default select example" name="role_id">
                            <option value="1" @php echo $user->role_id==1?"selected":""; @endphp>CMS Admin</option>
                            <option value="2" @php echo $user->role_id==2?"selected":""; @endphp>Super Admin</option>
                            <option value="3" @php echo $user->role_id==3?"selected":""; @endphp>Editor</option>
                            <option value="4" @php echo $user->role_id==4?"selected":""; @endphp>Content Writter</option>
                            <option value="7" @php echo $user->role_id==7?"selected":""; @endphp>Member</option>
                        </select>
                    </div>
                    @include('admin.form_status',['value'=>$user->status])
                    @include('admin.button_submit')
                </form>
            </div>
        </div>
    </div>
</div>
@endsection