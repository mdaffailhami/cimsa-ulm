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
        Schema::create('official_divisions', function (Blueprint $table) {
            $table->id();
            $table->foreignUuid('official_id')->constrained('officials', 'uuid')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('division_name');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('official_divisions');
    }
};
