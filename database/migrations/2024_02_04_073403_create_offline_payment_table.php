<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('offline_payment', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 20, 4);
            $table->string('transaction_id')->nullable();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->timestamp('pay_date');
            $table->enum('status',['success' , 'fail' , 'canceled' , 'pending']);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offline_payment');
    }
};
