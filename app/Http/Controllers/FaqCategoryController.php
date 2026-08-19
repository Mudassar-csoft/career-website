<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;
use App\Models\FaqCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class FaqCategoryController extends Controller
{
    use BuildsDashboardMenu;

    public function index()
    {
        return view('dashboard.faqs.categories.index', [
            'screens' => $this->screens(),
            'active' => 'faqs',
            'categories' => FaqCategory::withCount('faqs')
                ->orderBy('sort_order')
                ->orderBy('name')
                ->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.faqs.categories.create', [
            'screens' => $this->screens(),
            'active' => 'faqs',
            'category' => new FaqCategory,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateCategory($request);
        $validated['slug'] = $this->makeUniqueSlug($validated['name']);
        $validated['is_active'] = (bool) $validated['is_active'];

        FaqCategory::create($validated);

        return redirect()->route('dashboard.faqs.categories.index')->with('status', 'FAQ category created.');
    }

    public function edit(FaqCategory $faqCategory)
    {
        return view('dashboard.faqs.categories.edit', [
            'screens' => $this->screens(),
            'active' => 'faqs',
            'category' => $faqCategory,
        ]);
    }

    public function update(Request $request, FaqCategory $faqCategory)
    {
        $validated = $this->validateCategory($request, $faqCategory);
        $validated['slug'] = $this->makeUniqueSlug($validated['name'], $faqCategory);
        $validated['is_active'] = (bool) $validated['is_active'];

        $faqCategory->update($validated);

        return redirect()->route('dashboard.faqs.categories.index')->with('status', 'FAQ category updated.');
    }

    public function destroy(FaqCategory $faqCategory)
    {
        $faqCategory->delete();

        return redirect()->route('dashboard.faqs.categories.index')->with('status', 'FAQ category deleted.');
    }

    protected function validateCategory(Request $request, ?FaqCategory $faqCategory = null): array
    {
        return $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('faq_categories', 'name')->ignore($faqCategory?->id)],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['required', 'in:0,1'],
        ]) + [
            'sort_order' => (int) $request->input('sort_order', 0),
        ];
    }

    protected function makeUniqueSlug(string $name, ?FaqCategory $faqCategory = null): string
    {
        $baseSlug = Str::slug($name);
        $baseSlug = filled($baseSlug) ? $baseSlug : 'faq-category';
        $slug = $baseSlug;
        $counter = 2;

        while (
            FaqCategory::query()
                ->when($faqCategory, fn ($query) => $query->whereKeyNot($faqCategory->id))
                ->where('slug', $slug)
                ->exists()
        ) {
            $slug = $baseSlug.'-'.$counter;
            $counter++;
        }

        return $slug;
    }
}
