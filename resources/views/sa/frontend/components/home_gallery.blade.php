@if (sizeof($gallery) > 0)
    <div class="section-padding-2">
        <div class="container">
            <div class="row">
                <div class="analytics-toll-content">
                    <h2 class="text-gradient text-center pt-3 pb-3">Gallery</h2>
                </div>				
                <div class="portfolio-category mb-40 text-center">
                    <ul>
                        <li data-filter=".image" class="">Image</li>
                        <li data-filter=".video" class="">Video</li>
                    </ul>
                </div>
                <div class="row portfolio-full portF" id="MixItUp98FC62" style="">

                    <!-- Single -->
                        @foreach ($gallery as $item)
                            @foreach ($item->upload as $image)
                                <div class="col-6 col-lg-3 col-md-6 mb-15 mix image">                                     
                                    <div class="portfolio-item mb-30">
                                        <div class="thumbnail">                                 
                                            @include($websettings['cms_layout'].'.frontend.image_display_dynamic',['item'=>$image,'folder_path'=>'small'])                          
                                        </div>
                                        <div class="portfolio-overly">
                                            <div class="pv_full">
                                                <a data-rel="lightcase:myCollection:portfolio" href="{{ asset('/images/uploads/large/'.$image->file) }}"><i class="fas fa-search"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach 
                        @endforeach   
            
                    @if (!empty($videos))
                        @foreach ($videos as $video)
                                @foreach ($video->upload as $videoItem)
                                    @if (!empty($videoItem->file))
                                        <div class="col-6 col-lg-3 col-md-6 mb-15 mix  video" style="display: none;">
                                            <a href="{{ $video->slug }}">
                                                @include($websettings['cms_layout'].'.frontend.image_display_dynamic',['item'=>$videoItem,'folder_path'=>'small'])   
                                            </a>
                                            <div class="video_icon">
                                                <svg width="60px" height="60px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" d="M512 64a448 448 0 1 1 0 896 448 448 0 0 1 0-896zm0 832a384 384 0 0 0 0-768 384 384 0 0 0 0 768zm-48-247.616L668.608 512 464 375.616v272.768zm10.624-342.656 249.472 166.336a48 48 0 0 1     0 79.872L474.624 718.272A48 48 0 0 1 400 678.336V345.6a48 48 0 0 1 74.624-39.936z"/></svg>
                                            </div>
                                        </div>
                                    @endif                     
                                @endforeach
                        @endforeach   
                    @endif
                    <div class="text-center event_btn  mix image">
                        <a class="button-2" href="gallery">SEE ALL image</a>
                    </div>
                    <div class="text-center event_btn mix video" style="display: none;">
                        <a class="button-2" href="videos">SEE ALL Video</a>
                    </div>
                </div>           
            </div>		
        </div>
    </div>
@endif
