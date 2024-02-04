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
        Schema::create('cache_payment', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 20, 4);
            $table->string('cache_receiver')->nullable();
            $table->timestamp('pay_date');
            $table->enum('status',['success' , 'fail' , 'canceled' , 'pending']);
            $table->softDeletes();
            $table->foreignId('user_id')
                ->constrained('users')
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
        Schema::dropIfExists('cache_payment');
    }
};
