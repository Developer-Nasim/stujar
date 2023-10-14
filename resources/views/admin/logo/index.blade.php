@extends('admin.layouts.app')
@section('content')

<div class="col-lg-12"> 
    <div class="main-card mb-3 card">      
    <div class="card-body"><h5 class="card-title">Manage Logo</h5>
    <a href="{{ URL::to('admin/logo/create') }}" type="button" class="btn btn-primary mb-3 text-white">Add Logo</a>
    <table class="mb-0 table table-bordered">
    <thead>
    <tr>
    <th>Serial number</th>
    <th>Logo Name</th>
    <th>Logo Image</th>
    <th>status</th>
    <th>Action</th>
    </tr>
    </thead>
    <tbody>
        @php $i= 1;@endphp
    @forelse ($contents as $content)
    <tr>
        <th scope="row">{{ $i++ }}</th>
        <td>{{ $content->name }}</td>
        <td>
            @foreach ($content->upload as $item)
                @include('admin.image_display_dynamic',['item'=>$item,'folder_path'=>'thumb','height'=>50])
            @endforeach    
        </td>
        <td>
            @php
                if($content->status == 1){
                        echo  "<div class='badge badge-success badge-shadow'>Active</div>";
                    }
                elseif($content->status == 2){
                        echo  "<div class='badge badge-danger badge-shadow'>Inactive</div>";
                    }
                elseif($content->status == 3){
                        echo  "<div class='badge badge-warning badge-shadow'>Pending</div>";
                    }
            @endphp
        </td>
        <td>
            <a href="{{URL::to('admin/logo/'.$content->id.'/edit')}}" title="Edit" style="float: left; margin-left: 10px; margin-right: 10px">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>
                </button>
            </a>   
            <form action="{{URL::to('admin/logo/'.$content->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
            </form>
        </td>
        </tr>
    @empty
        No Logo Found
    @endforelse
    </tbody>
    </table>
    </div>
    </div>
    </div>

@endsection