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
			"name": "Find Shop",
			"item": "{{ $websettings['cms_url'] }}/contact"
		}
	}
	</script>
@endsection

@section('content')
    
<div class="inner-page-title-area">
  <div class="container"> 
    <!-- breadcrumb -->
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ $websettings['cms_url'] }}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">About Us</li>
    </ol>
    <!-- breadcrumb end -->
    <div class="row">
      <div class="col-lg-6 offset-lg-3"> 
        <!-- title & des -->
        <h1><span>About Us</span></h1>
        <!-- title & des end --> 
      </div>
    </div>
  </div>
</div>
<!-- Featured -->
@include($websettings['cms_layout'].'.components.featured')

<!-- About -->
<!-- ================ About area ================ -->
<div class="about-area pt-80 pb-50 bg-main-light">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-12 offset-lg-1 mb-30">
        <div class="about-content">
          <div class="about-content-text">
            <h6>{{ $home_about->name }}</h6>
            <h2>{{ $home_about->summary }}</h2>
            <div class="fs-6">{!! $home_about->description !!}</div>
          </div>
        </div>
        <div class="about-img-wrapper">
          <div class="row align-items-center">
            <div class="col-lg-5 mb-30">
              <div class="about-images-1">@include($websettings['cms_layout'].'.frontend.image_display_dynamic',['item'=>$home_about->upload[0],'folder_path'=>'small'])</div>
            </div>
            <div class="col-lg-7 mb-30">
              <div class="about-images-2">@include($websettings['cms_layout'].'.frontend.image_display_dynamic',['item'=>$home_about->upload[1],'folder_path'=>'small'])</div>
              <div class="about-images-3 mt-30">@include($websettings['cms_layout'].'.frontend.image_display_dynamic',['item'=>$home_about->upload[2],'folder_path'=>'small'])</div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6">
        
      </div>
    </div>
  </div>
</div>
<!-- ================ About area end ================ --> 


    @include($websettings['cms_layout'].'.components.pagesettingcontent')
</section>


@endsection