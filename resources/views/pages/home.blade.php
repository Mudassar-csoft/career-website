@extends('layouts.app')

@section('title', 'Home | Career Website')
@section('body_class', '')

@section('content')
<section class="hero-section">
					<div class="container">
						<div class="row">
							<div class=	"col-lg-7">
								<h1>Get Free Career Counseling</h1>
								<p>
									Complete the form below and our career advisors will contact you shortly.<br>
									You'll also receive updates on courses, admissions, scholarships, events,<br>
									and career opportunities through our newsletter.
								</p>
								<div class="form-block">
									<form class="row g-3">
										<div class="col-md-6">
											<input type="text" class="form-control" placeholder="Full Name">
										</div>
										<div class="col-md-6">
											<input type="text" class="form-control" placeholder="Course">
										</div>
										<div class="col-md-6">
											<input type="text" class="form-control" placeholder="Contact">
										</div>
										<div class="col-md-6">
											<input type="email" class="form-control" placeholder="example@gmail.com">
										</div>
										<div class="col-md-6">
											<select class="form-select">
												<option selected>Pakistan</option>
											</select>
										</div>
										<div class="col-md-6">
											<input type="text" class="form-control" placeholder="City">
										</div>
										<div class="col-12">
											<div class="form-check">
												<input class="form-check-input" type="checkbox" id="gridCheck" checked>
												<label class="form-check-label" for="gridCheck">
													Subscribe to newsletter
												</label>
											</div>
										</div>
										<div class="col-12">
											<button type="submit" class="btn apply-btn">Apply Now</button>
										</div>
									</form>
								</div>
							</div>
							<div class="col-lg-5">
								<div class="orbit-wrapper">
									<!-- Outer Orbit -->
									<div class="orbit orbit-outer">
										<span style="--i:0"></span>
										<span style="--i:1"></span>
										<span style="--i:2"></span>
										<span style="--i:3"></span>
										<span style="--i:4"></span>
										<span style="--i:5"></span>
										<span style="--i:6"></span>
										<span style="--i:7"></span>
									</div>
									<!-- Inner Orbit -->
									<div class="orbit orbit-inner">
										<span style="--i:0"></span>
										<span style="--i:1"></span>
										<span style="--i:2"></span>
										<span style="--i:3"></span>
										<span style="--i:4"></span>
										<span style="--i:5"></span>
										<span style="--i:6"></span>
										<span style="--i:7"></span>
									</div>
									<!-- Center Image -->
									<div class="center-image">
										<img src="{{ asset('assets/images/img15.png') }}" alt="">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="counter-box">
									<div class="counter-item">
										<div class="icon">
											<img src="{{ asset('assets/images/icon01.svg') }}" alt="">
										</div>
										<h2 class="counter" data-target="150000">0</h2>
										<p>Alumni</p>
									</div>
									<div class="counter-item">
										<div class="icon">
											<img src="{{ asset('assets/images/icon02.svg') }}" alt="">
										</div>
										<h2 class="counter" data-target="50">0</h2>
										<p>Affiliations</p>
									</div>
									<div class="counter-item">
										<div class="icon">
											<img src="{{ asset('assets/images/icon03.svg') }}" alt="">
										</div>
										<h2 class="counter" data-target="100">0</h2>
										<p>Trainings</p>
									</div>
									<div class="counter-item">
										<div class="icon">
											<img src="{{ asset('assets/images/icon04.svg') }}" alt="">
										</div>
										<h2 class="counter" data-target="15">0</h2>
										<p>Campuses</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="news-area">
					<div class="container">
						<div class="row">
							<div class="col-lg-8">
								<div class="row">
									<div class="col-lg-6">
										<div class="news-bar">
											<h2>News</h2>
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
									<div class="col-lg-6">
										<div class="event-bar">
											<h2>Events</h2>
											<ul>
												<li>
													<div class="d-info">
														<h3>
															27 <span>Apr</span>
														</h3>
													</div>
													<div class="t-bar">
														<p>
															Inauguration Career Institute
															Lahore Wapda Town Branch
														</p>
														<span><i class="fas fa-map-marker-alt"></i> Lahore</span>
													</div>
												</li>
												<li>
													<div class="d-info">
														<h3>
															27 <span>Apr</span>
														</h3>
													</div>
													<div class="t-bar">
														<p>
															Inauguration Career Institute
															Lahore Wapda Town Branch
														</p>
														<span><i class="fas fa-map-marker-alt"></i> Lahore</span>
													</div>
												</li>
												<li>
													<div class="d-info">
														<h3>
															27 <span>Apr</span>
														</h3>
													</div>
													<div class="t-bar">
														<p>
															Inauguration Career Institute
															Lahore Wapda Town Branch
														</p>
														<span><i class="fas fa-map-marker-alt"></i> Lahore</span>
													</div>
												</li>
											</ul>
											<a href="#" class="btn event-btn">All Events</a>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="about-bar">
									<h2><span>Why</span> Choose Us</h2>
									<div class="img-hold">
										<img src="{{ asset('assets/images/img01.png') }}" alt="">
									</div>
									<h3>About Career Institute</h3>
									<p>
										Since 2010, Career Institute, a global tech training
										leader, has impacted 150,000+ students worldwide.
										Our commitment to industry trends is seen in our
										current curriculum and certified trainers. Beyond
										training, we offer coworking spaces to tech startups,
										fostering professional excellence. Elevate your skills
										and business at Career Institute – where innovation
										meets education
									</p>
									<a href="#" class="btn r-btn">Read More</a>
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
											<img src="{{ asset('assets/images/img02.png') }}" alt="">
										</div>
										<span>Adeel Javaid - Founder & CEO</span>
										<p>
											<b>Our mission</b> is to educate and empower enterprise<br>
											leaders. We firmly believe that the leaders nurtured<br>
											by our institute play a crucial role in effecting<br>
											positive change within their organizations and<br>
											on a global scale.
										</p>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="t-detail">
										<div class="img-hold">
											<img src="{{ asset('assets/images/img02.png') }}" alt="">
										</div>
										<span>Adeel Javaid - Founder & CEO</span>
										<p>
											<b>Our mission</b> is to educate and empower enterprise<br>
											leaders. We firmly believe that the leaders nurtured<br>
											by our institute play a crucial role in effecting<br>
											positive change within their organizations and<br>
											on a global scale.
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="feature-block">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<h2>Featured Courses</h2>
								<p>
									Elevate Your Skills and Land Your Dream Job - Whether you prefer the convenience of learning from home or the<br>
									advantages of direct sessions on campus with our expert instructors, we've got you covered!
								</p>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="feature-slider">
									<div>
										<div class="box">
											<div class="img-hold">
												<img src="{{ asset('assets/images/img03.png') }}" alt="">
												<div class="offer-bar">
													<h3>30%</h3>
													<span>Discount</span>
												</div>
											</div>
											<div class="text-hold">
												<h3>Digital Marketing</h3>
												<ul>
													<li>
														Category: 
														<span>Ecommerce</span>
													</li>
													<li>
														Duration: 
														<span><img src="{{ asset('assets/images/icon12.svg') }}" alt=""> 3 Months</span>
													</li>
													<li>
														Mode: 
														<span> <img src="{{ asset('assets/images/icon09.svg') }}" alt="">Campus</span> 
														<span><img src="{{ asset('assets/images/icon10.svg') }}" alt="">Online</span> 
														<span><img src="{{ asset('assets/images/icon11.svg') }}" alt="">Hybrid</span>
													</li>
												</ul>
												<div class="btn-area">
													<a href="#" class="btn an-btn">Apply Now</a>
													<a href="#" class="btn md-btn">More Details</a>
												</div>
											</div>
										</div>
									</div>
									<div>
										<div class="box">
											<div class="img-hold">
												<img src="{{ asset('assets/images/img03.png') }}" alt="">
												<div class="offer-bar">
													<h3>30%</h3>
													<span>Discount</span>
												</div>
											</div>
											<div class="text-hold">
												<h3>Digital Marketing</h3>
												<ul>
													<li>
														Category: 
														<span>Ecommerce</span>
													</li>
													<li>
														Duration: 
														<span><img src="{{ asset('assets/images/icon12.svg') }}" alt=""> 3 Months</span>
													</li>
													<li>
														Mode: 
														<span> <img src="{{ asset('assets/images/icon09.svg') }}" alt="">Campus</span> 
														<span><img src="{{ asset('assets/images/icon10.svg') }}" alt="">Online</span> 
														<span><img src="{{ asset('assets/images/icon11.svg') }}" alt="">Hybrid</span>
													</li>
												</ul>
												<div class="btn-area">
													<a href="#" class="btn an-btn">Apply Now</a>
													<a href="#" class="btn md-btn">More Details</a>
												</div>
											</div>
										</div>
									</div>
									<div>
										<div class="box">
											<div class="img-hold">
												<img src="{{ asset('assets/images/img03.png') }}" alt="">
												<div class="offer-bar">
													<h3>30%</h3>
													<span>Discount</span>
												</div>
											</div>
											<div class="text-hold">
												<h3>Digital Marketing</h3>
												<ul>
													<li>
														Category: 
														<span>Ecommerce</span>
													</li>
													<li>
														Duration: 
														<span><img src="{{ asset('assets/images/icon12.svg') }}" alt=""> 3 Months</span>
													</li>
													<li>
														Mode: 
														<span> <img src="{{ asset('assets/images/icon09.svg') }}" alt="">Campus</span> 
														<span><img src="{{ asset('assets/images/icon10.svg') }}" alt="">Online</span> 
														<span><img src="{{ asset('assets/images/icon11.svg') }}" alt="">Hybrid</span>
													</li>
												</ul>
												<div class="btn-area">
													<a href="#" class="btn an-btn">Apply Now</a>
													<a href="#" class="btn md-btn">More Details</a>
												</div>
											</div>
										</div>
									</div>
									<div>
										<div class="box">
											<div class="img-hold">
												<img src="{{ asset('assets/images/img03.png') }}" alt="">
												<div class="offer-bar">
													<h3>30%</h3>
													<span>Discount</span>
												</div>
											</div>
											<div class="text-hold">
												<h3>Digital Marketing</h3>
												<ul>
													<li>
														Category: 
														<span>Ecommerce</span>
													</li>
													<li>
														Duration: 
														<span><img src="{{ asset('assets/images/icon12.svg') }}" alt=""> 3 Months</span>
													</li>
													<li>
														Mode: 
														<span> <img src="{{ asset('assets/images/icon09.svg') }}" alt="">Campus</span> 
														<span><img src="{{ asset('assets/images/icon10.svg') }}" alt="">Online</span> 
														<span><img src="{{ asset('assets/images/icon11.svg') }}" alt="">Hybrid</span>
													</li>
												</ul>
												<div class="btn-area">
													<a href="#" class="btn an-btn">Apply Now</a>
													<a href="#" class="btn md-btn">More Details</a>
												</div>
											</div>
										</div>
									</div>
									<div>
										<div class="box">
											<div class="img-hold">
												<img src="{{ asset('assets/images/img03.png') }}" alt="">
												<div class="offer-bar">
													<h3>30%</h3>
													<span>Discount</span>
												</div>
											</div>
											<div class="text-hold">
												<h3>Digital Marketing</h3>
												<ul>
													<li>
														Category: 
														<span>Ecommerce</span>
													</li>
													<li>
														Duration: 
														<span><img src="{{ asset('assets/images/icon12.svg') }}" alt=""> 3 Months</span>
													</li>
													<li>
														Mode: 
														<span> <img src="{{ asset('assets/images/icon09.svg') }}" alt="">Campus</span> 
														<span><img src="{{ asset('assets/images/icon10.svg') }}" alt="">Online</span> 
														<span><img src="{{ asset('assets/images/icon11.svg') }}" alt="">Hybrid</span>
													</li>
												</ul>
												<div class="btn-area">
													<a href="#" class="btn an-btn">Apply Now</a>
													<a href="#" class="btn md-btn">More Details</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="video-block">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<h2>Explore our campuses through an immersive virtual tour</h2>
								<p>
									Discover the allure of our stunning campuses in this captivating video tour,where you can truly immerse yourself in the vibrant<br>
									atmosphere that characterizes our esteemed institution. We extend a warm invitation for you to virtually experience our campus,<br>
									offering you a glimpse into what sets our educational and personal growth environment apart as something truly exceptional.
								</p>
								<a href="#" class="btn ep-btn mb-5">Explore Campuses</a>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="swiper mySwiper">
									<div class="swiper-wrapper">
										<!-- Slide 1 -->
										<div class="swiper-slide">
											<div class="video-card">
												<img src="{{ asset('assets/images/img04.png') }}" alt="">
												<button class="play-btn" data-video="video1.mp4">
													<img src="{{ asset('assets/images/ply-btn.png') }}" alt="">
												</button>
											</div>
										</div>

										<!-- Slide 2 -->
										<div class="swiper-slide">
											<div class="video-card">
												<img src="{{ asset('assets/images/img04.png') }}" alt="">
												<button class="play-btn" data-video="video2.mp4">
													<img src="{{ asset('assets/images/ply-btn.png') }}" alt="">
												</button>
											</div>
										</div>

										<!-- Slide 3 -->
										<div class="swiper-slide">
											<div class="video-card">
												<img src="{{ asset('assets/images/img04.png') }}" alt="">
												<button class="play-btn" data-video="video3.mp4">
													<img src="{{ asset('assets/images/ply-btn.png') }}" alt="">
												</button>
											</div>
										</div>

										<div class="swiper-slide">
											<div class="video-card">
												<img src="{{ asset('assets/images/img04.png') }}" alt="">
												<button class="play-btn" data-video="video3.mp4">
													<img src="{{ asset('assets/images/ply-btn.png') }}" alt="">
												</button>
											</div>
										</div>

										<div class="swiper-slide">
											<div class="video-card">
												<img src="{{ asset('assets/images/img04.png') }}" alt="">
												<button class="play-btn" data-video="video3.mp4">
													<img src="{{ asset('assets/images/ply-btn.png') }}" alt="">
												</button>
											</div>
										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="review-area">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<h2>
									What Our Alumni Say
								</h2>
							</div>
						</div>
						<div class="row mb-5">
							<div class="col-lg-3">
								<div class="box">
									<div class="img-hold">
										<img src="{{ asset('assets/images/img05.png') }}" alt="">
									</div>
									<div class="rt-bar">
										<h3>Muhammad Talha</h3>
										<span>Graphic Designer</span>
										<h5>Review</h5>
										<p>
											Great institute with supportive trainers
											and easy-to-understand concepts. Really
											helped me improve my IT skills
										</p>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="box">
									<div class="img-hold">
										<img src="{{ asset('assets/images/img06.png') }}" alt="">
									</div>
									<div class="rt-bar">
										<h3>Fatima Maqsood</h3>
										<span>Graphic Designer</span>
										<h5>Review</h5>
										<p>
											I loved the practical learning approach.
											The courses are well-structured and very
											useful for real-world projects.
										</p>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="box">
									<div class="img-hold">
										<img src="{{ asset('assets/images/img07.png') }}" alt="">
									</div>
									<div class="rt-bar">
										<h3>Umar Ishfaq</h3>
										<span>Web Developer</span>
										<h5>Review</h5>
										<p>
											Very professional environment with friendly
											teachers. I gained confidence
											and learned a lot here.
										</p>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="box">
									<div class="img-hold">
										<img src="{{ asset('assets/images/img08.png') }}" alt="">
									</div>
									<div class="rt-bar">
										<h3>Asad Riaz</h3>
										<span>Digital Marketing</span>
										<h5>Review</h5>
										<p>
											One of the best places to start a career in
											IT. Highly recommended for beginners
											and professionals.
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="btn-bar">
									<a href="#" class="btn v-btn">View All</a>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="logo-bar">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<h2>Collaborations with leading Organizations</h2>
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
				<section class="blog-area">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<h2>Latest Blogs</h2>
							</div>
						</div>
						<div class="row mb-5">
							<div class="col-lg-3">
								<div class="block">
									<div class="img-hold">
										<img src="{{ asset('assets/images/img13.png') }}" alt="">
									</div>
									<div class="t-bar">
										<h3>
											Shorthand Stenography Skills,
											Career, Pros and Cons, FAQs.
										</h3>
										<p>
											Shorthand Stenography is such […]
										</p>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="block">
									<div class="img-hold">
										<img src="{{ asset('assets/images/img13.png') }}" alt="">
									</div>
									<div class="t-bar">
										<h3>
											Shorthand Stenography Skills,
											Career, Pros and Cons, FAQs.
										</h3>
										<p>
											Shorthand Stenography is such […]
										</p>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="block">
									<div class="img-hold">
										<img src="{{ asset('assets/images/img13.png') }}" alt="">
									</div>
									<div class="t-bar">
										<h3>
											Shorthand Stenography Skills,
											Career, Pros and Cons, FAQs.
										</h3>
										<p>
											Shorthand Stenography is such […]
										</p>
									</div>
								</div>
							</div>
							<div class="col-lg-3">
								<div class="block">
									<div class="img-hold">
										<img src="{{ asset('assets/images/img13.png') }}" alt="">
									</div>
									<div class="t-bar">
										<h3>
											Shorthand Stenography Skills,
											Career, Pros and Cons, FAQs.
										</h3>
										<p>
											Shorthand Stenography is such […]
										</p>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<div class="btn-box">
									<a href="#" class="btn rm-btn">Read More</a>
								</div>
							</div>
						</div>
					</div>
				</section>
				<section class="partner-area">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<h2>
									Become a Partner
								</h2>
							</div>
							<div class="col-lg-12">
								<div class="form-block">
									<form class="row g-4">
										<div class="col-md-6">
											<input type="text" class="form-control" placeholder="Full Name">
										</div>
										<div class="col-md-6">
											<input type="text" class="form-control" placeholder="Contact no">
										</div>
										<div class="col-md-6">
											<input type="email" class="form-control" placeholder="Email Address">
										</div>
										<div class="col-md-6">
											<input type="text" class="form-control" placeholder="Business Interest">
										</div>
										<div class="col-md-12">
											<textarea rows="7" class="form-control" placeholder="Describe Partnership opportunity"></textarea>
										</div>
										<div class="col-12 text-center">
											<button type="submit" class="btn apply-btn mt-4">Apply Now</button>
										</div>
									</form>
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
				<section class="faq-area">
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
				<section class="letter-area">
					<div class="container">
						<div class="row">
							<div class="col-lg-12">
								<section class="newsletter">
									<div class="newsletter__content">
										<div class="newsletter__text">
											<h2>Join Our News Letter</h2>
											<p>
												Never miss important updates, events, and 
												career opportunities.
											</p>
										</div>
										<form class="newsletter__form">
											<input type="text" placeholder="Contact No." required>
											<input type="email" placeholder="Example@gmail.com" required>
											<button type="submit" class="join-btn">Join</button>
										</form>
									</div>
								</section>
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
