// document.getElementById('navicon').onclick = function() {
//     this.classList.toggle('open');
// }

// document.querySelectorAll('.dropdown').forEach(function (dropdown) {
//     if (window.innerWidth >= 992) {
//         dropdown.addEventListener('mouseenter', function () {
//             bootstrap.Dropdown.getOrCreateInstance(
//                 this.querySelector('.dropdown-toggle')
//             ).show();
//         });
//         dropdown.addEventListener('mouseleave', function () {
//             bootstrap.Dropdown.getOrCreateInstance(
//                 this.querySelector('.dropdown-toggle')
//             ).hide();
//         });
//     }
// });

document.querySelectorAll(".dropdown").forEach(function (dropdown) {
    const toggle = dropdown.querySelector(".dropdown-toggle");
    if (!toggle) return;
    const dropdownInstance =
        bootstrap.Dropdown.getOrCreateInstance(toggle);

    let hideTimeout;
    // =========================
    // DESKTOP - 992px+
    // =========================
    function enableDesktopHover() {
        dropdown.addEventListener("mouseenter", showDropdown);
        dropdown.addEventListener("mouseleave", hideDropdown);
    }
    function disableDesktopHover() {
        dropdown.removeEventListener("mouseenter", showDropdown);
        dropdown.removeEventListener("mouseleave", hideDropdown);
        clearTimeout(hideTimeout);
    }
    function showDropdown() {
        clearTimeout(hideTimeout);
        dropdownInstance.show();
    }
    function hideDropdown() {
        clearTimeout(hideTimeout);
        hideTimeout = setTimeout(function () {
            // Agar mouse dropdown ke andar nahi hai
            if (!dropdown.matches(":hover")) {
                dropdownInstance.hide();
            }
        }, 100);
    }
    // =========================
    // CHECK SCREEN SIZE
    // =========================
    function checkDropdownMode() {
        if (window.innerWidth >= 992) {
            enableDesktopHover();
        } else {
            disableDesktopHover();
        }
    }
    checkDropdownMode();
    // Resize hone par dobara check
    window.addEventListener("resize", function () {
        disableDesktopHover();
        if (window.innerWidth >= 992) {
            enableDesktopHover();
        }
    });
});


function showLeadFeedback(form, isSuccess, message) {
    var modalEl = document.getElementById('leadFeedbackModal');
    var titleEl = document.getElementById('leadFeedbackTitle');
    var messageEl = document.getElementById('leadFeedbackMessage');
    var iconEl = document.getElementById('leadFeedbackIcon');

    if (!modalEl || !titleEl || !messageEl || typeof bootstrap === 'undefined') {
        return;
    }

    titleEl.textContent = isSuccess ? 'Request Submitted' : 'Unable to Submit Request';
    messageEl.textContent = message;
    modalEl.classList.toggle('is-error', !isSuccess);
    if (iconEl) {
        iconEl.classList.toggle('is-error', !isSuccess);
        iconEl.innerHTML = isSuccess
            ? '<i class="fas fa-check"></i>'
            : '<i class="fas fa-exclamation"></i>';
    }

    var showFeedback = function () {
        new bootstrap.Modal(modalEl).show();
    };
    var parentModal = form.closest('.modal');

    if (parentModal && parentModal.classList.contains('show')) {
        parentModal.addEventListener('hidden.bs.modal', showFeedback, { once: true });
        bootstrap.Modal.getOrCreateInstance(parentModal).hide();
        return;
    }

    showFeedback();
}

document.addEventListener('show.bs.modal', function (event) {
    var modal = event.target;
    var trigger = event.relatedTarget;

    if (!trigger || (modal.id !== 'enroll-modal' && modal.id !== 'brochure-modal')) {
        return;
    }

    var course = trigger.getAttribute('data-course');
    var courseInput = modal.querySelector('input[name="course"]');

    if (course && courseInput) {
        courseInput.value = course;
    }
});

document.addEventListener('submit', function (e) {
    var form = e.target;
    if (!form.classList || !form.classList.contains('lead-form')) {
        return;
    }
    e.preventDefault();

    var tokenMeta = document.querySelector('meta[name="csrf-token"]');
    var submitBtn = form.querySelector('[type="submit"]');

    if (submitBtn) {
        submitBtn.disabled = true;
    }

    fetch(form.getAttribute('action') || '/subscribe', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': tokenMeta ? tokenMeta.getAttribute('content') : '',
            'Accept': 'application/json',
        },
        body: new FormData(form),
    })
        .then(function (response) {
            return response.json().then(function (data) {
                return { ok: response.ok, data: data };
            });
        })
        .then(function (result) {
            var message = result.data.message || (result.ok ? 'Thank you!' : 'Something went wrong.');
            if (result.ok) {
                form.reset();
            }
            showLeadFeedback(form, result.ok, message);
        })
        .catch(function () {
            showLeadFeedback(form, false, 'Something went wrong. Please try again.');
        })
        .finally(function () {
            if (submitBtn) {
                submitBtn.disabled = false;
            }
        });
});

// top scrool button code start here

$(document).ready(function () {
    const $backToTop = $("#backToTop");
    let scrollAnimationId = null;
    $(window).on("scroll", function () {
        $backToTop.toggleClass("show", $(this).scrollTop() > 300);
    });
    function stopScrollAnimation() {
        if (scrollAnimationId) {
            cancelAnimationFrame(scrollAnimationId);
            scrollAnimationId = null;
        }
    }
    function easeInOutCubic(progress) {
        return progress < 0.5
            ? 4 * progress * progress * progress
            : 1 - Math.pow(-2 * progress + 2, 3) / 2;
    }
    $(window).on("wheel keydown", stopScrollAnimation);
    $backToTop.on("click", function (e) {
        e.preventDefault();
        stopScrollAnimation();
        const start = window.pageYOffset || document.documentElement.scrollTop;
        if (start <= 0) {
            return;
        }
        const duration = 600;
        let startTime = null;
        function animateScroll(currentTime) {
            if (startTime === null) {
                startTime = currentTime;
            }
            const progress = Math.min((currentTime - startTime) / duration, 1);
            window.scrollTo(0, start * (1 - easeInOutCubic(progress)));
            if (progress < 1) {
                scrollAnimationId = requestAnimationFrame(animateScroll);
            } else {
                scrollAnimationId = null;
            }
        }
        scrollAnimationId = requestAnimationFrame(animateScroll);
    });
});
