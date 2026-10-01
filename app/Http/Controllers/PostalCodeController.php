<?php

namespace App\Http\Controllers;

use App\Models\PostalCode;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostalCodeController extends Controller
{
    public function search(Request $request): JsonResponse
    {
        $query = $request->get('q', '');

        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $results = PostalCode::where('postal_code', 'like', "%{$query}%")
            ->orWhere('urban_village', 'ilike', "%{$query}%")
            ->orWhere('district_city', 'ilike', "%{$query}%")
            ->orWhere('sub_district', 'ilike', "%{$query}%")
            ->take(15)
            ->get();

        return response()->json($results);
    }
}
