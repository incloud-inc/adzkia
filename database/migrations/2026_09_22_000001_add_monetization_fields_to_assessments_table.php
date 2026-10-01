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
            $table->string('price_type', 20)->default('free')->after('status'); // free, paid
            $table->decimal('price', 12, 2)->default(0)->after('price_type');
            $table->unsignedTinyInteger('revenue_share_tenant_pct')->default(50)->after('price');
            $table->unsignedTinyInteger('revenue_share_platform_pct')->default(50)->after('revenue_share_tenant_pct');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->dropColumn([
                'price_type',
                'price',
                'revenue_share_tenant_pct',
                'revenue_share_platform_pct',
            ]);
        });
    }
};
