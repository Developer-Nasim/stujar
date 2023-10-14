@extends($websettings['cms_layout'].'.frontend.layouts.app')

@section('content')
<div class="container">
         <h2 class="text-center mt-4">Notice Edit</h2>      
        <div >
            <div class="accordion-body">
                <form action="{{URL::to('user/notice/'.$notice->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')             
                    @csrf                 
                    <label for="#">
                        Name
                        <input type="text" name="name" id="" value="{{ $notice->name }}">
                    </label>
                    <label for="#">
                        Notice Details
                        <textarea name="message">{{ $notice->message }}</textarea>
                    </label>
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
</div>
@endsection