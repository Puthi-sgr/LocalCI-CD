<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Models\Vendor;

class VendorController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Vendor::all());
    }

    public function show($id): JsonResponse
    {
        $vendor = Vendor::find($id);
        if (!$vendor) {
            return response()->json(['message' => 'Vendor not found'], 404);
        }
        return response()->json($vendor);
    }

}
