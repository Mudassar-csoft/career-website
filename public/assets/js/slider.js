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

    // feature slider start here
    if (document.querySelector(".feature-slider")) {
        $(".feature-slider").slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 0,
            speed: 4000,
            cssEase: "linear",
            arrows: true,
            pauseOnHover: true,
            infinite: true
        });
    }

    // logo slider start here
    if (document.querySelector(".logo-slider")) {
        $(".logo-slider").slick({
            slidesToShow: 5,
            slidesToScroll: 1,
            autoplay: false,
            autoplaySpeed: 0,
            speed: 500,
            cssEase: "linear",
            arrows: true,
            pauseOnHover: true,
            infinite: true
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
        // speed: 1000,
        // autoplay: {
        //     delay: 2500,
        //     disableOnInteraction: false,
        //     pauseOnMouseEnter: true
        // },
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
