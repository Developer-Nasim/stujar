<div class="header-area" id="header-area">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-2 col-6"> 
				<div class="logo-area">
					<a href="/"><img src="{{ asset('assets/img/logo.png') }}" alt=""></a> 
				</div>
			</div>
			<div class="col-lg-8 d-none d-lg-block text-right">
				<div class="menu-area">
					<nav>
						<ul id="nav">
							<li><a href="#header-area">Home</a></li>
							<li><a href="#about-section">About</a></li> 
							<li><a href="#why-section">Features</a></li> 
							<li><a href="#testimonial-section">Testimonials</a></li> 
							<li><a href="#contact-section">Contact Us</a></li>    
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
						<a class="btn btn-primary" href="/user/school" >DashBoard</a>
					@else
						<button type="button" data-bs-toggle="modal" data-bs-target="#LoginSignup">Login or Signup</button>
					@endif 
				</div>
			</div> 
		</div>
	</div>
</div>
	<!-- mobile-menu START -->
	<div class="mobile-menu">
		<a href="/" class="logo"><img src="{{ asset('assets/img/logo.png') }}" alt=""></a>  
		<a href="#" class="bars siteBar-btn"><svg class="bi bi-x" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
			<path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 010 .708l-7 7a.5.5 0 01-.708-.708l7-7a.5.5 0 01.708 0z" clip-rule="evenodd"/>
			<path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 000 .708l7 7a.5.5 0 00.708-.708l-7-7a.5.5 0 00-.708 0z" clip-rule="evenodd"/>
		</svg></a> 
		<nav> 
			<ul>
				<li><a href="#header-area">Home</a></li>
				<li><a href="#about-section">About</a></li> 
				<li><a href="#why-section">Features</a></li> 
				<li><a href="#testimonial-section">Testimonials</a></li> 
				<li><a href="#contact-section">Contact Us</a></li>   
			</ul>
			@if (!empty($auth))
				<a class="btn btn-primary" href="/user/school" >DashBoard</a>
			@else
				<button type="button" data-bs-toggle="modal" data-bs-target="#LoginSignup">Login or Signup</button>
			@endif 
		</nav> 
	</div> 
	<div class="manu-overlay siteBar-btn"></div>
<!-- header-area END -->