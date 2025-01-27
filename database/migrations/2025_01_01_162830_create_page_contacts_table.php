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
        Schema::create('page_contacts', function (Blueprint $table) {
            $table->id();
            $table->uuid('page_id');
            $table->string('type'); // page | comitte
            $table->string('image')->nullable();
            $table->string('name');
            $table->string('ocupation');
            $table->string('email');
            $table->char('phone', 13);
            $table->year('year');
            $table->year('end_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_contacts');
    }
};
