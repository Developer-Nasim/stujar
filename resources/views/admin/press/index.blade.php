@extends('admin.layouts.app')
@section('content')
<div class="col-lg-12">
    <div class="main-card mb-3 card">
        @include('admin/card_head',[
            'title'=>'Manage Press Releases',
            'info'=>'',
            'links'=>[
                0=>['text'=>'Add a press release','link'=>'press/create']
            ]  
        ])
        <div class="card-body">
            <table class="mb-0 table table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>File</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contents as $content)
                    <tr>
                        <th scope="row">{{ $content->id }}</th>
                        <td>
                            {{$content->name}}
                        </td>
                        <td>
                            @if(!empty($content->upload[0]['file']))
                            <a class="btn btn-info" href="{{'http://bcscomputercity.org/'.$content->upload[0]['file']}}" download>Download File</a> 
                            <a class="btn btn-info" href="{{'http://bcscomputercity.org/'.$content->upload[0]['file']}}" target="_blank">View File</a>       
                            @endif
                        </td>
                        <td>@include('admin.display_status',['value'=>$content->status])</td>
                        <td>
                            <a href="{{URL::to('admin/press/'.$content->id.'/edit')}}" title="Edit" style="float: left; margin-left: 10px; margin-right: 10px"><button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button></a>
                            <form action="{{URL::to('admin/press/'.$content->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure?')">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    No Press Found   
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection