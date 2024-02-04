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
        Schema::create('cart_item_selected_attributes', function (Blueprint $table) {
            // todo -> این جدول به ما کمک میکنه که ما متوحه بشیم یک کاربر با چه
            //  ک یک کاربر با یک دسته بندی اتربیوت چه مقداری انتخاب کرده
            $table->id();
            $table->foreignId('category_attribute_id')
                ->constrained('category_attributes')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('cart_item_id')
                ->constrained('cart_items')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('category_value_id')
                ->constrained('category_values')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('value')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_item_selected_attributes');
    }
};
