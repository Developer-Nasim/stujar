<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta http-equiv="Content-Language" content="en">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard - BCS</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
<meta name="description" content="This is an example dashboard created using build-in elements and components.">
<meta name="msapplication-tap-highlight" content="no">

<link href="{{ asset('admin/assets/css/main.css') }}" rel="stylesheet">
</head>
<body>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">

@include('admin.layouts.topbar')
 
<div class="app-main">
@include('admin.layouts.sidebar')
{{-- contents starts --}}
<div class="app-main__outer">
  <div class="app-main__inner">
    @yield('content')
  </div>
  {{-- @include('admin.layouts.footer') --}}
</div>

{{-- contents end --}}



</div>

</div>
<script type="text/javascript" src="{{ asset('admin/assets/scripts/main.js') }}"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>

</body>

</html>