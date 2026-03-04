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
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->integer('price');
            $table->integer('original_price')->nullable();
            $table->integer('sold')->default(0);
            $table->decimal('rating', 2, 1)->default(0.0);
            $table->string('shop');
            $table->string('icon')->nullable();
            $table->string('color')->nullable();
            $table->text('deskripsi')->nullable(); // Using 'deskripsi' or 'desc'
            $table->integer('stock')->default(0);
            $table->timestamps();
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
