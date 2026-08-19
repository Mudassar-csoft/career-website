<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqCategory;
use Illuminate\Http\Request;

class PublicFaqController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->input('search', ''));
        $categorySlug = trim((string) $request->input('category', ''));

        $categories = FaqCategory::query()
            ->where('is_active', true)
            ->withCount([
                'faqs' => fn ($query) => $query->where('is_active', true),
            ])
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $selectedCategory = $categories->firstWhere('slug', $categorySlug);

        $faqs = Faq::query()
            ->with('category')
            ->where('is_active', true)
            ->whereHas('category', fn ($query) => $query->where('is_active', true))
            ->when($selectedCategory, fn ($query) => $query->where('faq_category_id', $selectedCategory->id))
            ->when($search !== '', function ($query) use ($search) {
                $query->where(function ($nested) use ($search) {
                    $nested->where('question', 'like', "%{$search}%")
                        ->orWhere('answer', 'like', "%{$search}%");
                });
            })
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('pages.faqs', [
            'faqSearch' => $search,
            'selectedFaqCategory' => $selectedCategory,
            'faqCategories' => $categories,
            'filteredFaqs' => $faqs,
            'totalFaqCount' => $categories->sum('faqs_count'),
        ]);
    }
}
