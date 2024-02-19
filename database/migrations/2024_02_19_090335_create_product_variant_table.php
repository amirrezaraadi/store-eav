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
        Schema::create('product_variant', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')
                ->nullable()
                ->constrained('products')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('seller_id')
                ->nullable()
                ->constrained('sellers')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('warranty_id')
                ->nullable()
                ->constrained('warranties')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('price');
            $table->string('discount')->nullable();
            $table->integer('discount_price');
            $table->unsignedBigInteger('order_limit')->nullable();
            $table->boolean('is_default')->default(0) ;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variant');
    }
};
