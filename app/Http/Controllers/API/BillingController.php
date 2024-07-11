<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Billing;

class BillingController extends Controller
{
    public function index()
    {
        $billings = Billing::with(['user','package','payments'])->where('user_id', auth()->user()->id)->get();
        return response()->json([
            'message' => 'Billings fetched successfully',
            'billings' => $billings
        ], 200);
    }
}
