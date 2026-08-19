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
        Schema::create('faq_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        $now = now();

        $categories = [
            ['name' => 'General', 'slug' => 'general'],
            ['name' => 'Admissions', 'slug' => 'admissions'],
            ['name' => 'Coworking Space', 'slug' => 'coworking-space'],
        ];

        foreach ($categories as $index => $category) {
            DB::table('faq_categories')->insert([
                'name' => $category['name'],
                'slug' => $category['slug'],
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
        Schema::dropIfExists('faq_categories');
    }
};
