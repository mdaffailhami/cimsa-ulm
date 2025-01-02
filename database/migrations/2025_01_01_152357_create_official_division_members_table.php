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
        Schema::create('official_division_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('official_division_id')->constrained('official_divisions', 'id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('position');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('official_division_members');
    }
};
