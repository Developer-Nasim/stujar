@extends($websettings['cms_layout'].'.frontend.layouts.app')
@section('social')
	@include('meta_content_details')
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
      <li class="breadcrumb-item active" aria-current="page">{{ $content->name }}</li>
    </ol>
    <!-- breadcrumb end -->
    <div class="row">
      <div class="col-lg-6 offset-lg-3"> 
        <!-- title & des -->
        <h1><span>{{ $content->name }}</span></h1>
        <!-- title & des end --> 
      </div>
    </div>
  </div>
</div>
<div class="service-details-page pt-80 pb-50">
  	<div class="container">
	  	<h1 class="fs-3">{{  $content->name }}</h1>   
	  	<div class="my-4">
		@if(!empty($content->upload[0]))
			<img src="{{ asset( 'images/uploads/large/'.$content->upload[0]['file']) }}" alt="{{ $content->upload[0]['name'] ?? $content->upload[0]['file'] }}">
		@endif
		</div>       
		{!! $content->description !!}
	</div>
</div>
@endsection

