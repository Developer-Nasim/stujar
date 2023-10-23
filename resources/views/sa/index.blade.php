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
							<h3>মাত্র 1 মিনিটে আপনার School, Collage, Coaching, Madrasah এর জন্য ওয়েবসাইট তৈরি করুন সম্পূর্ণ বিনামূল্যে</h3>
							<p>ডোমেইন, হোস্টিং, নিরাপত্তা, রক্ষণাবেক্ষণ নিয়ে আর কোন চিন্তা করতে হবে না। আপনি শুধু আপনার প্রতিষ্ঠানের তথ্য দিবেন কারন অ্যাকাউন্ট খুলার সাথে সাথেই আপনার ওয়েবসাইট তৈরি হয়ে যাবে।</p>
							<button type="button" data-bs-toggle="modal" data-bs-target="#LoginSignup">Start Free</button>
						</div>
						<div class="popupVideo">
							<img src="{{ asset('assets/img/thumbnail.png') }}" alt="">
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
									<h1>56</h1>
									<span>School</span>
								</div>
							</div>
							<div class="col-md-3">
								<div class="infoBlk">
									<h1>13</h1>
									<span>College</span>
								</div>
							</div>
							<div class="col-md-3">
								<div class="infoBlk">
									<h1>34</h1>
									<span>Madrasha</span>
								</div>
							</div>
							<div class="col-md-3">
								<div class="infoBlk">
									<h1>300</h1>
									<span>Coacing Center</span>
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
							<h3>About us</h3>
							<p>স্কুল, কলেজ, কোচিং সেন্টার এবং মাদ্রাসাগুলির জন্য আমাদের এই প্ল্যাটফর্মটি তৈরি করা হয়েছে। শিক্ষা প্রতিষ্ঠানগুলো মাত্র ১ মিনিটের মধ্যে নিজেরাই নিজেদের ওয়েবসাইট তৈরি করতে পারবেন।  এখানে আপনাদের শুধু আপনাদের ইনস্টিটিউটের তথ্য আপডেট করতে হবে, আর আপনার ওয়েবসাইট তৈরি হয়ে যাবে।

								আমরা শিক্ষা প্রতিষ্ঠানগুলির ওয়েবসাইট বানানোর প্রক্রিয়াটি সহজ করেছি, যেখানে ওয়েবসাইট ডেভেলপমেন্ট/ডিজাইন, ডোমেইন, হোস্টিং ক্রয়, নবায়ন, নিরাপত্তা এবং পরিচর্যা সহ যে সকল ঝামেলা থাকে, সেগুলি নিয়ে আর কোন চিন্তা করতে হবে না। 
								প্রতিষ্ঠানগুলি সরকারি নির্দেশনা অনুযায়ী তাদের প্রয়োজনীয় সকল তথ্য আপডেট করতে পারেন, যাতে আমাদের প্ল্যাটফর্ম তাদের প্রতিষ্ঠানের প্রয়োজনীয় ওয়েবসাইট তৈরি করতে পারে।
								  
								আমাদের লক্ষ্য হলো শিক্ষা প্রতিষ্ঠানগুলির অনলাইন উপস্থিতি নিরবিগ্নে নিশ্চিত করার প্রক্রিয়াটি পরিচালনা করা। আমরা শিক্ষকদের কে ঝামেলা থেকে বিরত রেখে কেবলমাত্র শিক্ষা দান এ মনোনিবেশ করতে সাহায্য করতে চাই।</p>
						</div>
						<div class="popupVideo">
							<img src="{{ asset('assets/img/thumbnail.png') }}" alt="">
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
						<p>Why you will use our platform we have seen some reasons</p>
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
						<p>You will get website free of cost.</p> 
					</div>
				</div> 
				<div class="col-lg-4 col-md-6">
					<div class="feature-blk">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-question" viewBox="0 0 16 16">
							<path d="M8.05 9.6c.336 0 .504-.24.554-.627.04-.534.198-.815.847-1.26.673-.475 1.049-1.09 1.049-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.71 1.71 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745z"/>
							<path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
							<path d="M7.001 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0z"/>
						  </svg></span>
						<h5>Risk Free</h5>
						<p>you don't need to think about security & others.</p> 
					</div>
				</div> 
				<div class="col-lg-4 col-md-6">
					<div class="feature-blk">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-question" viewBox="0 0 16 16">
							<path d="M8.05 9.6c.336 0 .504-.24.554-.627.04-.534.198-.815.847-1.26.673-.475 1.049-1.09 1.049-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.71 1.71 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745z"/>
							<path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
							<path d="M7.001 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0z"/>
						  </svg></span>
						<h5>Smart & Modern</h5>
						<p>Our platform is undoubtedly Very smart and Modern.</p>
					</div>
				</div> 
				<div class="col-lg-4 col-md-6">
					<div class="feature-blk">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-question" viewBox="0 0 16 16">
							<path d="M8.05 9.6c.336 0 .504-.24.554-.627.04-.534.198-.815.847-1.26.673-.475 1.049-1.09 1.049-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.71 1.71 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745z"/>
							<path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
							<path d="M7.001 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0z"/>
						  </svg></span>
						<h5>Hasle Free</h5>
						<p>You just need to update your institute information, that's it.</p> 
					</div>
				</div> 
				<div class="col-lg-4 col-md-6">
					<div class="feature-blk">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-question" viewBox="0 0 16 16">
							<path d="M8.05 9.6c.336 0 .504-.24.554-.627.04-.534.198-.815.847-1.26.673-.475 1.049-1.09 1.049-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.71 1.71 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745z"/>
							<path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
							<path d="M7.001 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0z"/>
						  </svg></span>
						<h5>No Coding</h5>
						<p>You don't need to have any coding or technical knowledge to use stujar.</p> 
					</div>
				</div> 
				<div class="col-lg-4 col-md-6">
					<div class="feature-blk">
						<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-question" viewBox="0 0 16 16">
							<path d="M8.05 9.6c.336 0 .504-.24.554-.627.04-.534.198-.815.847-1.26.673-.475 1.049-1.09 1.049-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.71 1.71 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745z"/>
							<path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z"/>
							<path d="M7.001 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0z"/>
						  </svg></span>
						<h5>Support</h5>
						<p>You will get support 24/7 for free.</p> 
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
						<h3>A Few Institutes</h3>
						<p>These institutions are using our stujar platform for their institute.</p>
					</div>
				</div>
			</div>
		  <div class="row">
			<div class="col-lg-10 offset-lg-1">
				<div class="row">
					@forelse ($schools as $school)
						@if (!empty($school->name))
							<div class="col-lg-4 col-md-6">
								<div class="instBlk">
									<div class="profile_title">
										<a href="{{ $school->slug }}">
											@if (!empty($school->file))
												<img src="{{ asset('images/uploads/small'.'/'.$school->logo) }}" alt="{{ $school->name ?? '' }}">
											@endif
											
										</a>
										<div> 
											<h5 class="text-truncate">		
												{{Str::limit($school->name, 43, $end='...') ?? ''}}
											</h5>
											{{-- <span>College</span> --}}
										</div>
									</div>
									<img src="{{ asset('images/uploads/small'.'/'.$school->file) }}" alt="{{ $school->name ?? '' }}">
									<a href="{{ $school->slug }}" class="theme-btn" target="_blank">Website</a>
								</div>
							</div>
						@endif
					@empty
						No School Found
					@endforelse
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
						<h3>Feedbacks</h3>
						<p>Stujar users shared their experiences.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12"> 
					<div class="testimonials owl-carousel">
						
						<div class="testimonial-blk">
							<img src="assets/img/avt.png" alt="">
							<div class="testimonial-blk-wrp">
								<h5>Abdur Rahman <span>Teacher</span></h5>
								<p>Stujar.com has significantly simplified our online presence, allowing us to focus more on our students' growth and development rather than worrying about technicalities.</p>
							</div>
						</div>
						<div class="testimonial-blk">
							<img src="assets/img/avt.png" alt="">
							<div class="testimonial-blk-wrp">
								<h5>Muhammad Alamin <span>Committee</span></h5>
								<p>Stujar.com has significantly simplified our online presence, allowing us to focus more on our students' growth and development rather than worrying about technicalities</p>
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
								<h5>Rama Sarker <span>Principal</span></h5>
								<p>The comprehensive services provided by Stujar.com, including domain management and hosting, have simplified our administrative tasks. We appreciate the user-friendly interface that requires minimal technical knowledge.</p>
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
						<h3>So let’s get start</h3>
						<p>What are you waiting for? Let’s get started from now, just click on the below get start button.</p>
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
								<h4>Contact us</h4> 
								<p>Don't hesitate to contact us for anything.</p>
							</div>
							<ul class="addrLst">
								<li>
									<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt-fill" viewBox="0 0 16 16">
										<path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
									  </svg></span>
									  <div class="text-truncate">
										Modhyanagor, Sunamgonj, Sylhet
									  </div>
								</li>
								<li>
									<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
										<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
									  </svg></span>
									<div class="text-truncate">
										+8801405618060
									</div>
								</li>
								<li>
									<span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
										<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z"/>
									  </svg></span>
									  <div class="text-truncate">
										stujarhelp@gmail.com
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
						<h4>Join us</h4>
						<p>To join with us just click on the "Continue with Facebook" and go ahead.</p>
					</div>

					@guest
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item" role="presentation">
						  <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Registration</button>
						</li>
						<li class="nav-item" role="presentation">
						  <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Login</button>
						</li> 
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
							<div class="authArea">
								<h4>Registration</h4>
								<form action="{{ route('register.custom') }}" method="post">
									@csrf
									<div class="mb-3">
										<input type="text" name="name" id="name" class="form-control" placeholder="name" autofocus required  >
										@if ($errors->has('name'))
										<span class="text-danger">{{ $errors->first('name') }}</span>
										@endif
									</div>
									<div class="mb-3">								
										<input type="number" name="phone" id="phone" class="form-control" placeholder="Phone Number" autofocus required>
										@if ($errors->has('phone'))
										<span class="text-danger">{{ $errors->first('phone') }}</span>
										@endif
									</div>
									<div class="mb-3">
										<input type="password" name="password" id="password" placeholder="password" class="form-control" required>
										@if ($errors->has('password'))
											<span class="text-danger">{{ $errors->first('password') }}</span>
										@endif
									</div>
									<div class="d-grid mx-auto">
										<button type="submit">Sign up</button>
									</div>				  
								</form>
							</div>
						</div>
						<div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
							<div class="authArea">
								<h4>Login</h4>
								@if(session('error')) 
									<div class="alert alert-danger m-4">
										{{ session('error') }} 
									</div>
								@endif
								<form action="{{ route('login.school') }}" method="POST">
									@csrf
									<div class="single-field mb-3">
										<input id="phone" type="number"
											class="form-control @error('phone') is-invalid @enderror" name="phone"
											value="{{ old('phone') }}"  autocomplete="Phone" placeholder="Phone Number" required autofocus>
															
										@error('phone')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>      
									<div class="single-field">
											<input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
										@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>
									<div class="d-grid mx-auto mt-4">
										<button  type="submit">log in</button>
									</div>
								</form>
							</div>
						</div> 
					</div>
					@endguest
					@auth
					<a class="d-block btn btn-primary" href="{{ URL::to('user/school') }}">DashBoard</a>
					@endauth
 
					<p>Your are Login/Singup here means you are agree with with our rules and regulations. <a href="/privacy-policy">Privacy Policy</a> & <a href="/termsofservices">Terms of services</a></p>

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

