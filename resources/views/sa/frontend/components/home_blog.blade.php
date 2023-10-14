<section class="">
    <div class="container">
        <div class="analytics-toll-content">
            <h2 class="text-gradient text-center pt-3 pb-3 mb-5">Blog</h2>
        </div>
        <div class="row">
            <!-- Blog -->
            <div class="col-lg-12">
                <div class="row">
                    @forelse ($blogs as $blog)
                        <!-- Single -->
                    <div class="col-lg-4 col-md-6 mb-30">
                        <div class="blog-item h-100">
                            <!-- Thumbanil -->
                            <div class="thumbnail">
                                <a href="{{ $blog->slug }}">
                                    @foreach ($blog->upload as $item)
                                        @include($websettings['cms_layout'].'.frontend.image_display_dynamic',['item'=>$item,'folder_path'=>'large'])
                                    @endforeach 
                                </a>
                                <div class="date">
                                    <span>{{ $blog->created_at}}</span>
                                </div>
                            </div>
                            <!-- Content -->
                            <div class="content">
                                <h3><a href="{{ $blog->slug }}">{{ $blog->name }} </a></h3>
                                <div class="auth">
                                    <ul>
                                        <li>
                                            <span>Posted By </span>
                                            <a href="#">{{ Auth::user()->name ?? 'admin'  }}</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> 
                    @empty
                        No Blog Found
                    @endforelse
                    
                </div>
                <!-- Pagintaion -->
                <div class="text-center mb-4">
                    <a class="button-2" href="blog">SEE ALL BLOG</a>
                </div>
            </div>
        </div>
    </div>
</section>