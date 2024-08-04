<?php

namespace App\Http\Controllers;

use App\Models\EmployeeAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeAttendanceController extends Controller
{
    public function index()
    {
        $employeeAttendances = EmployeeAttendance::all();
        return view('pages.employee_attendances.index', compact('employeeAttendances'));
    }

    public function create()
    {
        return view('pages.employee_attendances.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'attendance_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->user()->id;
        if ($request->hasFile('attendance_image')) {
            $data['attendance_image'] = $request->file('attendance_image')->store('attendance_images', 'public');
        }
        EmployeeAttendance::create($data);
        return redirect()->route('employee-attendances.index')->with('success', 'Presensi berhasil dibuat');
    }

    public function edit(EmployeeAttendance $employeeAttendance)
    {
        return view('pages.employee_attendances.edit', compact('employeeAttendance'));
    }

    public function update(Request $request, EmployeeAttendance $employeeAttendance)
    {
        $request->validate([
            'name' => 'required',
            'attendance_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
        ]);

        $data = $request->all();
        if ($request->hasFile('attendance_image')) {
            $data['attendance_image'] = $request->file('attendance_image')->store('attendance_images', 'public');
            Storage::delete($employeeAttendance->attendance_image);
        }
        $employeeAttendance->update($data);
        return redirect()->route('employee-attendances.index')->with('success', 'Presensi berhasil diubah');
    }

    public function destroy(EmployeeAttendance $employeeAttendance)
    {
        Storage::delete($employeeAttendance->attendance_image);
        $employeeAttendance->delete();
        return redirect()->route('employee-attendances.index')->with('success', 'Presensi berhasil dihapus');
    }
}
