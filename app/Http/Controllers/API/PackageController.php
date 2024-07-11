<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::with(['prices'])->get();
        return response()->json([
            'message' => 'Packages fetched successfully',
            'packages' => $packages
        ], 200);
    }
}
