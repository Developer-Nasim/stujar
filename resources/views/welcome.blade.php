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

	<!-- Start Hero Section -->
	<section class="hero-area">	
		{{-- slider starts --}}				
			<div class="home-demo">
				<div class="owl-carousel owl-theme">
					@foreach($sliders as $slider)		
					<div class="item">
						<a href="{{$slider['slug']}}" class="w-100">
							<picture>
								{{-- <source srcset="{{asset($img_arr_s)}}" media="(max-width: 480px)">
								<source srcset="{{asset($img_arr_s)}}" media="(max-width: 768px)">
								<source srcset="{{asset($img_arr_m)}}" media="(max-width: 1024px)">
								<source srcset="{{asset($img_arr_m)}}" media="(max-width: 1200px)"> --}}
								
								<img src="{{$slider->upload[0]['url']}}" alt="{{asset($slider->name)}}" class="w-100"/>
							</picture>
						</a> 
					</div>
					@endforeach
				</div>
			</div>
		{{-- slider ends --}}
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1 text-center mt-5">
					<div class="hero-caption pb-200">
						<h2>{{ $welcome->text_one }}</h2>
						<p class="text-dark">{{ $welcome->text_two }}</p>
					</div>
				</div>
			</div>
		</div>
		<div class="custom-shape-divider-bottom-1638549227">
			<svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
				<path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
			</svg>
		</div>
		</section>
		<!-- End Hero Section -->
		<!-- Header Counter Area -->
		<section class="h_counter_area">
			<div class="container">
				<div class="row">
					<div class="col-lg-10 offset-lg-1">
						<div class="row h_counter_section">
							<!-- Single -->
							<div class="col-md-4 position-relative">
								<div class="counter_item_h">
									<div class="title">
										<h2 class="counter text-gradient">254</h2>
									</div>
									<h5>SHOPS</h5>
									
									  <hr class="vertical dark">
								</div>	
							</div>
							<!-- Single -->
							<div class="col-md-4 position-relative">
								<div class="counter_item_h">
									<div class="title">
										<h2 class="counter text-gradient">50,00,000</h2>
									</div>
									<h5>ORIGINAL PRODUCTS
									</h5>
									
									  <hr class="vertical dark">
								</div>	
							</div>
							<!-- Single -->
							<div class="col-md-4">
								<div class="counter_item_h">
									<div class="title">
										<h2 class="counter text-gradient">10,000</h2>
									</div>
									<h5>BRANDS
									</h5>
									
								</div>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Header Counter Area -->
		<!-- Start Features That Area -->
		<section class="section-padding-2">
			<div class="container">
				<!-- Section Headding -->
				<div class="row mb-40 mt-40">
					<div class="col-lg-8 offset-lg-2 text-center">
						<div class="section-headding">
							<h2>Notice Board</h2>
						</div>
					</div>
				</div>
				<div class="row">
					@if (!empty($notices))
						@foreach ($notices as $notice)		
							<!-- Single -->
							<div class="col-lg-4 col-sm-6 mb-30">							
								<div class="info-box-s1">
									<div class="icon">
										<a href="notice/{{ $notice->id }}">
											<img src="{{ $notice->upload[0]['url'] }}" alt="code" >
										</a>
									</div>
									<div class="content">
									<h4 class="text-gradient"><a href="notice/{{ $notice->id }}"">{{ $notice->name }}</a></h4>
									 <p>{!!Str::limit($notice->description, 55, $end='...')!!}</p>
									</div>
								</div>
							</div>
						@endforeach					
					@endif
				</div>
			</div>
		</section>
		<!-- End Features That Area -->
	 {{-- team starts --}}
	 <section class="section-padding-2">
		<div class="container management-committee">
			<div class="row mb-40">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="section-headding management-heading">
						<h2>Management Committee</h2>
						<p>BCS Computer City (Jan 2023 Dec 2024)</p>
					</div>
				</div>
			</div>
			<style>
				.member>div{text-align:center;margin-bottom:25px}
				.member img{width:200px;border:5px solid #c61724;border-top-right-radius: 30px;border-bottom-left-radius: 30px}
				.member .text-danger{font-weight: bold;margin-top:5px}
			</style>
			<div class="row member">
				<div class="col-12">
					<a href="#" class="">
						<img src="{{ asset('assets/img/team/member1.jpg') }}" alt="team">
						<span class="d-block text-danger">Pinu Chowdhury</span>
						<span class="d-block text-dark">President</span>
					</a>
				</div>
				<div class="col-6 col-md-3">
					<a href="#" class="">
						<img src="{{ asset('assets/img/team/member1.jpg') }}" alt="team">
						<span class="d-block text-danger">Pinu Chowdhury</span>
						<span class="d-block text-dark">President</span>
					</a>
				</div>
				<div class="col-6 col-md-3">
					<a href="#" class="">
						<img src="{{ asset('assets/img/team/member1.jpg') }}" alt="team">
						<span class="d-block text-danger">Pinu Chowdhury</span>
						<span class="d-block text-dark">President</span>
					</a>
				</div>
				<div class="col-6 col-md-3">
					<a href="#" class="">
						<img src="{{ asset('assets/img/team/member1.jpg') }}" alt="team">
						<span class="d-block text-danger">Pinu Chowdhury</span>
						<span class="d-block text-dark">President</span>
					</a>
				</div>
				<div class="col-6 col-md-3">
					<a href="#" class="">
						<img src="{{ asset('assets/img/team/member1.jpg') }}" alt="team">
						<span class="d-block text-danger">Pinu Chowdhury</span>
						<span class="d-block text-dark">President</span>
					</a>
				</div>
				<div class="col-6 col-md-3">
					<a href="#" class="">
						<img src="{{ asset('assets/img/team/member1.jpg') }}" alt="team">
						<span class="d-block text-danger">Pinu Chowdhury</span>
						<span class="d-block text-dark">President</span>
					</a>
				</div>
				<div class="col-6 col-md-3">
					<a href="#" class="">
						<img src="{{ asset('assets/img/team/member1.jpg') }}" alt="team">
						<span class="d-block text-danger">Pinu Chowdhury</span>
						<span class="d-block text-dark">President</span>
					</a>
				</div>
				<div class="col-6 col-md-3">
					<a href="#" class="">
						<img src="{{ asset('assets/img/team/member1.jpg') }}" alt="team">
						<span class="d-block text-danger">Pinu Chowdhury</span>
						<span class="d-block text-dark">President</span>
					</a>
				</div>
				<div class="col-6 col-md-3">
					<a href="#" class="">
						<img src="{{ asset('assets/img/team/member1.jpg') }}" alt="team">
						<span class="d-block text-danger">Pinu Chowdhury</span>
						<span class="d-block text-dark">President</span>
					</a>
				</div>
			</div>
			<div class="row" style="display:none">
				@forelse ($committees as $committee)
					<!-- Single -->
					<div class="col-lg-3 col-md-6 mb-30">
						<div class="team-item">
							<div class="thumb">
								<img src="{{ $committee->upload[0]['url'] }}" alt="team">
							</div>
							<div class="content">
								<div class="left">
									<h4>{{ $committee->name }}</h4>
									<p>{{ $committee->caption ?? '' }}</p>
								</div>
								<div class="team-social d-none">
									<i class="fas fa-share-alt"></i>
									<ul>
										<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
										<li><a href="#"><i class="fab fa-twitter"></i></a></li>
										<li><a href="#"><i class="fab fa-vimeo-v"></i></a></li>
										<li><a href="#"><i class="fab fa-pinterest-p"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				@empty
				No Committee Found
				@endforelse	
			</div>
		</div>
	</section>
	 {{-- team ends --}}
		<!-- Start analytics Area -->
		<section class="pb-70">
			<div class="container">
				<div class="row">
					<!-- Content -->
					<div class="col-lg-6 align-self-center">
						<div class="analytics-toll-content">
							<h2 class="text-gradient">About Us</h2>
							<p class="contetn">BCS Computer City is the largest shopping complex for retail and wholesale of exclusively computer hardware, accessories & related products.</p>
							{{-- <div class="row">
								<!-- Single -->
								<div class="col-sm-6 mb-30">
									<div class="info-box-s2">
										<div class="icon">
											<img src="assets/img/icon/1.png" alt="icon">
										</div>
										<div class="content">
											<h4>Fully Responsive</h4>
											<p>Up the duff bonnet daft amongst bog Oxford lost.</p>
										</div>
									</div>
								</div>
								<!-- Single -->
								<div class="col-sm-6 mb-30">
									<div class="info-box-s2">
										<div class="icon">
											<img src="assets/img/icon/2.png" alt="icon">
										</div>
										<div class="content">
											<h4>24/7 Support</h4>
											<p>Up the duff bonnet daft amongst bog Oxford lost.</p>
										</div>
									</div>
								</div>
							</div> --}}
							<a class="button-1" href="{{ route('about.us') }}">Learn More</a>
						</div>
					</div>
					<!-- Image -->
					<div class="col-lg-6">
						<div class="analytics-toll-img">
							<img src="assets/img/bcs-font-1.jpg" alt="img">					
						</div>
					</div>
				</div>
			</div>
		</section>

		@include('frontend/home_filter')
		<!-- End analytics Area -->
			<!-- Start event section -->
			<section class="section-padding-2 pt-0">
				<div class="container">
					<!-- Section Headding -->
					<div class="row mb-40">
						<div class="col-lg-8 offset-lg-2 text-center">
							<div class="section-headding">
								<h2>Events You Can Participate</h2>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="pricing-table-tab  text-center">
								
								<ul class="nav nav-tabs" id="myTabPricing" role="tablist">
									  <li class="nav-item" role="presentation">
										<button class="nav-link active" id="monthly-tab" data-bs-toggle="tab" data-bs-target="#monthly" role="tab" aria-controls="monthly" aria-selected="true">National</button>
									  </li>
									  <li class="nav-item" role="presentation">
										<button class="nav-link" id="yearly-tab" data-bs-toggle="tab" data-bs-target="#yearly" role="tab" aria-controls="yearly" aria-selected="false">International</button>
									 </li>
								</ul>
							</div>
							<div class="tab-content mt-40" id="myTabPricingContent">
								  <div class="tab-pane fade show active" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
									  <div class="row">
										  <!-- Single -->
										  <div class="col-lg-6 col-md-6 mb-30">
											<div class="pricing-item ">
												<div class="event-image mb-4 text-center">
													<img src="{{ asset('assets/img/event-1.jpg') }}" alt="">
												</div>										
											<h2 class="mb-4">সিটি আইটি মেগা ফেয়ার ২০২৩</h2>
											বি সি এস কম্পিউটার সিটিতে (আইডিবি ভবন) দেশের বৃহত্তম কম্পিউটার মেলা "সিটি আইটি মেগা ফেয়ার ২০২২" আয়োজনে অনলাইন প্রতিযোগিতায় যারা বিজয়ী হয়েছেন সকল বিজয়ীদেরকে আনুষ্ঠানিক ভাবে পুরষ্কার প্রদান করা হলো....
											</div>
										  </div>
										  <!-- Single -->
										  <div class="col-lg-6 col-md-6 mb-30">
											  <div class="pricing-item active">
												<div class="event-image mb-4 text-center">
													<img src="{{ asset('assets/img/event-1.jpg') }}" alt="">
												</div>										
												<h2 class="mb-4">সিটি আইটি মেগা ফেয়ার ২০২৩</h2>
												বি সি এস কম্পিউটার সিটিতে (আইডিবি ভবন) দেশের বৃহত্তম কম্পিউটার মেলা "সিটি আইটি মেগা ফেয়ার ২০২২" আয়োজনে অনলাইন প্রতিযোগিতায় যারা বিজয়ী হয়েছেন সকল বিজয়ীদেরকে আনুষ্ঠানিক ভাবে পুরষ্কার প্রদান করা হলো....
											  </div>
										  </div>
										  <!-- Single -->
									  </div>
								  </div>
								  <div class="tab-pane fade" id="yearly" role="tabpanel" aria-labelledby="yearly-tab">
									  <div class="row">
										  <!-- Single -->
										  <div class="col-lg-6 col-md-6 mb-30">
											<div class="pricing-item ">
												<div class="event-image mb-4 text-center">
													<img src="{{ asset('assets/img/event-1.jpg') }}" alt="">
												</div>										
											<h2 class="mb-4">Digital Device and Innovation Expo 2022</h2>
											ICT Division, Bangladesh Hi-Tech Park Authority & BCS Jointly Organized BANGLADESH ICT EXPO In 2015, 2016 & 2017 To Boost-Up The Manufacturing Segment Of The ICT Industry. DIGITAL DEVICE & INNOVATION EXPO Is A New Title Adopted In 2019 Instead....
											</div>
										  </div>
										  <!-- Single -->
										  <div class="col-lg-6 col-md-6 mb-30">
											<div class="pricing-item ">
												<div class="event-image mb-4 text-center">
													<img src="{{ asset('assets/img/event-1.jpg') }}" alt="">
												</div>										
												<h2 class="mb-4">Digital Device and Innovation Expo 2022</h2>
												ICT Division, Bangladesh Hi-Tech Park Authority & BCS Jointly Organized BANGLADESH ICT EXPO In 2015, 2016 & 2017 To Boost-Up The Manufacturing Segment Of The ICT Industry. DIGITAL DEVICE & INNOVATION EXPO Is A New Title Adopted In 2019 Instead....
											</div>
										  </div>
										  <!-- Single -->
									  </div>
								  </div>
							</div>
		
						</div>
					</div>
				</div>
			</section>
			<!-- End event section -->
		{{-- image gallery starts --}}
		<div class="section-padding-2">
			<div class="container">
				<div class="row">
					<div class="analytics-toll-content">
						<h2 class="text-gradient text-center pt-3 pb-3">Gallery</h2>
					</div>				
					<div class="portfolio-category mb-40 text-center">
						<ul>
							<li data-filter="all" class="">Image</li>
							<li class="">Video</li>
						</ul>
					</div>
					<div class="row portfolio-full portF" id="MixItUp98FC62" style="">
						<!-- Single -->
						<div class="col-lg-4 col-md-6 mb-30 mix marketing" style="display: none;">
							<div class="portfolio-item">
								<div class="thumbnail">
									<img src="assets/img/gallery/gallery-image-1.jpg" alt="Portfolio">
								</div>
								<div class="portfolio-overly">
									<div class="pv_full">
										<a data-rel="lightcase:myCollection:portfolio" href="assets/img/gallery/gallery-image-1.jpg"><i class="fas fa-search"></i></a>
										<a href="#"><i class="fas fa-eye"></i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- Single -->
						<div class="col-lg-4 col-md-6 mb-30 mix digital" style="display: none;">
							<div class="portfolio-item">
								<div class="thumbnail">
									<img src="assets/img/gallery/gallery-image-2.jpg" alt="Portfolio">
								</div>
								<div class="portfolio-overly">
									<div class="pv_full">
										<a data-rel="lightcase:myCollection:portfolio" href="assets/img/gallery/gallery-image-2.jpg"><i class="fas fa-search"></i></a>
										<a href="#"><i class="fas fa-eye"></i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- Single -->
						<div class="col-lg-4 col-md-6 mb-30 mix marketing" style="display: none;">
							<div class="portfolio-item">
								<div class="thumbnail">
									<img src="assets/img/gallery/gallery-image-3.jpg" alt="Portfolio">
								</div>
								<div class="portfolio-overly">
									<div class="pv_full">
										<a data-rel="lightcase:myCollection:portfolio" href="assets/img/gallery/gallery-image-3.jpg"><i class="fas fa-search"></i></a>
										<a href="#"><i class="fas fa-eye"></i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- Single -->
						<div class="col-lg-4 col-md-6 mb-30 mix digital design" style="">
							<div class="portfolio-item">
								<div class="thumbnail">
									<img src="assets/img/gallery/gallery-image-4.jpg" alt="Portfolio">
								</div>
								<div class="portfolio-overly">
									<div class="pv_full">
										<a data-rel="lightcase:myCollection:portfolio" href="assets/img/gallery/gallery-image-4.jpg"><i class="fas fa-search"></i></a>
										<a href="#"><i class="fas fa-eye"></i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- Single -->
						<div class="col-lg-4 col-md-6 mb-30 mix marketing" style="display: none;">
							<div class="portfolio-item">
								<div class="thumbnail">
									<img src="assets/img/gallery/gallery-image-5.jpg" alt="Portfolio">
								</div>
								<div class="portfolio-overly">
									<div class="pv_full">
										<a data-rel="lightcase:myCollection:portfolio" href="assets/img/gallery/gallery-image-5.jpg"><i class="fas fa-search"></i></a>
										<a href="#"><i class="fas fa-eye"></i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- Single -->
						<div class="col-lg-4 col-md-6 mb-30 mix design" style="">
							<div class="portfolio-item">
								<div class="thumbnail">
									<img src="assets/img/gallery/gallery-image-6.jpg" alt="Portfolio">
								</div>
								<div class="portfolio-overly">
									<div class="pv_full">
										<a data-rel="lightcase:myCollection:portfolio" href="assets/img/gallery/gallery-image-6.jpg"><i class="fas fa-search"></i></a>
										<a href="#"><i class="fas fa-eye"></i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- Single -->
						<div class="col-lg-4 col-md-6 mb-30 mix marketing" style="display: none;">
							<div class="portfolio-item">
								<div class="thumbnail">
									<img src="assets/img/gallery/gallery-image-7.jpg" alt="Portfolio">
								</div>
								<div class="portfolio-overly">
									<div class="pv_full">
										<a data-rel="lightcase:myCollection:portfolio" href="assets/img/gallery/gallery-image-7.jpg"><i class="fas fa-search"></i></a>
										<a href="#"><i class="fas fa-eye"></i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- Single -->
						<div class="col-lg-4 col-md-6 mb-30 mix digital" style="display: none;">
							<div class="portfolio-item">
								<div class="thumbnail">
									<img src="assets/img/gallery/gallery-image-8.jpg" alt="Portfolio">
								</div>
								<div class="portfolio-overly">
									<div class="pv_full">
										<a data-rel="lightcase:myCollection:portfolio" href="assets/img/gallery/gallery-image-8.jpg"><i class="fas fa-search"></i></a>
										<a href="#"><i class="fas fa-eye"></i></a>
									</div>
								</div>
							</div>
						</div>
						<!-- Single -->
						<div class="col-lg-4 col-md-6 mb-30 mix design" style="">
							<div class="portfolio-item">
								<div class="thumbnail">
									<img src="assets/img/gallery/gallery-image-9.jpg" alt="Portfolio">
								</div>
								<div class="portfolio-overly">
									<div class="pv_full">
										<a data-rel="lightcase:myCollection:portfolio" href="assets/img/gallery/gallery-image-9.jpg"><i class="fas fa-search"></i></a>
										<a href="#"><i class="fas fa-eye"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
	
			</div>
		</div>
		{{-- image gallery ends --}}
		<!-- Start Template Need Area -->
		<section class="template-need" style="background-image:url('assets/img/cta-1.png');">
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<h4>Join as a member.</h4>
						<h2>Get Latest News form BCS Computer City.</h2>
					</div>
					<div class="col-lg-6 align-self-center">
						<a class="button-2 text-right" href="{{ route('contact') }}">Become a Member</a>
					</div>
				</div>
			</div>
		</section>
		<!-- End Testimonial Area -->
		<!-- Start Latest blog Area -->
		<section class="section-padding-2 pt-0 mt-5">
			<div class="container">
				<!-- Section Headding -->
				<div class="row mb-40">
					<div class="col-lg-8 offset-lg-2 text-center">
						<div class="section-headding">
							<h2>Latest News</h2>
						</div>
					</div>
				</div>
				<div class="row">
					@forelse ($blogs as $blog)
					<!-- Single -->
					<div class="col-lg-4 col-md-6 mb-30">					
							<div class="blog-item">
								<!-- Thumbanil -->
								<div class="thumbnail">
									<a href="news/{{ $blog->id }}">
										<img src="{{ $blog->upload[0]['url'] }}" alt="img">
									</a>
									<div class="date">
										<span>  {{ $blog->created_at}}</span>
									</div>
								</div>
								<!-- Content -->
								<div class="content">
									<h3> <a href="news/{{ $blog->id }} ">{{ $blog->name }} </a> </h3>
									{{-- <p>	{!!Str::limit($blog->description, 55, $end='...')!!}</p> --}}
								</div>
							</div>						
					</div>
					<!-- Single ends -->
					@empty
						No blog Found
					@endforelse
				</div>
			</div>
		</section>
		<!-- End Latest blog Area -->		
@endsection

