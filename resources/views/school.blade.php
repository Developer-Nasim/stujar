@extends($websettings['cms_layout'].'.frontend.layouts.app_for_school_output')

@section('content')
    <!-- main START -->
    <main>

        <!-- Hero-section START -->
        <section class="hero-section-school">
            <img src="{{ asset('images/uploads/large'.'/'.$school->file) }}" alt="">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 .text-center">
                        <div class="hero-wrp-school">
                            <h3>{{ $welcome->title ?? '' }}</h3>
                            <p>{{ $welcome->description ?? '' }}</p> 
                        </div>
                    </div>
                </div>
            </div>
            <a href="#about-section" class="toDown"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
              </svg></a>
        </section>
        <!-- Hero-section END --> 
        <!-- About-section START -->
        <section class="about-section" id="about-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="about-wrps">
                            <div class="about-contents">
                                <h3>About us</h3>
                                <p>
                                    {{ $about->about ?? '' }}                                   
                                </p>
                                <ul>
                                    <li>
                                        <h3>{{ $about->total_student ?? '' }}</h3>
                                        <span>Students</span>
                                    </li>
                                    <li>
                                        <h3>{{ $about->total_teacher ?? '' }}</h3>
                                        <span>Teacher</span>
                                    </li>
                                    <li>
                                        <h3>{{ $about->total_stuff ?? '' }}</h3>
                                        <span>Others</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="rightImg">
                                @if (!empty($welcome->file))
                                    <img src="{{ asset('images/uploads/small'.'/'.$welcome->file) }}" alt="">
                                 @endif                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About-section END -->
    
        <!-- stuffs-section START -->
        <section class="stuffs-section" id="stuffs-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 text-center">
                        <div class="section-title">
                            <h3>Our Teachers and stuffs</h3>
                            <p>Who’s are feeling gret to use our application and solve the examination problem
                                by taking online examination</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if (sizeof($teachers) > 0)
                        @foreach ($teachers as $teacher)
                            <div class="col-lg-3 col-md-6">
                                <div class="stuffBlk"> 
                                    @if (!empty($teacher))
                                    <img src="{{ asset('images/uploads/small'.'/'.$teacher->file) }}" alt="" width="50px" height="50px"> 
                                    @endif
                                    <h5>{{ $teacher->name ?? '' }}</h5>
                                    <ul> 
                                        <li>
                                            @if ($teacher->stuff_type & $teacher->stuff_type == '1')
                                                {{ 'Teacher' }}
                                            @elseif ($teacher->stuff_type & $teacher->stuff_type == '2')
                                                {{ 'Committee Member' }}
                                            @elseif ($teacher->stuff_type & $teacher->stuff_type == '3')
                                                {{ 'Stuff' }}
                                            @endif 
                                        </li>

                                        <li>{{ $teacher->phone ?? '' }}</li>
                                        <li>{{ $teacher->email ?? '' }}</li>
                                    </ul>
                                </div>
                            </div>
                        @endforeach                   
                    @endif               
                </div>
            </div>
        </section>
        <!-- stuffs-section END -->
        <!-- messages-section START -->
        <section class="messages-section" id="messages-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 text-center">
                        <div class="section-title">
                            <h3>Messages</h3>
                            <p>the users had shared their experinces that how nice it is and how much help full</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-10 offset-lg-1"> 
                        <div class="row">
                            @if (sizeof($messages) > 0)
                                @foreach ($messages as $message)
                                    <div class="col-md-6">
                                        <div class="msgBlk">
                                            @if (!empty($message))
                                            <img src="{{ asset('images/uploads/small'.'/'.$message->file) }}" alt="" width="50px" height="50px"> 
                                            @endif
                                            <div class="msgFrm">
                                                <h5>{{ $message->name ?? '' }}</h5>
                                                <span>{{ $message->position ?? '' }}</span>
                                            </div>
                                            <p class="lessMore">
                                                {{ $message->message ?? '' }}
                                            </p>
                                            <input type="checkbox" class="rMr" />
                                        </div>
                                    </div>
                                @endforeach                        
                            @endif                   
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- messages-section END -->
 
        
        
        <!-- messages-section START -->
        <section class="notices-section" id="notices-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 text-center">
                        <div class="section-title">
                            <h3>Notices</h3>
                            <p>the users had shared their experinces that how nice it is and how much help full</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12"> 
                        <div class="all_norices">
                            @if (sizeof($notices) > 0)
                                @foreach ($notices as $notice)
                                    <div class="single_notice">
                                        <div class="single_notice-left">
                                            <h5>{{ $notice->name ?? '' }}</h5> 
                                            <span>{{ \Carbon\Carbon::parse($notice->created_at)->diffForHumans() }}</span> 
                                        </div>
                                        <button class="btn-primary text-center" data-bs-toggle="modal" data-bs-target="#DemoVideo{{ $notice->id }}" type="button">
                                            View more
                                        </button> 
                                    </div> 
                                @endforeach
                            @endif
                        </div>
                       
                        {{-- <button class="btn-primary text-center" data-bs-toggle="modal" data-bs-target="#DemoVideo" type="button">
                            View more
                        </button>    --}}
                    </div>
                </div>
            </div>
        </section>
        <!-- messages-section END -->
 

 
        
        <!-- events-section START -->
        <section class="events-section" id="events-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 text-center">
                        <div class="section-title">
                            <h3>Events</h3>
                            <p>Who’s are feeling gret to use our application and solve the examination problem
                                by taking online examination</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @if (sizeof($events) > 0)
                        @foreach ($events as $event)
                            <div class="col-lg-3 col-md-6">
                                <div class="instBlk"> 
                                    @if (!empty($event))
                                    <img src="{{ asset('images/uploads/small'.'/'.$event->file) }}" alt="" width="50px" height="50px"> 
                                    @endif
                                    <div class="insWrp">
                                        <h5>{{ $event->title ?? '' }}</h5>
                                        <span>{{ \Carbon\Carbon::parse($event->created_at)->diffForHumans() }}</span> 
                                    </div>
                                    <a href="#" class="theme-btn" data-bs-toggle="modal" data-bs-target="#event{{ $event->id }}">View</a>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
        <!-- events-section END -->

      
        <!-- gallery-section START -->
        <section class="gallery-section" id="gallery-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 text-center">
                        <div class="section-title">
                            <h3>Gallery</h3>
                            <p>Who’s are feeling gret to use our application and solve the examination problem
                                by taking online examination</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="spotlight-group">
                        @if (sizeof($gallaries) > 0)
                            @foreach ($gallaries as $item)
                                <a class="spotlight" href="{{ asset('images/uploads/large'.'/'.$item->file) }}" data-description="Description">
                                    <img src="{{ asset('images/uploads/small'.'/'.$item->file) }}">
                                </a> 
                            @endforeach
                        @endif                   
                    </div>
                </div>
            </div>
        </section>
        <!-- gallery-section END -->



        <!-- Contact-section START -->
        <div class="contact-section" id="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 offset-lg-3 text-center">
                        <div class="section-title">
                            <h3>Contact US</h3>
                            <p>Who’s are feeling gret to use our application and solve the examination problem
                                by taking online examination</p>
                        </div>
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-lg-12">
                        <div class="contactBlks">
                                
                            <ul class="addrLst">
                                <li>
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
                                        <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                                    </svg></span>
                                    <h5>Address</h5>
                                    <div class="text-truncate">
                                      {{$school->address ?? ''}}
                                    </div>
                                </li>
                                <li>
                                    <span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                                    </svg></span>
                                    <h5>Phone Number</h5>
                                    <div class="text-truncate">
                                       {{$school->phone ?? ''}}
                                    </div>
                                </li> 
                            </ul>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        <!-- Contact-section END -->
    </main>
 
    <!-- main END -->
