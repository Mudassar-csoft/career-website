<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('subscribers', function (Blueprint $table) {
            $table->string('city')->nullable();
            $table->text('message')->nullable();
            $table->string('linkedin_url', 2048)->nullable();
            $table->string('institution')->nullable();
            $table->string('qualification')->nullable();
            $table->string('document_path')->nullable();
            $table->string('document_name')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('subscribers', function (Blueprint $table) {
            $table->dropColumn([
                'city', 'message', 'linkedin_url', 'institution', 'qualification',
                'document_path', 'document_name',
            ]);
        });
    }
};
