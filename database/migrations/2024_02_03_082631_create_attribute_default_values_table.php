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
        Schema::create('attribute_default_values', function (Blueprint $table) {
            // todo -> مثلا ما یک برند یا یک گارانتی کار میکنینم بد چون قراراداد بستیم تبلیغات کنیم باید بیایم از این خاصیت استافده کنیم
            // todo -> و دیفالت یکسری محصول یا گارنتی یا خاصیت نمایش بدیم
            $table->id();
            $table->string('value');
            $table->foreignId('attribute_id')
                ->constrained('attributes')
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
        Schema::dropIfExists('attribute_default_values');
    }
};
