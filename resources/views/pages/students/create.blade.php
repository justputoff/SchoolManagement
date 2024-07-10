@extends('layouts.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Create Student</h4>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('students.store') }}" method="POST">
                @csrf
                {{-- <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div> --}}
                <div class="mb-3">
                    <label for="cabang" class="form-label">Cabang</label>
                    <select class="form-control" id="cabang" name="cabang" required>
                        <option value="PASAR-AMBACANG">PASAR-AMBACANG</option>
                        <option value="MATA-AIR">MATA-AIR</option>
                    </select>
                </div>
                {{-- <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div> --}}
                <div class="mb-3">
                    <label for="user_id" class="form-label">User</label>
                    <select class="form-control" id="user_id" name="user_id" required>
                        @foreach($users as $user)
                            @if (!$user->student)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Packages</label>
                    <div class="row">
                        @foreach($packages as $package)
                            <div class="col-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="package_{{ $package->id }}" name="package_id[]" value="{{ $package->id }}">
                                    <label class="form-check-label" for="package_{{ $package->id }}">
                                        {{ $package->name }} {{ $package->type }} {{ $package->level == $package->name ? '' : '- ' . $package->level }}
                                    </label>
                                    <input type="hidden" name="status[]" value="active">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
            </form>
        </div>
    </div>
</div>
<!-- / Content -->
@endsection
