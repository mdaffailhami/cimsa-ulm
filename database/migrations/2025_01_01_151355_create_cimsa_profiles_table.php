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
        Schema::create('cimsa_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('column');
            $table->string('label');
            $table->enum('type', ['text', 'long-text', 'image', 'multiple-image']);
            $table->string('text_content', 500)->nullable();
            $table->text('long_text_content')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cimsa_profiles');
    }
};
