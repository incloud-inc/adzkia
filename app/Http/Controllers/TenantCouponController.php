<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Models\CouponUsage;
use App\Models\Tenant;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class TenantCouponController extends Controller
{
    /**
     * Resolve the current tenant and ensure user has access.
     */
    protected function resolveCurrentTenant(): ?Tenant
    {
        $user = Auth::user();
        if (! $user) {
            return null;
        }

        return $user->currentTenant ?? $user->tenants()->first();
    }

    /**
     * Display a listing of coupons for the Enterprise tenant.
     * Non-Enterprise tenants are shown an informative upsell view.
     */
    public function index(): View|RedirectResponse
    {
        $tenant = $this->resolveCurrentTenant();
        if (! $tenant) {
            abort(403, 'Anda tidak terhubung dengan institusi tenant mana pun.');
        }

        // Tier Guard: Only Enterprise tenants can manage discounts
        if (! $tenant->canManageCoupons()) {
            return view('tenants.coupons.non-enterprise', compact('tenant'));
        }

        $coupons = Coupon::where('tenant_id', $tenant->id)
            ->withCount('usages')
            ->latest()
            ->paginate(15);

        // Calculate statistics
        $totalCoupons = Coupon::where('tenant_id', $tenant->id)->count();
        $activeCoupons = Coupon::where('tenant_id', $tenant->id)->where('is_active', true)->count();
        $totalUsedCount = Coupon::where('tenant_id', $tenant->id)->sum('used_count');

        $couponIds = Coupon::where('tenant_id', $tenant->id)->pluck('id');
        $totalDiscountAbsorbed = CouponUsage::whereIn('coupon_id', $couponIds)->sum('discount_amount');

        return view('tenants.coupons.index', compact(
            'tenant',
            'coupons',
            'totalCoupons',
            'activeCoupons',
            'totalUsedCount',
            'totalDiscountAbsorbed'
        ));
    }

    /**
     * Show form for creating a new coupon.
     */
    public function create(): View|RedirectResponse
    {
        $tenant = $this->resolveCurrentTenant();
        if (! $tenant || ! $tenant->canManageCoupons()) {
            abort(403, 'Fitur kupon diskon hanya tersedia untuk institusi mitra level Enterprise.');
        }

        return view('tenants.coupons.create', compact('tenant'));
    }

    /**
     * Store a newly created coupon.
     */
    public function store(Request $request): RedirectResponse
    {
        $tenant = $this->resolveCurrentTenant();
        if (! $tenant || ! $tenant->canManageCoupons()) {
            abort(403, 'Fitur kupon diskon hanya tersedia untuk institusi mitra level Enterprise.');
        }

        $validated = $request->validate([
            'code' => [
                'required',
                'string',
                'alpha_dash',
                'max:30',
                Rule::unique('coupons')->where('tenant_id', $tenant->id),
            ],
            'name' => 'required|string|max:150',
            'discount_type' => 'required|in:percentage,fixed',
            'discount_amount' => [
                'required',
                'numeric',
                'min:1',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->input('discount_type') === 'percentage' && (float) $value > 75) {
                        $fail('Diskon persentase maksimal adalah 75% demi menjaga alokasi pendapatan platform ADZKIA (25%).');
                    }
                },
            ],
            'max_discount' => 'nullable|numeric|min:0',
            'min_order_amount' => 'nullable|numeric|min:0',
            'usage_limit' => 'nullable|integer|min:1',
            'usage_limit_per_user' => 'required|integer|min:1|max:100',
            'valid_from' => 'nullable|date',
            'valid_until' => 'nullable|date|after_or_equal:valid_from',
            'is_active' => 'nullable|boolean',
        ]);

        Coupon::create([
            'tenant_id' => $tenant->id,
            'code' => strtoupper(trim($validated['code'])),
            'name' => $validated['name'],
            'discount_type' => $validated['discount_type'],
            'discount_amount' => $validated['discount_amount'],
            'max_discount' => $validated['max_discount'] ?? null,
            'min_order_amount' => $validated['min_order_amount'] ?? null,
            'usage_limit' => $validated['usage_limit'] ?? null,
            'usage_limit_per_user' => $validated['usage_limit_per_user'] ?? 1,
            'valid_from' => $validated['valid_from'] ?? null,
            'valid_until' => $validated['valid_until'] ?? null,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('tenant.coupons.index')
            ->with('success', 'Kupon diskon "'.strtoupper(trim($validated['code'])).'" berhasil diterbitkan!');
    }

    /**
     * Show form for editing a coupon.
     */
    public function edit(Coupon $coupon): View|RedirectResponse
    {
        $tenant = $this->resolveCurrentTenant();
        if (! $tenant || ! $tenant->canManageCoupons() || $coupon->tenant_id !== $tenant->id) {
            abort(403, 'Akses ditolak.');
        }

        return view('tenants.coupons.edit', compact('coupon', 'tenant'));
    }

    /**
     * Update an existing coupon.
     */
    public function update(Request $request, Coupon $coupon): RedirectResponse
    {
        $tenant = $this->resolveCurrentTenant();
        if (! $tenant || ! $tenant->canManageCoupons() || $coupon->tenant_id !== $tenant->id) {
            abort(403, 'Akses ditolak.');
        }

        $validated = $request->validate([
            'code' => [
                'required',
                'string',
                'alpha_dash',
                'max:30',
                Rule::unique('coupons')->where('tenant_id', $tenant->id)->ignore($coupon->id),
            ],
            'name' => 'required|string|max:150',
            'discount_type' => 'required|in:percentage,fixed',
            'discount_amount' => [
                'required',
                'numeric',
                'min:1',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->input('discount_type') === 'percentage' && (float) $value > 75) {
                        $fail('Diskon persentase maksimal adalah 75% demi menjaga alokasi pendapatan platform ADZKIA (25%).');
                    }
                },
            ],
            'max_discount' => 'nullable|numeric|min:0',
            'min_order_amount' => 'nullable|numeric|min:0',
            'usage_limit' => 'nullable|integer|min:1',
            'usage_limit_per_user' => 'required|integer|min:1|max:100',
            'valid_from' => 'nullable|date',
            'valid_until' => 'nullable|date|after_or_equal:valid_from',
            'is_active' => 'nullable|boolean',
        ]);

        $coupon->update([
            'code' => strtoupper(trim($validated['code'])),
            'name' => $validated['name'],
            'discount_type' => $validated['discount_type'],
            'discount_amount' => $validated['discount_amount'],
            'max_discount' => $validated['max_discount'] ?? null,
            'min_order_amount' => $validated['min_order_amount'] ?? null,
            'usage_limit' => $validated['usage_limit'] ?? null,
            'usage_limit_per_user' => $validated['usage_limit_per_user'] ?? 1,
            'valid_from' => $validated['valid_from'] ?? null,
            'valid_until' => $validated['valid_until'] ?? null,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('tenant.coupons.index')
            ->with('success', 'Kupon diskon "'.$coupon->code.'" berhasil diperbarui.');
    }

    /**
     * Delete a coupon.
     */
    public function destroy(Coupon $coupon): RedirectResponse
    {
        $tenant = $this->resolveCurrentTenant();
        if (! $tenant || ! $tenant->canManageCoupons() || $coupon->tenant_id !== $tenant->id) {
            abort(403, 'Akses ditolak.');
        }

        $code = $coupon->code;
        $coupon->delete();

        return redirect()->route('tenant.coupons.index')
            ->with('success', 'Kupon diskon "'.$code.'" berhasil dihapus.');
    }

    /**
     * Toggle active status of a coupon.
     */
    public function toggleStatus(Coupon $coupon): RedirectResponse|JsonResponse
    {
        $tenant = $this->resolveCurrentTenant();
        if (! $tenant || ! $tenant->canManageCoupons() || $coupon->tenant_id !== $tenant->id) {
            abort(403, 'Akses ditolak.');
        }

        $coupon->update(['is_active' => ! $coupon->is_active]);

        $statusLabel = $coupon->is_active ? 'diaktifkan' : 'dinonaktifkan';

        if (request()->wantsJson()) {
            return response()->json([
                'success' => true,
                'is_active' => $coupon->is_active,
                'message' => "Kupon {$coupon->code} berhasil {$statusLabel}.",
            ]);
        }

        return redirect()->route('tenant.coupons.index')
            ->with('success', "Kupon {$coupon->code} berhasil {$statusLabel}.");
    }
}
