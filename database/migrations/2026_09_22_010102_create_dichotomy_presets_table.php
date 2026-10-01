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
        Schema::create('dichotomy_presets', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('Contoh: Benar/Salah');
            $table->string('label_a')->comment('Contoh: Benar');
            $table->string('label_b')->comment('Contoh: Salah');
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dichotomy_presets');
    }
};
