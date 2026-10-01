<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exam_answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_session_id')->constrained('exam_sessions')->cascadeOnDelete();
            $table->foreignId('question_id')->constrained('questions')->cascadeOnDelete();

            /**
             * JSON payload fleksibel untuk semua 8 tipe soal:
             * - mcq_single:    { "option_id": 5 }
             * - mcq_multiple:  { "option_ids": [3,5] }
             * - mcq_weighted:  { "option_id": 2 }
             * - boolean_matrix:{ "answers": {"row_1": true, "row_2": false} }
             * - matching:      { "pairs": {"left_1": "right_2"} }
             * - reorder:       { "order": [3,1,4,2] }
             * - fill_blank:    { "text": "jawaban" }
             * - essay:         { "text": "jawaban panjang..." }
             */
            $table->json('answer_payload')->nullable();

            $table->boolean('is_flagged')->default(false); // Ragu-ragu
            $table->boolean('is_correct')->nullable();     // Diisi pasca-submit (auto-grade)
            $table->decimal('points_awarded', 8, 2)->nullable(); // Diisi pasca-grade
            $table->unsignedInteger('time_spent_seconds')->nullable(); // Durasi pengerjaan soal ini
            $table->timestamp('answered_at')->nullable();
            $table->timestamps();

            $table->unique(['exam_session_id', 'question_id']); // Satu jawaban per soal per sesi
            $table->index(['exam_session_id', 'is_flagged']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exam_answers');
    }
};
