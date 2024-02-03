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
        Schema::create('product_category', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')
                ->nullable()->unique();
            $table->text('image')
                ->nullable();
            $table->longText('content')->nullable();
            $table->enum('status', ['success', 'pending', 'reject'])
                ->default('pending');
            $table->tinyInteger('show_in_menu')
                ->default(0);
            $table->foreignId('parent_id')
                ->nullable()
                ->constrained('product_category')
                ->cascadeOnUpdate()->cascadeOnUpdate();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_category');
    }
};
