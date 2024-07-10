<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('packages', 'user')->get();
        return view('pages.students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $packages = Package::all();
        $users = User::where('role_id', 3)->get(); // Hanya ambil pengguna dengan role_id 3
        return view('pages.students.create', compact('packages', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'name' => 'required|string|max:255',
            // 'email' => 'required|email|unique:students,email',
            'user_id' => 'required|exists:users,id',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'package_id' => 'nullable|array',
            'package_id.*' => 'exists:packages,id',
            'cabang' => 'required|string|max:255',
        ]);

        $student = Student::create($request->only('user_id', 'address', 'phone', 'cabang'));

        if ($request->package_id) {
            foreach ($request->package_id as $index => $packageId) {
                $student->packages()->attach($packageId, ['status' => 'active']);
            }
        }

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $packages = Package::all();
        $users = User::where('role_id', 3)->get(); // Hanya ambil pengguna dengan role_id 3
        return view('pages.students.edit', compact('student', 'packages', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            // 'name' => 'required|string|max:255',
            // 'email' => 'required|email|unique:students,email,' . $student->id,
            'user_id' => 'required|exists:users,id',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'package_id' => 'nullable|array',
            'package_id.*' => 'exists:packages,id',
            'status' => 'required|array',
            'status.*' => 'in:active,inactive',
            'cabang' => 'required|string|max:255',
        ]);

        $student->update($request->only('user_id', 'address', 'phone', 'cabang'));

        // Sync packages with status
        $syncData = [];
        if ($request->package_id) {
            foreach ($request->package_id as $packageId) {
                if (isset($request->status[$packageId])) {
                    $syncData[$packageId] = ['status' => $request->status[$packageId]];
                }
            }
        }
        $student->packages()->sync($syncData);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}