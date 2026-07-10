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


// circle round js code


const outerOrbit = document.querySelector('.orbit-outer');
const innerOrbit = document.querySelector('.orbit-inner');
outerOrbit.style.animationDuration = "40s";
innerOrbit.style.animationDuration = "30s";