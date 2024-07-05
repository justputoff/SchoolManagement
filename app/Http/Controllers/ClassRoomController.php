<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\Teacher;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    public function index()
    {
        $classRooms = ClassRoom::all();
        return view('pages.class_rooms.index', compact('classRooms'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        return view('pages.class_rooms.create', compact('teachers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'schedule' => 'required|string|max:255',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        ClassRoom::create($request->only('name', 'schedule', 'teacher_id'));

        return redirect()->route('class_rooms.index')
                         ->with('success', 'Class Room created successfully.');
    }

    public function edit($id)
    {
        $classRoom = ClassRoom::findOrFail($id);
        $teachers = Teacher::all();
        return view('pages.class_rooms.edit', compact('classRoom', 'teachers'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $classRoom = ClassRoom::findOrFail($id);
        $classRoom->update($request->only('name'));

        return redirect()->route('class_rooms.index')
                         ->with('success', 'Class Room updated successfully.');
    }

    public function destroy($id)
    {
        $classRoom = ClassRoom::findOrFail($id);
        $classRoom->delete();

        return redirect()->route('class_rooms.index')
                         ->with('success', 'Class Room deleted successfully.');
    }
}