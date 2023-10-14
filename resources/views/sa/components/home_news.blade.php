<section class="">
    <div class="container">
        <div class="analytics-toll-content">
            <h2 class="text-gradient text-center pt-5 pb-3 mb-5">Latest News</h2>
        </div>
        <div class="row">
            <!-- Blog -->
            <div class="col-lg-12">
                <div class="row">
                    @forelse ($news as $blog)
                        <!-- Single -->
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="blog-item h-100">
                            <!-- Thumbanil -->
                            <div class="thumbnail">
                                <a href="{{ $blog->slug }}">
                                    @foreach ($blog->upload as $item)
                                        @include($websettings['cms_layout'].'.frontend.image_display_dynamic',['item'=>$item,'folder_path'=>'small'])
                                    @endforeach 
                                </a>
                                <div class="date">
                                    <span>{{ $blog->created_at}}</span>
                                </div>
                            </div>
                            <!-- Content -->
                            <div class="content">
                                <h3><a href="{{ $blog->slug }}">{{ $blog->name }} </a></h3>
                            </div>
                        </div>
                    </div> 
                    @empty
                        No News Found
                    @endforelse
                </div>
                <!-- Pagintaion -->
                <div class="text-center mb-4">
                    <a class="button-2" href="news">SEE ALL NEWS</a>
                </div>
            </div>
        </div>
    </div>
</section>