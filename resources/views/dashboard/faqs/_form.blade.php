<div class="dash-form-group">
    <label for="faq-category">Category</label>
    <select id="faq-category" name="faq_category_id" required>
        <option value="">Select a category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" @selected((string) old('faq_category_id', $faq->faq_category_id) === (string) $category->id)>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('faq_category_id')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>

<div class="dash-form-group">
    <label for="faq-question">Question</label>
    <input
        type="text"
        id="faq-question"
        name="question"
        value="{{ old('question', $faq->question) }}"
        placeholder="Enter the frequently asked question"
        required
    >
    @error('question')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>

<div class="dash-form-group">
    <label for="faq-answer">Answer</label>
    <textarea
        id="faq-answer"
        name="answer"
        rows="8"
        placeholder="Enter the answer"
        required
    >{{ old('answer', $faq->answer) }}</textarea>
    @error('answer')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>

<div class="dash-form-row">
    <div class="dash-form-group">
        <label for="faq-sort-order">Sort Order</label>
        <input
            type="number"
            id="faq-sort-order"
            name="sort_order"
            min="0"
            value="{{ old('sort_order', $faq->sort_order ?? 0) }}"
            placeholder="0"
        >
        @error('sort_order')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="dash-form-group">
        <label for="faq-status">Status</label>
        <select id="faq-status" name="is_active" required>
            <option value="1" @selected((string) old('is_active', (int) ($faq->is_active ?? true)) === '1')>Active</option>
            <option value="0" @selected((string) old('is_active', (int) ($faq->is_active ?? true)) === '0')>Hidden</option>
        </select>
        @error('is_active')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>
</div>
