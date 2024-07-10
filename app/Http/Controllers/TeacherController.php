<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('pages.teachers.index', compact('teachers'));
    }

    public function create()
    {
        $users = User::where('role_id', 2)->get(); // Asumsi role_id 2 adalah untuk teacher
        return view('pages.teachers.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        Teacher::create($request->all());

        return redirect()->route('teachers.index')
                         ->with('success', 'Teacher created successfully.');
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $users = User::where('role_id', 2)->get(); // Asumsi role_id 2 adalah untuk teacher
        return view('pages.teachers.edit', compact('teacher', 'users'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        $teacher = Teacher::findOrFail($id);
        $teacher->update($request->all());

        return redirect()->route('teachers.index')
                         ->with('success', 'Teacher updated successfully.');
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teachers.index')
                         ->with('success', 'Teacher deleted successfully.');
    }
}
