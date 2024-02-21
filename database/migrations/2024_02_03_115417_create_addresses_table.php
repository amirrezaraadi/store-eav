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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('postal_code');
            $table->boolean('is_default')->default(0);
            $table->text('address');
            $table->string('no')->comment('شماره پلاک');
            $table->string('unit');
            $table->string('recipient_first_name');
            $table->string('recipient_last_name');
            $table->string('phone');
            $table->enum('status', \App\Models\User\Location::$statuses)
                ->default(\App\Models\User\Location::STATUS_PENDING);
            $table->foreignId('city_id')
                ->constrained('cities')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
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
        Schema::dropIfExists('addresses');
    }
};
