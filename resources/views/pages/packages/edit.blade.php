@extends('layouts.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Edit Package</h4>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('packages.update', $package->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $package->name }}" required>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-control" id="type" name="type" required>
                        <option value="Reguler" {{ $package->type == 'Reguler' ? 'selected' : '' }}>Reguler</option>
                        <option value="Private" {{ $package->type == 'Private' ? 'selected' : '' }}>Private</option>
                        <option value="Home Service" {{ $package->type == 'Home Service' ? 'selected' : '' }}>Home Service</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="level" class="form-label">Level</label>
                    <select class="form-control" id="level" name="level" required>
                        <option value="Calistung" {{ $package->level == 'Calistung' ? 'selected' : '' }}>Calistung</option>
                        <option value="Bimbel SD" {{ $package->level == 'Bimbel SD' ? 'selected' : '' }}>Bimbel SD</option>
                        <option value="Bimbel SMP" {{ $package->level == 'Bimbel SMP' ? 'selected' : '' }}>Bimbel SMP</option>
                        <option value="Bimbel SMA" {{ $package->level == 'Bimbel SMA' ? 'selected' : '' }}>Bimbel SMA</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" required>{{ $package->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label for="prices" class="form-label">Prices</label>
                    @foreach ($package->prices as $price)
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="durations[]" value="{{ $price->duration }}" placeholder="Duration (e.g., 1 bulan)" required>
                            <input type="number" class="form-control" name="prices[]" value="{{ $price->price }}" placeholder="Price" required>
                        </div>
                    @endforeach
                    <div id="additional-prices"></div>
                    <button type="button" class="btn btn-secondary btn-sm" onclick="addPriceField()">Add More Prices</button>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
<!-- / Content -->

<script>
function addPriceField() {
    const additionalPrices = document.getElementById('additional-prices');
    const priceField = `
        <div class="input-group mb-2">
            <input type="text" class="form-control" name="durations[]" placeholder="Duration (e.g., 2 bulan)" required>
            <input type="number" class="form-control" name="prices[]" placeholder="Price" required>
        </div>
    `;
    additionalPrices.insertAdjacentHTML('beforeend', priceField);
}
</script>
@endsection
