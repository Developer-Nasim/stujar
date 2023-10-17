@php
  $role_id= Auth::user()->role_id;
  //dd($role_id);
  if($role_id == 1 || $role_id == 2 || $role_id == 3 || $role_id == 4){
    $l = 'admin';
  }else{
    $l = 'member';
  }
@endphp
@extends($l.'.layouts.app')
@section('content')  

  <style>
    h1{
      font-weight:700;
      color: #ff5825;
    }
  </style>
  <div class="text-center mt-5"><h1>Welcome to Admin Panel </h1>   
  </div>
  <h4 class="text-center">Your Report Goes Here......</h4>

@endsection
