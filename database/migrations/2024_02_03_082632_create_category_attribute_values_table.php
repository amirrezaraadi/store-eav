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
        Schema::create('category_attribute_values', function (Blueprint $table) {
            $table->id();
            $table->text('title')->nullable();
            $table->enum('status' , \App\Models\Panel\CategoryAttributeValue::$statuses)
                ->default(\App\Models\Panel\CategoryAttributeValue::STATUS_PENDING);
            $table->foreignId('category_attribute_id')
                ->nullable()
                ->constrained('category_attributes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_attribute_values');
    }
};
