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
        Schema::create('online_payment', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 20, 4);
            $table->string('gateway')->nullable();
            $table->string('transaction_id')->nullable();
            $table->text('bank_first_response')->nullable();
            $table->text('bank_second_response')->nullable();
            $table->enum('status',['success' , 'fail' , 'canceled' , 'pending']);
            $table->foreignId('user_id')
                ->constrained('users')
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
        Schema::dropIfExists('online_payment');
    }
};
