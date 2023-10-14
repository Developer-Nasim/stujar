@extends('admin.layouts.app')
@section('content')

<div class="col-lg-12">
    
    <div class="main-card mb-3 card">
        @include('admin/card_head',[
            'title'=>'Event',
            'info'=>'Create event',
            'links'=>[
                0=>['text'=>'Create Event','link'=>'/admin/event/create']
            ]  
        ])   
    <div class="card-body"><h5 class="card-title">Manage Event</h5>
    <table class="mb-0 table table-bordered">
    <thead>
    <tr>
    <th>Serial number</th>
    <th>Event Name</th>
    <th>Event Image</th>
    <th>status</th>
    <th>Action</th>
    </tr>
    </thead>
    <tbody>
        @php
            $i= 1;
        @endphp
    @forelse ($events as $event)
    <tr>
        <th scope="row">{{ $i++}}</th>
        <td>{{ $event->title }}<br><i>{{ $event->event_type }}</i></td>
        <td>
            <img src="{{ asset('images/event/thumb/'.$event->logo) }}" alt="Image" height="50" width="100">   
            {{-- @include('admin.image_display_dynamic',['item'=>$item,'folder_path'=>'thumb','height'=>50])       --}}
        </td>
        <td>
        @php
            if($event->status == 1){
                    echo  "<div class='badge badge-success badge-shadow'>Active</div>";
                }
                else{
                    echo  "<div class='badge badge-danger badge-shadow'>Inactive</div>";
                }
        @endphp
        </td>
        <td>
            <a href="{{URL::to('admin/event/'.$event->id.'/edit')}}" title="Edit" style="float: left; margin-left: 10px; margin-right: 10px">

                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>

                </button>

            </a>   
            <form action="{{URL::to('admin/event/'.$event->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></button>
            </form>
        </td>
        </tr>
    @empty
        No Event Found
    @endforelse
    </tbody>
    </table>
    </div>
    </div>
    </div>

@endsection