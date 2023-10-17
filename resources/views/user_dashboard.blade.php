@extends($websettings['cms_layout'].'.frontend.layouts.app')

@section('content')
@php
     $content = DB::table('schools')->where('user_id', Auth::user()->id)->first();
     $welcome = DB::table('welcomes')->where('user_id', Auth::user()->id)->first();
     $about = DB::table('abouts')->where('user_id', Auth::user()->id)->first();
     $teachers = DB::table('teachers')->where('user_id', Auth::user()->id)->where('status' , 1 )->orderBy('id','desc')->paginate(12);
     $teacher = DB::table('teachers')->where('user_id', Auth::user()->id)->first();
     $messages = DB::table('messages')->where('user_id', Auth::user()->id)->where('status' , 1 )->orderBy('id','desc')->paginate(12);
     $message = DB::table('messages')->where('user_id', Auth::user()->id)->first();
     $notices = DB::table('notices')->where('user_id', Auth::user()->id)->where('status' , 1 )->orderBy('id','desc')->paginate(12);
     $notice = DB::table('notices')->where('user_id', Auth::user()->id)->first();
     $events = DB::table('events')->where('user_id', Auth::user()->id)->where('status' , 1 )->orderBy('id','desc')->paginate(12);
     $event = DB::table('notices')->where('user_id', Auth::user()->id)->first();
     $gallaries = DB::table('uploads')->where('user_id', Auth::user()->id)->where('status' , 1 )->orderBy('id','desc')->paginate(12);
     $gallary = DB::table('uploads')->where('user_id', Auth::user()->id)->first();           
