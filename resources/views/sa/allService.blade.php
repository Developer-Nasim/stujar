@extends($websettings['cms_layout'].'.frontend.layouts.app')
@section('social')
	<meta name="robots" content="{{ $pagesetting->meta_robots ?? 'index,allow' }}" />
    <title>{{ $pagesetting->meta_title ?? $websettings['cms_sitename'] ?? 'Title' }}</title>
    <meta name="description" content="{{ $pagesetting->meta_description ?? $websettings['cms_sitename'] ?? 'Description' }}" />
    <link rel="canonical" href="{{ $websettings['cms_url'] ?? 'URL' }}/" />
    <meta property="site_name" content="{{ $websettings['cms_sitename'] ?? 'Site Name' }}" />
    <meta property="og:url" content="{{ $websettings['cms_url'] ?? 'URL' }}/" />
    <meta property="og:title" content="{{ $pagesetting->meta_title ?? $websettings['cms_sitename'] ?? 'Title' }}" />
    <meta property="og:description" content="{{ $pagesetting->meta_description ?? $websettings['cms_sitename'] ?? 'Description' }}" />
    <meta property="og:keywords" content="{{ $pagesetting->meta_keywords ?? $websettings['cms_sitename'] ?? 'Keywords' }}" />
    <meta property="og:image" content="{{ $pagesetting['meta_image'] ?? $websettings['cms_assets'].'/image/img.jpg' ?? '/image/img.jpg' }}" />
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="{{ $websettings['cms_sitename'] ?? 'Sitename' }}" />
    <meta name="twitter:creator" content="@ {{ $websettings['cms_author'] ?? 'Creator' }}" />
    <meta property="twitter:url" content="@ {{ $websettings['cms_assets'] ?? 'URL' }}/" />
    <meta property="twitter:title" content="{{ $pagesetting->meta_title ?? $websettings['cms_sitename'] ?? 'Title' }}" />
    <meta property="twitter:description" content="{{ $pagesetting->meta_description ?? $websettings['cms_sitename'] ?? 'Description' }}" />
    <meta property="twitter:keywords" content="{{ $pagesetting->meta_keywords ?? $websettings['cms_sitename'] ?? 'Keywords' }}" />
    <meta property="twitter:image" content="{{ $pagesetting['meta_image'] ?? $websettings['cms_assets'].'/image/img.jpg' ?? '/image/img.jpg' }}" />
@endsection
@section('schema')
	<script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "BreadcrumbList",
            "itemListElement": [
            {
                "@type": "ListItem",
                "position": 1,
                "name": "Contact",
                "item": "{{ $websettings['cms_url'] }}/contact"
            }]
        }
	</script>
@endsection
@section('content')
<div class="inner-page-title-area">
  <div class="container"> 
    <!-- breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ $websettings['cms_url'] }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Services</li>
    </ol>
    <!-- breadcrumb end -->
    <div class="row">
      <div class="col-lg-6 offset-lg-3"> 
        <!-- title & des -->
        <h1><span>Services</span></h1>
        <!-- title & des end --> 
      </div>
    </div>
  </div>
</div>

<div class="container mt-5">
<div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-1 row-cols-1">
      @forelse ($contents as $product)
      <div class="col mb-30"> 
        <!-- service item -->
        <div class="service-item">
          <div class="ser-img mb-25">
            <a href="{{ $product->slug }}">
                @foreach ($product->upload as $item)
                    @include($websettings['cms_layout'].'.frontend.image_display_dynamic',['item'=>$item,'folder_path'=>'small'])
                @endforeach 
            </a>
          </div>
          <div class="description">
            <h6><a class="text-main" href="{{ $product->slug }}">{{ $product->name }}</a></h6>
            <p>{!!Str::limit(strip_tags($product->description), 100, $end='...')!!}</p>
            <a href="{{ $product->slug }}" class="btn-style-3">Read More <i class="fas fa-caret-right"></i></a> </div>
        </div>
        <!-- service item --> 
      </div>
      @empty
      @endforelse
    </div>
    <div class="paginated text-center">
        {{ $contents->links() }}
    </div>
    @include($websettings['cms_layout'].'.components.pagesettingcontent')
</div>
@endsection