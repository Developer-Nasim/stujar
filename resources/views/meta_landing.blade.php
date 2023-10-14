@php
// dd(Route::current()->pagelink);
if(Route::current()->pagelink){
    // dd(Route::current()->pagelink);
    $url = $websettings['cms_url'].'/'.Route::current()->pagelink;
}else{
    $url = $websettings['cms_url'];
}
if(!empty($websettings['cms_author'])){
    $author = '@'.$websettings['cms_author'];
}else{
    $author = '@CrenotiveDigitalSolution';
}
@endphp
<meta name="robots" content="{{ $pagesetting->meta_robots ?? 'index,allow' }}" />
<title>{{ $pagesetting->meta_title ?? $websettings['cms_sitename'] ?? 'Title' }}</title>
<meta name="description" content="{{ $pagesetting->meta_description ?? $websettings['cms_sitename'] ?? 'Description' }}" />
<link rel="canonical" href="{{ $url ?? 'URL' }}/" />
<meta property="site_name" content="{{ $websettings['cms_sitename'] ?? 'Site Name' }}" />
<meta property="og:url" content="{{ $url ?? 'URL' }}/" />
<meta property="og:title" content="{{ $pagesetting->meta_title ?? $websettings['cms_sitename'] ?? 'Title' }}" />
<meta property="og:description" content="{{ $pagesetting->meta_description ?? $websettings['cms_sitename'] ?? 'Description' }}" />
<meta property="og:keywords" content="{{ $pagesetting->meta_keywords ?? $websettings['cms_sitename'] ?? 'Keywords' }}" />
<meta property="og:image" content="{{ $pagesetting['meta_image'] ?? $websettings['cms_share_image'] ?? $websettings['cms_assets'].'/image/img.jpg' ?? '/image/img.jpg' }}" />
<meta name="twitter:card" content="summary" />
<meta name="twitter:site" content="{{ $websettings['cms_sitename'] ?? 'Sitename' }}" />
<meta name="twitter:creator" content="{{ '@'.$websettings['cms_author'] ?? '@Creator' }}" />
<meta property="twitter:url" content="{{ $url ?? 'URL' }}/" />
<meta property="twitter:title" content="{{ $pagesetting->meta_title ?? $websettings['cms_sitename'] ?? 'Title' }}" />
<meta property="twitter:description" content="{{ $pagesetting->meta_description ?? $websettings['cms_sitename'] ?? 'Description' }}" />
<meta property="twitter:keywords" content="{{ $pagesetting->meta_keywords ?? $websettings['cms_sitename'] ?? 'Keywords' }}" />
<meta property="twitter:image" content="{{ $pagesetting['meta_image']  ?? $websettings['cms_share_image'] ?? $websettings['cms_assets'].'/image/img.jpg' ?? '/image/img.jpg' }}" />