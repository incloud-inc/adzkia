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
        // 1. Orders table for assessment purchases
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number', 50)->unique();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('tenant_id')->nullable()->constrained('tenants')->nullOnDelete();
            $table->foreignId('assessment_id')->constrained('assessments')->cascadeOnDelete();

            $table->decimal('price_amount', 12, 2)->default(0);
            $table->decimal('admin_fee', 12, 2)->default(0);
            $table->decimal('total_amount', 12, 2)->default(0);

            $table->string('payment_gateway', 30)->default('duitku'); // duitku, doku, sandbox
            $table->string('payment_method', 50)->nullable(); // QRIS, VA_BCA, SHOPEEPAY, etc.
            $table->string('payment_reference', 100)->nullable(); // Gateway transaction id
            $table->text('payment_url')->nullable(); // Checkout/payment URL
            $table->text('qr_code_url')->nullable(); // QR code string or image url
            $table->string('va_number', 50)->nullable(); // Virtual Account number
            $table->string('status', 30)->default('pending'); // pending, settled, expired, failed

            // Revenue share snapshot at transaction time
            $table->string('tenant_tier_snapshot', 30)->default('starter'); // starter, pro, enterprise
            $table->unsignedTinyInteger('revenue_share_tenant_pct')->default(25);
            $table->unsignedTinyInteger('revenue_share_platform_pct')->default(75);
            $table->decimal('tenant_revenue_amount', 12, 2)->default(0);
            $table->decimal('platform_revenue_amount', 12, 2)->default(0);

            $table->timestamp('paid_at')->nullable();
            $table->timestamp('expired_at')->nullable();
            $table->json('gateway_payload')->nullable();
            $table->timestamps();

            $table->index(['user_id', 'assessment_id', 'status']);
            $table->index(['tenant_id', 'status']);
            $table->index('created_at');
        });

        // 2. Tenant Wallets
        Schema::create('tenant_wallets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->unique()->constrained('tenants')->cascadeOnDelete();
            $table->decimal('balance', 14, 2)->default(0);
            $table->decimal('held_balance', 14, 2)->default(0);
            $table->decimal('total_earned', 14, 2)->default(0);
            $table->decimal('total_withdrawn', 14, 2)->default(0);
            $table->timestamps();
        });

        // 3. Wallet Transactions
        Schema::create('wallet_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_wallet_id')->constrained('tenant_wallets')->cascadeOnDelete();
            $table->enum('type', ['credit', 'debit']);
            $table->decimal('amount', 12, 2);
            $table->decimal('balance_after', 14, 2);
            $table->string('reference_type', 50)->nullable(); // order, payout, adjustment
            $table->unsignedBigInteger('reference_id')->nullable();
            $table->string('description');
            $table->timestamps();

            $table->index(['tenant_wallet_id', 'created_at']);
        });

        // 4. Payout Requests
        Schema::create('payout_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained('tenants')->cascadeOnDelete();
            $table->foreignId('requested_by')->constrained('users')->cascadeOnDelete();
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();

            $table->decimal('amount', 12, 2);
            $table->string('bank_name', 50);
            $table->string('bank_account_number', 50);
            $table->string('bank_account_name', 100);
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('notes')->nullable();
            $table->text('rejection_reason')->nullable();
            $table->string('proof_path')->nullable();
            $table->timestamp('processed_at')->nullable();
            $table->timestamps();

            $table->index(['tenant_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payout_requests');
        Schema::dropIfExists('wallet_transactions');
        Schema::dropIfExists('tenant_wallets');
        Schema::dropIfExists('orders');
    }
};
