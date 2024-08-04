@extends('layouts.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Create Employee Attendance</h4>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('employee-attendances.update', $employeeAttendance->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Pegawai</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $employeeAttendance->user->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="attendance_image" class="form-label">Foto Presensi</label>
                    <input type="file" class="form-control" id="attendance_image" name="attendance_image">
                    <a href="{{ Storage::url($employeeAttendance->attendance_image) }}" target="_blank">Lihat Foto</a>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{ $employeeAttendance->description }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
<!-- / Content -->
@endsection
