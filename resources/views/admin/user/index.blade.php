@extends('admin.layouts.app')
@section('content')
<div class="col-lg-12"> 
    <div class="main-card mb-3 card">      
        @include('admin/card_head',[
            'title'=>'User Management',
            'info'=>'All the users',
            'links'=>[
                0=>['text'=>'Create User','link'=>'/admin/user/create'],
                1=>['text'=>'User Management','link'=>'/admin/user'],
            ]  
        ])
        <div class="card-body">
            <table class="mb-0 table table-bordered">
                <thead>
                    <tr>
                        <th>Serial number</th>
                        <th>Role</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>status</th>
                        <th width="120px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1 @endphp
                    @forelse ($users as $user)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td>
                            @if($user->role_id == 1)
                                <span  class="badge badge-primary">CMS Admin</span>
                            
                            @elseif($user->role_id == 2)
                                <span  class="badge badge-info">Super Admin</span>
                            
                            @elseif($user->role_id == 3)
                                <span  class="badge badge-secondary">Editor</span>                  
                            @elseif($user->role_id == 4)
                                <span class="badge badge-warning">Content Writter</span>
                            @else
                                Member
                            @endif
                        </td>
                        <th scope="row">{{ $user->name }}</th>
                        <td>
                            {{ $user->email }}
                        </td>
                        <td>
                        @php
                            if($user->status == 1){
                                    echo  "<div class='badge badge-success badge-shadow'>Active</div>";
                                }elseif($user->status == 2){
                                    echo  "<div class='badge badge-danger badge-shadow'>Inactive</div>";
                                }
                        @endphp
                        </td>
                        <td>
                            <a href="{{URL::to('admin/user/'.$user->id.'/edit')}}" title="Edit" style="float: left; margin-left: 10px; margin-right: 10px">
                                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>
                                </button>
                            </a> 
                        </td>
                        </tr>
                    @empty
                        No User Found
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <div class="fixed-table-pagination">
        <div class="paginated">
          {{ $users->links() }}
          </div>
    </div>
</div>

@endsection