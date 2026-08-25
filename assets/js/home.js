// counter slider start here
const counters = document.querySelectorAll(".counter");

counters.forEach((counter) => {
    const target = Number(counter.dataset.target || 0);
    let current = 0;
    const speed = target / 80;

    function count() {
        current += speed;

        if (current < target) {
            counter.textContent = Math.floor(current).toLocaleString() + "+";
            requestAnimationFrame(count);
            return;
        }

        counter.textContent = target.toLocaleString() + "+";
    }

    count();
});

// video slider code
if (typeof window.jQuery !== "undefined") {
    $(".play-btn").on("click", function () {
        const videoURL = $(this).data("video");
        const video = $("#popupVideo")[0];
        const modalElement = document.getElementById("videoModal");

        if (!video || !videoURL || !modalElement || !window.bootstrap?.Modal) {
            return;
        }

        $("#popupVideo source").attr("src", videoURL);
        video.load();
        video.play();
        window.bootstrap.Modal.getOrCreateInstance(modalElement).show();
    });
}

const videoModal = document.getElementById("videoModal");

if (videoModal) {
    videoModal.addEventListener("hidden.bs.modal", function () {
        const video = document.getElementById("popupVideo");

        if (!video) {
            return;
        }

        video.pause();
        video.currentTime = 0;
        const source = video.querySelector("source");
        if (source) {
            source.setAttribute("src", "");
        }
        video.load();
    });
}

// circle round js code
const outerOrbit = document.querySelector(".orbit-outer");
const innerOrbit = document.querySelector(".orbit-inner");

if (outerOrbit) {
    outerOrbit.style.animationDuration = "40s";
}

if (innerOrbit) {
    innerOrbit.style.animationDuration = "30s";
}
