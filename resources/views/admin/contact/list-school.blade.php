@extends('admin.layouts.app')
@section('content')

<div class="col-lg-12">
    
    <div class="main-card mb-3 card">
    <table id="datable" class="mb-0 table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>School Name</th>
                <th>School Website Link</th>
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
            <a href="https://www.stujar.com/{{ $content->slug }}" target="_blank">
                <span class="badge badge-primary">View Website</span>   
            </a>
        </td>
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
            @if ($content->status == 1)
                <a href="{{URL::to('admin/school/status/'.$content->id)}}"
                    class="btn btn-success btn-sm" title="Inactive Now">
                    Inactive Now
                </a>
                @else
                <a href="{{ route('school.active', $content->id) }}"
                    class="btn btn-danger btn-sm" title="Active Now">
                    Active Now 
                </a>
            @endif
            <form action="{{URL::to('admin/school/delete/'.$content->id)}}" method="post">
                @csrf
                <button class="btn btn-sm btn-danger mt-2" type="submit" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
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