@if ((sizeof($notices) > 0))
<!--  notice Modal -->
    @foreach ($notices as $notice)
        <div class="modal fade sclMdl" id="DemoVideo{{ $notice->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="DemoVideoLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content"> 
                    <div class="modal-header">
                        <h4 class="modal-title" id="noticesLabel">Notice</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="notice-detailses">
                            <h4>{{ $notice->name ?? '' }}</h4>
                            <span>{{ \Carbon\Carbon::parse($notice->created_at)->diffForHumans() }}</span>  
                            <div class="notice-main-details">
                                {{ $notice->message ?? "" }}
                            </div>
                        </div> 
                    </div> 
                </div>
            </div>
        </div>
    @endforeach   
@endif
@if ((sizeof($events) > 0))
<!--  notice Modal -->
    @foreach ($events as $event)
        <div class="modal fade sclMdl" id="event{{ $event->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="DemoVideoLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">  
                <div class="modal-content"> 
                    <div class="modal-header">
                        <h4 class="modal-title" id="noticesLabel">Event</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="notice-detailses">
                            <h4>{{ $event->title ?? '' }}</h4> 
                            <span>{{ \Carbon\Carbon::parse($event->created_at)->diffForHumans() }}</span> 
                            <div class="notice-main-details">
                                {{ $event->description ?? "" }}
                            </div>
                        </div> 
                    </div> 
                </div>
            </div>
        </div>
    @endforeach   
@endif

@endsection
 
   
