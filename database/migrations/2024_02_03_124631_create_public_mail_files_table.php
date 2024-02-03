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
        Schema::create('public_mail_files', function (Blueprint $table) {
            // todo -> send file to users && files template || music || link video
            $table->id();
            $table->foreignId('public_mail_id')
                ->constrained('public_mail')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->text('file_path');
            $table->integer('file-size');
            $table->string('file_type');
            $table->tinyInteger('status')->default(0);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('public_mail_files');
    }
};
