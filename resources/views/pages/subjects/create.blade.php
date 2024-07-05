@extends('layouts.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Create Subject</h4>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('subjects.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="package_id" class="form-label">Package</label>
                    <select class="form-control" id="package_id" name="package_id" required>
                        @foreach($packages as $package)
                            <option value="{{ $package->id }}">{{ $package->name }} - {{ $package->type }} {{ $package->level == $package->name ? '' : '- ' . $package->level }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>
<!-- / Content -->
@endsection
