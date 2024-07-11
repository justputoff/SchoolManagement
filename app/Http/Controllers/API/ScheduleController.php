<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Schedule;

class ScheduleController extends Controller
{
    public function index()
    {
        $schedules = Schedule::with(['classroom', 'subject', 'teacher'])->get();
        return response()->json([
            'message' => 'Schedules fetched successfully',
            'schedules' => $schedules
        ], 200);
    }
}
