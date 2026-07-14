@extends('layouts.app')

@section('title', 'About Us | Career Website')
@section('body_class', 'about-page')

@section('content')
<section class="hero-section">
					<div class="container">
						<div class="row align-items-center">
							<div class="col-lg-6">
								<div class="ab-text">
									<span>About Us</span>
									<h1>
										We are Future of Career
										Development
									</h1>
									<p>
										Career Institute, founded in 2010, has emerged as a leading<br>
										IT education institution in Pakistan. Our commitment to<br>
										excellence has led to a network of over 150,000 proud alumni.<br>
										With more than 50 globally recognized affiliations and a<br>
										portfolio of over 100 meticulously crafted courses, we're<br>
										dedicated to meeting the ever-growing global demand<br>
										for skilled professionals
									</p>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="img-hold">
									<img src="{{ asset('assets/images/img39.png') }}" alt="">
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="ser-area">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<h2>Our Services</h2>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="block">
									<ul>
										<li>
											<div class="box">
												<div class="img-hold">
													<img src="{{ asset('assets/images/icon68.svg') }}" alt="">
												</div>
												<div class="t-bar">
													<h3>Career development</h3>
													<p>
														Guidance, skills, networking, resume
														building, and interview readiness.
													</p>
												</div>
											</div>
										</li>
										<li>
											<div class="box">
												<div class="img-hold">
													<img src="{{ asset('assets/images/icon69.svg') }}" alt="">
												</div>
												<div class="t-bar">
													<h3>
														World recognized professional & certifications
													</h3>
													<p>
														Cisco Network Academy Microsoft IT Academy Oracle Academy VMware IT Academy NEBOSH IOSH.
													</p>
												</div>
											</div>
										</li>
										<li>
											<div class="box">
												<div class="img-hold">
													<img src="{{ asset('assets/images/icon68.svg') }}" alt="">
												</div>
												<div class="t-bar">
													<h3>
														Authorized Test center
													</h3>
													<p>
														Pearson VUE PSI
													</p>
												</div>
											</div>
										</li>
										<li>
											<div class="box">
												<div class="img-hold">
													<img src="{{ asset('assets/images/icon70.svg') }}" alt="">
												</div>
												<div class="t-bar">
													<h3>
														Other services
													</h3>
													<p>
														Csoft Systems for software solutions Convenient co-working spaces Professional study abroad consultancy Reliable network installation services
													</p>
												</div>
											</div>
										</li>
									</ul>
									<ul>
										<li>
											<div class="box">
												<div class="img-hold">
													<img src="{{ asset('assets/images/icon71.svg') }}" alt="">
												</div>
												<div class="t-bar">
													<h3>Coworking Space</h3>
													<p>
														Our modern office spaces provide freelancers, entrepreneurs, and teams with comfortable work areas.
													</p>
												</div>
											</div>
										</li>
										<li>
											<div class="box">
												<div class="img-hold">
													<img src="{{ asset('assets/images/icon72.svg') }}" alt="">
												</div>
												<div class="t-bar">
													<h3>
														Certifications
													</h3>
													<p>
														Guidance, skills, networking, resume building, and interview readiness.
													</p>
												</div>
											</div>
										</li>
										<li>
											<div class="box">
												<div class="img-hold">
													<img src="{{ asset('assets/images/icon73.svg') }}" alt="">
												</div>
												<div class="t-bar">
													<h3>
														Study Abroad Guidance
													</h3>
													<p>
														Get expert support for admissions, applications, and visa guidance to start your study journey abroad confidently.
													</p>
												</div>
											</div>
										</li>
										<li>
											<div class="box">
												<div class="img-hold">
													<img src="{{ asset('assets/images/icon74.svg') }}" alt="">
												</div>
												<div class="t-bar">
													<h3>
														Professional Internships
													</h3>
													<p>
														Work on real projects, improve your skills, and prepare yourself for the professional world with our internship programs.
													</p>
												</div>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="news-area">
					<div class="container">
						<div class="row">
							<div class="col-lg-6">
								<div class="tabs-bar">
									<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
										<li class="nav-item" role="presentation">
											<button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Mission</button>
										</li>
										<li class="nav-item" role="presentation">
											<button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Purpose</button>
										</li>
									</ul>
									<div class="tab-content" id="pills-tabContent">
										<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
											<h2>
												Mission
											</h2>
											<p>
												At Career Institute, our mission is to empower individuals with
												the knowledge and skills needed to excel in the dynamic world
												of Information Technology. We are dedicated to fostering
												personal and professional growth by providing top-notch
												IT education and career development services. Our aim is
												to produce industry-ready professionals who can lead and
												innovate in their chosen fields.
											</p>
										</div>
										<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">...</div>
									</div>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="news-bar">
									<h2>Latest News <a href="#">View All News</a></h2>
									<div class="news-slider">
										<div>
											<div class="box s-blue">
												<p>
													Career Institute Signs Franchise MOU for
													Kohinoor FSD  Branch<a href="#">Read more...</a>
												</p>
												<div class="d-bar">
													<img src="{{ asset('assets/images/icon05.svg') }}" alt=""> 
													<span>09-12-2024</span>
												</div>
											</div>
										</div>
										<div>
											<div class="box s-black">
												<p>
													Career Institute Signs Franchise MOU for
													Kohinoor FSD  Branch<a href="#">Read more...</a>
												</p>
												<div class="d-bar">
													<img src="{{ asset('assets/images/icon05.svg') }}" alt=""> 
													<span>09-12-2024</span>
												</div>
											</div>
										</div>
										<div>
											<div class="box s-green">
												<p>
													Career Institute Signs Franchise MOU for
													Kohinoor FSD  Branch<a href="#">Read more...</a>
												</p>
												<div class="d-bar">
													<img src="{{ asset('assets/images/icon05.svg') }}" alt=""> 
													<span>09-12-2024</span>
												</div>
											</div>
										</div>
										<div>
											<div class="box s-black">
												<p>
													Career Institute Signs Franchise MOU for
													Kohinoor FSD  Branch<a href="#">Read more...</a>
												</p>
												<div class="d-bar">
													<img src="{{ asset('assets/images/icon05.svg') }}" alt=""> 
													<span>09-12-2024</span>
												</div>
											</div>
										</div>
									</div>
									<a href="#" class="btn r-btn">Read More</a>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="chose-area">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<h2><span>Why</span> Choose Us</h2>
							</div>
						</div>
						<div class="row align-items-center">
							<div class="col-lg-6">
								<div class="t-bar">
									<h3>
										About Career Institute
									</h3>
									<p>
										Since 2010, Career Institute, a global tech training leader,
										has impacted 150,000+ students worldwide. Our
										commitment to industry trends is seen in our current
										curriculum and certified trainers. Beyond training, we
										offer coworking spaces to tech startups, fostering
										professional excellence. Elevate your skills and
										business at Career Institute – where innovation
										meets education
									</p>
									<a href="#" class="btn rm-btn">Read More</a>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="img-hold">
									<img src="{{ asset('assets/images/img40.png') }}" alt="">
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="logo-bar">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<h2>Our Affiliation</h2>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="logo-slider">
									<div>
										<div class="img-hold">
											<img src="{{ asset('assets/images/img09.png') }}" alt="">
										</div>
									</div>
									<div>
										<div class="img-hold">
											<img src="{{ asset('assets/images/img10.png') }}" alt="">
										</div>
									</div>
									<div>
										<div class="img-hold">
											<img src="{{ asset('assets/images/img11.png') }}" alt="">
										</div>
									</div>
									<div>
										<div class="img-hold">
											<img src="{{ asset('assets/images/img12.png') }}" alt="">
										</div>
									</div>
									<div>
										<div class="img-hold">
											<img src="{{ asset('assets/images/img10.png') }}" alt="">
										</div>
									</div>
									<div>
										<div class="img-hold">
											<img src="{{ asset('assets/images/img11.png') }}" alt="">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="vision-bar">
					<div class="container">
						<div class="g-box">
							<div class="row">
								<div class="col-lg-12">
									<h2>Guiding Vision from Our Directors</h2>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-6 border-end">
									<div class="t-detail">
										<div class="img-hold">
											<img src="assets/images/img02.png" alt="">
										</div>
										<span>Adeel Javaid - Founder & CEO</span>
										<div class="s-link">
											<ul>
												<li><a href="#"><img src="assets/images/icon75.svg" alt=""></a></li>
												<li><a href="#"><img src="assets/images/icon76.svg" alt=""></a></li>
												<li><a href="#"><img src="assets/images/icon77.svg" alt=""></a></li>
												<li><a href="#"><img src="assets/images/icon78.svg" alt=""></a></li>
												<li><a href="#"><img src="assets/images/icon79.svg" alt=""></a></li>
											</ul>
										</div>
										<p>
											<b>Our mission</b> is to educate and empower enterprise<br>
											leaders. We firmly believe that the leaders nurtured<br>
											by our institute play a crucial role in effecting<br>
											positive change within their organizations and<br>
											on a global scale.
										</p>
										<h4>
											Inspired by rapid technological advancement and the changing global landscape,
											I founded this initiative to guide talent toward the right career path and build future
											IT leaders. As an IT professional and businessman, I believe education is the key to
											developing skilled professionals. At Career Institute, we focus not only on technical
											expertise but also on communication, presentation, and problem-solving skills.
											Our goal is to transform students into IT specialists, encourage innovation, and
											prepare them for successful careers while promoting Pakistan’s technological
											growth on an international level.
										</h4>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="t-detail">
										<div class="img-hold">
											<img src="assets/images/img02.png" alt="">
										</div>
										<span>Adeel Javaid - Founder & CEO</span>
										<div class="s-link">
											<ul>
												<li><a href="#"><img src="assets/images/icon75.svg" alt=""></a></li>
												<li><a href="#"><img src="assets/images/icon76.svg" alt=""></a></li>
												<li><a href="#"><img src="assets/images/icon77.svg" alt=""></a></li>
												<li><a href="#"><img src="assets/images/icon78.svg" alt=""></a></li>
												<li><a href="#"><img src="assets/images/icon79.svg" alt=""></a></li>
											</ul>
										</div>
										<p>
											<b>Our mission</b> is to educate and empower enterprise<br>
											leaders. We firmly believe that the leaders nurtured<br>
											by our institute play a crucial role in effecting<br>
											positive change within their organizations and<br>
											on a global scale.
										</p>
										<h4>
											Inspired by rapid technological advancement and the changing global landscape,
											I founded this initiative to guide talent toward the right career path and build future
											IT leaders. As an IT professional and businessman, I believe education is the key to
											developing skilled professionals. At Career Institute, we focus not only on technical
											expertise but also on communication, presentation, and problem-solving skills.
											Our goal is to transform students into IT specialists, encourage innovation, and
											prepare them for successful careers while promoting Pakistan’s technological
											growth on an international level.
										</h4>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="gallery-bar">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<h2>Gallery</h2>
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="col-lg-12 col-xl-10">
								<div class="gallery-section">
									<ul class="gallery-tabs">
										<li class="active" data-tab="coworking">Coworking Space</li>
										<li data-tab="campus">Campuses</li>
										<li data-tab="tour">Tour</li>
										<li data-tab="expo">Expo</li>
										<li data-tab="navttc">Navttc</li>
										<li data-tab="certificate">Certificate Distribution</li>
										<li data-tab="event">Events</li>
									</ul>
									<!-- Gallery Content -->
									<div class="gallery-content">
										<!-- Coworking -->
										<div class="gallery-panel active" id="coworking">
											<div class="gallery-item">
												<img src="{{ asset('assets/images/img14.png') }}">
												<div class="detial">
													<h3>Coworking Space</h3>
													<button class="view-btn" data-gallery="coworking" data-index="0">
														<i class="fas fa-eye"></i>
													</button>
												</div>
											</div>
											<div class="gallery-item">
												<img src="{{ asset('assets/images/img14.png') }}">
												<div class="detial">
													<h3>Coworking Space</h3>
													<button class="view-btn" data-gallery="coworking" data-index="0">
														<i class="fas fa-eye"></i>
													</button>
												</div>
											</div>
											<div class="gallery-item">
												<img src="{{ asset('assets/images/img14.png') }}">
												<div class="detial">
													<h3>Coworking Space</h3>
													<button class="view-btn" data-gallery="coworking" data-index="0">
														<i class="fas fa-eye"></i>
													</button>
												</div>
											</div>
											<div class="gallery-item">
												<img src="{{ asset('assets/images/img14.png') }}">
												<div class="detial">
													<h3>Coworking Space</h3>
													<button class="view-btn" data-gallery="coworking" data-index="0">
														<i class="fas fa-eye"></i>
													</button>
												</div>
											</div>
											<div class="gallery-item">
												<img src="{{ asset('assets/images/img14.png') }}">
												<div class="detial">
													<h3>Coworking Space</h3>
													<button class="view-btn" data-gallery="coworking" data-index="0">
														<i class="fas fa-eye"></i>
													</button>
												</div>
											</div>
											<div class="gallery-item">
												<img src="{{ asset('assets/images/img14.png') }}">
												<div class="detial">
													<h3>Coworking Space</h3>
													<button class="view-btn" data-gallery="coworking" data-index="0">
														<i class="fas fa-eye"></i>
													</button>
												</div>
											</div>
											<div class="gallery-item">
												<img src="{{ asset('assets/images/img14.png') }}">
												<div class="detial">
													<h3>Coworking Space</h3>
													<button class="view-btn" data-gallery="coworking" data-index="0">
														<i class="fas fa-eye"></i>
													</button>
												</div>
											</div>
											<div class="gallery-item">
												<img src="{{ asset('assets/images/img14.png') }}">
												<div class="detial">
													<h3>Coworking Space</h3>
													<button class="view-btn" data-gallery="coworking" data-index="0">
														<i class="fas fa-eye"></i>
													</button>
												</div>
											</div>
										</div>
										<!-- Campus -->
										<div class="gallery-panel" id="campus">
											<div class="gallery-item">
												<img src="{{ asset('assets/images/img14.png') }}">
												<div class="detial">
													<h3>Coworking Space</h3>
													<button class="view-btn" data-gallery="coworking" data-index="0">
														<i class="fas fa-eye"></i>
													</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="btn-area">
									<a href="#" class="btn more-btn">More Gallery</a>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="soical-area">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<h2>Keep in Touch</h2>
								<ul>
									<li><a href="#"><img src="{{ asset('assets/images/fb.png') }}" alt=""></a></li>
									<li><a href="#"><img src="{{ asset('assets/images/instagram.png') }}" alt=""></a></li>
									<li><a href="#"><img src="{{ asset('assets/images/youtube.png') }}" alt=""></a></li>
									<li><a href="#"><img src="{{ asset('assets/images/tiktok.png') }}" alt=""></a></li>
									<li><a href="#"><img src="{{ asset('assets/images/linkdin.png') }}" alt=""></a></li>
									<li><a href="#"><img src="{{ asset('assets/images/x.png') }}" alt=""></a></li>
									<li><a href="#"><img src="{{ asset('assets/images/wp.png') }}" alt=""></a></li>
								</ul>
							</div>
						</div>
					</div>
				</section>
				<section class="faq-area mb-5">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<h3>Do You Need Help?</h3>
								<h6>Frequently Asked <span>Questions</span></h6>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="faq-bar">
									<div class="accordion" id="accordionExample">
										<div class="accordion-item">
											<h2 class="accordion-header" id="headingOne">
											<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
												What is Lorem Ipsum?
											</button>
											</h2>
											<div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
												<div class="accordion-body">
													<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut, reiciendis maxime voluptates nulla repudiandae ullam maiores quia? Ipsum, illum sit assumenda, esse sequi quia quo blanditiis ratione quidem vero possimus?</p>
												</div>
											</div>
										</div>
										<div class="accordion-item">
											<h2 class="accordion-header" id="headingTwo">
											<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
												Lorem Ipsum is simply dummy text of the printing and typesetting industry?
											</button>
											</h2>
											<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
												<div class="accordion-body">
													<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut, reiciendis maxime voluptates nulla repudiandae ullam maiores quia? Ipsum, illum sit assumenda, esse sequi quia quo blanditiis ratione quidem vero possimus?</p>
												</div>
											</div>
										</div>
										<div class="accordion-item">
											<h2 class="accordion-header" id="headingThree">
											<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
												Lorem Ipsum is simply dummy text of the printing and typesetting industry?
											</button>
											</h2>
											<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
												<div class="accordion-body">
													<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aut, reiciendis maxime voluptates nulla repudiandae ullam maiores quia? Ipsum, illum sit assumenda, esse sequi quia quo blanditiis ratione quidem vero possimus?</p>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
		$(".gallery-tabs li").click(function() {
			let tab = $(this).data("tab");
			$(".gallery-tabs li")
				.removeClass("active");
			$(this)
				.addClass("active");
			$(".gallery-panel")
				.removeClass("active");
			$("#" + tab)
				.addClass("active");
		});
		// Gallery Data
		const galleries = {
			coworking: [
				"{{ asset('assets/images/img14.png') }}",
				"{{ asset('assets/images/img15.png') }}"
			],
			campus: [
				"{{ asset('assets/images/img14.png') }}"
			]
		};
		// Popup Swiper
		let popupSwiper = new Swiper(".popupSlider", {
			loop: false,
			navigation: {
				nextEl: ".swiper-button-next",
				prevEl: ".swiper-button-prev"
			}
		});
		// Eye Click
		$(".view-btn").click(function() {
			let galleryName =
				$(this).data("gallery");
			let index =
				Number($(this).data("index"));
			let images =
				galleries[galleryName];
			// remove old images
			popupSwiper.removeAllSlides();
			// add new images
			images.forEach(function(img) {
				popupSwiper.appendSlide(
					'<div class="swiper-slide">' +
					'<img src="' + img + '">' +
					'</div>'
				);
			});
			popupSwiper.update();
			// open clicked image
			popupSwiper.slideTo(index, 0);
			// Bootstrap 5 Modal
			let modal =
				new bootstrap.Modal(
					document.getElementById("galleryModal")
				);
			modal.show();
		});
	});
</script>
@endpush
