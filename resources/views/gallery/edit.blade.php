@extends($websettings['cms_layout'].'.frontend.layouts.app')

@section('content')
<div class="container">
         <h2 class="text-center mt-4"> Gallery Edit</h2>      
        <div >
            <div class="accordion-body">
                <form action="{{URL::to('user/gallery/'.$gallery->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')             
                    @csrf                 
                    <label for="#">
                        Caption
                        <input type="text" name="caption" id="" value="{{ $gallery->caption }}">
                    </label>
                    <label for="#">
                        Photo
                        <div class="withImg">
                            <input type="file" name="file" id="">
                            @if (!empty($gallery))
                            <img src="{{ asset('images/uploads/thumb'.'/'.$gallery->file) }}" alt="" width="50px" height="50px"> 
                            @endif
                        </div>
                    </label> 
                   
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
</div>
@endsection