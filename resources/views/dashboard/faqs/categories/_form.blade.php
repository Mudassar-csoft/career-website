<div class="dash-form-group">
    <label for="faq-category-name">Category Name</label>
    <input
        type="text"
        id="faq-category-name"
        name="name"
        value="{{ old('name', $category->name) }}"
        placeholder="e.g. Admissions"
        required
    >
    @error('name')
        <p class="dash-form-error">{{ $message }}</p>
    @enderror
</div>

<div class="dash-form-row">
    <div class="dash-form-group">
        <label for="faq-category-sort-order">Sort Order</label>
        <input
            type="number"
            id="faq-category-sort-order"
            name="sort_order"
            min="0"
            value="{{ old('sort_order', $category->sort_order ?? 0) }}"
            placeholder="0"
        >
        @error('sort_order')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>

    <div class="dash-form-group">
        <label for="faq-category-status">Status</label>
        <select id="faq-category-status" name="is_active" required>
            <option value="1" @selected((string) old('is_active', (int) ($category->is_active ?? true)) === '1')>Active</option>
            <option value="0" @selected((string) old('is_active', (int) ($category->is_active ?? true)) === '0')>Hidden</option>
        </select>
        @error('is_active')
            <p class="dash-form-error">{{ $message }}</p>
        @enderror
    </div>
</div>
