@csrf

<div class="dash-form-row">
    <div class="dash-form-group">
        <label for="course-title">Course Title</label>
        <input type="text" id="course-title" name="title" value="{{ old('title', $course->title) }}" required>
        @error('title')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>
    <div class="dash-form-group">
        <label for="course-subtitle">Sub Title</label>
        <input type="text" id="course-subtitle" name="subtitle" value="{{ old('subtitle', $course->subtitle) }}">
        @error('subtitle')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="dash-form-row">
    <div class="dash-form-group">
        <label for="course-slug">Slug</label>
        <input type="text" id="course-slug" name="slug" value="{{ old('slug', $course->slug) }}" required>
        <p class="dash-form-hint">Auto-filled from the title — edit if needed.</p>
        @error('slug')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>
    <div class="dash-form-group">
        <label for="course-duration">Duration (Weeks)</label>
        <input type="number" id="course-duration" name="duration_weeks" min="1" value="{{ old('duration_weeks', $course->duration_weeks) }}" placeholder="e.g. 12">
        @error('duration_weeks')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="dash-form-group">
    <label for="course-image">Course Image</label>
    <input
        type="file"
        id="course-image"
        name="image"
        accept="{{ \App\Support\DashboardImageUpload::ACCEPT_ATTRIBUTE }}"
        data-dashboard-image-upload
        data-allowed-extensions="{{ implode(',', \App\Support\DashboardImageUpload::ALLOWED_EXTENSIONS) }}"
        data-max-size-kb="{{ \App\Support\DashboardImageUpload::MAX_FILE_SIZE_KB }}"
    >
    @if ($course->image)
        <img
            class="dash-image-preview"
            style="display:block;"
            src="{{ $course->image_url }}"
            alt="{{ $course->title }}"
            onerror="this.src='{{ asset('assets/images/img03.png') }}'; this.onerror=null;"
        >
    @endif
    <img id="course-image-preview" class="dash-image-preview" alt="Preview">
    <p class="dash-form-hint">Optional. Leave empty to use the default course image on the website. {{ \App\Support\DashboardImageUpload::HINT }}</p>
    @error('image')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>

<div class="dash-form-row">
    <div class="dash-form-group">
        <label for="course-category">Category</label>
        <select id="course-category" name="course_category_id" required>
            <option value="">Select a category</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" @selected(old('course_category_id', $course->course_category_id) == $category->id)>{{ $category->name }}</option>
            @endforeach
        </select>
        @error('course_category_id')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>
    <div class="dash-form-group">
        <label for="course-mode">Mode</label>
        <div class="dash-type-row">
            <select id="course-mode" name="course_mode_id" required>
                <option value="">Select a mode</option>
                @foreach ($modes as $mode)
                    <option value="{{ $mode->id }}" @selected(old('course_mode_id', $course->course_mode_id) == $mode->id)>{{ $mode->name }}</option>
                @endforeach
            </select>
            <button type="button" class="dash-icon-btn-add" id="course-mode-add-btn" aria-label="Add mode">+</button>
        </div>
        @error('course_mode_id')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="dash-form-row">
    <div class="dash-form-group">
        <label for="course-certificate">Certificate</label>
        <select id="course-certificate" name="has_certificate" required>
            <option value="1" @selected(old('has_certificate', $course->has_certificate ?? true) == 1)>Include Certificate</option>
            <option value="0" @selected(old('has_certificate', $course->has_certificate ?? true) == 0)>Exclude Certificate</option>
        </select>
        @error('has_certificate')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>
    <div class="dash-form-group">
        <label for="course-featured">Featured</label>
        <select id="course-featured" name="is_featured" required>
            <option value="1" @selected(old('is_featured', $course->is_featured ?? false) == 1)>Featured</option>
            <option value="0" @selected(old('is_featured', $course->is_featured ?? false) == 0)>Not Featured</option>
        </select>
        @error('is_featured')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="dash-form-group">
    <label for="course-about">About This Course</label>
    <textarea id="course-about" name="about" rows="8">{{ old('about', $course->about) }}</textarea>
    @error('about')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>

@php
    $whatYouWillLearn = old('what_you_will_learn', $course->what_you_will_learn ?? []);
    if (empty($whatYouWillLearn)) {
        $whatYouWillLearn = [''];
    }
@endphp
<div class="dash-form-group">
    <label>What You'll Learn</label>
    <div class="dash-repeater" id="wyl-repeater">
        @foreach ($whatYouWillLearn as $item)
            <div class="dash-repeater-row">
                <input type="text" name="what_you_will_learn[]" value="{{ $item }}" placeholder="e.g. Understand Digital Marketing Fundamentals">
                <button type="button" class="dash-repeater-remove" aria-label="Remove item">&times;</button>
            </div>
        @endforeach
    </div>
    <button type="button" class="dash-btn dash-btn-secondary dash-repeater-add" data-target="wyl-repeater" data-name="what_you_will_learn[]" data-placeholder="e.g. Keyword Research &amp; Competitor Analysis">+ Add Item</button>
    @error('what_you_will_learn.*')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>

