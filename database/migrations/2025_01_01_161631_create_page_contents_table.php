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
            $table->id();
            $table->foreignUuid('page_id')->constrained('pages', 'uuid')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('column');
            $table->enum('type', ['text', 'image']);
            $table->string('group')->nullable();
            $table->string('image_content')->nullable();
            $table->text('text_content')->nullable();
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
