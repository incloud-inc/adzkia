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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assessment_section_id')->nullable()->constrained('assessment_sections')->cascadeOnDelete();
            $table->foreignId('question_group_id')->nullable()->constrained('question_groups')->nullOnDelete();
            $table->foreignId('question_bank_id')->nullable()->constrained('question_banks')->cascadeOnDelete();
            $table->string('type', 50); // mcq_single, mcq_multiple, mcq_weighted, binary_matrix, matching, ordering, short_answer, essay
            $table->longText('prompt');
            $table->text('explanation')->nullable();
            $table->decimal('points', 8, 2)->default(1.00);
            $table->json('settings')->nullable();
            $table->unsignedInteger('order')->default(1);
            $table->timestamps();

            $table->index(['assessment_section_id', 'order']);
            $table->index(['question_group_id', 'order']);
            $table->index(['question_bank_id', 'order']);
            $table->index('type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
