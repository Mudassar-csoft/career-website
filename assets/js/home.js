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
const popupVideoPlayer = document.getElementById("popupVideoPlayer");
const popupVideo = document.getElementById("popupVideo");
const popupVideoSource = popupVideo?.querySelector("source");
const popupVideoEmbed = document.getElementById("popupVideoEmbed");
const popupVideoFrame = document.getElementById("popupVideoFrame");

function getYouTubeEmbedUrl(url) {
    try {
        const parsedUrl = new URL(url, window.location.origin);
        const host = parsedUrl.hostname.replace(/^www\./, "");
        let videoId = "";

        if (host === "youtu.be") {
            videoId = parsedUrl.pathname.replace(/^\/+/, "");
        } else if (host.endsWith("youtube.com")) {
            videoId = parsedUrl.searchParams.get("v") || "";

            if (!videoId) {
                const pathSegments = parsedUrl.pathname.split("/").filter(Boolean);

                if (pathSegments[0] === "embed" || pathSegments[0] === "shorts") {
                    videoId = pathSegments[1] || "";
                }
            }
        }

        return videoId ? `https://www.youtube.com/embed/${videoId}?autoplay=1&rel=0` : null;
    } catch (error) {
        return null;
    }
}

function resetVideoModal() {
    if (popupVideo) {
        popupVideo.pause();
        popupVideo.currentTime = 0;
    }

    if (popupVideoSource) {
        popupVideoSource.setAttribute("src", "");
    }

    if (popupVideo) {
        popupVideo.load();
    }

    popupVideoFrame?.setAttribute("src", "");
    popupVideoPlayer?.classList.add("d-none");
    popupVideoEmbed?.classList.add("d-none");
}

if (typeof window.jQuery !== "undefined") {
    $(".play-btn").on("click", function () {
        const videoURL = $(this).data("video");
        const modalElement = document.getElementById("videoModal");
        const youtubeEmbedUrl = getYouTubeEmbedUrl(videoURL);

        if (!videoURL || !modalElement || !window.bootstrap?.Modal) {
            return;
        }

        resetVideoModal();

        if (youtubeEmbedUrl && popupVideoFrame && popupVideoEmbed) {
            popupVideoFrame.setAttribute("src", youtubeEmbedUrl);
            popupVideoEmbed.classList.remove("d-none");
        } else if (popupVideo && popupVideoSource && popupVideoPlayer) {
            popupVideoSource.setAttribute("src", videoURL);
            popupVideoPlayer.classList.remove("d-none");
            popupVideo.load();
            popupVideo.play().catch(() => {});
        } else {
            return;
        }

        window.bootstrap.Modal.getOrCreateInstance(modalElement).show();
    });
}

const videoModal = document.getElementById("videoModal");

if (videoModal) {
    videoModal.addEventListener("hidden.bs.modal", resetVideoModal);
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
