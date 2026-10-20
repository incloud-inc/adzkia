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
        // 1. Coupons table for Enterprise Tenants
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained('tenants')->cascadeOnDelete();
            $table->string('code', 50);
            $table->string('name', 150);
            $table->string('discount_type', 20)->default('percentage'); // 'percentage' or 'fixed'
            $table->decimal('discount_amount', 12, 2);
            $table->decimal('max_discount', 12, 2)->nullable();
            $table->decimal('min_order_amount', 12, 2)->nullable();
            $table->unsignedInteger('usage_limit')->nullable();
            $table->unsignedInteger('usage_limit_per_user')->default(1);
            $table->unsignedInteger('used_count')->default(0);
            $table->timestamp('valid_from')->nullable();
            $table->timestamp('valid_until')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['tenant_id', 'code']);
            $table->index(['tenant_id', 'is_active']);
            $table->index('code');
        });

        // 2. Coupon usages history tracking
        Schema::create('coupon_usages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('coupon_id')->constrained('coupons')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->decimal('discount_amount', 12, 2)->default(0);
            $table->timestamps();

            $table->index(['coupon_id', 'user_id']);
            $table->index(['user_id', 'order_id']);
        });

        // 3. Add discount fields to orders table
        Schema::table('orders', function (Blueprint $table) {
            $table->foreignId('coupon_id')->nullable()->after('assessment_package_id')->constrained('coupons')->nullOnDelete();
            $table->string('coupon_code_snapshot', 50)->nullable()->after('coupon_id');
            $table->decimal('discount_amount', 12, 2)->default(0)->after('price_amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropForeign(['coupon_id']);
            $table->dropColumn(['coupon_id', 'coupon_code_snapshot', 'discount_amount']);
        });

        Schema::dropIfExists('coupon_usages');
        Schema::dropIfExists('coupons');
    }
};
