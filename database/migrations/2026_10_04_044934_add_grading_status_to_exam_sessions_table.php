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
        Schema::table('exam_sessions', function (Blueprint $table) {
            $table->string('grading_status', 20)->default('pending')->after('status');
            $table->timestamp('grading_started_at')->nullable()->after('completed_at');
            $table->timestamp('graded_at')->nullable()->after('grading_started_at');
            $table->text('grading_error')->nullable()->after('meta');

            $table->index(['id', 'grading_status']);
            $table->index(['grading_status', 'completed_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('exam_sessions', function (Blueprint $table) {
            $table->dropIndex(['id', 'grading_status']);
            $table->dropIndex(['grading_status', 'completed_at']);
            
            $table->dropColumn([
                'grading_status',
                'grading_started_at',
                'graded_at',
                'grading_error'
            ]);
        });
    }
};
