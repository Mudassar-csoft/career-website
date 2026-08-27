<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('coworking_inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone', 30);
            $table->string('city');
            $table->string('interested_in');
            $table->unsignedInteger('number_of_persons');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('coworking_inquiries');
    }
};
