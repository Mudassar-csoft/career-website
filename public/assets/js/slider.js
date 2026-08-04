// news slider start here
if (typeof window.jQuery !== "undefined" && typeof $.fn.slick === "function") {
    if (document.querySelector(".news-slider")) {
        $(".news-slider").slick({
            vertical: true,
            verticalSwiping: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 0,
            speed: 5000,
            cssEase: "linear",
            arrows: false,
            pauseOnHover: true,
            infinite: true
        });
    }
    if (document.querySelector(".event-slider")) {
        $(".event-slider").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            speed: 500,
            cssEase: "linear",
            arrows: true,
            fade: true,
            pauseOnHover: true,
            infinite: true,
        });
    }

    // feature slider start here
    if (document.querySelector(".feature-slider")) {
        $(".feature-slider").slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2500,
            speed: 1200,
            arrows: true,
            cssEase: "linear",
            pauseOnHover: false,
            pauseOnFocus: false,
            waitForAnimate: true,
            infinite: true,
            responsive: [{
				breakpoint: 1400,
				settings: {
					slidesToShow: 3,
                    slidesToScroll: 1,
				}
				},
				{
					breakpoint: 992,
					settings: {
						slidesToShow: 2,
                        slidesToScroll: 1,
					}
				},
				{
					breakpoint: 767,
					settings: {
						slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: true,
                        centerPadding: '100px',
					}
				},
                {
					breakpoint: 575,
					settings: {
						slidesToShow: 1,
                        slidesToScroll: 1,
                        centerMode: true,
                        centerPadding: '15px',
                        arrows:false,
					}
				}
    		]
        });
    }
    $(document).ready(function() {
        const $slider = $(".feature-slider");
        $slider.on("mouseenter", function () {
            $slider.slick("slickPause");
        });
        $slider.on("mouseleave", function () {
            $slider.slick("slickPlay");
        });
    });
    $(document).ready(function() {
        const $slider = $(".feature-slider");
        $(".feature-slider").on("mousedown", ".slick-prev, .slick-next", function () {
            $slider.slick("slickSetOption", "speed", 200, false);
        });
        $(".feature-slider").on("click", ".slick-prev, .slick-next", function () {
            setTimeout(function () {
                $slider.slick("slickSetOption", "speed", 1200, false);
            }, 100);
        });
    });
    // logo slider start here
    if (document.querySelector(".logo-slider")) {
        $(".logo-slider").slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2500,
            speed: 1200,
            cssEase: "ease",
            arrows: true,
            pauseOnHover: true,
            pauseOnFocus: true,
            waitForAnimate: false,
            infinite: true,
            responsive: [{
				breakpoint: 992,
				settings: {
					slidesToShow: 3,
                    slidesToScroll: 1,
				}
				},
				{
					breakpoint: 575,
					settings: {
						slidesToShow: 2,
                        slidesToScroll: 1,
					}
				}
    		]
        });
    }
}

// video slider start here
if (typeof window.Swiper !== "undefined" && document.querySelector(".mySwiper")) {
    new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: false,
        centeredSlides: false,
        loop: true,
        slidesPerView: "auto",
        coverflowEffect: {
            rotate: 30,
            stretch: 0,
            depth: 150,
            modifier: 1,
            slideShadows: false
        },
        speed: 1000,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
        },
        breakpoints: {
            1024: {
                slidesPerView: 3,
                coverflowEffect: {
                    rotate: 30,
                    depth: 150
                }
            },
            768: {
                slidesPerView: 2,
                coverflowEffect: {
                    rotate: 25,
                    depth: 100
                }
            }
        }
    });
}
