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
        Schema::table('questions', function (Blueprint $table) {
            $table->string('explanation_status', 20)->nullable()->after('explanation');
            $table->text('explanation_error')->nullable()->after('explanation_status');
            $table->string('explanation_model', 50)->nullable()->after('explanation_error');
            $table->timestamp('explanation_generated_at')->nullable()->after('explanation_model');

            $table->index('explanation_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropIndex(['explanation_status']);
            $table->dropColumn([
                'explanation_status',
                'explanation_error',
                'explanation_model',
                'explanation_generated_at',
            ]);
        });
    }
};
