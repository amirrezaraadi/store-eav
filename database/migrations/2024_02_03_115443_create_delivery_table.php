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
        Schema::create('delivery', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('amount' , 20 , 3)->nullable();
            $table->enum('type' , \App\Models\User\Delivery::$types)
                ->default(\App\Models\User\Delivery::TYPE_NORMAL);
            $table->enum('delivery_time' , \App\Models\User\Delivery::$delivery_time)
                ->comment('زمان ');
            $table->enum('delivery_time_unit' , \App\Models\User\Delivery::$weeky)->comment('تاریخ ');
            $table->foreignId('product_id')
                ->constrained('products')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('location_id')
                ->constrained('addresses')
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
        Schema::dropIfExists('delivary');
    }
};
