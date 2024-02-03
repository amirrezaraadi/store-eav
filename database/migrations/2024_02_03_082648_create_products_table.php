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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique()->nullable();
            $table->text('intro_production')->nullable();
            $table->text('image')->nullable()->comment('ایم عکس عکس شاخص این پروداکت هست ');
            $table->decimal('weight', 10, 2);
            $table->decimal('length', 10, 2);
            $table->decimal('width', 10, 2);
            $table->decimal('height', 10, 2);
            $table->decimal('price', 10, 2);
            $table->enum('status', \App\Models\Product::$statuses)
                ->deferrable(\App\Models\Product::STATUS_PENDING);
            $table->enum('marketable', \App\Models\Product::$market)
                ->default(\App\Models\Product::MARKET_PENDING);
            $table->tinyInteger('sold_number')->default(0)
                ->comment('کاربر انتخاب کرده و پرداخت انجام شده ');
            $table->tinyInteger('frozen_number')->default(0)
                ->comment('کاربر از سبد خرید انتخاب کرده در مرحله پرداخت هست ');
            $table->tinyInteger('marketable_number')->default(0)
                ->comment('از این محصول چندتاش قابل فروش هست ');
            $table->foreignId('brand_id')
                ->constrained('brands')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('category_id')
                ->constrained('product_category')
                ->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamp('published_at');
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
