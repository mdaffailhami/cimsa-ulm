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
        Schema::create('committe_testimonies', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('committe_uuid')->constrained('committes', 'uuid')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('image');
            $table->string('name');
            $table->string('occupation');
            $table->year('year');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('committe_testimonies');
    }
};
