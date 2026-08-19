<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class CourseCategory extends Model
{
    public const FIXED_CATEGORIES = [
        ['name' => 'AI & Data Science', 'slug' => 'ai-data-science'],
        ['name' => 'Web & Software Development', 'slug' => 'web-software-development'],
        ['name' => 'Digital Marketing & E-Commerce', 'slug' => 'digital-marketing-e-commerce'],
        ['name' => 'Graphic Design, UI/UX & Creative Media', 'slug' => 'graphic-design-uiux-creative-media'],
        ['name' => 'Cybersecurity, Networking & Cloud', 'slug' => 'cybersecurity-networking-cloud'],
        ['name' => 'Architecture, Engineering & Design', 'slug' => 'architecture-engineering-design'],
        ['name' => 'Office, Business & Accounting', 'slug' => 'office-business-accounting'],
        ['name' => 'Language & Test Preparation', 'slug' => 'language-test-preparation'],
        ['name' => 'Health, Safety & Compliance', 'slug' => 'health-safety-compliance'],
        ['name' => 'Freelancing & Entrepreneurship', 'slug' => 'freelancing-entrepreneurship'],
        ['name' => 'International Certifications', 'slug' => 'international-certifications'],
        ['name' => 'Professional & Soft Skills', 'slug' => 'professional-soft-skills'],
    ];

    protected $fillable = ['name', 'slug'];

    public static function fixedSlugs(): array
    {
        return array_column(self::FIXED_CATEGORIES, 'slug');
    }

    public static function sortFixed(Collection $categories): Collection
    {
        $positions = array_flip(self::fixedSlugs());

        return $categories
            ->sortBy(fn ($category) => $positions[$category->slug] ?? PHP_INT_MAX)
            ->values();
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }
}
