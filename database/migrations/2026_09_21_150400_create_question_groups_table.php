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
        Schema::create('question_groups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assessment_section_id')->nullable()->constrained('assessment_sections')->cascadeOnDelete();
            $table->foreignId('question_bank_id')->nullable()->constrained('question_banks')->cascadeOnDelete();
            $table->string('title')->nullable();
            $table->string('stimulus_type', 50)->default('text'); // text, audio, image
            $table->longText('stimulus_content');
            $table->unsignedInteger('order')->default(1);
            $table->timestamps();

            $table->index(['assessment_section_id', 'order']);
            $table->index(['question_bank_id', 'order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_groups');
    }
};
