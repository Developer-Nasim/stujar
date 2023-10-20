<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">   
	<link href="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/css/suneditor.min.css" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('assets/css/fontawesome.min.css')}}">  
	<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}"> 

</head>
<body>
	@include($websettings['cms_layout'].'.frontend.layouts.header_output')
    
    @yield('content')

    

    @include($websettings['cms_layout'].'.frontend.layouts.footer_output')
    
	<!-- JS here --> 
	<script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
	<script src="{{asset('assets/js/popper.min.js')}}"></script>
	<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script> 
	<script src="{{asset('assets/js/spotlight.bundle.js')}}"></script>
	<script src="https://cdn.jsdelivr.net/npm/suneditor@latest/dist/suneditor.min.js"></script> 
	<script src="{{asset('assets/js/main.js')}}"></script> 
	
</body>
</html>