@endphp
 <!-- main START -->
 <main> 
    <!-- dashboard-section START -->
    <div class="dashboard-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="profileInfos">
                        <div class="prHdn">
                            <h5>My Profile</h5>
                            <div class="sbMn">
                                <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                    <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                                  </svg></span>
                                <ul> 
                                    <li><button type="button">Delete Website</button></li>
                                    <li><button type="button">Delete Profile</button></li>
                                </ul>
                            </div>
                        </div>
                        <div class="profPcs">
                            <img src="{{ asset('assets/img/avt.png') }}" alt="">
                            <div> 
                                <h5>{{ Auth::user()->name }}</h5>
                                <span>Id: {{ Auth::user()->id }}</span> <br>
                            
                            </div>
                        </div>
                        <ul class="sitUpt">
                            <li>
                                <a href="/{{ $content->slug ?? '#' }}" target="_blank">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-up-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8.636 3.5a.5.5 0 0 0-.5-.5H1.5A1.5 1.5 0 0 0 0 4.5v10A1.5 1.5 0 0 0 1.5 16h10a1.5 1.5 0 0 0 1.5-1.5V7.864a.5.5 0 0 0-1 0V14.5a.5.5 0 0 1-.5.5h-10a.5.5 0 0 1-.5-.5v-10a.5.5 0 0 1 .5-.5h6.636a.5.5 0 0 0 .5-.5z"/>
                                        <path fill-rule="evenodd" d="M16 .5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793L6.146 9.146a.5.5 0 1 0 .708.708L15 1.707V5.5a.5.5 0 0 0 1 0v-5z"/>
                                    </svg>
                                    <span>View Website</span>
                                </a>
                            </li>
                            <li>
                                <label class="switch" for="ckb" style="pointer-events: none;">
                                    <input type="checkbox" id="ckb" {{ $content->status == 1 ? 'checked' : '' }}>
                                    {{-- <input id="ckb" data-id="{{$content->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" {{ $content->status ? 'checked' : '' }}> --}}
                                    <span class="slider"></span>
                                </label>

                                <span>Website 
                                    @if ($content->status == 1)
                                        <span class="text-primary"> Active </span>
                                    @else
                                        <span class="text-danger"> Inactive</span>
                                    @endif
                                </span>                          
                            </li>
                        </ul> 
                       
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="dashboard-forms">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item"> 
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#one" aria-expanded="true" aria-controls="one">
                                    General Information 
                                </button> 
                                <div id="one" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">                               
                                        <form action="{{URL::to('user/school/'.$content->id)}}" method="POST" enctype="multipart/form-data">       
                                            @method('PATCH')             
                                            @csrf
                                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                            <input type="hidden" value="{{ $content->slug }}" name="slug">
                                            <label for="#">
                                                Insititute name
                                                <input type="text" name="name" id="" value="{{ $content->name ?? '' }}">
                                            </label>
                                            <div class="row">
                                                <div class="col-lg-4">
                                                    <label for="#">
                                                        Insititute cover
                                                        <div class="withImg">
                                                            <input type="file" name="file" id="">
                                                            <img src="{{ asset('images/uploads/thumb'.'/'.$content->file) }}" alt="" width="50px" height="50px">
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="#">
                                                        Insititute logo
                                                        <div class="withImg">
                                                            <input type="file" name="logo" id="">
                                                            <img src="{{ asset('images/uploads/thumb'.'/'.$content->logo) }}" alt="" width="50px" height="50px">
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="#">
                                                        Insititute EIIN
                                                        <input type="text" name="eiin" id="" value="{{ $content->eiin ?? '' }}">
                                                    </label>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="#">
                                                        Insititute Established
                                                        <input type="date" name="established" id="" value="{{ $content->established ?? '' }}">
                                                    </label>
                                                </div>
                                            </div>
                                            <label for="#">
                                                Insititute Phone Number
                                                <input type="text" name="phone" id="" value="{{ $content->phone ?? '' }}">
                                            </label>
                                            <label for="#">
                                                Insititute Address
                                                <input type="text" name="address" id="" value="{{ $content->address ?? '' }}">
                                            </label>
                                            <button type="submit">Update</button>
                                        </form>

                                    </div>
                                </div>
                            </div> 
                            <div class="accordion-item"> 
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#two" aria-expanded="true" aria-controls="two">
                                    Welcome section
                                </button> 
                                <div id="two" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <form action="{{URL::to('user/welcome/'.$welcome->id)}}" method="post" enctype="multipart/form-data">
                                            @method('PATCH')             
                                            @csrf
                                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                            <input type="hidden" value="{{ $content->slug }}" name="slug">
                                            <label for="#">
                                                Title
                                                <input type="text" name="title" id="" value="{{ $welcome->title ?? '' }}">
                                            </label>
                                            <label for="#">
                                                Description
                                                <textarea name="description">{{ $welcome->description }}</textarea>
                                            </label>
                                            <label for="#">
                                                Insititute cover photo
                                                <div class="withImg">
                                                    <input type="file" name="file" id="">
                                                    <img src="{{ asset('images/uploads/thumb'.'/'.$welcome->file) }}" alt="" width="50px" height="50px">
                                                </div>
                                            </label> 
                                            <button type="submit">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div> 
                            <div class="accordion-item"> 
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#three" aria-expanded="true" aria-controls="three">
                                    About section
                                </button> 
                                <div id="three" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <form action="{{URL::to('user/about/'.$about->id)}}" method="POST" enctype="multipart/form-data">
                                            @method('PATCH')             
                                            @csrf
                                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                            <input type="hidden" value="{{ $content->slug }}" name="slug">
                                            <label for="#">
                                                About school
                                                <textarea name="about"> {{ $about->about }}</textarea>
                                            </label>
                                            <div class="row"> 
                                                <div class="col-lg-4">
                                                    <label for="#">
                                                        Total Students
                                                        <input type="text" name="total_student" value="{{ $about->total_student ?? '' }}">
                                                    </label>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="#">
                                                        Total Teachers
                                                        <input type="text" name="total_teacher"  value="{{ $about->total_teacher ?? '' }}">
                                                    </label>
                                                </div>
                                                <div class="col-lg-4">
                                                    <label for="#">
                                                        Total other Stuffs
                                                        <input type="text" name="total_stuff" value="{{ $about->total_stuff ?? '' }}">
                                                    </label>
                                                </div> 
                                            </div>
                                            <button type="submit">Update</button>
                                        </form>
                                    </div>
                                </div>
                            </div> 
                            <div class="accordion-item"> 
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#four" aria-expanded="true" aria-controls="four">
                                    Teachers & Stuffs
                                </button> 
                                <div id="four" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <form action="{{URL::to('user/teacher')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                            <input type="hidden" value="{{ $content->slug }}" name="slug">
                                            <label for="#">
                                                Name
                                                <input type="text" name="name" id="">
                                            </label>
                                            <label for="#">
                                                Photo
                                                <div class="withImg">
                                                    <input type="file" name="file" id="">
                                                </div>
                                            </label> 
                                            <div class="row"> 
                                                <div class="col-lg-6">
                                                    <label for="#">
                                                        Stuff type [ Teacher,Stuff,Committee member ]
                                                        <select name="stuff_type" id="">
                                                            <option value="1">Teacher</option>
                                                            <option value="2">Committee Member</option>
                                                            <option value="3">Stuff</option>
                                                        </select>
                                                    </label>
                                                </div> 
                                                <div class="col-lg-6">
                                                    <label for="#">
                                                        Position
                                                        <input type="text" name="position" id="" >
                                                    </label>
                                                </div> 
                                                <div class="col-lg-6">
                                                    <label for="#">
                                                        Phone Number
                                                        <input type="text" name="phone" id="">
                                                    </label>
                                                </div> 
                                                <div class="col-lg-6">
                                                    <label for="#">
                                                        Email
                                                        <input type="email" name="email" id="">
                                                    </label>
                                                </div> 
                                            </div>
                                            <label for="#">
                                                About
                                                <textarea name="about"></textarea>
                                            </label>
                                            <button type="submit">Add</button>
                                        </form>
                                        <ul class="added_item_lists">
                                            @forelse ($teachers as $teacher)
                                            <li>
                                                <div>
                                                   {{ $teacher->name }}
                                                </div>
                                                <div class="ail_act">
                                                    <a href="{{URL::to('user/teacher/'.$teacher->id.'/edit')}}">
                                                    <button type="button" class="editbtn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                      </svg>
                                                    </button>
                                                </a>
                                                   
                                                    <form action="{{URL::to('user/teacher/'.$teacher->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dltbtn" onclick="return confirm('Are you sure?')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                                          </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </li> 
                                            @empty
                                                No teachers found
                                            @endforelse
                                                                                
                                        </ul>
                                    </div>
                                </div>
                            </div> 
                            <div class="accordion-item"> 
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#five" aria-expanded="true" aria-controls="five">
                                    Messages
                                </button> 
                                <div id="five" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <form action="{{URL::to('user/message')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                            <input type="hidden" value="{{ $content->slug }}" name="slug">
                                            <label for="#">
                                                Name
                                                <input type="text" name="name" id="">
                                            </label>
                                            <label for="#">
                                                Photo
                                                <div class="withImg">
                                                    <input type="file" name="file" id="">
                                                </div>
                                            </label> 
                                            <label for="#">
                                                Position
                                                <input type="text" name="position" id="">
                                            </label> 
                                            <label for="#">
                                                Message
                                                <textarea name="message"></textarea>
                                            </label>
                                            <button type="submit">Add</button>
                                        </form>
                                        <ul class="added_item_lists">
                                            @forelse ($messages as $message)
                                            <li>
                                                <div>
                                                   {{ $message->name }}
                                                </div>
                                                <div class="ail_act">
                                                    <a href="{{URL::to('user/message/'.$message->id.'/edit')}}">
                                                    <button type="button" class="editbtn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                      </svg>
                                                    </button>
                                                </a>
                                                   
                                                    <form action="{{URL::to('user/message/'.$message->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dltbtn" onclick="return confirm('Are you sure?')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                                          </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </li> 
                                            @empty
                                            No message found
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div> 
                            <div class="accordion-item"> 
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#six" aria-expanded="true" aria-controls="six">
                                    Create Notices
                                </button> 
                                <div id="six" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <form action="{{URL::to('user/notice')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                            <input type="hidden" value="{{ $content->slug }}" name="slug">
                                            <label for="#">
                                                Notice title
                                                <input type="text" name="name" id="">
                                            </label>  
                                            <label for="#">
                                                Notice Details
                                                <textarea name="message" id="sample"> </textarea>
                                            </label>
                                            <button type="submit">Add</button>
                                        </form>
                                        <ul class="added_item_lists">
                                            @forelse ($notices as $notice)
                                            <li>
                                                <div>
                                                   {{ $notice->name }}
                                                </div>
                                                <div class="ail_act">
                                                    <a href="{{URL::to('user/notice/'.$notice->id.'/edit')}}">
                                                    <button type="button" class="editbtn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                      </svg>
                                                    </button>
                                                </a>
                                                   
                                                    <form action="{{URL::to('user/notice/'.$notice->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dltbtn" onclick="return confirm('Are you sure?')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                                          </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </li> 
                                            @empty
                                            No notice found
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div> 
                            <div class="accordion-item"> 
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#seven" aria-expanded="true" aria-controls="seven">
                                    Create Events
                                </button> 
                                <div id="seven" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <form action="{{URL::to('user/event')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                            <input type="hidden" value="{{ $content->slug }}" name="slug">
                                            <label for="#">
                                                Event title
                                                <input type="text" name="title" id="">
                                            </label>  
                                            <label for="#">
                                                Photo
                                                <div class="withImg">
                                                    <input type="file" name="file" id="">
                                                </div>
                                            </label> 
                                            <label for="#">
                                                Event Details
                                                <textarea id="sample2" name="description">Hi</textarea>
                                            </label>
                                            <button type="submit">Add</button>
                                        </form>
                                        <ul class="added_item_lists">
                                            @forelse ($events as $event)
                                            <li>
                                                <div>
                                                   {{ $event->title }}
                                                </div>
                                                <div class="ail_act">
                                                    <a href="{{URL::to('user/event/'.$event->id.'/edit')}}">
                                                    <button type="button" class="editbtn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                      </svg>
                                                    </button>
                                                </a>
                                                   
                                                    <form action="{{URL::to('user/event/'.$event->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dltbtn" onclick="return confirm('Are you sure?')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                                          </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </li> 
                                            @empty
                                            No event found
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div> 
                            <div class="accordion-item"> 
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#eight" aria-expanded="true" aria-controls="eight">
                                    Gellery Images
                                </button> 
                                <div id="eight" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <form action="{{URL::to('user/gallery')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                            <input type="hidden" value="{{ $content->slug }}" name="slug">
                                            <label for="#">
                                                Caption
                                                <input type="text" name="caption" id="">
                                            </label>  
                                            <label for="#">
                                                Photo
                                                <div class="withImg">
                                                    <input type="file" name="file" id="">
                                                </div>
                                            </label>  
                                            <button type="submit">Add</button>
                                        </form>
                                        <ul class="added_item_lists imgs">
                                            @forelse ($gallaries as $gallary)
                                            <li>                                            
                                                @if (!empty($gallary))
                                                <img src="{{ asset('images/uploads/thumb'.'/'.$gallary->file) }}" alt="" width="50px" height="50px"> 
                                                @endif
                                                <div class="ail_act">
                                                    <a href="{{URL::to('user/gallery/'.$gallary->id.'/edit')}}">
                                                    <button type="button" class="editbtn"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                      </svg>
                                                    </button>
                                                </a>
                                                   
                                                    <form action="{{URL::to('user/gallery/'.$gallary->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dltbtn" onclick="return confirm('Are you sure?')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                                          </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </li> 
                                            @empty
                                            No gallery found
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- dashboard-section END -->
</main>
<!-- main END -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(function() {
      $('.toggle-class').change(function() {
          var status = $(this).prop('checked') == true ? 1 : 0; 
          var user_id = $(this).data('id'); 
           
          $.ajax({
              type: "GET",
              dataType: "json",
              url: '/changeStatus',
              data: {'status': status, 'user_id': user_id},
              success: function(data){
                console.log(data.success)
              }
          });
      })
    })
  </script>
@endsection