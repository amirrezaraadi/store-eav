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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('code_phone')->nullable();
            $table->ipAddress('ip')->nullable();
            $table->string('point')->nullable();
            $table->string('email')->nullable()->unique();
            $table->unsignedInteger('phone')->nullable()->unique();
            $table->string('cart_number')->nullable();
            $table->enum('status' , \App\Models\Seller\Seller::$statuses)
                ->default(\App\Models\Seller\Seller::STATUS_PENDING);
            $table->timestamp('phone_verified_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->softDeletes();
            $table->timestamps();
            $table->rememberToken();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};
