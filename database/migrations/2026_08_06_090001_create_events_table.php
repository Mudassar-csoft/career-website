<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('event_category_id')->constrained()->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->date('event_date');
            $table->string('campus');
            $table->longText('description')->nullable();
            $table->string('venue');
            $table->string('organizer');
            $table->boolean('is_paid')->default(false);
            $table->decimal('fee_amount', 10, 2)->nullable();
            $table->boolean('has_seat_limit')->default(false);
            $table->unsignedInteger('seat_limit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
