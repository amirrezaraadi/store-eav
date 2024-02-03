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
        Schema::create('product_meta', function (Blueprint $table) {
            // todo -> مثلا ما یک موبایل دارای خاصیت اب و ضد خش خب این تو همه محصولات نیست و قالیت افزایش درصد و قیمت نداره  میاد تو متا پروداکت
            $table->id();
            $table->text('meta_key')->nullable();
            $table->text('meta_value')->nullable();
            $table->foreignId('product_id')->constrained('products')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_meta');
    }
};
