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
        Schema::create('category_attributes', function (Blueprint $table) {
//            todo -> هر دسته بندی من یک یکسری خاصیت داره مثلا موبایل من رنگ داره سابز داره قیمت داره مشخصات داره
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('type' , \App\Models\Panel\CategoryAttributes::$types);
            $table->string('unit');
            $table->foreignId('category_id')
                ->constrained('product_category')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_attributes');
    }
};
