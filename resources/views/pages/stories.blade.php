@extends('layouts.app')
@section('title', 'Success Stories | Career Website')
@section('body_class', 'ss-page')
@section('content')
<section class="particle-section">

    <div id="particles-js"></div>

    <div class="particle-content">
        <h1>Success Stories</h1>
        <p>
            Discover the success stories of our students.
        </p>
    </div>

</section>
<section class="soical-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Keep in Touch</h2>
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
<script src="https://cdn.jsdelivr.net/npm/particles.js@2.0.0/particles.min.js"></script>
<script>
    particlesJS("particles-js", {
        particles: {
            number: {
                value: 150,
                density: {
                    enable: true,
                    value_area: 800
                }
            },
            color: {
                value: "#fff"
            },
            shape: {
                type: "circle"
            },
            opacity: {
                value: 0.5,
                random: true
            },
            size: {
                value: 5,
                random: true
            },
            line_linked: {
                enable: true,
                distance: 180,
                color: "#fff",
                opacity: 0.4,
                width: 1
            },
            move: {
                enable: true,
                speed: 2.5,
                direction: "none",
                random: false,
                straight: false,
                out_mode: "out",
                bounce: false
            }
        },
        interactivity: {
            detect_on: "canvas",
            events: {
                onhover: {
                    enable: true,
                    mode: "grab"
                },
                onclick: {
                    enable: true,
                    mode: "push"
                },
                resize: true
            },
            modes: {
                grab: {
                    distance: 180,
                    line_linked: {
                        opacity: 0.7
                    }
                },
                push: {
                    particles_nb: 4
                }
            }
        },
        retina_detect: true

    });
</script>
@endpush