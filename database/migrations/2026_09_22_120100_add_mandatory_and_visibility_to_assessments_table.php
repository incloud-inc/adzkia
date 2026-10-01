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
        Schema::table('assessments', function (Blueprint $table) {
            $table->boolean('is_mandatory')->default(true)->after('status');
            $table->boolean('is_global')->default(true)->after('is_mandatory');

            $table->index('is_mandatory');
            $table->index('is_global');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->dropIndex(['is_mandatory']);
            $table->dropIndex(['is_global']);
            $table->dropColumn(['is_mandatory', 'is_global']);
        });
    }
};
