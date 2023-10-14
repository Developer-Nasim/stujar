<section class="section-padding-2">
    <div class="container">
        <!-- Section Headding -->
        <!-- <div class="row mb-40 mt-40">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-headding">
                    <a href="notice">
                      <h2>Notice Board</h2>
                    </a>
                </div>
            </div>
        </div> -->
        <div class="row my-4">
            
            <div class="col-md-6 pt-4">
                @if (!empty($home_about))
                <div class="align-self-center box-border h-100">
                    <div class="analytics-toll-content">
                        <h2 class="text-gradient mt-4 text-center">{{ $home_about->name }}</h2>
                        <p class="content p-4">{!!Str::limit(strip_tags($home_about->description), 400, $end='...')!!}
                        </p>							
                        <a class="button-1 mt-5 mx-4" href="about-us">Learn More</a>
                    </div>
                </div>
                @endif	
            </div>
            <div class="col-md-6 pt-4">
                <div class="align-self-center box-border h-100">
                    <div class="analytics-toll-content">
                        <h2 class="text-gradient mt-4 text-center">Latest Notice</h2>
                        <div class="content p-4">
                            @foreach($notices as $content)
                                <p class="text-gradient py-2"><a class="notice-link py-2" href="{{ $content->slug }}">&#x276D;&#x276D; {{ $content->name }}</a></p>
                            @endforeach	
                        </div>
                        <a class="button-1 mt-5 mx-4" href="notice">Learn More</a>
                    </div>
                </div>
                
            </div>
        </div>
        <style>
.box-border{border: 1px solid #ddd;margin: 20px 0;}
.box-border h2{border-bottom:1px solid #ddd;padding-bottom:10px}
        </style>
        <div class="row d-none">
            @if(!empty($notices))
                @php
                $notice_count = sizeof($notices);
                if($notice_count == 1){
                    $notice_box_cls = "col-12 col-lg-12";
                }elseif($notice_count == 2){
                    $notice_box_cls = "col-12 col-md-6";
                }elseif($notice_count == 3){
                    $notice_box_cls = "col-12 col-md-4";
                }elseif($notice_count > 3){
                    $notice_box_cls = "col-12 col-md-3";
                }else{
                    $notice_box_cls = "col-12 col-lg-12";
                }
                @endphp
                @foreach($notices as $content)
                    <!-- Single -->
                    <div class="{{$notice_box_cls}} col-sm-6 mb-30 notice_mobile">							
                        <div class="info-box-s1 h-100">
                            <div class="icon">
                                <a href="{{ $content->slug }}">
                                    @foreach ($content->upload as $item)
                                         @include($websettings['cms_layout'].'.frontend.image_display_dynamic',['item'=>$item,'folder_path'=>'thumb'])
                                    @endforeach 
                                </a>
                            </div>
                            <div class="content">
                                <h3 class="text-gradient"><a href="{{ $content->slug }}">{{ $content->name }}</h3>
                                <p>	{!!Str::limit(strip_tags($content->description), 55, $end='...')!!}</p>
                            </div>
                            <a href="{{ $content->slug }}" class="btn new_btn mt-4 fs-4 text-white"> See Details</a>  
                        </div>
                        
                    </div>	
                @endforeach		
            @endif
        </div>
    </div>
</section>