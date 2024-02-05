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
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')
                ->constrained('orders')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->longText('product')->nullable();
            $table->foreignId('amazing_sale_id')
                ->constrained('amazing_sales')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->longText('amazing_sale_object')->nullable();
            $table->decimal('amazing_sale_discount_amount', 20, 3);
            $table->integer('number')->default(1)->comment('تعداد کلایی که خریداری شده ');
            $table->decimal('final_product-price', 20, 3); // قیمت یک محصول
            $table->decimal('final_total_price', 20, 3); //
            $table->foreignId('color_id')
                ->nullable()
                ->constrained('product_colors')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('warranty_id')
                ->nullable()
                ->constrained('warranties')
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
        Schema::dropIfExists('order_items');
    }
};
