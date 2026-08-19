<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Concerns\BuildsDashboardMenu;
use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    use BuildsDashboardMenu;

    public function index()
    {
        return view('dashboard.faqs.index', [
            'screens' => $this->screens(),
            'active' => 'faqs',
            'faqs' => Faq::with('category')
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.faqs.create', [
            'screens' => $this->screens(),
            'active' => 'faqs',
            'faq' => new Faq,
            'categories' => FaqCategory::orderBy('sort_order')->orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $this->validateFaq($request);
        $validated['is_active'] = (bool) $validated['is_active'];

        Faq::create($validated);

        return redirect()->route('dashboard.faqs.index')->with('status', 'FAQ created.');
    }

    public function edit(Faq $faq)
    {
        return view('dashboard.faqs.edit', [
            'screens' => $this->screens(),
            'active' => 'faqs',
            'faq' => $faq,
            'categories' => FaqCategory::orderBy('sort_order')->orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, Faq $faq)
    {
        $validated = $this->validateFaq($request);
        $validated['is_active'] = (bool) $validated['is_active'];

        $faq->update($validated);

        return redirect()->route('dashboard.faqs.index')->with('status', 'FAQ updated.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('dashboard.faqs.index')->with('status', 'FAQ deleted.');
    }

    protected function validateFaq(Request $request): array
    {
        return $request->validate([
            'faq_category_id' => ['required', 'exists:faq_categories,id'],
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['required', 'in:0,1'],
        ]) + [
            'sort_order' => (int) $request->input('sort_order', 0),
        ];
    }
}
