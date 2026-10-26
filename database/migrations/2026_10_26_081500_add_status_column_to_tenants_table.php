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
        if (! Schema::hasColumn('tenants', 'status')) {
            Schema::table('tenants', function (Blueprint $table) {
                $table->string('status', 20)->default('active')->after('plan');
                $table->index('status');
            });
        }

        // Normalisasi data: jika ada tenant dengan plan 'nonaktif' atau 'inactive',
        // ubah status menjadi 'inactive' dan kembalikan plan ke 'gratis'
        DB::table('tenants')
            ->whereIn('plan', ['nonaktif', 'inactive'])
            ->update([
                'status' => 'inactive',
                'plan' => 'gratis',
            ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('tenants', 'status')) {
            Schema::table('tenants', function (Blueprint $table) {
                $table->dropIndex(['status']);
                $table->dropColumn('status');
            });
        }
    }
};
