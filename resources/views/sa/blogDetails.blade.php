@extends($websettings['cms_layout'].'.frontend.layouts.app')
@section('social')
    @include('meta_content_details')
@endsection

@section('schema')
    @include('schema_menu')
@endsection

@section('content')
<section class="breadcrumb-area mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/blog') }}"> Blog</a></li>
                        <li>{{ $content->name }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-padding-2 mt-5">
    @php
    $arr_selected = [];
    foreach($content->tag as $tag){
        array_push($arr_selected,$tag->id);
    }
    @endphp
    <div class="container services-details">
        <div class="row">
            <div class="col-lg-8 mb-30">          
                <div class="meta mb-4">
                    <span><i class="far fa-calendar-alt"></i> {{date('d M Y',strtotime($content->created_at))}} </span>&nbsp;&nbsp;&nbsp;
                    <span><i class="fas fa-tags"></i> 
                        <div class="tagcloud d-inline">
                            @foreach($content->tag as $tag)
                                @if($tag->tag_type == 3)
                                <span>{{$tag->title}}</span>
                                @endif
                            @endforeach
                        </div>
                    </span>
                </div>
                <h1>{{ $content->meta_heading ?? $content->name }}</h1>
                <h4 class="sc_subtitle"><span>{{$content->subtitle ?? ''}} </span></h4>
                @include('social_share')
                <div class="my-4">
                    @if(!empty($content->upload[0]))
                        @include($websettings['cms_layout'].'.frontend.image_display_dynamic',['item'=>$content->upload[0],'folder_path'=>'large','caption'=>1])
                    @endif
                </div>
                <p>{!! $content->description !!}</p>
                @include($websettings['cms_layout'].'.components.tag')
                @include('social_share')
                @include($websettings['cms_layout'].'.components.comment')
            </div>
            <div class="col-md-4">
                <div class="widets-single mb-30">
                    <h2 class="title">Recent Posts</h2>
                    <div class="side-widgets-l-blog">
                        @forelse ($contents as $content)
                            <div class="item mb-20">
                                <div class="thubnail">
                                    <a href="{{ $content->slug }}">
                                        @if(!empty($content->upload[0]))     
                                            @foreach ($content->upload as $item)
                                                @include($websettings['cms_layout'].'.frontend.image_display_dynamic',['item'=>$item,'folder_path'=>'thumb'])
                                            @endforeach
                                        @endif
                                    </a>
                                </div>
                                <div class="content">
                                    <h4><a href="{{ $content->slug }}">{{ $content->name }}</a></h4>
                                    <span>{{ $content->created_at}}</span>
                                </div>
                            </div>
                        @empty
                            No Blog Found
                        @endforelse
                    </div>
                </div>
            </div>
        </div>   
    </div>
</section>
@endsection