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
