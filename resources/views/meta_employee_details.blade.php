@php
if(!empty($employee->slug)){
    $url = $websettings['cms_url'].'/'.$employee->slug;
}else{
    $url = $websettings['cms_url'];
}
if(!empty($websettings['cms_author'])){
    $author = '@'.$websettings['cms_author'];
}else{
    $author = '@CrenotiveDigitalSolution';
}
if(!empty($employee->about)){
    $description = Str::limit(strip_tags($employee->about), 55, $end='...');
}

if(!empty($employee->meta_image)){
    $img = $employee->meta_image;
}elseif(!empty($employee->profilePhoto)){
    $img = $websettings['cms_assets'].'/images/uploads/large/'.$employee->profilePhoto;
}elseif(!empty($pagesetting['meta_image'])){
    $img = $pagesetting['meta_image'];
}elseif(!empty($websettings['cms_image'])){
    $img = $websettings['cms_image'];
}else{
    $img = 'logo.svg'; 
}
@endphp
<meta name="robots" content="{{ $employee->meta_robots ?? $pagesetting->meta_robots ?? $websettings['cms_robots'] ?? 'index,allow' }}" />
<title>{{ $employee->meta_title ?? $employee->name ?? $pagesetting->meta_title ?? $websettings['cms_sitename'] ?? 'Crenotive Digital Solution' }}</title>
<meta name="keywords" content="{{ $employee->meta_keywords ?? $employee->name ?? $pagesetting->meta_keywords ?? $websettings['cms_sitename'] ?? 'crenotive, crenotive cms, crenotive digital solution' }}" />
<meta name="description" content="{{ $employee->meta_description ?? $pagesetting->meta_description ?? $websettings['cms_sitename'] ?? 'All-in-one digital solutions for your business' }}" />
<link rel="canonical" href="{{ $employee->meta_canonical ?? $url ?? 'https://www.crenotive.com/' }}" />
<meta property="site_name" content="{{ $websettings['cms_sitename'] ?? 'Crenotive' }}" />
<meta property="og:url" content="{{ $url ?? 'https://www.crenotive.com/' }}/" />
<meta property="og:title" content="{{ $employee->meta_title ?? $employee->name ?? $pagesetting->meta_title ?? $websettings['cms_sitename'] ?? 'Crenotive Digital Solution' }}" />
<meta property="og:description" content="{{ $employee->meta_description ?? $description ?? $pagesetting->meta_description ?? $websettings['cms_sitename'] ?? 'All-in-one digital solutions for your business' }}" />
<meta property="og:keywords" content="{{ $employee->meta_keywords ?? $employee->name ?? $pagesetting->meta_keywords ?? $websettings['cms_sitename'] ?? 'crenotive, crenotive cms, crenotive digital solution' }}" />
<meta property="og:image" content="{{ $img }}" />
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="{{ $websettings['cms_sitename'] ?? 'Crenotive' }}" />
<meta name="twitter:creator" content="{{ $author }}" />
<meta name="twitter:url" content="{{ $url ?? 'https://www.crenotive.com/' }}/" />
<meta name="twitter:title" content="{{ $employee->meta_title ?? $employee->name ?? $pagesetting->meta_title ?? $websettings['cms_sitename'] ?? 'Crenotive Digital Solution' }}" />
<meta name="twitter:description" content="{{ $employee->meta_description ?? $description ?? $pagesetting->meta_description ?? $websettings['cms_sitename'] ?? 'All-in-one digital solutions for your business' }}" />
<meta name="twitter:keywords" content="{{ $employee->meta_keywords ?? $employee->name ?? $pagesetting->meta_keywords ?? $websettings['cms_sitename'] ?? 'crenotive, crenotive cms, crenotive digital solution' }}" />
<meta name="twitter:image" content="{{ $img }}" />
<meta name="twitter:image:alt" content="{{ $employee->name }}">
