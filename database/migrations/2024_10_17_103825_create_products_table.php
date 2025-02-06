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
            $table->id()->primary();
            $table->string('name');
            $table->integer('price');
            $table->integer('discount_price');
            $table->integer('stock');
            $table->text('description');
            $table->string('image-1')->nullable();
            $table->string('image-2')->nullable();
            $table->string('image-3')->nullable();
            $table->string('image-4')->nullable();
            $table->string('image-5')->nullable();
            $table->string('image-6')->nullable();
            $table->string('image-7')->nullable();
            $table->string('image-8')->nullable();
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
