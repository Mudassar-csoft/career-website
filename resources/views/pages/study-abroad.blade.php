@extends('layouts.app')

@section('title', 'Study Abroad | Career Website')
@section('body_class', 'sa-page')

@section('content')
<section class="top-banner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="sm-box">
                                    <h1 class="mb-3">Study Abroad</h1>
                                    <h5>
                                        We Ensure You Take the Right Decision at the Threshold<br>
                                        of your career
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="ab-detail">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>Top Study Abroad Destinations for International Students</h2>
                                <p>
                                    Are you ready to take the next step in your academic and professional journey? Dreaming of studying at top<br>
                                    universities around the world? If so, relax and let us guide you every step of the way.
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="img-hold">
                                    <img src="{{ asset('assets/images/img29.png') }}" alt="">
                                    <h3>Study in USA</h3>
                                </div>
                            </div>
                            <div class="col-lg-3 pt-3">
                                <div class="img-hold">
                                    <img src="{{ asset('assets/images/img30.png') }}" alt="">
                                    <h3>Study in USA</h3>
                                </div>
                            </div>
                            <div class="col-lg-3 pt-3">
                                <div class="img-hold">
                                    <img src="{{ asset('assets/images/img31.png') }}" alt="">
                                    <h3>Study in USA</h3>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="img-hold">
                                    <img src="{{ asset('assets/images/img32.png') }}" alt="">
                                    <h3>Study in USA</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="uni-list">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <h6>Popular Universities</h6>
                            </div>
                            <div class="col-lg-3">
                                <div class="box">
                                    <div class="img-hold">
                                        <img src="{{ asset('assets/images/img47.png') }}" alt="">
                                    </div>
                                    <div class="txt-bar">
                                        <h3>University of</h3>
                                        <h2>Toronto</h2>
                                        <span>Canada</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="box">
                                    <div class="img-hold">
                                        <img src="{{ asset('assets/images/img48.png') }}" alt="">
                                    </div>
                                    <div class="txt-bar">
                                        <h3>University of</h3>
                                        <h2>Sydney</h2>
                                        <span>Australia</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="box">
                                    <div class="img-hold">
                                        <img src="{{ asset('assets/images/img49.png') }}" alt="">
                                    </div>
                                    <div class="txt-bar">
                                        <h3>Arizona State</h3>
                                        <h2>University</h2>
                                        <span>USA</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="box">
                                    <div class="img-hold">
                                        <img src="{{ asset('assets/images/img50.png') }}" alt="">
                                    </div>
                                    <div class="txt-bar">
                                        <h3>University of</h3>
                                        <h2>Essex</h2>
                                        <span>UK</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-12 text-center">
                                <a href="#" class="btn va-btn">View All</a>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="sp-area">
                    <div class="container">
                        <div class="row align-items-end">
                            <div class="col-lg-6">
                                <h3>Study Programs</h3>
                                <ul>
                                    <li>
                                        <img src="{{ asset('assets/images/icon80.svg') }}" alt="">
                                        <h4>
                                            Bachelor's<br>
                                            Degree
                                        </h4>
                                    </li>
                                    <li>
                                        <img src="{{ asset('assets/images/icon81.svg') }}" alt="">
                                        <h4>
                                            Master's<br>
                                            Degree
                                        </h4>
                                    </li>
                                    <li>
                                        <img src="{{ asset('assets/images/icon82.svg') }}" alt="">
                                        <h4>
                                            PHD<br>
                                            Programs
                                        </h4>
                                    </li>
                                    <li>
                                        <img src="{{ asset('assets/images/icon83.svg') }}" alt="">
                                        <h4>
                                            Diploma <br>
                                            Program
                                        </h4>
                                    </li>
                                    <li>
                                        <img src="{{ asset('assets/images/icon84.svg') }}" alt="">
                                        <h4>
                                            Foundation<br>
                                            Program
                                        </h4>
                                    </li>
                                    <li>
                                        <img src="{{ asset('assets/images/icon85.svg') }}" alt="">
                                        <h4>
                                            English <br>
                                            Courses
                                        </h4>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <div class="aj-box">
                                    <div class="row align-items-center">
                                        <div class="col-lg-7">
                                            <h2>
                                                Ready to Start Your <br>
                                                Study Abroad Journey? 
                                            </h2>
                                            <p>
                                                Let Our Expert Guide You Every Step of the Way
                                            </p>
                                            <div class="action-buttons d-flex align-items-center">
                                                <a href="#" class="btn consultation-btn">
                                                    Book Free Consultation
                                                </a>
                                                <a href="#" class="btn apply-btn">
                                                    Apply Now
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-lg-5">
                                            <div class="img-hold">
                                                <img src="{{ asset('assets/images/img51.png') }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="cur-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>English Language Courses</h2>
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
                                                <h5>English Proficiency</h5>
												<h3>Digital Marketing</h3>
                                                <p>
                                                    Get ready for university with our comprehensive
                                                    IELTS Academic course...
                                                </p>
												<div class="btn-area">
													<a href="#" class="btn en-btn">Enroll Now</a>
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
                                                <h5>English Proficiency</h5>
												<h3>Digital Marketing</h3>
                                                <p>
                                                    Get ready for university with our comprehensive
                                                    IELTS Academic course...
                                                </p>
												<div class="btn-area">
													<a href="#" class="btn en-btn">Enroll Now</a>
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
                                                <h5>English Proficiency</h5>
												<h3>Digital Marketing</h3>
                                                <p>
                                                    Get ready for university with our comprehensive
                                                    IELTS Academic course...
                                                </p>
												<div class="btn-area">
													<a href="#" class="btn en-btn">Enroll Now</a>
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
                                                <h5>English Proficiency</h5>
												<h3>Digital Marketing</h3>
                                                <p>
                                                    Get ready for university with our comprehensive
                                                    IELTS Academic course...
                                                </p>
												<div class="btn-area">
													<a href="#" class="btn en-btn">Enroll Now</a>
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
                                                <h5>English Proficiency</h5>
												<h3>Digital Marketing</h3>
                                                <p>
                                                    Get ready for university with our comprehensive
                                                    IELTS Academic course...
                                                </p>
												<div class="btn-area">
													<a href="#" class="btn en-btn">Enroll Now</a>
												</div>
											</div>
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
                <section class="abrod-info">
                    <div class="container">
                        <div class="row align-items-center mb-5">
                            <div class="col-lg-6">
                                <div class="t-bar">
                                    <h2>
                                        Study Abroad Consultants
                                    </h2>
                                    <p>
                                        Education is a powerful force that nurtures critical thinking and equips individuals with the skills needed to navigate today’s fast-paced and ever-evolving global landscape. In a world shaped by constant change and uncertainty, it empowers people to define their place and purpose
                                    </p>
                                    <p>
                                        we provide expert consultancy services to support students at every step of their academic journey. From selecting the right university to handling visa applications and beyond, our team is dedicated to helping students make informed choices and achieve their goals.
                                    </p>
                                    <p>
                                        Student recruitment is at the heart of what we do. Through targeted support and strategic outreach, we connect with and enroll talented students from diverse backgrounds. Our commitment to inclusivity and academic excellence drives our approach, ensuring a smooth, informed, and rewarding enrollment experience. By building strong relationships with students and their communities, we create pathways to success for aspiring learners worldwide.
                                    </p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="img-hold">
                                    <img src="{{ asset('assets/images/img28.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-block">
                                    <h2>FREE STUDY ABROAD EXPERT ADVISE</h2>
                                    <form class="row g-3">
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="Enter Exam Title">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control" placeholder="Enter Exam Title">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" class="form-control" placeholder="Email">
                                        </div>
                                        <div class="col-md-6">
                                            <input type="email" class="form-control" placeholder="Email">
                                        </div>
                                        <div class="col-12 text-center">
                                            <button type="submit" class="btn sr-btn">Submit Request</button>
                                        </div>
                                    </form>
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
                            <div class="col-lg-3">
                                <div class="box">
                                    <div class="img-hold">
                                        <img src="{{ asset('assets/images/icon44.svg') }}" alt="">
                                    </div>
                                    <h3>
                                        ONE ON ONE<br>COUNSELING
                                    </h3>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="box">
                                    <div class="img-hold">
                                        <img src="{{ asset('assets/images/icon45.svg') }}" alt="">
                                    </div>
                                    <h3>
                                        ADMISSION<br>ASSESMENT
                                    </h3>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="box">
                                    <div class="img-hold">
                                        <img src="{{ asset('assets/images/icon46.svg') }}" alt="">
                                    </div>
                                    <h3>
                                        VISA<br>GUIDANCE
                                    </h3>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="box">
                                    <div class="img-hold">
                                        <img src="{{ asset('assets/images/icon47.svg') }}" alt="">
                                    </div>
                                    <h3>
                                        IELTS<br>PREPARATION
                                    </h3>
                                </div>
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
												Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry?
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
												Lorem Ipsum&nbsp;is simply dummy text of the printing and typesetting industry?
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
$('.country-slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: false,
            dots: false,
            infinite: true,
            autoplay: false,
            autoplaySpeed: 2500,
            speed: 800,
            centerMode: true,
            centerPadding: '0px',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1
                    }
                }
            ]
        });
</script>
@endpush
