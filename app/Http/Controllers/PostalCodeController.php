<?php

namespace App\Http\Controllers;

use App\Models\PostalCode;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostalCodeController extends Controller
{
    public function search(Request $request): JsonResponse
    {
        $query = $request->get('q', '');

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $driver = DB::connection()->getDriverName();
        $likeOp = $driver === 'pgsql' ? 'ilike' : 'like';

        $results = PostalCode::query()
            ->where('postal_code', 'like', "%{$query}%")
            ->orWhere('urban_village', $likeOp, "%{$query}%")
            ->orWhere('district_city', $likeOp, "%{$query}%")
            ->orWhere('sub_district', $likeOp, "%{$query}%")
            ->take(15)
            ->get();

        return response()->json($results);
    }
}
