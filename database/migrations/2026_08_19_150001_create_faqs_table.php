<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faq_category_id')->constrained('faq_categories')->cascadeOnDelete();
            $table->string('question');
            $table->text('answer');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        $categoryIds = DB::table('faq_categories')->pluck('id', 'slug');
        $now = now();

        $faqs = [
            [
                'faq_category_id' => $categoryIds['general'] ?? null,
                'question' => 'What courses and certifications do you offer?',
                'answer' => 'We offer practical IT, freelancing, business, language, design, and certification-focused programs for students, professionals, and job seekers.',
            ],
            [
                'faq_category_id' => $categoryIds['general'] ?? null,
                'question' => 'Do you offer online and on-campus classes?',
                'answer' => 'Yes. Depending on the course, you can study online, on campus, or through a blended format.',
            ],
            [
                'faq_category_id' => $categoryIds['general'] ?? null,
                'question' => 'Is career counseling free?',
                'answer' => 'Yes. We provide free career counseling to help you choose the right course, certification, or career path.',
            ],
            [
                'faq_category_id' => $categoryIds['admissions'] ?? null,
                'question' => 'How do I apply for a course?',
                'answer' => 'You can apply by visiting the campus, calling our team, or submitting an inquiry form on the website. Our staff will guide you through the next steps.',
            ],
            [
                'faq_category_id' => $categoryIds['admissions'] ?? null,
                'question' => 'What documents are required for admission?',
                'answer' => 'Requirements can vary by program, but most admissions only need basic personal details and an educational background review.',
            ],
            [
                'faq_category_id' => $categoryIds['coworking-space'] ?? null,
                'question' => 'Can I use the coworking space if I am not a student?',
                'answer' => 'Yes. Our coworking spaces are available for freelancers, startups, teams, and professionals, subject to availability and package selection.',
            ],
        ];

        foreach ($faqs as $index => $faq) {
            if (! $faq['faq_category_id']) {
                continue;
            }

            DB::table('faqs')->insert([
                'faq_category_id' => $faq['faq_category_id'],
                'question' => $faq['question'],
                'answer' => $faq['answer'],
                'sort_order' => $index + 1,
                'is_active' => true,
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
        Schema::dropIfExists('faqs');
    }
};
