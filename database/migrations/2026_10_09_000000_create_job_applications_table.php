<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_offer_id')->nullable()->constrained()->nullOnDelete();
            $table->string('job_title')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone', 30)->nullable();
            $table->string('linkedin_url', 2048)->nullable();
            $table->string('institution')->nullable();
            $table->string('city')->nullable();
            $table->string('qualification')->nullable();
            $table->string('document_path');
            $table->string('document_name');
            $table->timestamps();
        });

        // Make CVs already submitted through the enquiry form available here too.
        DB::table('subscribers')
            ->where('source', 'Job Placement')
            ->whereNotNull('document_path')
            ->where('document_path', '!=', '')
            ->orderBy('id')
            ->chunkById(100, function ($subscribers) {
                foreach ($subscribers as $subscriber) {
                    DB::table('job_applications')->insert([
                        'name' => $subscriber->name,
                        'email' => $subscriber->email,
                        'phone' => $subscriber->phone,
                        'linkedin_url' => $subscriber->linkedin_url,
                        'institution' => $subscriber->institution,
                        'city' => $subscriber->city,
                        'qualification' => $subscriber->qualification,
                        'document_path' => $subscriber->document_path,
                        'document_name' => $subscriber->document_name ?: basename($subscriber->document_path),
                        'created_at' => $subscriber->created_at,
                        'updated_at' => $subscriber->updated_at,
                    ]);
                }
            });
    }

    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};
