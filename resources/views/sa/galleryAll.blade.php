@extends($websettings['cms_layout'].'.frontend.layouts.app')
@section('social')
    @include('meta_landing')
@endsection

@section('schema')
    @include('schema_menu')
    @include('schema_landing')
@endsection
@section('content')
    <div class="container mt-5 mb-5">
        <div class="section-headding mb-40 mt-40">
            <h2>Photo Gallery</h2>      
            @include($websettings['cms_layout'].'.frontend.components.social_share')
        </div> 
        <div class="row">
            @if (!empty($contents))
                @foreach($contents as $content)    
                    <div class="col-lg-4 col-md-4 mb-3">
                        <div class="blog-item h-100">
                            <div class="thumbnail">
                                <a href="{{ $content->slug }}">
                                    @include($websettings['cms_layout'].'.frontend.image_display_dynamic',['item'=>$content->upload[0],'folder_path'=>'large'])
                                    <span class="date">
                                        <span>{{ $content->created_at }}</span>
                                    </span>
                                </a>                           
                            </div>
                            <div class="content">
                                <h3><a href="{{ $content->slug }}">{{{ $content->name }}}</a></h3>
                                {{ $content->upload->count() }} Photos
                            </div> 
                        </div>
                    </div>
                @endforeach
            @endif
        </div> 
    <div class="text-center">
        {{ $contents->links() }}
    </div>
    @include($websettings['cms_layout'].'.components.pagesettingcontent')
    </div>
    <style>
        .details p{margin-bottom:20px}
    </style>
@endsection

