@extends('admin.layouts.app')
@section('content')
<div class="main-card mb-3 card">
  @include('admin/card_head',[
      'title'=>'Membership Management',
      'info'=>'All the members list registered with the application, you can manage company of each member from associated company icon',
      'links'=>[
        0=>['text'=>'All Members','link'=>'/admin/member'],
        1=>['text'=>'Membership Management','link'=>'/admin/member'],
      ]  
  ])
  <div class="card-body">
    <div class="bootstrap-table bootstrap4 d-none">
      <div class="fixed-table-container">
        <form method="POST" action="{{URL::to('admin/member')}}" class="border p-4 d-none">
          <legend class="border-bottom pb-2 mb-2 text-center">Add a new member</legend>
          <input type="hidden" name="formtype" value="user">
            @csrf
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
      </div>
       </div>
       <div class="row">
        <div class="col-md-6 top-page">
          
          <div class="paginated">
            {{ $members->links() }}
            </div>
        </div>
        <div class="col-md-6 pt-4">
        <form action="{{URL::to('admin/member/search')}}" method="post">
          @csrf
          <input name="search" type="hidden" value="member">
          <input name="name" type="text" class="border p-2" placeholder="Type company name" value="{{$search ?? ''}}">
          <button class="mt-1 btn btn-success" type="submit">Submit</button>
        </form>
        </div>
        
       </div>

       
        <div class="fixed-table-body mt-4">
        <table data-toggle="table" data-sort-name="stargazers_count" data-sort-order="desc" class="table table-bordered table-hover">
          <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Email</th>
            <th>Company</th>
            <th width="120px">Action</th>
          </tr>    
          @foreach($members as $user)
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->email}}</td>
              <td><a title="See company details" href="{{URL::to('admin/member/company/'.$user->id)}}">@include('admin.icon_company')</a></td>
              <td>
              <a style="display:none" href="#" title="Edit">
              <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
              </a>   
              <button style="display:none" class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
      <div class="fixed-table-pagination">
        <div class="paginated">
          {{ $members->links() }}
          </div>
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
<style>
.top-page>.paginated>nav>div:first-child{display:none}
  </style>

@endsection