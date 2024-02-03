<?php

use App\Models\Brand;
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
        Schema::create('brands', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_en');
            $table->string('slug')->unique();
            $table->string('slug_en')->unique();
            $table->string('address')->nullable();
            $table->string('site')->nullable();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->longText('description')->nullable();
            $table->longText('content_finished')->nullable();
            $table->boolean('special')->default(0);
            $table->enum('status', Brand::$statuses)
                ->default(Brand::STATUS_PENDING);
//            $table->foreignId('category_id')
//                ->constrained('categories')
//                ->cascadeOnUpdate()
//                ->cascadeOnDelete();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->softDeletes();
            $table->timestamp('time_start')->nullable();
            $table->timestamp('time_finished')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
