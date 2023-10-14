@extends('admin.layouts.app')
@section('content')

<div class="col-lg-12">
    
    <div class="main-card mb-3 card">
    @include('admin/card_head',[
        'title'=>'Manage Landing',
        'info'=>'',
        'links'=>[
            0=>['text'=>'Add a landing page','link'=>'landing/create']
        ]  
    ])
    <div class="card-body">
    <table class="mb-0 table table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>PageType</th>
            <th>PageLink</th>
            <th>Code</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @forelse ($landings as $landing)
    <tr>
        <th scope="row">{{ $landing->id }}</th>
        <td>{{ $landing->linktype }}</td>
        <td>
            @if(!empty($landing->nextpagelink))
                <span class="text-danger">{{ $landing->pagelink }}</span><br>
                <span class="text-success">{{ $landing->nextpagelink }}</span>
            @else
                <span class="text-dark">{{ $landing->pagelink }}</span>
            @endif
        </td>
        <td>{{ $landing->statuscode }}</td>
        <td>
            <a href="#" title="Edit" style="float: left; margin-left: 10px; margin-right: 10px">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>
                </button>
            </a>
            <form action="#" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
            </form>
        </td>
    </tr>
    @empty
    No Landing Found
    @endforelse
    </tbody>
    </table>
    <div class="mt-4 mb-4 paginated">
        {{ $landings->appends(request()->input())->links() }}
    </div>
  
    </div>
@endsection