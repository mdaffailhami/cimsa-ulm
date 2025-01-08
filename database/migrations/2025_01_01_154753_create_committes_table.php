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
        Schema::create('committes', function (Blueprint $table) {
            $table->uuid()->primary();
            $table->string('logo')->nullable();
            $table->string('name')->unique();
            $table->char('color', 7);
            $table->string('description');
            $table->text('long_description');
            $table->string('mission_statement');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('committes');
    }
};
