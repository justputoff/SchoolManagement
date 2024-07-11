<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ClassRoom;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    public function index()
    {
        $classrooms = ClassRoom::with(['schedules'])->get();
        return response()->json([
            'message' => 'ClassRooms fetched successfully',
            'classrooms' => $classrooms
        ], 200);
    }
}
