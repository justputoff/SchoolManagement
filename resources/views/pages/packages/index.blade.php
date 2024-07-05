@extends('layouts.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header">
            <a href="{{ route('packages.create') }}" class="btn btn-primary btn-sm">Create</a>
        </div>
    </div>
    <div class="card mt-2">
        <h5 class="card-header">Table Packages</h5>
        <div class="table-responsive text-nowrap p-3">
            <table class="table" id="example">
                <thead>
                    <tr class="text-nowrap table-dark">
                        <th class="text-white">No</th>
                        <th class="text-white">Name</th>
                        <th class="text-white">Type</th>
                        <th class="text-white">Level</th>
                        <th class="text-white">Prices</th>
                        <th class="text-white">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($packages as $package)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $package->name }}</td>
                        <td>{{ $package->type }}</td>
                        <td>{{ $package->level }}</td>
                        <td>
                            @foreach ($package->prices as $price)
                                <div>{{ $price->duration }}: Rp {{ number_format($price->price, 2, ',', '.') }}</div>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('packages.edit', $package->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('packages.destroy', $package->id) }}" method="POST" style="display:inline-block;">
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
