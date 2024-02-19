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
        Schema::create('product_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attribute_id')
                ->nullable()
                ->constrained('attributes')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('attribute_default_value_id')
                ->nullable()
                ->constrained('attribute_default_values')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('attribute_value_id')
                ->nullable()
                ->constrained('attribute_values')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('product_id')
                ->nullable()
                ->constrained('products')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_features');
    }
};
