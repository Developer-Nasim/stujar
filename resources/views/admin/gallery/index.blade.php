@extends('admin.layouts.app')
@section('content')

<div class="col-lg-12">
    
    <div class="main-card mb-3 card">
        @include('admin/card_head',[
        'title'=>'Gallery',
        'info'=>'Create  gallery',
        'links'=>[
            0=>['text'=>'Create Gallery','link'=>'/admin/gallery/create']
        ]  
    ])  
    <table class="mb-0 table table-bordered">
    <thead>
    <tr>
    <th>Gallery number</th>
    <th>Gallery Name</th>
    <th>Gallery Image</th>
    <th>status</th>
    <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php $i=1 @endphp
    @forelse ($contents as $content)
    <tr>
        <th scope="row">{{ $i++}}</th>
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
            <a href="{{URL::to('admin/gallery/'.$content->id.'/edit')}}" title="Edit" style="float: left; margin-left: 10px; margin-right: 10px">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>
                </button>
            </a>
            <form action="{{URL::to('admin/gallery/'.$content->id)}}" method="post">
            @csrf
                @method('DELETE')
             <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
            </form>
        </td>
    </tr>
    @empty
        No Gallery Found
    @endforelse
    </tbody>
    </table>
    </div>
    </div>
    </div>
@endsection