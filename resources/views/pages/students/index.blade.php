@extends('layouts.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('students.create') }}" class="btn btn-primary btn-sm">Create Student</a>
        </div>
    </div>
    <div class="card mt-2">
        <h5 class="card-header">Table Students</h5>
        <div class="table-responsive text-nowrap p-3">
            <table class="table" id="example">
                <thead>
                    <tr class="text-nowrap table-dark">
                        <th class="text-white">No</th>
                        <th class="text-white">Name</th>
                        <th class="text-white">Email</th>
                        <th class="text-white">Cabang</th>
                        <th class="text-white">Address</th>
                        <th class="text-white">Phone</th>
                        <th class="text-white">Packages</th>
                        <th class="text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $student->user->name }}</td>
                        <td>{{ $student->user->email }}</td>
                        <td>{{ $student->cabang ?? '-' }}</td>
                        <td>{{ $student->address }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>
                            @foreach ($student->packages as $package)
                                {{ $package->name }} - {{ $package->type }} {{ $package->level == $package->name ? '' : '- ' . $package->level }} - <span class="{{ $package->pivot->status == 'active' ? 'badge bg-success' : 'badge bg-danger' }}">{{ $package->pivot->status }}</span><br>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- / Content -->
@endsection
