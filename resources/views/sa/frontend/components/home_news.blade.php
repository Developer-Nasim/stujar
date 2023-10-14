<section class="section-padding-2 pt-0 mt-5">
    <div class="container">
        <!-- Section Headding -->
        <div class="row mb-40">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="analytics-toll-content">
                    <h2 class="text-gradient text-center pt-3 pb-3">Latest News</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse ($news as $item)
            <!-- Single -->
            <div class="col-6 col-lg-4 col-md-6 mb-30 news_mobile">							
                    <div class="blog-item h-100">
                        <!-- Thumbanil -->
                        <div class="thumbnail">
                            @foreach ($item->upload as $singleitem)
                                @include($websettings['cms_layout'].'.frontend.image_display_dynamic',['item'=>$singleitem,'folder_path'=>'large'])
                            @endforeach 
                            <div class="date">
                                <span> {{ $item->created_at}}</span>
                            </div>
                        </div>
                        <!-- Content -->
                        <div class="content">
                            <h3> <a href="{{ $item->slug }} ">{{ $item->name }} </a> </h3>
                        </div>
                    </div>               
            </div>
            <!-- Single ends -->
            @empty
            No News Found
            @endforelse
        </div>
        <div class="text-center event_btn">
            <a class="button-2" href="news">SEE ALL NEWS</a>
        </div>
    </div>
</section>