@extends('admin.layouts.app')
@section('content')

<div class="col-lg-12">
    
    <div class="main-card mb-3 card">
    @include('admin/card_head',[
        'title'=>'Welcome Text Management',
        'info'=>'Manage and Create your Welcome Text from this page',
        'links'=>[
            0=>['text'=>'Create Welcome Text','link'=>'/admin/welcome/create'],
            ]  
        ])
    <table class="mb-0 table table-bordered">
    <thead>
    <tr>
    <th>Serial number</th>
    <th>Text One</th>
    <th>Text Two</th>
    <th>status</th>
    <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php $i=1 @endphp
    @forelse ($welcome as $item)
    <tr>
        <th scope="row">{{ $i++ }}</th>
        <td>{!! $item->text_one !!}</td>
        <td>{!! $item->text_two !!}</td>
        <td>
        @php
            if($item->status == 1){
                    echo  "<div class='badge badge-success badge-shadow'>Active</div>";
                }else{
                    echo  "<div class='badge badge-danger badge-shadow'>Inactive</div>";
                }
        @endphp
        </td>
        <td>
            <a href="{{URL::to('admin/welcome/'.$item->id.'/edit')}}" title="Edit" style="float: left; margin-left: 10px; margin-right: 10px">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>
                </button>
            </a>   
            <form action="{{URL::to('admin/welcome/'.$item->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
            </form>
        </td>
        </tr>
    @empty
    No Text Found
    @endforelse
    </tbody>
    </table>
    </div>
    </div>
    </div>

@endsection