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