@php
    $toolsTechnology = old('tools_technology', $course->tools_technology ?? []);
    if (empty($toolsTechnology)) {
        $toolsTechnology = [''];
    }
@endphp
<div class="dash-form-group">
    <label>Tools &amp; Technology</label>
    <div class="dash-repeater" id="tt-repeater">
        @foreach ($toolsTechnology as $item)
            <div class="dash-repeater-row">
                <input type="text" name="tools_technology[]" value="{{ $item }}" placeholder="e.g. Google Analytics">
                <button type="button" class="dash-repeater-remove" aria-label="Remove item">&times;</button>
            </div>
        @endforeach
    </div>
    <button type="button" class="dash-btn dash-btn-secondary dash-repeater-add" data-target="tt-repeater" data-name="tools_technology[]" data-placeholder="e.g. Google Analytics">+ Add Item</button>
    @error('tools_technology.*')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>

@php
    $courseIncludes = old('course_includes', $course->course_includes ?? []);
    if (empty($courseIncludes)) {
        $courseIncludes = [''];
    }
@endphp
<div class="dash-form-group">
    <label>This Course Includes</label>
    <div class="dash-repeater" id="ci-repeater">
        @foreach ($courseIncludes as $item)
            <div class="dash-repeater-row">
                <input type="text" name="course_includes[]" value="{{ $item }}" placeholder="e.g. 36+ Hours On Demand Video">
                <button type="button" class="dash-repeater-remove" aria-label="Remove item">&times;</button>
            </div>
        @endforeach
    </div>
    <button type="button" class="dash-btn dash-btn-secondary dash-repeater-add" data-target="ci-repeater" data-name="course_includes[]" data-placeholder="e.g. Certificate of Completion">+ Add Item</button>
    @error('course_includes.*')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>

@php
    $curriculum = old('curriculum', $course->curriculum ?? []);
@endphp
<div class="dash-form-group">
    <label>Course Curriculum</label>
    <p class="dash-form-hint">Enter how many lectures this course has and click Generate, then fill in each lecture. Use "+ Add Lecture" to add more anytime.</p>
    <div class="dash-curriculum-toolbar">
        <div class="dash-form-group dash-curriculum-count">
            <label for="course-lecture-count">No. of Lectures</label>
            <input type="number" id="course-lecture-count" min="1" placeholder="e.g. 10">
        </div>
        <div class="dash-curriculum-toolbar-actions">
            <button type="button" class="dash-btn dash-btn-secondary" id="course-generate-lectures">Generate Lectures</button>
            <button type="button" class="dash-btn dash-btn-secondary" id="course-add-lecture">+ Add Lecture</button>
        </div>
    </div>

    <div id="course-curriculum-list" data-next-index="{{ count($curriculum) }}">
        @foreach ($curriculum as $i => $lecture)
            <div class="dash-curriculum-item">
                <div class="dash-curriculum-item-head">
                    <strong class="dash-curriculum-item-title">Lecture {{ $i + 1 }}</strong>
                    <button type="button" class="dash-btn dash-btn-danger dash-curriculum-remove" style="padding:4px 10px;font-size:12px;">Remove</button>
                </div>
                <div class="dash-form-group">
                    <label>Lecture Title</label>
                    <input type="text" name="curriculum[{{ $i }}][title]" value="{{ $lecture['title'] ?? '' }}">
                </div>
                <div class="dash-form-group" style="margin-bottom: 0;">
                    <label>Lecture Content</label>
                    <textarea name="curriculum[{{ $i }}][content]" rows="3">{{ $lecture['content'] ?? '' }}</textarea>
                </div>
            </div>
        @endforeach
    </div>
    @error('curriculum')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>

<div class="dash-form-group" style="margin-top:8px;padding-top:24px;border-top:1px solid #eef1f4;">
    <label style="font-size:15px;">SEO Settings</label>
    <p class="dash-form-hint">Controls how this course appears in search engine results. Leave blank to use sensible defaults.</p>
</div>

<div class="dash-form-group">
    <label for="course-meta-title">Meta Title</label>
    <input type="text" id="course-meta-title" name="meta_title" value="{{ old('meta_title', $course->meta_title) }}" maxlength="255" placeholder="Defaults to the course title if left blank">
    @error('meta_title')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>

<div class="dash-form-group">
    <label for="course-meta-description">Meta Description</label>
    <textarea id="course-meta-description" name="meta_description" rows="3" maxlength="500" placeholder="Shown under the title in search results — aim for 150-160 characters.">{{ old('meta_description', $course->meta_description) }}</textarea>
    @error('meta_description')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>

<div class="dash-form-group">
    <label for="course-meta-keywords">Meta Keywords</label>
    <input type="text" id="course-meta-keywords" name="meta_keywords" value="{{ old('meta_keywords', $course->meta_keywords) }}" placeholder="Comma-separated, e.g. digital marketing course, seo training, career institute">
    @error('meta_keywords')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>
