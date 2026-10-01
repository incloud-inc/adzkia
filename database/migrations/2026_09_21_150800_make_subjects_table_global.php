<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 1. Remap any assessments and question banks referencing duplicate subjects, then deduplicate
        $duplicates = DB::table('subjects')
            ->select('name', DB::raw('MIN(id) as keep_id'))
            ->groupBy('name')
            ->get();

        foreach ($duplicates as $item) {
            $duplicateIds = DB::table('subjects')
                ->where('name', $item->name)
                ->where('id', '!=', $item->keep_id)
                ->pluck('id');

            if ($duplicateIds->isNotEmpty()) {
                DB::table('assessments')
                    ->whereIn('subject_id', $duplicateIds)
                    ->update(['subject_id' => $item->keep_id]);

                DB::table('question_banks')
                    ->whereIn('subject_id', $duplicateIds)
                    ->update(['subject_id' => $item->keep_id]);

                DB::table('subjects')
                    ->whereIn('id', $duplicateIds)
                    ->delete();
            }
        }

        // 2. Drop foreign key and tenant_id column
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropForeign(['tenant_id']);
            $table->dropIndex(['tenant_id', 'name']);
            $table->dropColumn('tenant_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->foreignId('tenant_id')->nullable()->constrained('tenants')->cascadeOnDelete();
            $table->index(['tenant_id', 'name']);
        });
    }
};
