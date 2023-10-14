@php
if(!empty($content->slug)){
    $url = $websettings['cms_url'].'/'.$content->slug.'/';
}else{
    $url = $websettings['cms_url'].'/';
}
if(!empty($websettings['cms_author'])){
    $author = '@'.$websettings['cms_author'];
}else{
    $author = '@CrenotiveDigitalSolution';
}

if(!empty($content->meta_image)){
    $img = $content->meta_image;
}elseif(!empty($content->upload[0])){
    $img = ''.$content->upload[0]['file'];
}elseif(!empty($pagesetting['meta_image'])){
    $img = $pagesetting['meta_image'];
}elseif(!empty($websettings['cms_image'])){
    $img = $websettings['cms_image'];
}else{
    $img = 'https://www.crenotive.com/logo.svg'; 
}
@endphp
<meta name="robots" content="{{ $content->meta_robots ?? $pagesetting->meta_robots ?? $websettings['cms_robots'] ?? 'index,allow' }}" />
<title>{{ $content->meta_title ?? $content->name ?? $pagesetting->meta_title ?? $websettings['cms_sitename'] ?? 'Crenotive Digital Solution' }}</title>
<meta name="keywords" content="{{ $content->meta_keywords ?? $content->name ?? $pagesetting->meta_keywords ?? $websettings['cms_sitename'] ?? 'crenotive, crenotive cms, crenotive digital solution' }}" />
<meta name="description" content="{{ $content->meta_description ?? $pagesetting->meta_description ?? $websettings['cms_sitename'] ?? 'All-in-one digital solutions for your business' }}" />
<link rel="canonical" href="{{ $content->meta_canonical ?? $url ?? 'https://www.crenotive.com/' }}" />
<meta property="site_name" content="{{ $websettings['cms_sitename'] ?? 'Crenotive' }}" />
<meta property="og:url" content="{{ $url ?? 'https://www.crenotive.com/' }}/" />
<meta property="og:title" content="{{ $content->meta_title ?? $content->name ?? $pagesetting->meta_title ?? $websettings['cms_sitename'] ?? 'Crenotive Digital Solution' }}" />
<meta property="og:description" content="{{ $content->meta_description ?? Str::limit(strip_tags($content->description), 55, $end='...') ?? $pagesetting->meta_description ?? $websettings['cms_sitename'] ?? 'All-in-one digital solutions for your business' }}" />
<meta property="og:keywords" content="{{ $content->meta_keywords ?? $content->name ?? $pagesetting->meta_keywords ?? $websettings['cms_sitename'] ?? 'crenotive, crenotive cms, crenotive digital solution' }}" />
<meta property="og:image" content="{{ $img }}" />
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="{{ $websettings['cms_sitename'] ?? 'Crenotive' }}" />
<meta name="twitter:creator" content="{{ $author }}" />
<meta name="twitter:url" content="{{ $url ?? 'https://www.crenotive.com/' }}/" />
<meta name="twitter:title" content="{{ $content->meta_title ?? $content->name ?? $pagesetting->meta_title ?? $websettings['cms_sitename'] ?? 'Crenotive Digital Solution' }}" />
<meta name="twitter:description" content="{{ $content->meta_description ?? Str::limit(strip_tags($content->description), 55, $end='...') ?? $pagesetting->meta_description ?? $websettings['cms_sitename'] ?? 'All-in-one digital solutions for your business' }}" />
<meta name="twitter:keywords" content="{{ $content->meta_keywords ?? $content->name ?? $pagesetting->meta_keywords ?? $websettings['cms_sitename'] ?? 'crenotive, crenotive cms, crenotive digital solution' }}" />
<meta name="twitter:image" content="{{ $img }}" />
<meta name="twitter:image:alt" content="Alt text for image">
