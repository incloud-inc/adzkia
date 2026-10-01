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
        // 1. Kolom batas percobaan & masa aktif di assessments
        Schema::table('assessments', function (Blueprint $table) {
            $table->unsignedInteger('max_attempts')->nullable()->after('duration_minutes');
            $table->unsignedInteger('access_validity_days')->default(35)->after('max_attempts');
        });

        // 2. Tabel paket harga fleksibel per asesmen
        Schema::create('assessment_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assessment_id')->constrained('assessments')->cascadeOnDelete();
            $table->string('name')->nullable();
            $table->decimal('price', 12, 2)->default(0);
            $table->unsignedInteger('attempts')->default(1);
            $table->unsignedInteger('validity_days')->default(35);
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();

            $table->index(['assessment_id', 'is_active']);
        });

        // 3. Tabel saldo / kuota akses user per asesmen
        Schema::create('user_assessment_accesses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('assessment_id')->constrained('assessments')->cascadeOnDelete();
            $table->unsignedInteger('quota_attempts')->default(0);
            $table->unsignedInteger('attempts_used')->default(0);
            $table->timestamp('expires_at')->nullable();
            $table->timestamp('last_purchased_at')->nullable();
            $table->foreignId('last_order_id')->nullable()->constrained('orders')->nullOnDelete();
            $table->timestamps();

            $table->unique(['user_id', 'assessment_id']);
            $table->index(['user_id', 'expires_at']);
        });

        // 4. Kolom paket di orders
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('assessment_package_id')->nullable()->after('assessment_id')->constrained('assessment_packages')->nullOnDelete();
            $table->unsignedInteger('package_attempts')->default(1)->after('assessment_package_id');
            $table->unsignedInteger('package_validity_days')->default(35)->after('package_attempts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['assessment_package_id']);
            $table->dropColumn(['assessment_package_id', 'package_attempts', 'package_validity_days']);
        });

        Schema::dropIfExists('user_assessment_accesses');
        Schema::dropIfExists('assessment_packages');

        Schema::table('assessments', function (Blueprint $table) {
            $table->dropColumn(['max_attempts', 'access_validity_days']);
        });
    }
};
