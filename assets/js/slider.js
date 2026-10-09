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
            autoplaySpeed: 1800,
            speed: 1000,
            arrows: true,
            cssEase: "linear",
            pauseOnHover: false,
            pauseOnFocus: false,
            waitForAnimate: true,
            infinite: true,
            responsive: [{
				breakpoint: 1400,
				settings: {
					slidesToShow: 4,
                    slidesToScroll: 1,
				}
				},
				{
					breakpoint: 1280,
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
                        arrows: false,
					}
				}
    		]
        });
    }
}

// video slider start here
if (typeof window.Swiper !== "undefined") {
    document.querySelectorAll(".video-block .mySwiper").forEach(function (swiperEl) {
        swiperEl.querySelectorAll(".swiper-slide").forEach(function (slide) {
            slide.style.removeProperty("opacity");
            slide.style.removeProperty("visibility");
            slide.style.removeProperty("pointer-events");
        });

        new Swiper(swiperEl, {
            effect: "coverflow",
            grabCursor: true,
            centeredSlides: true,
            slidesPerView: 3,
            spaceBetween: 20,
            loop: true,
            speed: 1000,
            watchOverflow: true,
            watchSlidesProgress: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            },
            coverflowEffect: {
                rotate: 20,
                stretch: -20,
                depth: 120,
                modifier: 1,
                slideShadows: false
            },
            breakpoints: {
                0: {
                    slidesPerView: 1,
                    centeredSlides: true,
                    spaceBetween: 12,
                    coverflowEffect: {
                        rotate: 0,
                        stretch: 0,
                        depth: 0
                    }
                },
                768: {
                    slidesPerView: 2,
                    centeredSlides: false,
                    spaceBetween: 16,
                    coverflowEffect: {
                        rotate: 0,
                        stretch: 0,
                        depth: 0
                    }
                },
                992: {
                    slidesPerView: 3,
                    centeredSlides: true,
                    spaceBetween: 20,
                    coverflowEffect: {
                        rotate: 20,
                        stretch: -20,
                        depth: 120
                    }
                }
            }
        });
    });
}
