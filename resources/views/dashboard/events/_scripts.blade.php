<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<script>
(function () {
    if (window.ClassicEditor) {
        var descriptionEl = document.querySelector('#event-description');
        if (descriptionEl) {
            ClassicEditor.create(descriptionEl).catch(function (error) {
                console.error(error);
            });
        }
    }

    var titleInput = document.getElementById('event-title');
    var slugInput = document.getElementById('event-slug');
    if (titleInput && slugInput) {
        var slugTouched = slugInput.value.length > 0;
        slugInput.addEventListener('input', function () {
            slugTouched = true;
        });
        titleInput.addEventListener('input', function () {
            if (slugTouched) {
                return;
            }
            slugInput.value = titleInput.value
                .toLowerCase()
                .trim()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/(^-|-$)/g, '');
        });
    }

    var isPaidSelect = document.getElementById('event-is-paid');
    var feeAmountGroup = document.getElementById('event-fee-amount-group');
    if (isPaidSelect && feeAmountGroup) {
        isPaidSelect.addEventListener('change', function () {
            feeAmountGroup.style.display = isPaidSelect.value === '1' ? '' : 'none';
        });
    }

    var seatLimitSelect = document.getElementById('event-has-seat-limit');
    var seatLimitGroup = document.getElementById('event-seat-limit-group');
    if (seatLimitSelect && seatLimitGroup) {
        seatLimitSelect.addEventListener('change', function () {
            seatLimitGroup.style.display = seatLimitSelect.value === '1' ? '' : 'none';
        });
    }

    var categoryModal = document.getElementById('event-category-modal');
    var categoryAddBtn = document.getElementById('event-category-add-btn');
    var categoryCancelBtn = document.getElementById('event-category-cancel');
    var categorySaveBtn = document.getElementById('event-category-save');
    var categoryNameInput = document.getElementById('event-category-name');
    var categoryError = document.getElementById('event-category-error');
    var categorySelect = document.getElementById('event-category');

    if (categoryModal && categoryAddBtn) {
        function openCategoryModal() {
            categoryModal.classList.add('open');
            categoryError.style.display = 'none';
            categoryNameInput.value = '';
            categoryNameInput.focus();
        }

        function closeCategoryModal() {
            categoryModal.classList.remove('open');
        }

        categoryAddBtn.addEventListener('click', openCategoryModal);
        categoryCancelBtn.addEventListener('click', closeCategoryModal);
        categoryModal.addEventListener('click', function (e) {
            if (e.target === categoryModal) {
                closeCategoryModal();
            }
        });

        categorySaveBtn.addEventListener('click', function () {
            var name = categoryNameInput.value.trim();
            if (!name) {
                categoryError.textContent = 'Please enter a category name.';
                categoryError.style.display = 'block';
                return;
            }

            fetch('{{ route('dashboard.events.categories.store') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                },
                body: JSON.stringify({ name: name }),
            })
                .then(function (response) {
                    if (!response.ok) {
                        return response.json().then(function (data) {
                            throw new Error(data.message || 'Could not save this category.');
                        });
                    }
                    return response.json();
                })
                .then(function (category) {
                    var option = document.createElement('option');
                    option.value = category.id;
                    option.textContent = category.name;
                    option.selected = true;
                    categorySelect.appendChild(option);
                    closeCategoryModal();
                })
                .catch(function (error) {
                    categoryError.textContent = error.message;
                    categoryError.style.display = 'block';
                });
        });
    }
})();
</script>
