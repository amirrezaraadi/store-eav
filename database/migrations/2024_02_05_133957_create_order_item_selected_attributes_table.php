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
        Schema::create('order_item_selected_attributes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_item_id')->constrained('order_items')->cascadeOnUpdate()->cascadeOnDelete(); // iphone 12
            $table->foreignId('category_attribute_id') // color
                ->constrained('category_attributes')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('category_value_id') // red
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
        Schema::dropIfExists('order_item_selected_attributes');
    }
};
