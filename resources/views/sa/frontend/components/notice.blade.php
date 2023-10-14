<section class="section-padding-2">
    <div class="container">
        <!-- Section Headding -->
        <div class="row mb-40 mt-40">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-headding">
                    <a href="notice">
                      <h2>Notice Board</h2>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            @if (!empty($notices))
                    <!-- Single -->
                    <div class="col-12 col-lg-12 col-sm-6 mb-30 notice_mobile">							
                        <div class="info-box-s1">
                            <div class="icon">
                                <a href="{{ $notices->slug }}">
                                    @foreach ($notices->upload as $item)
                                         @include('admin.image_display_dynamic',['item'=>$item,'folder_path'=>'thumb'])
                                    @endforeach 
                                </a>
                            </div>
                            <div class="content">
                                <h4 class="text-gradient"><a href="{{ $notices->slug }}">{{ $notices->name }}</h4>
                                <p>	{!!Str::limit(strip_tags($notices->description), 55, $end='...')!!}</p>
                            </div>
                            <a href="{{ $notices->slug }}" class="btn new_btn mt-4 fs-4 text-white"> See Details</a>  
                        </div>
                        
                    </div>			
            @endif
        </div>
    </div>
</section>