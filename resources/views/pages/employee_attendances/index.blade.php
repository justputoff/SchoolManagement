@extends('layouts.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('employee-attendances.create') }}" class="btn btn-primary btn-sm">Create Employee Attendance</a>
        </div>
    </div>
    <div class="card mt-2">
        <h5 class="card-header">Table Employee Attendances</h5>
        <div class="table-responsive text-nowrap p-3">
            <table class="table" id="example">
                <thead>
                    <tr class="text-nowrap table-dark">
                        <th class="text-white">No</th>
                        <th class="text-white">Tanggal Presensi</th>
                        <th class="text-white">Nama Pengambil Presensi</th>
                        <th class="text-white">Nama Pegawai</th>
                        <th class="text-white">Deskripsi</th>
                        <th class="text-white">Foto Presensi</th>
                        @if (Auth::user()->role->name == 'admin')
                        <th class="text-white">Actions</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employeeAttendances as $employeeAttendance)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $employeeAttendance->created_at->format('d F Y h:i') }}</td>
                        <td>{{ $employeeAttendance->user->name }}</td>
                        <td>{{ $employeeAttendance->name }}</td>
                        <td>{{ $employeeAttendance->description }}</td>
                        <td><a href="{{ Storage::url($employeeAttendance->attendance_image) }}" target="_blank">View</a></td>
                        @if (Auth::user()->role->name == 'admin')
                        <td>
                            <a href="{{ route('employee-attendances.edit', $employeeAttendance->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('employee-attendances.destroy', $employeeAttendance->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- / Content -->
@endsection
