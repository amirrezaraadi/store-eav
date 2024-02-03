<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_colors', function (Blueprint $table) {
            $table->id();
            $table->string('color_name');
            $table->enum('status', ['success', 'reject', 'pending'])->default('pending');
            $table->decimal('price_increase' , 20 , 3)->default(0);
            $table->tinyInteger('sold_number')->default(0)
                ->comment('کاربر انتخاب کرده و پرداخت انجام شده ');
            $table->tinyInteger('frozen_number')->default(0)
                ->comment('کاربر از سبد خرید انتخاب کرده در مرحله پرداخت هست ');
            $table->tinyInteger('marketable_number')->default(0)
                ->comment('از این محصول چندتاش قابل فروش هست ');
            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_colors');
    }
};
