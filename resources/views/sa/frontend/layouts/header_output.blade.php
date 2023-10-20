    <!-- header-area START -->
@php
	$school = ''; 
	if (request()->segment(1)) {
		$school = DB::table('schools')->where('slug', trim(request()->segment(1)))->first();
	}
	$currenturl = url()->current();
	$d = explode("/", $currenturl);
	//dd($d[3]);
	if(!empty($d[3])){
		$guestlogo = DB::table('schools')->where('slug', $d[3])->first();
	} 
@endphp
	<div class="topHeading" id="topHeading">
		<h5>{{ $school->name ?? " " }}</h5>
		<ul>
			<li>EIIN: {{ $school->eiin ?? " " }}</li>
			<li>Est: {{ $school->established ?? " "}}</li>
		</ul>
	</div> 
 
	<div class="header-area" id="header-area">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-2 col-6">
					<div class="logo-area">
						@if (!empty($school->logo))
							<a href="#topHeading"><img src="{{ asset('images/uploads/thumb'.'/'.$school->logo) }}" alt="" width="50px"></a>
						@elseif(!empty($guestlogo->logo))
							<a href="#topHeading"><img src="{{ asset('images/uploads/thumb'.'/'.$guestlogo->logo) ?? asset('images/uploads/thumb'.'/'.$guestlogohome->logo) }}" alt="" width="50px"></a>
						@else
							
						@endif
					</div>
				</div>
				<div class="col-lg-8 d-none d-lg-block text-right">
					<div class="menu-area">
						<nav>
							<ul id="nav">
								<li><a href="#topHeading">Home</a></li>
								<li><a href="#about-section">About</a></li>
								<li><a href="#stuffs-section">Stuffs</a></li> 
								<li><a href="#messages-section">Messages</a></li> 
								<li><a href="#events-section">Events</a></li> 
								<li><a href="#contact-section">Contact</a></li>  
							</ul>
						</nav>
					</div>
				</div>
				<div class="col-lg-2 col-6">
					<div class="rightmenu">
						<div class="bar d-block d-lg-none"> 
							<a class="bar-icon siteBar-btn" href="#">
								<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
									<path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
								</svg>
							</a>
						</div>
						@php
							$auth= Auth::user();
						@endphp
						@if (!empty($auth))
							<a class="btn btn-primary" href="{{ URL::to('user/school') }}" >DashBoard</a>
						@else
							<a href="#notices-section" class="theme-btn">Notices</a>
						@endif 
					</div>
				</div> 
			</div>
		</div>
	</div>
	<!-- mobile-menu START -->
	<div class="mobile-menu"> 
		@if (!empty($school->logo))
			<a href="#topHeading" class="logo"><img src="{{ asset('images/uploads/thumb'.'/'.$school->logo) }}" alt="" width="50px"></a>
		@else
			<a href="#topHeading" class="logo"><img src="{{ asset('assets/img/logo.png') }}" alt=""></a>
		@endif
		<a href="#" class="bars siteBar-btn"><svg class="bi bi-x" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			<path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"/>
			<path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"/>
		</svg></a> 
		<nav> 
			<ul>
				<li><a href="#topHeading">Home</a></li>
				<li><a href="#about-section">About</a></li>
				<li><a href="#stuffs-section">Stuffs</a></li> 
				<li><a href="#messages-section">Messages</a></li> 
				<li><a href="#notices-section">Notices</a></li> 
				<li><a href="#events-section">Events</a></li> 
				<li><a href="#contact-section">Contact</a></li>
			</ul>
		</nav>
	</div> 
	<div class="manu-overlay siteBar-btn"></div>
<!-- header-area END -->