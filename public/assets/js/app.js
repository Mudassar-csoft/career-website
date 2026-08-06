// document.getElementById('navicon').onclick = function() {
//     this.classList.toggle('open');
// }

document.querySelectorAll('.dropdown').forEach(function (dropdown) {
    if (window.innerWidth >= 992) {
        dropdown.addEventListener('mouseenter', function () {
            bootstrap.Dropdown.getOrCreateInstance(
                this.querySelector('.dropdown-toggle')
            ).show();
        });
        dropdown.addEventListener('mouseleave', function () {
            bootstrap.Dropdown.getOrCreateInstance(
                this.querySelector('.dropdown-toggle')
            ).hide();
        });
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

    var msgEl = form.querySelector('.lead-form-message');
    if (!msgEl) {
        msgEl = document.createElement('div');
        msgEl.className = 'lead-form-message';
        msgEl.style.marginTop = '10px';
        msgEl.style.fontSize = '14px';
        form.appendChild(msgEl);
    }

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
            msgEl.textContent = result.data.message || (result.ok ? 'Thank you!' : 'Something went wrong.');
            msgEl.style.color = result.ok ? '#03917a' : '#c53030';
            if (result.ok) {
                form.reset();
            }
        })
        .catch(function () {
            msgEl.textContent = 'Something went wrong. Please try again.';
            msgEl.style.color = '#c53030';
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
    let animationId = null;
    let isScrolling = false;
    // Show / Hide Button
    $(window).on("scroll", function () {
        if ($(this).scrollTop() > 300) {
            $backToTop.addClass("show");
        } else {
            $backToTop.removeClass("show");
        }
    });
    // Stop Animation Function
    function stopScroll() {
        if (animationId) {
            cancelAnimationFrame(animationId);
            animationId = null;
        }
        isScrolling = false;
    }
    // Mouse Wheel Stop
    $(window).on("wheel", function () {
        stopScroll();
    });
    // Touch Stop (Mobile)
    $(window).on("touchmove", function () {
        stopScroll();
    });
    // Keyboard Stop
    $(window).on("keydown", function () {
        stopScroll();
    });
    // Click Anywhere Stop
    $(document).on("click", function (e) {
        // Ignore Back To Top button click
        if ($(e.target).closest("#backToTop").length) {
            return;
        }
        stopScroll();
    });
    // Back To Top Click
    $backToTop.on("click", function (e) {
        e.preventDefault();
        if (isScrolling) return;
        isScrolling = true;
        // ===== SPEED =====
        // 2 = Very Slow
        // 5 = Slow
        // 8 = Medium
        // 15 = Fast
        const speed = 15;
        function animate() {
            if (!isScrolling) return;
            let current = window.pageYOffset;
            if (current <= 0) {
                stopScroll();
                return;
            }
            window.scrollTo(0, current - speed);
            animationId = requestAnimationFrame(animate);
        }
        animationId = requestAnimationFrame(animate);
    });
});