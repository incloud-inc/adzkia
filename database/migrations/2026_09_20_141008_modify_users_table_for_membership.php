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
        Schema::table('users', function (Blueprint $table) {
            // Drop foreign key before dropping column or renaming
            $table->dropForeign(['tenant_id']);

            // Note: PostgreSQL requires renaming instead of dropping and recreating for simpler handling,
            // but we can just rename the column and add the foreign key back.
            $table->renameColumn('tenant_id', 'current_tenant_id');

            $table->dropColumn('role');
        });

        // Add foreign key back to current_tenant_id
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('current_tenant_id')->references('id')->on('tenants')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['current_tenant_id']);
            $table->renameColumn('current_tenant_id', 'tenant_id');
            $table->enum('role', ['superadmin', 'admin', 'guru', 'siswa'])->default('siswa');
        });

        Schema::table('users', function (Blueprint $table) {
            $table->foreign('tenant_id')->references('id')->on('tenants')->nullOnDelete();
        });
    }
};
