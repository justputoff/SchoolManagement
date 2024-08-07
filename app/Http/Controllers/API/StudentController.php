<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with(['user', 'payments', 'transactions', 'packages'])->get();
        return response()->json([
            'message' => 'Students fetched successfully',
            'students' => $students
        ], 200);
    }

    public function update(Request $request, $id)
    {
        try {
            // Validasi input
            $request->validate([
                'address' => 'required|string|max:255',
                'phone' => 'required|string|max:15',
                'cabang' => 'required|string|max:255',
            ]);

            // Temukan student berdasarkan ID
            $student = Student::findOrFail($id);

            // Update student
            $student->update($request->only(['address', 'phone', 'cabang']));

            return response()->json([
                'message' => 'Student updated successfully',
                'student' => $student
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                'message' => 'Failed to update student',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}