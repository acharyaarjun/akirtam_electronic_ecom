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
            $table->unsignedBigInteger('category_id');
            $table->string('product_title');
            $table->string('slug')->unique();   
            $table->string('product_image')->unique();
            $table->longText('product_description')->nullable();
            $table->unsignedInteger('product_stock');
            $table->decimal('orginal_cost');
            $table->decimal('discounted_cost')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            $table->foreign('category_id')->on('categories')->references('id')->onDelete('cascade');
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
