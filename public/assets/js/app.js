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