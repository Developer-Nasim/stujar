@extends($websettings['cms_layout'].'.frontend.layouts.app')

@section('content')
<!-- main START -->
<main>
	<!-- Hero-section START -->
	<section class="hero-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="hero-wrp">
						<div class="hero-wrp-left">
							<h3>Create website for your school by just 1 click</h3>
							<p>build your school website by just 1 click and it’s fully free and most modern till now</p>
							<button type="button" data-bs-toggle="modal" data-bs-target="#LoginSignup">Start Free</button>
						</div>
						<div class="popupVideo">
							<img src="assets/img/video.png" alt="">
							<button data-bs-toggle="modal" data-bs-target="#DemoVideo" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-circle-fill" viewBox="0 0 16 16">
								<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z"/>
							  </svg></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero-section END -->

	<!-- information-section START -->
	<section class="information-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="info-wrp">
						<div class="row"> 
							<div class="col-md-3">
								<div class="infoBlk">
									<h1>100</h1>
									<span>School</span>
								</div>
							</div>
							<div class="col-md-3">
								<div class="infoBlk">
									<h1>50</h1>
									<span>College</span>
								</div>
							</div>
							<div class="col-md-3">
								<div class="infoBlk">
									<h1>78</h1>
									<span>Madrasha</span>
								</div>
							</div>
							<div class="col-md-3">
								<div class="infoBlk">
									<h1>300</h1>
									<span>Coacing</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- information-section END -->


	
	<!-- About-section START -->
	<section class="about-section" id="about-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="about-wrps">
						<div class="about-contents">
							<h3>About BookMart</h3>
							<p>Book mart is online exam system which is able to take  exam in the online. In this corona sitation our many-many students are losing  their interest from reading and our board exams are also stop cause the covid situation are going so hard so the institutes are off that’s why the exam and class is not possble to take also we don’t have alternative way to take to examination ar class so we have made this system to keep run our education</p>
						</div>
						<div class="popupVideo">
							<img src="assets/img/video.png" alt="">
							<button data-bs-toggle="modal" data-bs-target="#DemoVideo" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-play-circle-fill" viewBox="0 0 16 16">
								<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z"/>
							  </svg>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- About-section END -->


	
	<!-- why-section START -->
	<section class="why-section" id="why-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3 text-center">
					<div class="section-title">
						<h3>Why you will use?</h3>
						<p>Who’s are feeling gret to use our application and solve the examination problem
							by taking online examination</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-4 col-md-6">
					<div class="feature-blk">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-question" viewBox="0 0 16 16">
							<path d="M8.05 9.6c.336 0 .504-.24.554-.627.04-.534.198-.815.847-1.26.673-.475 1.049-1.09 1.049-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.71 1.71 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745z"/>
							<path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
							<path d="M7.001 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0z"/>
						  </svg></span>
						<h5>Fully Free</h5>
						<p>matro 1 click ai apnar website ready </p> 
					</div>
				</div> 
				<div class="col-lg-4 col-md-6">
					<div class="feature-blk">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-question" viewBox="0 0 16 16">
							<path d="M8.05 9.6c.336 0 .504-.24.554-.627.04-.534.198-.815.847-1.26.673-.475 1.049-1.09 1.049-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.71 1.71 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745z"/>
							<path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
							<path d="M7.001 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0z"/>
						  </svg></span>
						<h5>Fully Free</h5>
						<p>matro 1 click ai apnar website ready </p> 
					</div>
				</div> 
				<div class="col-lg-4 col-md-6">
					<div class="feature-blk">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-question" viewBox="0 0 16 16">
							<path d="M8.05 9.6c.336 0 .504-.24.554-.627.04-.534.198-.815.847-1.26.673-.475 1.049-1.09 1.049-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.71 1.71 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745z"/>
							<path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
							<path d="M7.001 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0z"/>
						  </svg></span>
						<h5>Fully Free</h5>
						<p>matro 1 click ai apnar website ready </p> 
					</div>
				</div> 
				<div class="col-lg-4 col-md-6">
					<div class="feature-blk">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-question" viewBox="0 0 16 16">
							<path d="M8.05 9.6c.336 0 .504-.24.554-.627.04-.534.198-.815.847-1.26.673-.475 1.049-1.09 1.049-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.71 1.71 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745z"/>
							<path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
							<path d="M7.001 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0z"/>
						  </svg></span>
						<h5>Fully Free</h5>
						<p>matro 1 click ai apnar website ready </p> 
					</div>
				</div> 
				<div class="col-lg-4 col-md-6">
					<div class="feature-blk">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-question" viewBox="0 0 16 16">
							<path d="M8.05 9.6c.336 0 .504-.24.554-.627.04-.534.198-.815.847-1.26.673-.475 1.049-1.09 1.049-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.71 1.71 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745z"/>
							<path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
							<path d="M7.001 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0z"/>
						  </svg></span>
						<h5>Fully Free</h5>
						<p>matro 1 click ai apnar website ready </p> 
					</div>
				</div> 
				<div class="col-lg-4 col-md-6">
					<div class="feature-blk">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-question" viewBox="0 0 16 16">
							<path d="M8.05 9.6c.336 0 .504-.24.554-.627.04-.534.198-.815.847-1.26.673-.475 1.049-1.09 1.049-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.71 1.71 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745z"/>
							<path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
							<path d="M7.001 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0z"/>
						  </svg></span>
						<h5>Fully Free</h5>
						<p>matro 1 click ai apnar website ready </p> 
					</div>
				</div> 
			</div>
		</div>
	</section>
	<!-- why-section END -->


	
	<!-- recent-joined-section START -->
	<section class="recent-joined-section" id="recent-joined-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3 text-center">
					<div class="section-title">
						<h3>A few institutes</h3>
						<p>Who’s are feeling gret to use our application and solve the examination problem
							by taking online examination</p>
					</div>
				</div>
			</div>
		  <div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div class="row">
					<div class="col-lg-4 col-md-6">
						<div class="instBlk">
							<div class="profile_title">
								<a href="#">
									<img src="assets/img/school-logo.png" alt="">
								</a>
								<div> 
									<h5 class="text-truncate">
										Modhayanagar B.P high Modhayanagar B.P high...
									</h5>
									<span>College</span>
								</div>
							</div>
							<img src="assets/img/school.png" alt="">
							<a href="#" class="theme-btn">Website</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="instBlk">
							<div class="profile_title">
								<a href="#">
									<img src="assets/img/school-logo.png" alt="">
								</a>
								<div> 
									<h5>
										<a href="#" class="text-truncate">Modhayanagar B.P high... </a>
									</h5>
									<span>College</span>
								</div>
							</div>
							<img src="assets/img/school.png" alt="">
							<a href="#" class="theme-btn">Website</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="instBlk">
							<div class="profile_title">
								<a href="#">
									<img src="assets/img/school-logo.png" alt="">
								</a>
								<div> 
									<h5>
										<a href="#" class="text-truncate">Modhayanagar B.P high... </a>
									</h5>
									<span>College</span>
								</div>
							</div>
							<img src="assets/img/school.png" alt="">
							<a href="#" class="theme-btn">Website</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="instBlk">
							<div class="profile_title">
								<a href="#">
									<img src="assets/img/school-logo.png" alt="">
								</a>
								<div> 
									<h5>
										<a href="#" class="text-truncate">Modhayanagar B.P high... </a>
									</h5>
									<span>College</span>
								</div>
							</div>
							<img src="assets/img/school.png" alt="">
							<a href="#" class="theme-btn">Website</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="instBlk">
							<div class="profile_title">
								<a href="#">
									<img src="assets/img/school-logo.png" alt="">
								</a>
								<div> 
									<h5>
										<a href="#" class="text-truncate">Modhayanagar B.P high... </a>
									</h5>
									<span>College</span>
								</div>
							</div>
							<img src="assets/img/school.png" alt="">
							<a href="#" class="theme-btn">Website</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="instBlk">
							<div class="profile_title">
								<a href="#">
									<img src="assets/img/school-logo.png" alt="">
								</a>
								<div> 
									<h5>
										<a href="#" class="text-truncate">Modhayanagar B.P high... </a>
									</h5>
									<span>College</span>
								</div>
							</div>
							<img src="assets/img/school.png" alt="">
							<a href="#" class="theme-btn">Website</a>
						</div>
					</div>
				</div>
			</div>
		  </div>
		</div>
	</section>
	<!-- recent-joined-section END -->


	
	<!-- testimonial-section START -->
	<section class="testimonial-section" id="testimonial-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3 text-center">
					<div class="section-title">
						<h3>Our User Experiences</h3>
						<p>the users had shared their experinces that how nice it is and how much help full</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12"> 
					<div class="testimonials owl-carousel">
						
						<div class="testimonial-blk">
							<img src="assets/img/avt.png" alt="">
							<div class="testimonial-blk-wrp">
								<h5>AJ Nasim <span>Teacher of moddhayanagar B P</span></h5>
								<p>This solution is great for  this time and we area taking the test
									exams easily and this is also secure</p>
							</div>
						</div>
						<div class="testimonial-blk">
							<img src="assets/img/avt.png" alt="">
							<div class="testimonial-blk-wrp">
								<h5>AJ Nasim <span>Teacher of moddhayanagar B P</span></h5>
								<p>This solution is great for  this time and we area taking the test
									exams easily and this is also secure</p>
							</div>
						</div>
						<div class="testimonial-blk">
							<img src="assets/img/avt.png" alt="">
							<div class="testimonial-blk-wrp">
								<h5>AJ Nasim <span>Teacher of moddhayanagar B P</span></h5>
								<p>This solution is great for  this time and we area taking the test
									exams easily and this is also secure</p>
							</div>
						</div>
						<div class="testimonial-blk">
							<img src="assets/img/avt.png" alt="">
							<div class="testimonial-blk-wrp">
								<h5>AJ Nasim <span>Teacher of moddhayanagar B P</span></h5>
								<p>This solution is great for  this time and we area taking the test
									exams easily and this is also secure</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- testimonial-section END -->


	
	<!-- CTA-section START -->
	<section class="cta-section" id="cta-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="cta-wrp">
						<h3>So let’s ge start</h3>
						<p>What are you waiting for you..? let’s get started from now just click 
							on the bellow get start button.</p>
						<button type="button" data-bs-toggle="modal" data-bs-target="#LoginSignup">Get START <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
							<path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
						  </svg></button>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- CTA-section END -->


	
	<!-- Contact-section START -->
	<div class="contact-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="contact-wrp">

							<div class="blk-title"> 
								<h4>Contact US</h4> 
								<p>Just send me a message we will back to you soon</p>
							</div>
							<ul class="addrLst">
								<li>
									<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
										<path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
									  </svg></span>
									  <div class="text-truncate">
										838 Cantt Sialkot, pakistan
									  </div>
								</li>
								<li>
									<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
									  </svg></span>
									<div class="text-truncate">
										979-988-89787
									</div>
								</li>
								<li>
									<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
										<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
									  </svg></span>
									  <div class="text-truncate">
										abcd123@gmail.com
									  </div>
								</li>
							</ul>

							<div class="col-lg-12 col-md-12 mb-30"> 
								@if(session()->has('success'))
									<div class="alert alert-success">
										{{ session()->get('success') }}
									</div>
								@endif
								<!-- contact form box -->
								<div class="contact-form-box contact-item-box">
								  <form class="contact-form p-4" id="contact-form" method="post" action="{{ route('contact.store') }}">
									@csrf
									<div class="form-floating mb-3">
									  <input type="text" class="form-control" name="name" placeholder="Name" required="required" data-error="Name is required">
									  <label for="floatingInput1">Name</label>
									</div>
									<div class="form-floating mb-3">
									  <input type="text" class="form-control" name="email" placeholder="E-mail" data-error="E-mail is required">
									  <label for="floatingInput2">E-mail or Phone</label>
									</div>
					
									<div class="form-floating mb-3">
									  <textarea class="form-control" name="message" placeholder="Your Message" required="required" data-error="Message is required"></textarea>
									  <label for="floatingTextarea">Your Message</label>
									</div>
									<button type="submit" class="btn-style-1">Send</button>
									<div class="messages"></div>
								  </form>
								</div>
								<!-- contact form box end --> 
							  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Contact-section END -->




</main>
<!-- main END -->

<!--  login Modal -->
<div class="modal fade" id="LoginSignup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="LoginSignupLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
	<div class="modal-content"> 
		<div class="modal-body">
			<div class="login_signup">
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

				<div class="blk-title"> 
					<h4>Contact US</h4>
					<p>Just send me a message we will back to you soon</p>
				</div>

				<ul>
					<li>
						@guest
						<a href="{{route('facebook_login')}}"><img src="assets/img/fb.png" alt=""></a>
						@endguest
						@auth
						<a class="d-block btn btn-primary" href="{{ URL::to('user/school') }}">DashBoard</a>
						@endauth
						
					</li>
				</ul>
				<p>Your are login/singup it’s mean you are agree with with our rules and regulations TOS</p>

			</div>
		</div> 
	</div>
</div>
</div>

<!--  Video Modal -->
<div class="modal fade" id="DemoVideo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="DemoVideoLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content"> 
			<div class="modal-body">
				<div class="demoVideo">
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					<iframe width="560" height="315" src="https://www.youtube.com/embed/VcQ98qQf7Fo?si=6l5pKm5X_LI-aCcJ&amp;controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
				</div>
			</div> 
		</div>
	</div>
</div>
@endsection

