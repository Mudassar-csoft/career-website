// news slider start here

$('.news-slider').slick({
    vertical: true,
    verticalSwiping: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 0,
    speed: 5000,
    cssEase: 'linear',
    arrows: false,
    pauseOnHover: true,
    infinite: true
});

// feature slider start here 

$('.feature-slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 0,
    speed: 4000,
    cssEase: 'linear',
    arrows: true,
    pauseOnHover: true,
    infinite: true,
});

// logo slider start here 

$('.logo-slider').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 0,
    speed: 500,
    cssEase: 'linear',
    arrows: true,
    pauseOnHover: true,
    infinite: true,
});

// video slider start here

var swiper = new Swiper(".mySwiper", {
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
        slideShadows: false,
    },
    // Animation Speed
    speed: 1000,
    // Autoplay
    autoplay: {
        delay: 2500,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
    },
    // Responsive
    breakpoints: {
        1024: {
            slidesPerView: 3,
            coverflowEffect: {
                rotate: 30,
                depth: 150,
            }
        },
        768: {
            slidesPerView: 2,
            coverflowEffect: {
                rotate: 25,
                depth: 100,
            }
        },
    }
});