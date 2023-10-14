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
			"item": "{{ $websettings['cms_url'] }}/shops"
		},{
			"@type": "ListItem",
			"position": 2,
			"name": "Management Committee",
			"item": "{{ $websettings['cms_url'] }}/management-committee"
		},{
			"@type": "ListItem",
			"position": 3,
			"name": "Notice",
			"item": "{{ $websettings['cms_url'] }}/notice"
		},{
			"@type": "ListItem",
			"position": 4,
			"name": "Blogs",
			"item": "{{ $websettings['cms_url'] }}/blogs"
		}]
	}
	</script>
@endsection
@section('content')
    <div class="container mt-5 mb-5">
        <div class="section-headding mb-40 mt-40">
            <h2 class="text-center">Video Gallery</h2>      
            @include($websettings['cms_layout'].'.frontend.components.social_share')
        </div> 
        <div class="row">
            @if (!empty($contents))
                @foreach($contents as $item)
                 @foreach ($item->upload as $image) 
                    @if (!empty($image->file))
                        <div class="col-lg-4 col-md-4 mb-3">
                            <div class="blog-item h-100">
                                <div class="thumbnail">
                                    <a href="{{ $item->slug }}">
                                        @include($websettings['cms_layout'].'.frontend.image_display_dynamic',['item'=>$image,'folder_path'=>'large'])
                                    </a>
                                </div>
                                <div class="content">
                                    <a href="{{ $item->slug }}"><h3>{{{ $item->name }}} </h3></a>
                                    
                                </div> 
                            </div>
                        </div>
                    @endif
                    @endforeach
                @endforeach
            @endif
        </div> 
        <div class="text-center paginated">
            {{ $contents->links() }}
        </div>
        @include($websettings['cms_layout'].'.components.pagesettingcontent')
    </div>
@endsection

