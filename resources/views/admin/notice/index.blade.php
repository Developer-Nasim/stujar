@extends('admin.layouts.app')
@section('content')

<div class="col-lg-12">
    
    <div class="main-card mb-3 card">
        @include('admin/card_head',[
            'title'=>'Notice Management',
            'info'=>'Manage and Create your notice from this page',
            'links'=>[
                0=>['text'=>'Create notice','link'=>'/admin/notice/create'],
                ]  
            ])
    <table class="mb-0 table table-bordered">
    <thead>
    <tr>
    <th>Id</th>
    <th>Notice Name</th>
    <th width="150x">Notice Image</th>
    <th>status</th>
    <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php $i= 1;@endphp
    @forelse ($contents as $content)
    <tr>
        <th scope="row">{{ $content->id }}</th>
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
                }else{
                    echo  "<div class='badge badge-danger badge-shadow'>Inactive</div>";
                }
        @endphp
        </td>
        <td>
            <a href="{{URL::to('admin/notice/'.$content->id.'/edit')}}" title="Edit" style="float: left; margin-left: 10px; margin-right: 10px">

                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>

                </button>

            </a>   
            <form action="{{URL::to('admin/notice/'.$content->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
            </form>
        </td>
        </tr>
    @empty
        No Notice Found
    @endforelse
    </tbody>
    </table>
    </div>
    </div>
    </div>

@endsection