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
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained('tenants')->cascadeOnDelete();
            $table->foreignId('subject_id')->constrained('subjects')->cascadeOnDelete();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->string('title');
            $table->string('type', 50)->default('ph'); // ph, pts, pas, utbk, toefl, custom
            $table->string('grade_level', 50)->nullable();
            $table->string('academic_year', 50)->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('duration_minutes')->default(90);
            $table->string('scoring_type', 50)->default('standard'); // standard, weighted, rubric, toefl_scale, irt
            $table->string('status', 50)->default('draft'); // draft, published, archived
            $table->json('settings')->nullable();
            $table->timestamps();

            $table->index(['tenant_id', 'status']);
            $table->index(['tenant_id', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};
