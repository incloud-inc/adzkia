<?php

namespace App\Http\Controllers;

use App\Models\PayoutRequest;
use App\Models\Tenant;
use App\Models\TenantWallet;
use App\Models\WalletTransaction;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TenantWalletController extends Controller
{
    /**
     * Display tenant wallet, balance, and transaction history.
     */
    public function index(Request $request): View|RedirectResponse
    {
        $user = Auth::user();
        if (! $user) {
            return redirect()->route('login');
        }

        $tenantId = $request->query('tenant_id') ?? $user->current_tenant_id ?? $user->tenants()->first()?->id;

        // If Super User, allow viewing specific tenant or defaulting to first tenant
        if ($user->isSuperUser() && ! $tenantId) {
            $tenant = Tenant::first();
        } else {
            $tenant = Tenant::find($tenantId);
        }

        if (! $tenant) {
            return redirect()->route('dashboard')->with('error', 'Tenant tidak ditemukan.');
        }

        $wallet = TenantWallet::getOrCreate($tenant->id);
        $transactions = $wallet->transactions()->paginate(15);
        $payoutRequests = PayoutRequest::where('tenant_id', $tenant->id)->latest()->take(10)->get();

        $allTenants = $user->isSuperUser() ? Tenant::orderBy('name')->get() : collect();

        return view('wallet.index', compact('tenant', 'wallet', 'transactions', 'payoutRequests', 'allTenants'));
    }

    /**
     * Submit payout request by tenant.
     */
    public function requestPayout(Request $request): RedirectResponse
    {
        $user = Auth::user();
        $tenantId = $user->current_tenant_id ?? $user->tenants()->first()?->id;

        if (! $tenantId) {
            return back()->with('error', 'Ruang kerja tenant tidak valid.');
        }

        $validated = $request->validate([
            'amount' => 'required|numeric|min:50000',
            'bank_name' => 'required|string|max:50',
            'bank_account_number' => 'required|string|max:50',
            'bank_account_name' => 'required|string|max:100',
            'notes' => 'nullable|string|max:255',
        ]);

        $amount = (float) $validated['amount'];

        return DB::transaction(function () use ($tenantId, $user, $validated, $amount) {
            $wallet = TenantWallet::where('tenant_id', $tenantId)->lockForUpdate()->firstOrFail();

            if ($wallet->balance < $amount) {
                return back()->with('error', 'Saldo tidak mencukupi untuk melakukan penarikan sebesar Rp '.number_format($amount, 0, ',', '.'));
            }

            // Deduct available balance and hold it
            $wallet->balance -= $amount;
            $wallet->held_balance += $amount;
            $wallet->save();

            $payout = PayoutRequest::create([
                'tenant_id' => $tenantId,
                'requested_by' => $user->id,
                'amount' => $amount,
                'bank_name' => $validated['bank_name'],
                'bank_account_number' => $validated['bank_account_number'],
                'bank_account_name' => $validated['bank_account_name'],
                'status' => 'pending',
                'notes' => $validated['notes'] ?? null,
            ]);

            WalletTransaction::create([
                'tenant_wallet_id' => $wallet->id,
                'type' => 'debit',
                'amount' => $amount,
                'balance_after' => $wallet->balance,
                'reference_type' => 'payout',
                'reference_id' => $payout->id,
                'description' => "Pengajuan penarikan dana ke {$validated['bank_name']} ({$validated['bank_account_number']})",
            ]);

            return back()->with('success', 'Pengajuan penarikan dana sebesar Rp '.number_format($amount, 0, ',', '.').' berhasil diajukan dan sedang menunggu verifikasi ADZKIA.');
        });
    }

    /**
     * Admin/Super User: View all payout requests across all tenants.
     */
    public function adminPayouts(Request $request): View|RedirectResponse
    {
        $user = Auth::user();
        if (! $user || ! $user->isSuperUser()) {
            abort(403, 'Akses terbatas untuk Owner / Super User ADZKIA.');
        }

        $query = PayoutRequest::with(['tenant', 'requester', 'approver'])->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $payouts = $query->paginate(20);

        return view('wallet.admin-payouts', compact('payouts'));
    }

    /**
     * Admin/Super User: Approve payout request with transfer receipt.
     */
    public function approvePayout(Request $request, PayoutRequest $payoutRequest): RedirectResponse
    {
        $user = Auth::user();
        if (! $user || ! $user->isSuperUser()) {
            abort(403);
        }

        if ($payoutRequest->status !== 'pending') {
            return back()->with('error', 'Status penarikan ini sudah tidak pending.');
        }

        $validated = $request->validate([
            'proof_file' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:4096',
            'notes' => 'nullable|string|max:255',
        ]);

        $proofPath = null;
        if ($request->hasFile('proof_file')) {
            $proofPath = $request->file('proof_file')->store('payout-proofs', 'public');
        }

        DB::transaction(function () use ($payoutRequest, $user, $proofPath, $validated) {
            $wallet = TenantWallet::where('tenant_id', $payoutRequest->tenant_id)->lockForUpdate()->firstOrFail();

            // Release from held balance into total withdrawn
            $wallet->held_balance = max(0, $wallet->held_balance - $payoutRequest->amount);
            $wallet->total_withdrawn += $payoutRequest->amount;
            $wallet->save();

            $payoutRequest->update([
                'status' => 'approved',
                'approved_by' => $user->id,
                'proof_path' => $proofPath,
                'notes' => $validated['notes'] ?? $payoutRequest->notes,
                'processed_at' => now(),
            ]);
        });

        return back()->with('success', "Penarikan dana #{$payoutRequest->id} sebesar Rp ".number_format($payoutRequest->amount, 0, ',', '.').' berhasil disetujui.');
    }

    /**
     * Admin/Super User: Reject payout request and refund amount to tenant wallet.
     */
    public function rejectPayout(Request $request, PayoutRequest $payoutRequest): RedirectResponse
    {
        $user = Auth::user();
        if (! $user || ! $user->isSuperUser()) {
            abort(403);
        }

        if ($payoutRequest->status !== 'pending') {
            return back()->with('error', 'Status penarikan ini sudah tidak pending.');
        }

        $validated = $request->validate([
            'rejection_reason' => 'required|string|max:255',
        ]);

        DB::transaction(function () use ($payoutRequest, $user, $validated) {
            $wallet = TenantWallet::where('tenant_id', $payoutRequest->tenant_id)->lockForUpdate()->firstOrFail();

            // Return held balance back to available balance
            $wallet->held_balance = max(0, $wallet->held_balance - $payoutRequest->amount);
            $wallet->balance += $payoutRequest->amount;
            $wallet->save();

            $payoutRequest->update([
                'status' => 'rejected',
                'approved_by' => $user->id,
                'rejection_reason' => $validated['rejection_reason'],
                'processed_at' => now(),
            ]);

            WalletTransaction::create([
                'tenant_wallet_id' => $wallet->id,
                'type' => 'credit',
                'amount' => $payoutRequest->amount,
                'balance_after' => $wallet->balance,
                'reference_type' => 'payout',
                'reference_id' => $payoutRequest->id,
                'description' => "Pengembalian dana penarikan #{$payoutRequest->id} yang ditolak: {$validated['rejection_reason']}",
            ]);
        });

        return back()->with('info', "Penarikan dana #{$payoutRequest->id} telah ditolak dan dana dikembalikan ke dompet tenant.");
    }
}
