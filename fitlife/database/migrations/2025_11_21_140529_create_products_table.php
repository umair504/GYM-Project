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
    Schema::create('products', function (Blueprint $table) {
        $table->id(); // Product ID
        $table->string('name'); // Product name
        $table->text('description')->nullable(); // Product description
        $table->decimal('price', 8, 2); // Product price
        $table->string('image')->nullable(); // Product image filename or URL
        $table->timestamps(); // Created at and updated at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
