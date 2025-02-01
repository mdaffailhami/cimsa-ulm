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
        Schema::create('page_contents', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->foreignUuid('page_id')->constrained('pages', 'uuid')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('column');
            $table->string('label');
            $table->enum('type', ['text', 'long-text', 'image', 'multiple-image']);
            $table->string('section')->nullable();
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
        Schema::dropIfExists('page_contents');
    }
};
