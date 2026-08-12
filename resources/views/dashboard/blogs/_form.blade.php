@csrf

<div class="dash-form-row">
    <div class="dash-form-group">
        <label for="blog-title">Title</label>
        <input type="text" id="blog-title" name="title" value="{{ old('title', $blog->title) }}" required>
        @error('title')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>
    <div class="dash-form-group">
        <label for="blog-slug">Slug</label>
        <input type="text" id="blog-slug" name="slug" value="{{ old('slug', $blog->slug) }}" required>
        <p class="dash-form-hint">Auto-filled from the title — edit if needed.</p>
        @error('slug')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>
</div>

<div class="dash-form-group">
    <label for="blog-excerpt">Excerpt</label>
    <input type="text" id="blog-excerpt" name="excerpt" value="{{ old('excerpt', $blog->excerpt) }}" placeholder="Short summary shown on the blog card" maxlength="255">
    @error('excerpt')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>

<div class="dash-form-group">
    <label for="blog-image">Image</label>
    <input type="file" id="blog-image" name="image" accept="image/*">
    @if ($blog->image)
        <img class="dash-image-preview" style="display:block;" src="{{ asset('storage/'.$blog->image) }}" alt="{{ $blog->title }}">
    @endif
    <img id="blog-image-preview" class="dash-image-preview" alt="Preview">
    @error('image')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>

<div class="dash-form-group">
    <label for="blog-content">Content</label>
    <textarea id="blog-content" name="content" rows="10">{{ old('content', $blog->content) }}</textarea>
    @error('content')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>

<div class="dash-form-group" style="margin-top:8px;padding-top:24px;border-top:1px solid #eef1f4;">
    <label style="font-size:15px;">SEO Settings</label>
    <p class="dash-form-hint">Controls how this blog post appears in search engine results. Leave blank to use sensible defaults.</p>
</div>

<div class="dash-form-group">
    <label for="blog-meta-title">Meta Title</label>
    <input type="text" id="blog-meta-title" name="meta_title" value="{{ old('meta_title', $blog->meta_title) }}" maxlength="255" placeholder="Defaults to the blog title if left blank">
    @error('meta_title')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>

<div class="dash-form-group">
    <label for="blog-meta-description">Meta Description</label>
    <textarea id="blog-meta-description" name="meta_description" rows="3" maxlength="500" placeholder="Shown under the title in search results — aim for 150-160 characters. Defaults to the excerpt if left blank.">{{ old('meta_description', $blog->meta_description) }}</textarea>
    @error('meta_description')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>

<div class="dash-form-group">
    <label for="blog-meta-keywords">Meta Keywords</label>
    <input type="text" id="blog-meta-keywords" name="meta_keywords" value="{{ old('meta_keywords', $blog->meta_keywords) }}" placeholder="Comma-separated, e.g. career advice, it skills, career institute blog">
    @error('meta_keywords')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>
