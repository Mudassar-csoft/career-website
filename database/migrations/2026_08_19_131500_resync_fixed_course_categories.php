<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $now = now();

        $definitions = [
            'ai-data-science' => 'AI & Data Science',
            'web-software-development' => 'Web & Software Development',
            'digital-marketing-e-commerce' => 'Digital Marketing & E-Commerce',
            'graphic-design-uiux-creative-media' => 'Graphic Design, UI/UX & Creative Media',
            'cybersecurity-networking-cloud' => 'Cybersecurity, Networking & Cloud',
            'architecture-engineering-design' => 'Architecture, Engineering & Design',
            'office-business-accounting' => 'Office, Business & Accounting',
            'language-test-preparation' => 'Language & Test Preparation',
            'health-safety-compliance' => 'Health, Safety & Compliance',
            'freelancing-entrepreneurship' => 'Freelancing & Entrepreneurship',
            'international-certifications' => 'International Certifications',
            'professional-soft-skills' => 'Professional & Soft Skills',
        ];

        $renameMap = [
            'ai-data-science' => 'ai-data-science',
            'web-development' => 'web-software-development',
            'digital-marketing' => 'digital-marketing-e-commerce',
            'graphic-design-uiux' => 'graphic-design-uiux-creative-media',
            'cybersecurity-networking' => 'cybersecurity-networking-cloud',
        ];

        foreach ($renameMap as $oldSlug => $newSlug) {
            $existing = DB::table('course_categories')->where('slug', $oldSlug)->first();

            if (! $existing) {
                continue;
            }

            $target = DB::table('course_categories')->where('slug', $newSlug)->first();

            if ($target && $target->id !== $existing->id) {
                DB::table('courses')
                    ->where('course_category_id', $existing->id)
                    ->update(['course_category_id' => $target->id]);

                DB::table('course_categories')->where('id', $existing->id)->delete();

                $existing = $target;
            }

            DB::table('course_categories')
                ->where('id', $existing->id)
                ->update([
                    'name' => $definitions[$newSlug],
                    'slug' => $newSlug,
                    'updated_at' => $now,
                ]);
        }

        foreach ($definitions as $slug => $name) {
            $existing = DB::table('course_categories')->where('slug', $slug)->first();

            if ($existing) {
                DB::table('course_categories')
                    ->where('id', $existing->id)
                    ->update([
                        'name' => $name,
                        'updated_at' => $now,
                    ]);

                continue;
            }

            DB::table('course_categories')->insert([
                'name' => $name,
                'slug' => $slug,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // This data sync is intentionally not reversed automatically.
    }
};
