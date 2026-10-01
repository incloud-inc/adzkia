<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('exam_sessions', function (Blueprint $table) {
            $table->uuid('uuid')->nullable()->unique()->after('id');
            $table->json('schedule_snapshot')->nullable()->after('lock_reason');
            $table->unsignedSmallInteger('question_count')->default(0)->after('schedule_snapshot');
            $table->timestamp('expires_at')->nullable()->after('started_at');
            $table->timestamp('last_activity_at')->nullable()->after('expires_at');
            $table->string('submitted_ip', 45)->nullable()->after('ip_address');
            $table->json('meta')->nullable()->after('submitted_ip');
            $table->decimal('score', 8, 2)->nullable()->after('meta');
            $table->decimal('max_score', 8, 2)->nullable()->after('score');

            $table->index(['assessment_id', 'user_id', 'status']);
            $table->index('expires_at');
        });

        foreach (DB::table('exam_sessions')->whereNull('uuid')->cursor() as $row) {
            DB::table('exam_sessions')->where('id', $row->id)->update([
                'uuid' => (string) Str::uuid(),
            ]);
        }
    }

    public function down(): void
    {
        Schema::table('exam_sessions', function (Blueprint $table) {
            $table->dropIndex(['assessment_id', 'user_id', 'status']);
            $table->dropIndex(['expires_at']);
            $table->dropColumn([
                'uuid', 'schedule_snapshot', 'question_count', 'expires_at',
                'last_activity_at', 'submitted_ip', 'meta', 'score', 'max_score',
            ]);
        });
    }
};
