<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with(['user', 'schedules'])->get();
        return response()->json([
            'message' => 'Teachers fetched successfully',
            'teachers' => $teachers
        ], 200);
    }
}
