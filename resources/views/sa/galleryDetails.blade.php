@extends($websettings['cms_layout'].'.frontend.layouts.app')
@section('social')
    @include('meta_content_details')
@endsection
@section('schema')
    @include('schema_menu')
@endsection
@section('content')

<section class="mt-5">
    <div class="container ">
    <div class="row">
    <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
        <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ $websettings['cms_url'] }}">Home</a> &gt;</li>
            <li class="breadcrumb-item"><a href="gallery">gallery</a> &gt;</li>
            <li class="breadcrumb-item active" aria-current="page">{{  $content->name }}</li>
        </ol>
        </nav>
    </div>
    </div>
    </div>
</section>

<div class="container">
    
<section class="section-padding-2">
    <div class="section-headding mb-40">
       <h1>{{ $content->meta_heading ?? $content->name }}</h1> 
       <i>Total {{ $content->upload->count() }} photos in this gallery</i>
    </div>
    @include($websettings['cms_layout'].'.frontend.components.social_share')<br>
        <div class="row portfolio-full portF" id="MixItUp98FC62" style="">
            <!-- Single -->
            @foreach ($content->upload as $image)
            <div class="col-12 col-lg-8 col-md-8 mb-15 mix image" >           
                <a class="thumbnail" data-rel="lightcase:myCollection:portfolio" href="{{ asset('/images/uploads/large/'.$image->file) }}">             
                    @include($websettings['cms_layout'].'.frontend.image_display_dynamic',['item'=>$image,'folder_path'=>'large'])
                    <span class="d-inline-block mt-4">
                        {{ $image->caption ?? ''}}
                    </span>
                </a>
            </div>
            @endforeach 
        </div> 
</section>
</div>
@endsection

