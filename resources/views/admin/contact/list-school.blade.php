@extends('admin.layouts.app')
@section('content')

<div class="col-lg-12">
    
    <div class="main-card mb-3 card">
    <table class="mb-0 table table-bordered">
    <thead>
    <tr>
    <th>Id</th>
    <th>School Name</th>
    <th width="150x">School logo</th>
    <th>status</th>
    <th width="15%">Action</th>
    </tr>
    </thead>
    <tbody>
    @php $i= 1;@endphp
    @forelse ($schools as $content)
    <tr>
        <th scope="row">{{ $i++ }}</th>
        <td>{{ $content->name }}</td>
        <td>
            @if (!empty($content->file))
                 <img src="{{ asset('images/uploads/thumb'.'/'.$content->file) }}" alt="" width="50px" height="50px">
            @endif
        </td>
        <td>
        @php
            if($content->status == 1){
                    echo  "<div class='badge badge-success badge-shadow'>Active</div>";
                }else{
                    echo  "<div class='badge badge-danger badge-shadow'>Inactive</div>";
                }
        @endphp
        </td>
        <td>
            
            <form action="{{URL::to('admin/school/status/'.$content->id)}}" method="post">
                @csrf
                <button class="btn btn-sm btn-primary" type="submit" onclick="return confirm('Are you sure?')">Change Status</button>
            </form>
        </td>
        </tr>
    @empty
        No School Found
    @endforelse
    </tbody>
    </table>
    </div>
    </div>
    </div>

@endsection