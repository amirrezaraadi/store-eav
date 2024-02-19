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
        Schema::create('attribute_values', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->enum('status' , \App\Models\Panel\CategoryAttributeValue::$statuses)
                ->default(\App\Models\Panel\CategoryAttributeValue::STATUS_PENDING);
            $table->foreignId('attribute_id')
                ->nullable()
                ->constrained('attributes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attribute_values');
    }
};
