<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subject;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::with(['schedules', 'packages'])->get();
        return response()->json([
            'message' => 'Subjects fetched successfully',
            'subjects' => $subjects
        ], 200);
    }
}
