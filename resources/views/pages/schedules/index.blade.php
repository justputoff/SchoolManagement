@extends('layouts.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('schedules.create') }}" class="btn btn-primary btn-sm">Create Schedule</a>
        </div>
    </div>
    <div class="card mt-2">
        <h5 class="card-header">Table Schedules</h5>
        <div class="table-responsive text-nowrap p-3">
            <table class="table" id="example">
                <thead>
                    <tr class="text-nowrap table-dark">
                        <th class="text-white">No</th>
                        <th class="text-white">Class Room</th>
                        <th class="text-white">Subject</th>
                        <th class="text-white">Teacher</th>
                        <th class="text-white">Date</th>
                        <th class="text-white">Start Time</th>
                        <th class="text-white">End Time</th>
                        <th class="text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($schedules as $schedule)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $schedule->classRoom->name }}</td>
                        <td>{{ $schedule->subject->name }} - {{ $schedule->subject->package->name }} - {{ $schedule->subject->package->type }} {{ $schedule->subject->package->level == $schedule->subject->package->name ? '' : '- ' . $schedule->subject->package->level }}</td>
                        <td>{{ $loop->iteration }}{{ $schedule->teacher->name }}</td>
                        <td>{{ $schedule->date }}</td>
                        <td>{{ $schedule->start_time }}</td>
                        <td>{{ $schedule->end_time }}</td>
                        <td>
                            <a href="{{ route('schedules.edit', $schedule->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" style="display:inline-block;">
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
