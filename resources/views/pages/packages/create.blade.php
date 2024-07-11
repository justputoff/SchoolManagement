@extends('layouts.main')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">Create Package</h4>
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('packages.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="type" class="form-label">Type</label>
                    <select class="form-control" id="type" name="type" required>
                        <option value="Reguler">Reguler</option>
                        <option value="Private">Private</option>
                        <option value="Home Service">Home Service</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="level" class="form-label">Level</label>
                    <input type="text" class="form-control" id="level" name="level" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="prices" class="form-label">Prices</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="durations[]" placeholder="Duration (e.g., 1 bulan)" required>
                        <input type="number" class="form-control" name="prices[]" placeholder="Price" required>
                    </div>
                    <div id="additional-prices"></div>
                    <button type="button" class="btn btn-secondary btn-sm" onclick="addPriceField()">Add More Prices</button>
                </div>
                <button type="submit" class="btn btn-primary">Create</button>
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
            <input type="text" class="form-control" name="durations[]" placeholder="Duration (e.g., 1 bulan)" required>
            <input type="number" class="form-control" name="prices[]" placeholder="Price" required>
        </div>
    `;
    additionalPrices.insertAdjacentHTML('beforeend', priceField);
}
</script>
@endsection