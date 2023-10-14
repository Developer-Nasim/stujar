@extends('admin.layouts.app')
@section('content')

<div class="col-lg-12">
    
    <div class="main-card mb-3 card">
        @include('admin/card_head',[
            'title'=>'service Management',
            'info'=>'Manage and Create your services from this page, image size should be 900x600px',
            'links'=>[
                0=>['text'=>'Create service','link'=>'/admin/service/create'],
                ]  
            ])
    <div class="card-body">
    <table class="mb-0 table table-bordered">
        <thead>
            <tr>
                <th>@include('admin.icon_comment')</th>
                <th>Title</th>
                <th>Image</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
    <tbody>
        @php $i=1 @endphp
    @forelse ($contents as $content)
    <tr>
        <th scope="row"><a href="service/{{ $content->id }}" class="position-relative"><span style="position: absolute;top:0;left: 5px;font-size: 90%;color:#000">@if(!empty($content->comment[0])) {{ count($content->comment) }} @else 0 @endif </span> @include('admin.icon_comment')</a>    </th>
        <td>
            <h6 class="mb-2">
            {{ $content->name }} </h6>
            <div>Category: 
                @if(!empty($content->tag[0]))
                    @foreach($content->tag as $tag)
                        @if($tag->tag_type == 3)
                        <div class="badge badge-success">
                            {{$tag->title}} 
                        </div>
                        @endif
                    @endforeach
                @endif
            </div>
            <div>Tags:
                @if(!empty($content->tag[0]))
                    @foreach($content->tag as $tag)
                        @if($tag->tag_type == 4)
                        <div class="badge badge-info">
                            {{$tag->title}} 
                        </div>
                        @endif
                    @endforeach
                @endif
            </div>
        </td>
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
        <td style="width:100px">
            <a href="{{URL::to('admin/service/'.$content->id.'/edit')}}" title="Edit" style="float: left; margin-left: 10px; margin-right: 10px">

                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>

                </button>

            </a>   
            <form action="{{URL::to('admin/service/'.$content->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
            </form>
        </td>
        </tr>
    @empty
        No service Found
    @endforelse
    </tbody>
    </table>
    </div>
    </div>
    </div>

@endsection