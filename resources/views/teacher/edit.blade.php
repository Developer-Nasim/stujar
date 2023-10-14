@extends($websettings['cms_layout'].'.frontend.layouts.app')

@section('content')
<div class="container">
         <h2 class="text-center mt-4">Teachers &amp; Stuffs </h2>      
        <div >
            <div class="accordion-body">
                <form action="{{URL::to('user/teacher/'.$teacher->id)}}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')             
                    @csrf
                  
                    <label for="#">
                        Name
                        <input type="text" name="name" id="" value="{{ $teacher->name }}">
                    </label>
                    <label for="#">
                        Photo
                        <div class="withImg">
                            <input type="file" name="file" id="">
                            @if (!empty($teacher))
                            <img src="{{ asset('images/uploads/thumb'.'/'.$teacher->file) }}" alt="" width="50px" height="50px"> 
                            @endif
                        </div>
                    </label> 
                    <div class="row"> 
                        <div class="col-lg-6">
                            <label for="#">
                                Stuff type [ teacher,stuff,commete member ]
                                <select name="stuff_type" id="">
                                    <option value="1">Teacher</option>
                                    <option value="2">Stuff</option>
                                    <option value="3">Commete Member</option>
                                </select>
                            </label>
                        </div> 
                        <div class="col-lg-6">
                            <label for="#">
                                Position
                                <input type="text" name="position" id="" value="{{ $teacher->position }}">
                            </label>
                        </div> 
                        <div class="col-lg-6">
                            <label for="#">
                                Phone Number
                                <input type="text" name="phone" id="" value="{{ $teacher->phone }}">
                            </label>
                        </div> 
                        <div class="col-lg-6">
                            <label for="#">
                                Email
                                <input type="email" name="email" id="" value="{{ $teacher->email }}">
                            </label>
                        </div> 
                    </div>
                    <label for="#">
                        About
                        <textarea name="about">{{ $teacher->about }}</textarea>
                    </label>
                    <button type="submit">Update</button>
                </form>
            </div>
        </div>
</div>
@endsection