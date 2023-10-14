@extends($websettings['cms_layout'].'.frontend.layouts.app')

@section('content')
<div class="container">
         <h2 class="text-center mt-4">Event Edit</h2>      
        <div >
            <div class="accordion-body">
                <form action="{{URL::to('user/event/'.$event->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')             
                    @csrf                 
                    <label for="#">
                        Title
                        <input type="text" name="title" id="" value="{{ $event->title }}">
                    </label>
                    <label for="#">
                        Photo
                        <div class="withImg">
                            <input type="file" name="file" id="">
                            @if (!empty($event))
                            <img src="{{ asset('images/uploads/thumb'.'/'.$event->file) }}" alt="" width="50px" height="50px"> 
                            @endif
                        </div>
                    </label> 
                    <label for="#">
                        Event Details
                        <textarea name="description">{{ $event->description }}</textarea>
                    </label>
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
</div>
@endsection