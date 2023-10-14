@extends($websettings['cms_layout'].'.frontend.layouts.app')

@section('content')
<div class="container">
         <h2 class="text-center mt-4">Message</h2>      
        <div >
            <div class="accordion-body">
                <form action="{{URL::to('user/message/'.$message->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')             
                    @csrf                 
                    <label for="#">
                        Name
                        <input type="text" name="name" id="" value="{{ $message->name }}">
                    </label>
                    <label for="#">
                        Photo
                        <div class="withImg">
                            <input type="file" name="file" id="">
                            @if (!empty($message))
                            <img src="{{ asset('images/uploads/thumb'.'/'.$message->file) }}" alt="" width="50px" height="50px"> 
                            @endif
                        </div>
                    </label> 
                    <div class="row"> 
                        <div class="col-lg-6">
                            <label for="#">
                                Position
                                <input type="text" name="position" id="" value="{{ $message->position }}">
                            </label>
                        </div> 
                    </div>
                    <label for="#">
                        Message
                        <textarea name="message">{{ $message->message }}</textarea>
                    </label>
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
</div>
@endsection