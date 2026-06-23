// counter slider start here
const counters = document.querySelectorAll(".counter");
counters.forEach(counter => {
    const target = +counter.dataset.target;
    let current = 0;
    const speed = target / 80;

    function count() {
        current += speed;
        if (current < target) {
            counter.textContent = Math.floor(current).toLocaleString() + "+";
            requestAnimationFrame(count);
        } else {
            counter.textContent = target.toLocaleString() + "+";
        }
    }
    count();
});

// video slider code 

$('.play-btn').on('click', function() {
    let videoURL = $(this).data('video');
    $('#popupVideo source').attr('src', videoURL);
    let video = $('#popupVideo')[0];
    video.load();
    video.play();
    $('#videoModal').modal('show');
});
$('#videoModal').on('hidden.bs.modal', function() {
    let video = $('#popupVideo')[0];
    video.pause();
    video.currentTime = 0;
    $('#popupVideo source').attr('src', '');
});

// garllery Js code here


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
            "assets/images/img14.png",
            "assets/images/img15.png"
        ],
        campus: [
            "assets/images/campus1.png"
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


// circle round js code


const outerOrbit = document.querySelector('.orbit-outer');
const innerOrbit = document.querySelector('.orbit-inner');
outerOrbit.style.animationDuration = "40s";
innerOrbit.style.animationDuration = "30s";