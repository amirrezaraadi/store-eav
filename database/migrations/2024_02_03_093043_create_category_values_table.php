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
        Schema::create('category_values', function (Blueprint $table) {
            $table->id();
            $table->text('value');
            $table->foreignId('product_id')->constrained('products')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('category_attribute_id')->constrained('category_attributes')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->tinyInteger('type')
                ->default(0)
                ->comment('values  : 0 => simple  ,, 1 => multi values select && multi checkbox (affected on price $)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_values');
    }
};
