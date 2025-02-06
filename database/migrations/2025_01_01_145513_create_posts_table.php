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
        Schema::create('posts', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->foreignUuid('author_id')->constrained('users', 'uuid')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('editor_id')->constrained('users', 'uuid')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('cover')->nullable();
            $table->string('title');
            $table->string('slug');
            $table->string('highlight');
            $table->longText('content');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
