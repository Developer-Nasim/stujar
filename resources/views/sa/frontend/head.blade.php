    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.ico')}}">
    <link rel="icon" type="image/png" href="{{asset('favicon16x16.png')}}" sizes="16x16">
    <link rel="icon" type="image/png" href="{{asset('favicon32x32.png')}}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{asset('favicon92x92.png')}}" sizes="96x96">
    <link rel="apple-touch-icon" sizes="72x72" href="{{asset('touch-ipad.png')}}" >
    <link rel="apple-touch-icon" sizes="114x114" href="{{asset('touch-iphone.png')}}" >
    <link rel="apple-touch-icon" sizes="152x152" href="{{asset('touch-ipad-ret.png')}}" >
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="{{ $websettings['cms_author'] ?? 'Crenotive' }}" />
    <meta name="publisher" content="{{ $websettings['cms_publisher'] ?? 'Crenotive'}}" />
    <meta property="type" content="Website" />
    <meta property="og:type" content="website" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
     {!! $websettings['cms_headcode'] ?? ''!!}