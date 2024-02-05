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
        //todo -> موقعی ما از ادرس سپس از ابجکت ادرس استفاده میکنیم
        // todo -> ممکن هست ادرس در مرحله دوم عوض بشه باید دسترسی د ابجت ارایه بشه

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('address_id')->constrained('addresses')->cascadeOnUpdate()->cascadeOnDelete();
            $table->text('address_object')->nullable();
            $table->foreignId('payment_id')->constrained('payments')->cascadeOnUpdate()->cascadeOnDelete();
            $table->longText('payment_object')->nullable();
            $table->tinyInteger('payment_type')->default(0);
            $table->tinyInteger('payment_status')->default(0);
            $table->foreignId('delivery_id')->constrained('delivery')->cascadeOnUpdate()->cascadeOnDelete();
            $table->longText('delivery_object')->nullable(); // اگر به دیتابیس دستزسی نداشتیم شاید باید دستی پر بشه
            $table->decimal('delivery_amount', 20, 3)->nullable();
            $table->tinyInteger('delivery_status')->default(0);
            $table->timestamp('payment_date')->nullable();
            $table->decimal('order_final_amount', 20, 3)->nullable();
            $table->decimal('order_discount_amount', 20, 3)->nullable();
            $table->foreignId('coupon_id')->constrained('coupons')->cascadeOnUpdate()->cascadeOnDelete();
            $table->longText('coupon_object')->nullable();
            $table->decimal('order_coupon_discount_amount', 20, 3)->nullable();
            $table->foreignId('common_discount_id')->constrained('common_discount')->cascadeOnUpdate()->cascadeOnDelete();
            $table->longText('common_discount_object')->nullable();
            $table->decimal('order_common_discount_amount', 20, 3)->nullable();
            $table->decimal('order_total_product_discount_amount', 20, 3)->nullable();
            $table->tinyInteger('order_status')->default(0);
            $table->softDeletes();
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
