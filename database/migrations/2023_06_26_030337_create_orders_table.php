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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('cart_code')->unique();
            $table->string('name');
            $table->string('mobile_number');
            $table->string('email');
            $table->string('address');
            $table->text('additional_information');
            $table->enum('payment_method', ['online', 'cod']);
            $table->enum('payment_status', ['N', 'Y'])->default('N');
            $table->decimal('payment_amount');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
