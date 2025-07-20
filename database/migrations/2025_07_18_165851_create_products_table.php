<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // "3 Seater Sofa"
            $table->text('description'); // Detailed product information
            $table->decimal('price', 8, 2); // Price with 8 total digits and 2 decimal places
            $table->integer('stock'); // How many are available
            $table->string('image')->nullable(); // Path to the product image (nullable means it can be empty)

            // This is the link to the categories table
            $table->foreignId('category_id')->constrained()->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};