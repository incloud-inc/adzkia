<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class SalesReportController extends Controller
{
    /**
     * Display sales & revenue distribution report.
     */
    public function index(Request $request): View
    {
        $user = Auth::user();
        $isSuperUser = $user && $user->isSuperUser();
        $currentTenantId = $user?->current_tenant_id ?? $user?->tenants()->first()?->id;

        $query = Order::with(['user', 'tenant', 'assessment'])->latest();

        // Scope to tenant if not superuser or if superuser has selected a tenant filter
        if (! $isSuperUser) {
            $query->where('tenant_id', $currentTenantId);
        } elseif ($request->filled('tenant_id') && $request->tenant_id !== 'all') {
            $query->where('tenant_id', $request->tenant_id);
        }

        // Filter: Date Range
        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }

        // Filter: Status
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Summary Calculations (Based on settled transactions for true financial realization)
        $summaryQuery = (clone $query)->where('status', 'settled');

        $totalGrossRevenue = (float) (clone $summaryQuery)->sum('price_amount');
        $totalPlatformRevenue = (float) (clone $summaryQuery)->sum('platform_revenue_amount');
        $totalTenantRevenue = (float) (clone $summaryQuery)->sum('tenant_revenue_amount');
        $totalSettledCount = (int) (clone $summaryQuery)->count();
        $totalOrdersCount = (int) (clone $query)->count();

        $orders = $query->paginate(15)->withQueryString();
        $tenants = $isSuperUser ? Tenant::orderBy('name')->get() : collect();

        return view('reports.sales', compact(
            'orders',
            'totalGrossRevenue',
            'totalPlatformRevenue',
            'totalTenantRevenue',
            'totalSettledCount',
            'totalOrdersCount',
            'tenants',
            'isSuperUser'
        ));
    }

    /**
     * Export sales report to CSV.
     */
    public function exportCsv(Request $request): StreamedResponse
    {
        $user = Auth::user();
        $isSuperUser = $user && $user->isSuperUser();
        $currentTenantId = $user?->current_tenant_id ?? $user?->tenants()->first()?->id;

        $query = Order::with(['user', 'tenant', 'assessment'])->latest();

        if (! $isSuperUser) {
            $query->where('tenant_id', $currentTenantId);
        } elseif ($request->filled('tenant_id') && $request->tenant_id !== 'all') {
            $query->where('tenant_id', $request->tenant_id);
        }

        if ($request->filled('start_date')) {
            $query->whereDate('created_at', '>=', $request->start_date);
        }
        if ($request->filled('end_date')) {
            $query->whereDate('created_at', '<=', $request->end_date);
        }
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="laporan_penjualan_'.now()->format('Ymd_His').'.csv"',
        ];

        return response()->stream(function () use ($query) {
            $handle = fopen('php://output', 'w');
            fputcsv($handle, [
                'No. Order',
                'Tanggal',
                'Nama Siswa',
                'Email Siswa',
                'Nama Asesmen',
                'Tenant / Institusi',
                'Metode Pembayaran',
                'Total Harga (Rp)',
                'Porsi ADZKIA (Rp)',
                'Porsi ADZKIA (%)',
                'Porsi Tenant (Rp)',
                'Porsi Tenant (%)',
                'Status',
                'Tanggal Lunas',
            ]);

            $query->chunk(100, function ($orders) use ($handle) {
                foreach ($orders as $o) {
                    fputcsv($handle, [
                        $o->order_number,
                        $o->created_at->format('Y-m-d H:i:s'),
                        $o->user?->name ?? '—',
                        $o->user?->email ?? '—',
                        $o->assessment?->title ?? '—',
                        $o->tenant?->name ?? 'Platform Global',
                        $o->payment_method ?? '—',
                        $o->price_amount,
                        $o->platform_revenue_amount,
                        $o->revenue_share_platform_pct.'%',
                        $o->tenant_revenue_amount,
                        $o->revenue_share_tenant_pct.'%',
                        strtoupper($o->status),
                        $o->paid_at ? $o->paid_at->format('Y-m-d H:i:s') : '—',
                    ]);
                }
            });

            fclose($handle);
        }, 200, $headers);
    }
}
