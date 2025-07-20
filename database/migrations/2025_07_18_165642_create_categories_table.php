<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // The unique ID for each category
            $table->string('name'); // The category name, e.g., "Sofa Sets"
            $table->string('slug')->unique(); // A URL-friendly version of the name, e.g., "sofa-sets"
            $table->timestamps(); // `created_at` and `updated_at` columns
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};