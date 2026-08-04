<script src="https://cdn.ckeditor.com/ckeditor5/41.3.1/classic/ckeditor.js"></script>
<script>
(function () {
    if (window.ClassicEditor) {
        var aboutEl = document.querySelector('#course-about');
        if (aboutEl) {
            ClassicEditor.create(aboutEl).catch(function (error) {
                console.error(error);
            });
        }
    }

    var titleInput = document.getElementById('course-title');
    var slugInput = document.getElementById('course-slug');
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

    document.querySelectorAll('.dash-repeater-add').forEach(function (btn) {
        btn.addEventListener('click', function () {
            var target = document.getElementById(btn.dataset.target);
            var row = document.createElement('div');
            row.className = 'dash-repeater-row';
            row.innerHTML = '<input type="text" name="' + btn.dataset.name + '" placeholder="' + (btn.dataset.placeholder || '') + '">' +
                '<button type="button" class="dash-repeater-remove" aria-label="Remove item">&times;</button>';
            target.appendChild(row);
            row.querySelector('input').focus();
        });
    });

    document.querySelectorAll('.dash-repeater').forEach(function (repeater) {
        repeater.addEventListener('click', function (e) {
            var removeBtn = e.target.closest('.dash-repeater-remove');
            if (!removeBtn) {
                return;
            }
            var row = removeBtn.closest('.dash-repeater-row');
            if (repeater.querySelectorAll('.dash-repeater-row').length > 1) {
                row.remove();
            } else {
                row.querySelector('input').value = '';
            }
        });
    });

    var curriculumList = document.getElementById('course-curriculum-list');
    var lectureCountInput = document.getElementById('course-lecture-count');
    var generateBtn = document.getElementById('course-generate-lectures');
    var addLectureBtn = document.getElementById('course-add-lecture');

    function renumberLectures() {
        curriculumList.querySelectorAll('.dash-curriculum-item').forEach(function (item, idx) {
            item.querySelector('.dash-curriculum-item-title').textContent = 'Lecture ' + (idx + 1);
        });
    }

    function nextIndex() {
        var next = parseInt(curriculumList.dataset.nextIndex || '0', 10);
        curriculumList.dataset.nextIndex = next + 1;
        return next;
    }

    function addLecture() {
        var index = nextIndex();
        var item = document.createElement('div');
        item.className = 'dash-curriculum-item';
        item.innerHTML =
            '<div class="dash-curriculum-item-head">' +
                '<strong class="dash-curriculum-item-title">Lecture</strong>' +
                '<button type="button" class="dash-btn dash-btn-danger dash-curriculum-remove" style="padding:4px 10px;font-size:12px;">Remove</button>' +
            '</div>' +
            '<div class="dash-form-group">' +
                '<label>Lecture Title</label>' +
                '<input type="text" name="curriculum[' + index + '][title]">' +
            '</div>' +
            '<div class="dash-form-group" style="margin-bottom:0;">' +
                '<label>Lecture Content</label>' +
                '<textarea name="curriculum[' + index + '][content]" rows="3"></textarea>' +
            '</div>';
        curriculumList.appendChild(item);
        renumberLectures();
    }

    if (generateBtn) {
        generateBtn.addEventListener('click', function () {
            var count = parseInt(lectureCountInput.value, 10);
            if (!count || count < 1) {
                lectureCountInput.focus();
                return;
            }
            curriculumList.innerHTML = '';
            curriculumList.dataset.nextIndex = '0';
            for (var i = 0; i < count; i++) {
                addLecture();
            }
        });
    }

    if (addLectureBtn) {
        addLectureBtn.addEventListener('click', addLecture);
    }

    if (curriculumList) {
        curriculumList.addEventListener('click', function (e) {
            var removeBtn = e.target.closest('.dash-curriculum-remove');
            if (!removeBtn) {
                return;
            }
            removeBtn.closest('.dash-curriculum-item').remove();
            renumberLectures();
        });
    }

    function wireAddModal(config) {
        var modal = document.getElementById(config.modal);
        var addBtn = document.getElementById(config.addBtn);
        var cancelBtn = document.getElementById(config.cancelBtn);
        var saveBtn = document.getElementById(config.saveBtn);
        var nameInput = document.getElementById(config.nameInput);
        var errorEl = document.getElementById(config.errorEl);
        var select = document.getElementById(config.select);

        if (!modal || !addBtn) {
            return;
        }

        function open() {
            modal.classList.add('open');
            errorEl.style.display = 'none';
            nameInput.value = '';
            nameInput.focus();
        }

        function close() {
            modal.classList.remove('open');
        }

        addBtn.addEventListener('click', open);
        cancelBtn.addEventListener('click', close);
        modal.addEventListener('click', function (e) {
            if (e.target === modal) {
                close();
            }
        });

        saveBtn.addEventListener('click', function () {
            var name = nameInput.value.trim();
            if (!name) {
                errorEl.textContent = 'Please enter a name.';
                errorEl.style.display = 'block';
                return;
            }

            fetch(config.url, {
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
                            throw new Error(data.message || 'Could not save this item.');
                        });
                    }
                    return response.json();
                })
                .then(function (item) {
                    var option = document.createElement('option');
                    option.value = item.id;
                    option.textContent = item.name;
                    option.selected = true;
                    select.appendChild(option);
                    close();
                })
                .catch(function (error) {
                    errorEl.textContent = error.message;
                    errorEl.style.display = 'block';
                });
        });
    }

    wireAddModal({
        modal: 'course-category-modal',
        addBtn: 'course-category-add-btn',
        cancelBtn: 'course-category-cancel',
        saveBtn: 'course-category-save',
        nameInput: 'course-category-name',
        errorEl: 'course-category-error',
        select: 'course-category',
        url: '{{ route('dashboard.courses.categories.store') }}',
    });

    wireAddModal({
        modal: 'course-mode-modal',
        addBtn: 'course-mode-add-btn',
        cancelBtn: 'course-mode-cancel',
        saveBtn: 'course-mode-save',
        nameInput: 'course-mode-name',
        errorEl: 'course-mode-error',
        select: 'course-mode',
        url: '{{ route('dashboard.courses.modes.store') }}',
    });
})();
</script>
