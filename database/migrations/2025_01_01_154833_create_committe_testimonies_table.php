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
            $table->foreignId('committe_id')->constrained('committes', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('image');
            $table->string('name');
            $table->string('position');
            $table->text('content');
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
